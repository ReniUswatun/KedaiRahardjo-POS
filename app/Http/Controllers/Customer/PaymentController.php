<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //Menuju ke halaman payment dengan menerima idCart
    public function showCheckoutForm($cartId)
    {
        $cart = session('carts')[$cartId] ?? null;
        if (!$cart) return abort(404);

        return view('customer.menus.form-order', compact('cartId', 'cart'));
    }

    //! masi mentah olah lagi nanti
    //Melakukan proses checkout
    public function processCheckoutFromCart(
        Request $request,
        $cartId
    ) {
        // Ambil cart dari session
        $carts = session('carts', []);
        $cart = $carts[$cartId] ?? null;

        if (!$cart) {
            return back()->withErrors(['error' => 'Cart tidak ditemukan.']);
        }

        // Validasi input form
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'table_number' => 'required|integer',
            'order_note' => 'nullable|string',
            'payment_method' => 'required|string|in:kasir,qris',
        ]);

        session('orders', []);

        DB::beginTransaction();

        try {
            // Simpan ke database Orders
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'table_number' => $request->table_number,
                'order_note' => $request->order_note,
                'order_date' => now(),
                'order_status' => 'pending',
                'total_products' => $cart['total_quantity'],
                'invoice_no' => $cartId,
                'total_amount' => $cart['total_price'],
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_method == 'kasir' ? 'unpaid' : 'paid',
            ]);

            // Simpan ke database OrderDetails
            foreach ($cart['items'] as $item) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'unitcost' => $item['price'],
                    'total' => $item['quantity'] * $item['price'],
                ]);
            }

            unset($carts[$cartId]);
            session()->put('carts', $carts);

            $orders = session()->get('orders', []); // Ambil data orders yang ada
            if (!is_array($orders)) { // Periksa apakah orders adalah array
                $orders = []; // Reset jika bukan array
            }

            // Push order id ke dalam array orders
            $orders[] = $order->id;

            // Simpan kembali ke session
            session()->put('orders', $orders);

            // Commit transaction
            DB::commit();

            return redirect()->route('customer.order.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // Jika terjadi error, tampilkan error tersebut
            return back()->withErrors(['error' => 'Order processing failed: ' . $e->getMessage()]);
        }
    }

    // public function create()
    // {
    //     $keranjang = session('keranjang', []); // Kalau kosong, default []

    //     return view('customer.menus.form-order', [
    //         'keranjang' => $keranjang
    //     ]);
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama' => 'required|string',
    //         'nomor_meja' => 'required|integer',
    //         'keranjang' => 'required|json',
    //         'catatan' => 'nullable|string',
    //     ]);

    //     $items = json_decode($validated['keranjang'], true);

    //     // Simpan ke database
    //     $bill = Bill::create([
    //         'nama' => $validated['nama'],
    //         'nomor_meja' => $validated['nomor_meja'],
    //         'catatan' => $validated['catatan'] ?? null,
    //     ]);

    //     foreach ($items as $item) {
    //         BillItem::create([
    //             'bill_id' => $bill->id,
    //             'nama_produk' => $item['nama_produk'] ?? '',
    //             'jumlah' => $item['jumlah'] ?? 0,
    //             'harga' => $item['harga'] ?? 0,
    //         ]);
    //     }

    //     // Tampilkan halaman bill + data
    //     return view('customer.menus.bill', [
    //         'bill' => $bill,
    //         'items' => $bill->items,
    //     ]);
    // }

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
