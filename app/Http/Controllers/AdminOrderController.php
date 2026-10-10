<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhere('customer_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('upi_transaction_id', 'like', "%{$search}%");

            });
        }

        /*
        |--------------------------------------------------------------------------
        | ORDER STATUS FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'order_status',
                $request->status
            );
        }

        /*
        |--------------------------------------------------------------------------
        | PAYMENT FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('payment')) {

            $payment = $request->payment;

            if (in_array($payment, ['Paid', 'Pending', 'Failed'])) {

                $query->where(
                    'payment_status',
                    $payment
                );

            } elseif (in_array($payment, ['UPI', 'COD'])) {

                $query->where(
                    'payment_method',
                    $payment
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | DATE FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->date === 'today') {

            $query->whereDate(
                'created_at',
                today()
            );

        } elseif ($request->date === '7days') {

            $query->where(
                'created_at',
                '>=',
                now()->subDays(7)
            );

        } elseif ($request->date === '30days') {

            $query->where(
                'created_at',
                '>=',
                now()->subDays(30)
            );
        }

        /*
        |--------------------------------------------------------------------------
        | ORDERS
        |--------------------------------------------------------------------------
        */

        $orders = $query
            ->latest()
            ->paginate(20)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD STATS
        |--------------------------------------------------------------------------
        */

        $stats = [

            'total' => Order::count(),

            'pending' => Order::where(
                'order_status',
                'Pending'
            )->count(),

            'confirmed' => Order::where(
                'order_status',
                'Confirmed'
            )->count(),

            'processing' => Order::where(
                'order_status',
                'Processing'
            )->count(),

            'shipped' => Order::where(
                'order_status',
                'Shipped'
            )->count(),

            'delivered' => Order::where(
                'order_status',
                'Delivered'
            )->count(),

            'cancelled' => Order::where(
                'order_status',
                'Cancelled'
            )->count(),

            'payment_pending' => Order::where(
                'payment_status',
                'Pending'
            )->count(),

            'payment_paid' => Order::where(
                'payment_status',
                'Paid'
            )->count(),

            'payment_failed' => Order::where(
                'payment_status',
                'Failed'
            )->count(),

            'upi' => Order::where(
                'payment_method',
                'UPI'
            )->count(),

            'cod' => Order::where(
                'payment_method',
                'COD'
            )->count(),

            'revenue' => Order::where(
                'payment_status',
                'Paid'
            )->sum('total_amount'),
        ];

        return view(
            'admin.orders',
            compact('orders', 'stats')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE ORDER STATUS - AJAX
    |--------------------------------------------------------------------------
    */

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'order_status' =>
                'required|in:Pending,Confirmed,Processing,Shipped,Delivered,Cancelled',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'order_status' => $request->order_status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order status updated successfully.',
            'order' => [
                'id' => $order->id,
                'order_status' => $order->order_status,
            ],
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | MARK PAYMENT AS PAID - AJAX
    |--------------------------------------------------------------------------
    */

    public function markPaid($id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'payment_status' => 'Paid',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Payment marked as paid.',
            'order' => [
                'id' => $order->id,
                'payment_status' => $order->payment_status,
            ],
        ]);
    }
}