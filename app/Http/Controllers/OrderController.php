<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'total' => 'required|numeric|min:1',
        ]);

        $order = Order::create([

            'order_number' =>
                'SAT-' .
                strtoupper(Str::random(8)),

            'customer_name' =>
                $request->name,

            'phone' =>
                $request->phone,

            'address' =>
                $request->address,

            'items' =>
                $request->items,

            'total_amount' =>
                $request->total,

            'payment_method' =>
                $request->payment,

            'payment_status' =>
                'Pending',

            'order_status' =>
                'Pending',

        ]);

        return response()->json([

            'success' => true,

            'order_id' =>
                $order->id,

            'order_number' =>
                $order->order_number,

            'amount' =>
                $order->total_amount,

            'payment_method' =>
                $order->payment_method,

        ]);
    }


    public function submitPayment(
        Request $request,
        $id
    ) {

        $request->validate([
            'upi_transaction_id' =>
                'required|string|max:100',
        ]);

        $order =
            Order::findOrFail($id);

        $order->update([

            'upi_transaction_id' =>
                $request->upi_transaction_id,

        ]);

        return response()->json([

            'success' => true,

            'message' =>
                'Payment details submitted successfully.',

        ]);
    }
}