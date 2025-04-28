<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function create(Request $request)
    {
        $keranjang = session('keranjang', []);  // Ambil dari session

        return view('cashier.dashboard.form-order', compact('keranjang'));
    }


    public function saveCart(Request $request)
    {
        session(['keranjang' => $request->keranjang]);  // Simpan ke session

        return response()->json(['status' => 'success']);
    }


    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'nama' => 'required|string',
            'nomor_meja' => 'required|integer|min:1',
            'keranjang' => 'required|json',  // Pastikan keranjang diterima dalam format JSON
            'catatan' => 'nullable|string',
        ]);

        $keranjang = json_decode($request->keranjang, true);  // Mengubah JSON ke array PHP

        DB::beginTransaction();  // Mulai transaksi untuk keamanannya

        try {
            // 1. Simpan ke tabel orders
            $order = Order::create([
                'customer_name' => $request->nama,
                'table_number' => $request->nomor_meja,
                'order_note' => $request->catatan,
                'order_date' => Carbon::now(),
                'order_status' => 'pending',
                'total_products' => collect($keranjang)->sum('quantity'),
                'invoice_no' => 'INV-' . strtoupper(Str::random(8)),
                'total_amount' => collect($keranjang)->reduce(function ($total, $item) {
                    return $total + ($item['price'] * $item['quantity']);
                }, 0),
                'payment_method' => 'kasir',
                'payment_status' => 'unpaid',
            ]);

            // 2. Simpan setiap item ke tabel order_details
            foreach ($keranjang as $item) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],  // pastikan item ini sesuai dengan field di database
                    'quantity' => $item['quantity'],
                    'unitcost' => $item['price'],
                    'total' => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();  // Commit transaksi

            return redirect()->route('cashier.index')->with('success', 'Order berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();  // Rollback jika ada error
            return back()->with('error', 'Gagal menyimpan order: ' . $e->getMessage());
        }
    }
}
