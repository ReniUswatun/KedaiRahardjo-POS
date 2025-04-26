<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'Nasi Goreng Spesial',
                'category_id' => 1,
                'product_code' => 'PRD30257',
                'product_description' => 'Nasi goreng khas dengan ayam, telur, dan sayuran segar, disajikan dengan kerupuk dan acar.',
                'stock' => 85,
                'buying_price' => 12234,
                'selling_price' => 15000
            ],
            [
                'product_name' => 'Ayam Penyet Sambal Ijo',
                'category_id' => 1,
                'product_code' => 'PRD14662',
                'product_description' => 'Ayam goreng empuk dengan sambal ijo khas, disajikan dengan nasi, tahu, dan lalapan.',
                'stock' => 21,
                'buying_price' => 17701,
                'selling_price' => 20000
            ],
            [
                'product_name' => 'Mie Ayam Bakso',
                'category_id' => 1,
                'product_code' => 'PRD19823',
                'product_description' => 'Mie ayam lengkap dengan bakso dan pangsit, kuah gurih yang menggoda.',
                'stock' => 67,
                'buying_price' => 11000,
                'selling_price' => 14000
            ],
            [
                'product_name' => 'Soto Ayam',
                'category_id' => 1,
                'product_code' => 'PRD19825',
                'product_description' => 'Soto ayam hangat dengan suwiran ayam, tauge, dan kuah kuning gurih.',
                'stock' => 55,
                'buying_price' => 7000,
                'selling_price' => 10000
            ],
            [
                'product_name' => 'Sate Ayam Madura',
                'category_id' => 1,
                'product_code' => 'PRD22871',
                'product_description' => 'Sate ayam dengan bumbu kacang khas Madura dan lontong.',
                'stock' => 38,
                'buying_price' => 13500,
                'selling_price' => 18000
            ],
            [
                'product_name' => 'Rawon Daging',
                'category_id' => 1,
                'product_code' => 'PRD0005',
                'product_description' => 'Rawon daging sapi dengan kuah hitam khas dan nasi hangat.',
                'stock' => 50,
                'buying_price' => 18000,
                'selling_price' => 25000,
            ],
            [
                'product_name' => 'Bakso Urat',
                'category_id' => 1,
                'product_code' => 'PRD0006',
                'product_description' => 'Bakso urat daging sapi kenyal dengan kuah kaldu gurih.',
                'stock' => 75,
                'buying_price' => 10000,
                'selling_price' => 14000,
            ],
            [
                'product_name' => 'Rendang Padang',
                'category_id' => 1,
                'product_code' => 'PRD0008',
                'product_description' => 'Rendang daging sapi dengan bumbu rempah kental, khas Padang.',
                'stock' => 30,
                'buying_price' => 22000,
                'selling_price' => 27000,
            ],
            [
                'product_name' => 'Tahu Tek Surabaya',
                'category_id' => 1,
                'product_code' => 'PRD0009',
                'product_description' => 'Tahu goreng, lontong, tauge, dan telur dengan bumbu petis khas.',
                'stock' => 60,
                'buying_price' => 9000,
                'selling_price' => 12000,
            ],
            [
                'product_name' => 'Pecel Lele',
                'category_id' => 1,
                'product_code' => 'PRD0010',
                'product_description' => 'Lele goreng renyah dengan sambal tomat dan nasi.',
                'stock' => 45,
                'buying_price' => 13000,
                'selling_price' => 17000,
            ],
            [
                'product_name' => 'Es Teh Manis',
                'category_id' => 2,
                'product_code' => 'PRD94999',
                'product_description' => 'Minuman klasik segar yang cocok diminum kapan saja, disajikan dingin dengan es batu.',
                'stock' => 90,
                'buying_price' => 2614,
                'selling_price' => 5000
            ],
            [
                'product_name' => 'Jus Jeruk Segar',
                'category_id' => 2,
                'product_code' => 'PRD33567',
                'product_description' => 'Dibuat dari jeruk peras asli, tanpa tambahan gula buatan.',
                'stock' => 45,
                'buying_price' => 7061,
                'selling_price' => 10000
            ],
            [
                'product_name' => 'Kopi Susu Gula Aren',
                'category_id' => 2,
                'product_code' => 'PRD77421',
                'product_description' => 'Kopi robusta dengan susu segar dan gula aren, rasa manis pas dan creamy.',
                'stock' => 60,
                'buying_price' => 8500,
                'selling_price' => 12000
            ],
            [
                'product_name' => 'Es Campur Segar',
                'category_id' => 2,
                'product_code' => 'PRD12045',
                'product_description' => 'Campuran buah segar, cincau, dan sirup manis dengan es serut.',
                'stock' => 50,
                'buying_price' => 9000,
                'selling_price' => 13000
            ],
            [
                'product_name' => 'Es Cincau',
                'category_id' => 2,
                'product_code' => 'PRD0013',
                'product_description' => 'Minuman khas dengan cincau hitam dan gula merah cair, sangat menyegarkan.',
                'stock' => 80,
                'buying_price' => 5000,
                'selling_price' => 7000
            ],
            [
                'product_name' => 'Kopi Tubruk',
                'category_id' => 2,
                'product_code' => 'PRD0014',
                'product_description' => 'Kopi hitam pekat khas Indonesia yang disajikan panas tanpa ampas disaring.',
                'stock' => 90,
                'buying_price' => 6000,
                'selling_price' => 8000
            ],
            [
                'product_name' => 'Es Kelapa Muda',
                'category_id' => 2,
                'product_code' => 'PRD0015',
                'product_description' => 'Daging kelapa segar dengan air kelapa alami dan es batu.',
                'stock' => 65,
                'buying_price' => 9000,
                'selling_price' => 12000
            ],
            [
                'product_name' => 'Susu Cokelat Dingin',
                'category_id' => 2,
                'product_code' => 'PRD0016',
                'product_description' => 'Minuman susu segar dengan rasa cokelat manis yang disukai semua umur.',
                'stock' => 70,
                'buying_price' => 7000,
                'selling_price' => 9000
            ],
            [
                'product_name' => 'Wedang Jahe',
                'category_id' => 2,
                'product_code' => 'PRD0017',
                'product_description' => 'Minuman hangat berbahan dasar jahe segar, cocok diminum malam hari.',
                'stock' => 55,
                'buying_price' => 5000,
                'selling_price' => 7000
            ],
            [
                'product_name' => 'Teh Tarik',
                'category_id' => 2,
                'product_code' => 'PRD0018',
                'product_description' => 'Teh kental dengan susu, dikocok sampai berbuih, khas Malaysia.',
                'stock' => 75,
                'buying_price' => 8000,
                'selling_price' => 10000
            ],
            [
                'product_name' => 'Jus Alpukat',
                'category_id' => 2,
                'product_code' => 'PRD0019',
                'product_description' => 'Jus alpukat kental dengan topping cokelat leleh.',
                'stock' => 60,
                'buying_price' => 8500,
                'selling_price' => 11000
            ],
            [
                'product_name' => 'Air Mineral Botol',
                'category_id' => 2,
                'product_code' => 'PRD0020',
                'product_description' => 'Air mineral segar dalam botol, pilihan tepat untuk melepas dahaga.',
                'stock' => 100,
                'buying_price' => 2000,
                'selling_price' => 3000
            ],
            [
                'product_name' => 'Keripik Singkong',
                'category_id' => 3,
                'product_code' => 'PRD51093',
                'product_description' => 'Keripik singkong renyah dengan rasa gurih dan sedikit asin, cocok buat camilan sore.',
                'stock' => 34,
                'buying_price' => 4273,
                'selling_price' => 7000
            ],
            [
                'product_name' => 'Kacang Atom Pedas',
                'category_id' => 3,
                'product_code' => 'PRD66612',
                'product_description' => 'Camilan kacang berlapis tepung renyah dengan rasa pedas menggoda.',
                'stock' => 40,
                'buying_price' => 3500,
                'selling_price' => 6000
            ],
            [
                'product_name' => 'Cokelat Batang Mini',
                'category_id' => 3,
                'product_code' => 'PRD88342',
                'product_description' => 'Cokelat manis dalam ukuran mini, pas untuk camilan cepat.',
                'stock' => 65,
                'buying_price' => 5600,
                'selling_price' => 9000
            ],
            [
                'product_name' => 'Permen Kopi',
                'category_id' => 3,
                'product_code' => 'PRD99110',
                'product_description' => 'Permen rasa kopi dengan sensasi manis dan pahit yang seimbang.',
                'stock' => 75,
                'buying_price' => 2800,
                'selling_price' => 5000
            ],
            [
                'product_name' => 'Kue Cubit',
                'category_id' => 3,
                'product_code' => 'PRD0022',
                'product_description' => 'Kue mungil yang lembut dan manis, tersedia dalam berbagai rasa menarik.',
                'stock' => 70,
                'buying_price' => 6000,
                'selling_price' => 8000,
            ],
            [
                'product_name' => 'Pisang Goreng',
                'category_id' => 3,
                'product_code' => 'PRD0023',
                'product_description' => 'Pisang matang dibalut tepung renyah, cocok dinikmati saat hangat.',
                'stock' => 85,
                'buying_price' => 4000,
                'selling_price' => 6000,
            ],
            [
                'product_name' => 'Tahu Crispy',
                'category_id' => 3,
                'product_code' => 'PRD0024',
                'product_description' => 'Tahu digoreng garing dengan bumbu gurih yang bikin ketagihan.',
                'stock' => 90,
                'buying_price' => 6000,
                'selling_price' => 8000,
            ],
            [
                'product_name' => 'Cireng Isi',
                'category_id' => 3,
                'product_code' => 'PRD0025',
                'product_description' => 'Cireng kenyal berisi ayam suwir atau keju, disajikan dengan sambal khas.',
                'stock' => 80,
                'buying_price' => 7000,
                'selling_price' => 9000,
            ],
            [
                'product_name' => 'Sempol Ayam',
                'category_id' => 3,
                'product_code' => 'PRD0026',
                'product_description' => 'Camilan jalanan populer dari ayam cincang yang digoreng dan disajikan dengan saus.',
                'stock' => 95,
                'buying_price' => 3500,
                'selling_price' => 5000,
            ],
            [
                'product_name' => 'Martabak Mini',
                'category_id' => 3,
                'product_code' => 'PRD0027',
                'product_description' => 'Martabak manis berukuran kecil dengan topping beragam seperti cokelat, keju, dan kacang.',
                'stock' => 60,
                'buying_price' => 8000,
                'selling_price' => 10000,
            ],
            [
                'product_name' => 'Bakwan Sayur',
                'category_id' => 3,
                'product_code' => 'PRD0028',
                'product_description' => 'Gorengan sayur sederhana dengan rasa gurih yang cocok jadi teman makan atau camilan.',
                'stock' => 100,
                'buying_price' => 3000,
                'selling_price' => 4000,
            ],
            [
                'product_name' => 'Roti Bakar Mini',
                'category_id' => 3,
                'product_code' => 'PRD0029',
                'product_description' => 'Roti bakar berukuran kecil dengan isian manis seperti cokelat atau selai stroberi.',
                'stock' => 70,
                'buying_price' => 6000,
                'selling_price' => 8000,
            ],
            [
                'product_name' => 'Telur Gulung',
                'category_id' => 3,
                'product_code' => 'PRD0030',
                'product_description' => 'Camilan khas jajanan SD berupa telur yang digulung pada tusuk sate dan disajikan dengan saus.',
                'stock' => 110,
                'buying_price' => 3500,
                'selling_price' => 5000,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'product_name' => $product['product_name'],
                'category_id' => $product['category_id'],
                'product_code' => $product['product_code'],
                'product_image' => 'assets/images/product/nasi-goreng.jpg',
                'product_description' => $product['product_description'],
                'product_stock' => $product['stock'],
                'buying_price' => $product['buying_price'],
                'selling_price' => $product['selling_price']
            ]);
        }
    }
}
