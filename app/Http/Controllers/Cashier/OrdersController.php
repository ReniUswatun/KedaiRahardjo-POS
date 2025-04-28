<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        // Mengambil data pesanan dengan detail produk yang terkait
        $orders = Order::with('orderDetails.product') // Eager loading relasi
            ->orderBy('created_at', 'desc')
            ->get();

        return view('cashier.orders.index', compact('orders'));
    }

    public function checkout(Order $order)
    {
        if ($order->payment_status == 'paid') {
            return redirect()->route('cashier.orders.index')->with('message', 'Pesanan sudah dibayar.');
        }

        $order->update([
            'payment_status' => 'paid',
            'order_status' => 'completed',
        ]);

        return redirect()->route('cashier.orders.index')->with('message', 'Checkout berhasil.');
    }

    public function destroy(Order $order)
    {
        if ($order->payment_status == 'paid') {
            return redirect()->route('cashier.orders.index')->with('message', 'Tidak bisa hapus pesanan yang sudah dibayar.');
        }

        $order->delete();

        return redirect()->route('cashier.orders.index')->with('message', 'Pesanan berhasil dihapus.');
    }
}
