<?php
// app/Http/Controllers/Cashier/HistoryController.php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = [
            ['order_id' => 1, 'customer' => 'John Doe', 'status' => 'pending', 'waktu_pesan' => '2025-04-23 10:00', 'total' => 150000],
            ['order_id' => 2, 'customer' => 'Jane Smith', 'status' => 'processing', 'waktu_pesan' => '2025-04-23 10:15', 'total' => 120000],
            ['order_id' => 3, 'customer' => 'Alice Brown', 'status' => 'completed', 'waktu_pesan' => '2025-04-23 09:45', 'total' => 200000],
        ];
        return view('cashier.history.index', compact('history'));
    }
}
