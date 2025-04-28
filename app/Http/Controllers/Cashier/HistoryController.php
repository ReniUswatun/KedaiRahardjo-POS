<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class HistoryController extends Controller
{

    public function index()
    {
        $histories = Order::where('order_status', 'finished')
                        ->orderBy('updated_at', 'desc')
                        ->get();

        $totalOrders = $histories->count();
        $totalRevenue = $histories->sum('total_amount');

        return view('cashier.history.index', compact('histories', 'totalOrders', 'totalRevenue'));
    }

}
