<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

class CartController extends Controller
{
    public function index()
    {
        // Ambil semua cart dari session
        $carts = session()->get('carts', []);

        // Cek apakah ada cart
        if (empty($carts)) {
            // Jika tidak ada cart, set pesan kosong dan cart kosong
            $message = 'Kamu belum memasukkan barang ke dalam keranjang.';
            return view('customer.carts.index', compact('message', 'carts'));
        }

        foreach ($carts as $cartId => $cart) {
            if ($cart['total_price'] === 0) {
                // Hapus cart yang kosong
                unset($carts[$cartId]);
            }
        }

        // Jika ada cart, tampilkan semua cart
        return view('customer.carts.index', compact('carts'));
    }

    // Crud session keranjang agar bisa di masukkan di dalam card

    // Buat cart baru
    public function create(Request $request)
    {
        $carts = session()->get('carts', []);


        if ($request->cartId && isset($carts[$request->cartId])) {
            // Kalau ada cart lama, update saja
            $cartId = $request->cartId;
        } else {
            // Bikin cartId baru
            $cartId = rtrim(strtr(base64_encode(random_bytes(9)), '+/', '-_'), '=');
        }

        // Ambil items dari request
        $items = $request->input('items', []);



        // Hitung total quantity dan total price
        $totalQuantity = array_sum(array_column($items, 'quantity'));
        $totalPrice = array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Tambahkan cart baru ke carts
        $carts[$cartId] = [
            'items' => $request->items,
            'total_quantity' => $totalQuantity,
            'total_price' => $totalPrice,
            'created_at' => now(),
        ];

        // Simpan carts yang sudah diperbarui ke session
        session()->put('carts', $carts);

        return response()->json([
            'success' => true,
            'cartId' => $cartId,
            'message' => 'Cart berhasil dibuat atau diperbarui!'
        ]);
    }
    // Hapus item dari cart
    public function deleteItem($cartId, $itemId)
    {
        $carts = session()->get('carts', []);
        if (!isset($carts[$cartId])) {
            return response()->json([
                'success' => false,
                'message' => 'Cart tidak ditemukan.'
            ]);
        }

        $cart = $carts[$cartId];

        // Filter item yang akan dihapus
        $cart['items'] = collect($cart['items'])->filter(fn($item) => $item['id'] != $itemId)->values()->toArray();

        if (count($cart['items']) == count($carts[$cartId]['items'])) {
            return response()->json([
                'success' => false,
                'message' => 'Item tidak ditemukan dalam cart.'
            ]);
        }

        $cart['total_quantity'] = collect($cart['items'])->sum('quantity');
        $cart['total_price'] = collect($cart['items'])->reduce(function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Update the session with the modified cart
        $carts[$cartId] = $cart;
        session()->put('carts', $carts);

        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Item berhasil dihapus.'
        ]);
    }
}
