<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class HistoryController extends Controller
{
    public function index()
    {
        // Ambil semua order yang sudah selesai
        $histories = Order::where('order_status', 'completed')->orderBy('updated_at', 'desc')->get();

        // Hitung total orders dan total revenue
        $totalOrders = $histories->count();
        $totalRevenue = $histories->sum('total_amount');

        // Kirim ke view
        return view('cashier.history.index', compact('histories', 'totalOrders', 'totalRevenue'));
    }
}
