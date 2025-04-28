<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Dummy data kategori
        $categories = Category::select('id', 'name', 'slug')->get();

        // Ambil produk dengan relasi kategori
        $products = Product::select(
            'id',
            'product_name',
            'category_id',
            'product_code',
            'product_image',
            'product_description',
            'product_stock',
            'buying_price',
            'selling_price',
            'created_at',
            'updated_at'
        )
            ->with('category')
            ->get();

        // Kelompokkan produk berdasarkan kategori slug
        $groupedProducts = $products->groupBy(function ($product) {
            return $product->category->slug;
        });


        // Dummy untuk menampilkan menu yang paling laris
        $bestSellers = Product::where('is_best_seller', true)->get();

        // Kirim data ke view
        return view('customer.menus.index', compact('groupedProducts', 'categories', 'bestSellers'));
    }

    public function show($cartId, Request $request)
    {
        $carts = session()->get('carts', []);
        // Cek apakah cart dengan cartId yang diberikan ada
        if (!isset($carts[$cartId])) {
            return response()->json([
                'success' => false,
                'message' => 'Cart tidak ditemukan.'
            ]);
        }
        $pesanan = $request->query('pesanan');
        // Ambil cart berdasarkan cartId
        $cart = $carts[$cartId];
        $cartItems = $cart['items'];

        $categories = Category::select('id', 'name', 'slug')->get();

        $products = Product::select(
            'id',
            'product_name',
            'category_id',
            'product_code',
            'product_image',
            'product_description',
            'product_stock',
            'buying_price',
            'selling_price',
            'created_at',
            'updated_at'
        )
            ->with('category')
            ->get();

        // Kelompokkan produk berdasarkan kategori slug
        $groupedProducts = $products->groupBy(function ($product) {
            return $product->category->slug;
        });

        // Ambil produk paling laris
        $bestSellers = Product::where('is_best_seller', true)->get();

        // Kirim data ke viewaS
        return view('customer.menus.index', compact('groupedProducts', 'categories', 'bestSellers', 'cartId', 'cartItems'));
    }
}