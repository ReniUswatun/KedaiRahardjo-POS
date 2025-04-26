<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class MenuController extends Controller
{
    public function index()
    {
        // Dummy data kategori
        $categories = Category::select('id', 'name', 'slug')->get();

        // Ambil produk dengan relasi kategori
        $products = Product::with('category')->get()->makeHidden('is_best_seller');;

        // Kelompokkan produk berdasarkan kategori slug
        $groupedProducts = $products->groupBy(function ($product) {
            return $product->category->slug;
        });


        // Dummy untuk menampilkan menu yang paling laris
        $bestSellers = Product::where('is_best_seller', true)->get();

        // return view('customer.menus.index', compact('categories', 'menus', 'bestSellers'));
        return view('customer.menus.index', compact('groupedProducts', 'categories', 'bestSellers'));
    }
}
