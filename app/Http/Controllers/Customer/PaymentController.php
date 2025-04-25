<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function create()
    {
        return view('customer.menus.form-order');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nomor_meja' => 'required|integer',
            'keranjang' => 'required|json',
            'catatan' => 'nullable|string',
        ]);

        $items = json_decode($validated['keranjang'], true);

        return view('customer.menus.bill', [
            'nama' => $validated['nama'],
            'nomor_meja' => $validated['nomor_meja'],
            'catatan' => $validated['catatan'],
            'items' => $items,
        ]);
    }
}