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

        // Jika ada cart, tampilkan semua cart
        return view('customer.carts.index', compact('carts'));
    }

    // Crud session keranjang agar bisa di masukkan di dalam card

    // Buat cart baru
    public function create(Request $request)
    {
        $carts = session()->get('carts', []);
        // Bikin cartId baru
        $cartId = (string) \Illuminate\Support\Str::uuid();

        // Ambil items dari request
        $items = $request->input('items', []);



        // Hitung total quantity dan total price
        $totalQuantity = array_sum(array_column($items, 'quantity'));
        $totalPrice = array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Tambahkan cart baru ke carts
        $carts[$cartId] = [
            'items' => $items,
            'total_quantity' => $totalQuantity,
            'total_price' => $totalPrice,
        ];

        // Simpan carts yang sudah diperbarui ke session
        session()->put('carts', $carts);

        return response()->json([
            'success' => true,
            'cartId' => $cartId,
            'message' => 'Cart berhasil dibuat atau diperbarui!'
        ]);
    }

    // Tampilkan cart
    public function show($cartId)
    {
        $carts = session()->get('carts', []);
        $cart = $carts[$cartId] ?? null;

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart tidak ditemukan.');
        }

        return view('customer.carts.index', compact('cart', 'cartId'));
    }

    // Tambahkan item ke cart
    public function addItem(Request $request, $cartId)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);

        $carts = session()->get('carts', []);
        if (!isset($carts[$cartId])) {
            return redirect()->back()->with('error', 'Cart tidak ditemukan.');
        }

        $cart = $carts[$cartId];

        $itemId = $request->id;
        $index = collect($cart['items'])->search(fn($item) => $item['id'] == $itemId);

        if ($index !== false) {
            $cart['items'][$index]['quantity'] += $request->quantity;
        } else {
            $cart['items'][] = [
                'id' => $itemId,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ];
        }

        $cart['total_quantity'] = collect($cart['items'])->sum('quantity');
        $cart['total_price'] = collect($cart['items'])->reduce(function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $carts[$cartId] = $cart;
        session()->put('carts', $carts);

        return redirect()->back()->with('success', 'Item berhasil ditambahkan.');
    }

    // Update item di cart (ubah quantity)
    public function updateItem(Request $request, $cartId, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $carts = session()->get('carts', []);
        if (!isset($carts[$cartId])) {
            return redirect()->back()->with('error', 'Cart tidak ditemukan.');
        }

        $cart = $carts[$cartId];

        $index = collect($cart['items'])->search(fn($item) => $item['id'] == $itemId);

        if ($index === false) {
            return redirect()->back()->with('error', 'Item tidak ditemukan.');
        }

        $cart['items'][$index]['quantity'] = $request->quantity;

        $cart['total_quantity'] = collect($cart['items'])->sum('quantity');
        $cart['total_price'] = collect($cart['items'])->reduce(function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $carts[$cartId] = $cart;
        session()->put('carts', $carts);

        return redirect()->back()->with('success', 'Item berhasil diupdate.');
    }

    // Hapus item dari cart
    public function deleteItem($cartId, $itemId)
    {
        $carts = session()->get('carts', []);
        if (!isset($carts[$cartId])) {
            return redirect()->back()->with('error', 'Cart tidak ditemukan.');
        }

        $cart = $carts[$cartId];

        $cart['items'] = collect($cart['items'])->filter(fn($item) => $item['id'] != $itemId)->values()->toArray();

        $cart['total_quantity'] = collect($cart['items'])->sum('quantity');
        $cart['total_price'] = collect($cart['items'])->reduce(function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $carts[$cartId] = $cart;
        session()->put('carts', $carts);

        return redirect()->back()->with('success', 'Item berhasil dihapus.');
    }

    // Hapus seluruh cart
    public function deleteCart($cartId)
    {
        $carts = session()->get('carts', []);

        if (isset($carts[$cartId])) {
            unset($carts[$cartId]);
            session()->put('carts', $carts);
            return redirect()->route('carts.index')->with('success', 'Cart berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Cart tidak ditemukan.');
    }
}
