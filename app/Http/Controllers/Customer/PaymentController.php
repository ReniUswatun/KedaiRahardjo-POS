<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function create()
    {
        $keranjang = session('keranjang', []); // Kalau kosong, default []
    
        return view('customer.menus.form-order', [
            'keranjang' => $keranjang
        ]);
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
    
        // Simpan ke database
        $order = Order::create([
            'nama' => $validated['nama'],
            'nomor_meja' => $validated['nomor_meja'],
            'catatan' => $validated['catatan'] ?? null,
        ]);
    
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'nama_produk' => $item['nama_produk'] ?? '',
                'jumlah' => $item['jumlah'] ?? 0,
                'harga' => $item['harga'] ?? 0,
            ]);
        }
    
        // Tampilkan halaman bill + data
        return view('customer.menus.bill', [
            'order' => $order,
            'items' => $order->items,
        ]);
    }

    public function saveCart(Request $request)
    {
        $validated = $request->validate([
            'keranjang' => 'required|array',
        ]);

        // Simpan keranjang ke session sementara
        session(['keranjang' => $validated['keranjang']]);

        return response()->json(['message' => 'Keranjang berhasil disimpan']);
    }

}