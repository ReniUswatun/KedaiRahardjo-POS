<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        // Dummy data kategori
        $categories = [
            'makanan' => 'Makanan',
            'minuman' => 'Minuman',
            'camilan' => 'Camilan',
        ];

        //Dummy untuk menampilkan menu berdasarkan kategori
        $menus = [
            'makanan' => [
                ['id' => 1, 'name' => 'Nasi Goreng', 'price' => 15000],
                ['id' => 2, 'name' => 'Ayam Penyet', 'price' => 20000],
            ],
            'minuman' => [
                ['id' => 3, 'name' => 'Es Teh', 'price' => 5000],
                ['id' => 4, 'name' => 'Jus Jeruk', 'price' => 10000],
            ],
            'camilan' => [
                ['id' => 5, 'name' => 'Keripik Singkong', 'price' => 7000],
                ['id' => 6, 'name' => 'Kue Cubir', 'price' => 8000],
            ],
        ];

        // Dummy untuk menampilkan menu yang paling laris
        $bestSellers = [
            ['id' => 1, 'name' => 'Nasi Goreng', 'price' => 15000],
            ['id' => 3, 'name' => 'Es Teh', 'price' => 5000],
        ];


        return view('customer.menus.index', compact('categories'));
    }
}
