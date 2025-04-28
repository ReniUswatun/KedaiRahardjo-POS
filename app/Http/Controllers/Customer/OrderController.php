<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Ambil semua id_order di session 
        $orders_id = session('orders', []);
        // Ambil semua order beserta relasi OrderDetails dan Product
        $orders = Order::with(['orderDetails.product'])
            ->whereIn('id', (array) $orders_id)
            ->orderBy('order_date', 'desc')
            ->get();

        // Siapin data dalam bentuk mirip dummy array yang sekarang dipakai
        $formattedOrders = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'customer_name' => $order->customer_name,
                'table_number' => $order->table_number,
                'order_note' => $order->order_note,
                'order_date' => $order->order_date,
                'order_status' => $order->order_status,
                'total_products' => $order->total_products,
                'invoice_no' => $order->invoice_no,
                'total_amount' => $order->total_amount,
                'payment_method' => $order->payment_method,
                'payment_status' => $order->payment_status,
                'items' => $order->orderDetails->map(function ($detail) {
                    return [
                        'name' => $detail->product->product_name ?? 'Produk tidak ditemukan',
                        'quantity' => $detail->quantity,
                        'price' => $detail->unitcost,
                        'image' => $detail->product->product_image,
                    ];
                }),
            ];
        });

        // Jika tidak ada order yang ditemukan, kirim pesan ke view
        return view('customer.orders.index', [
            'orders_status' => ['pending', 'processing', 'completed', 'cancelled'],
            'orders' => $formattedOrders,
        ]);
    }
}
