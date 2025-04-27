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
        $bestSellers = [
            [
                'id' => 1,
                'category' => 'makanan',
                'name' => 'Nasi Goreng',
                'price' => 15000,
                'description' => 'Nasi goreng spesial dengan telur, ayam, dan bumbu khas yang menggugah selera.',
                'image' => 'https://asset.kompas.com/crops/U6YxhTLF-vrjgM8PN3RYTHlIxfM=/84x60:882x592/1200x800/data/photo/2021/11/17/61949959e07d3.jpg',
            ],
            [
                'id' => 3,
                'category' => 'minuman',
                'name' => 'Es Teh',
                'price' => 5000,
                'description' => 'Es teh manis yang menyegarkan, pas banget untuk menemani makanan berat.',
                'image' => 'https://static.republika.co.id/uploads/member/images/news/240607073248-607.jpg',
            ],
            [
                'id' => 6,
                'category' => 'minuman',
                'name' => 'Kopi Susu Gula Aren',
                'price' => 18000,
                'description' => 'Kopi kekinian dengan perpaduan espresso dan gula aren khas Indonesia.',
                'image' => 'http://asset.kompas.com/crops/Cm2LnOmXwh94SSqps33fisGfjfI=/0x1:960x641/1200x800/data/photo/2020/04/07/5e8c708bb14e8.jpg',
            ],
            [
                'id' => 21,
                'category' => 'camilan',
                'name' => 'Keripik Singkong',
                'price' => 7000,
                'description' => 'Keripik singkong renyah dengan rasa gurih dan sedikit asin, cocok buat camilan sore.',
                'image' => 'https://cdn0-production-images-kly.akamaized.net/ssPfbIjxQj2FiW5bpXngdPgjlYs=/0x66:999x629/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4218282/original/055399700_1667879127-shutterstock_2219753369.jpg',
            ],
            [
                'id' => 24,
                'category' => 'camilan',
                'name' => 'Tahu Crispy',
                'price' => 8000,
                'description' => 'Tahu digoreng garing dengan bumbu gurih yang bikin ketagihan.',
                'image' => 'https://asset.kompas.com/crops/l4NugScakkpODgZXQXgld2_lnc0=/0x0:1000x667/1200x800/data/photo/2021/06/10/60c191379a00a.jpg',
            ],
        ];


        return view('customer.menus.index', compact('categories', 'menus', 'bestSellers'));
    }
}
