<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OfferController extends Controller
{
    /**
     * Validate offer type.
     */
    private function type(string $type): string
    {
        abort_unless(
            in_array($type, ['combo', 'special'], true),
            404
        );

        return $type;
    }

    /**
     * Display the offer management page.
     */
    private function page(string $type, ?Offer $editingOffer = null)
    {
        $type = $this->type($type);

        $offers = Offer::where('type', $type)
            ->latest()
            ->paginate(15);

        $products = Product::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.offers.index', compact(
            'type',
            'offers',
            'products',
            'editingOffer'
        ));
    }

    /**
     * List offers.
     */
    public function index(string $type)
    {
        return $this->page($type);
    }

    /**
     * Show offer creation page.
     */
    public function create(string $type)
    {
        return $this->page($type);
    }

    /**
     * Edit an existing offer.
     */
    public function edit(string $type, Offer $offer)
    {
        $type = $this->type($type);

        abort_unless($offer->type === $type, 404);

        return $this->page($type, $offer);
    }

    /**
     * Store a new offer.
     */
    public function store(Request $request, string $type)
    {
        $type = $this->type($type);

        $data = $this->validated($request, $type);

        Offer::create($data);

        return redirect()
            ->route('admin.offers.index', ['type' => $type])
            ->with('success', 'Offer created successfully.');
    }

    /**
     * Update an existing offer.
     */
    public function update(
        Request $request,
        string $type,
        Offer $offer
    ) {
        $type = $this->type($type);

        abort_unless($offer->type === $type, 404);

        $data = $this->validated($request, $type);

        $offer->update($data);

        return redirect()
            ->route('admin.offers.index', ['type' => $type])
            ->with('success', 'Offer updated successfully.');
    }

    /**
     * Delete an offer.
     */
    public function destroy(string $type, Offer $offer)
    {
        $type = $this->type($type);

        abort_unless($offer->type === $type, 404);

        $offer->delete();

        return redirect()
            ->route('admin.offers.index', ['type' => $type])
            ->with('success', 'Offer deleted successfully.');
    }

    /**
     * Validate products, variants and offer details.
     */
    private function validated(
        Request $request,
        string $type
    ): array {

        $minItems = $type === 'combo' ? 2 : 1;

        $v = $request->validate([

            'name' => 'required|string|max:180',

            'description' => 'nullable|string|max:2000',

            'image' => 'nullable|string|max:500',

            'offer_price' => 'required|numeric|min:0.01',

            'starts_at' => 'required|date',

            'ends_at' => 'required|date|after:starts_at',

            'is_active' => 'nullable|boolean',

            'items' => "required|array|min:{$minItems}",

            'items.*.product_id' =>
                'required|integer|distinct|exists:products,id',

            'items.*.weight' =>
                'nullable|string|max:100',

            'items.*.quantity' =>
                'required|integer|min:1|max:100',

        ]);

        $items = [];

        $regular = 0;

        $productIds = [];

        foreach ($v['items'] as $item) {

            // Get only active existing products.
            $product = Product::where('status', true)
                ->find($item['product_id']);

            if (!$product) {
                throw ValidationException::withMessages([
                    'items' => 'One selected product is inactive or unavailable.'
                ]);
            }

            // Read existing product variants.
            $variants = is_array($product->variants)
                ? $product->variants
                : (
                    json_decode(
                        $product->variants ?? '[]',
                        true
                    ) ?: []
                );

            $weight = $item['weight'] ?? '';

            $price = (float) $product->price;

            // Validate selected variant and get its database price.
            if (count($variants)) {

                $variant = collect($variants)->first(
                    fn ($v) =>
                    (string) ($v['weight'] ?? '') === (string) $weight
                );

                if (!$variant) {
                    throw ValidationException::withMessages([
                        'items' => "Choose a valid variant for {$product->name}."
                    ]);
                }

                $price = (float) ($variant['price'] ?? 0);

                if ($price <= 0) {
                    throw ValidationException::withMessages([
                        'items' => "Invalid price for {$product->name}."
                    ]);
                }

            } else {

                $weight = $weight ?: ($product->weight ?? '');

            }

            $quantity = (int) $item['quantity'];

            $productIds[] = (int) $product->id;

            // Store product snapshot in offer items.
            $items[] = [

                'kind' => 'product',

                'product_id' => $product->id,

                'name' => $product->name,

                'weight' => $weight,

                'quantity' => $quantity,

                'base_price' => $price,

            ];

            $regular += $price * $quantity;
        }

        // Combo requires at least 2 different products.
        if (
            $type === 'combo' &&
            count(array_unique($productIds)) < 2
        ) {
            throw ValidationException::withMessages([
                'items' => 'Combo offers must contain at least 2 different existing products.'
            ]);
        }

        // Offer price cannot exceed regular price.
        if ((float) $v['offer_price'] > $regular) {
            throw ValidationException::withMessages([
                'offer_price' => 'Offer price cannot be higher than the regular product total.'
            ]);
        }

        return [

            'name' => $v['name'],

            'type' => $type,

            'description' => $v['description'] ?? null,

            'image' => $v['image'] ?? null,

            'items' => $items,

            'regular_price' => $regular,

            'offer_price' => $v['offer_price'],

            'starts_at' => $v['starts_at'],

            'ends_at' => $v['ends_at'],

            'is_active' => $request->boolean('is_active'),

        ];
    }
}