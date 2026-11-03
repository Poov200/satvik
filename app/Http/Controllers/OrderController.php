<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'payment' => 'required|in:COD,UPI',
            'items' => 'required|array|min:1',
            'items.*.quantity' => 'required|integer|min:1|max:100',
        ]);

        [$verifiedItems, $subtotal] = $this->verifyCart($request->input('items'));
        $delivery = $subtotal > 999 ? 0 : 69;
        $total = $subtotal + $delivery;

        $order = Order::create([
            'order_number' => 'SAT-' . strtoupper(Str::random(8)),
            'customer_name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'items' => $verifiedItems,
            'total_amount' => $total,
            'payment_method' => $request->payment,
            'payment_status' => 'Pending',
            'order_status' => 'Pending',
        ]);

        return response()->json([
            'success' => true,
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'amount' => $order->total_amount,
            'payment_method' => $order->payment_method,
            'subtotal' => $subtotal,
            'delivery_charge' => $delivery,
        ]);
    }

    private function verifyCart(array $items): array
    {
        $verified = [];
        $subtotal = 0;

        foreach ($items as $item) {
            $qty = (int) $item['quantity'];

            if (!empty($item['offerId'])) {
                // Only currently valid combo offers can be purchased through this cart line.
                $offer = Offer::available()
                    ->where('type', 'combo')
                    ->find((int) $item['offerId']);

                if (!$offer) {
                    throw ValidationException::withMessages([
                        'items' => 'A combo offer in your cart has expired or is unavailable. Refresh your cart and try again.',
                    ]);
                }

                $linePrice = (float) $offer->offer_price;

                $verified[] = [
                    'type' => 'offer',
                    'offer_id' => $offer->id,
                    'name' => $offer->name,
                    'quantity' => $qty,
                    'unit_price' => $linePrice,
                    'regular_price' => (float) $offer->regular_price,
                    'discount' => max(0, (float) $offer->regular_price - $linePrice),
                    'items_snapshot' => $offer->items,
                ];

                $subtotal += $linePrice * $qty;
                continue;
            }

            $productId = (int) ($item['productId'] ?? 0);
            $product = Product::where('status', true)->find($productId);

            if (!$product) {
                throw ValidationException::withMessages([
                    'items' => 'A product in your cart is no longer available.',
                ]);
            }

            $weight = $item['weight'] ?? $product->weight;
            $price = (float) $product->price;

            if ($weight && is_array($product->variants) && count($product->variants)) {
                $variant = collect($product->variants)->firstWhere('weight', $weight);

                if (!$variant) {
                    throw ValidationException::withMessages([
                        'items' => 'A selected product variant is no longer available.',
                    ]);
                }

                $price = (float) $variant['price'];
            }

            $verified[] = [
                'type' => 'product',
                'product_id' => $product->id,
                'name' => $product->name,
                'weight' => $weight,
                'quantity' => $qty,
                'unit_price' => $price,
            ];

            $subtotal += $price * $qty;
        }

        return [$verified, round($subtotal, 2)];
    }

    public function submitPayment(Request $request, $id)
    {
        $request->validate([
            'upi_transaction_id' => 'required|string|max:100',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'upi_transaction_id' => $request->upi_transaction_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Payment details submitted successfully.',
        ]);
    }
}
