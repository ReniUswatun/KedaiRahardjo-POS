<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $orders = [
        ['order_id' => 1, 'customer' => 'John Doe', 'status' => 'pending', 'waktu_pesan' => '2025-04-23 10:00', 'total' => 150000],
        ['order_id' => 2, 'customer' => 'Jane Smith', 'status' => 'processing', 'waktu_pesan' => '2025-04-23 10:15', 'total' => 120000],
        ['order_id' => 3, 'customer' => 'Alice Brown', 'status' => 'completed', 'waktu_pesan' => '2025-04-23 09:45', 'total' => 200000],
    ];

    public function index()
    {
        $orders = array_filter($this->orders, fn($order) => $order['status'] === 'pending');
        return view('cashier.orders.index', compact('orders'));
    }

    public function processing()
    {
        $orders = array_filter($this->orders, fn($order) => $order['status'] === 'processing');
        return view('cashier.orders.processing', compact('orders'));
    }

    public function pending()
    {
        $orders = array_filter($this->orders, fn($order) => $order['status'] === 'pending');
        return view('cashier.orders.index', compact('orders'));
    }

    public function invoice($orderId)
    {
        $order = collect($this->orders)->firstWhere('order_id', $orderId);

        if (!$order) {
            abort(404);
        }

        return view('cashier.orders.invoice', compact('order'));
    }

    public function completed()
    {
        $orders = array_filter($this->orders, fn($order) => $order['status'] === 'completed');
        return view('cashier.orders.completed', compact('orders'));
    }

    public function detail($orderId)
    {
        $order = collect($this->orders)->firstWhere('order_id', $orderId);

        if (!$order) {
            abort(404);
        }

        return view('cashier.orders.detail', compact('order'));
    }

    public function delete($orderId)
{
    // Simulasi cari order
    $order = collect($this->orders)->firstWhere('order_id', $orderId);

    if (!$order) {
        abort(404);
    }

    // Simulasi penghapusan (karena ini array statis, tidak bisa benar-benar delete)
    // Kalau nanti pakai database, bisa pakai Order::find($orderId)->delete();

    return redirect()->back()->with('success', 'Order berhasil dihapus.');
}

}
