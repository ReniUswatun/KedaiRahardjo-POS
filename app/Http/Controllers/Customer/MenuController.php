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
        // Cache kategori 1 jam
        $categories = cache()->remember('categories', 3600, function () {
            return Category::select('id', 'name', 'slug')->get();
        });

        // Ambil produk dengan relasi kategori
        $products = cache()->remember('products', 3600, function () {
            return Product::select(
                'id',
                'product_name',
                'category_id',
                'product_code',
                'product_image',
                'product_description',
                'product_stock',
                'buying_price',
                'selling_price'
            )
                ->with('category')
                ->get();
        });

        // Kelompokkan produk berdasarkan slug kategori
        $groupedProducts = $products->groupBy(fn($product) => $product->category->slug ?? 'uncategorized');

        $bestSellers = cache()->remember('best_sellers', 3600, function () {
            return Product::select('*')
                ->where('is_best_seller', true)
                ->get();
        });

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

        // Pakai data yang sama seperti index()
        $categories = cache()->remember('categories', 3600, function () {
            return Category::select('id', 'name', 'slug')->get();
        });

        $products = cache()->remember('products', 3600, function () {
            return Product::select(
                'id',
                'product_name',
                'category_id',
                'product_code',
                'product_image',
                'product_description',
                'product_stock',
                'buying_price',
                'selling_price'
            )
                ->with('category')
                ->get();
        });

        // Kelompokkan produk berdasarkan kategori slug
        $groupedProducts = $products->groupBy(function ($product) {
            return $product->category->slug;
        });

        $bestSellers = cache()->remember('best_sellers', 3600, function () {
            return Product::select('*')
                ->where('is_best_seller', true)
                ->get();
        });

        // Kirim data ke view
        return view('customer.menus.index', compact('groupedProducts', 'categories', 'bestSellers', 'cartId', 'cartItems'));
    }
}
