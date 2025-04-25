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
                [
                    'id' => 1,
                    'name' => 'Nasi Goreng Spesial',
                    'price' => 15000,
                    'description' => 'Nasi goreng khas dengan ayam, telur, dan sayuran segar, disajikan dengan kerupuk dan acar.',
                    'image' => 'https://source.unsplash.com/400x300/?fried-rice',
                    'variants' => ['Pedas', 'Tidak Pedas', 'Telur Mata Sapi', 'Extra Kerupuk'],
                    'reviews' => [
                        ['name' => 'Ayu', 'rating' => 5, 'comment' => 'Rasa nasi gorengnya enak banget!'],
                        ['name' => 'Budi', 'rating' => 4, 'comment' => 'Porsinya pas, sambalnya mantap.'],
                    ]
                ],
                [
                    'id' => 2,
                    'name' => 'Ayam Penyet Sambal Ijo',
                    'price' => 20000,
                    'description' => 'Ayam goreng empuk dengan sambal ijo khas, disajikan dengan nasi, tahu, dan lalapan.',
                    'image' => 'https://source.unsplash.com/400x300/?ayam-penyet',
                    'variants' => ['Paha', 'Dada', 'Sambal Ijo', 'Sambal Bawang'],
                    'reviews' => [
                        ['name' => 'Dina', 'rating' => 5, 'comment' => 'Sambalnya mantap! Ayamnya empuk.'],
                        ['name' => 'Andre', 'rating' => 4, 'comment' => 'Penyajiannya rapi dan cepat.'],
                    ]
                ],
                [
                    'id' => 3,
                    'name' => 'Sate Ayam Madura',
                    'price' => 18000,
                    'description' => 'Sate ayam dengan bumbu kacang gurih dan lontong, dibakar dengan arang asli.',
                    'image' => 'https://source.unsplash.com/400x300/?satay',
                    'variants' => ['Lontong', 'Nasi', 'Extra Sambal'],
                    'reviews' => [
                        ['name' => 'Tari', 'rating' => 4, 'comment' => 'Sate dan lontongnya enak!'],
                        ['name' => 'Dewi', 'rating' => 5, 'comment' => 'Bumbunya kaya rasa.'],
                    ]
                ],
                [
                    'id' => 4,
                    'name' => 'Soto Ayam',
                    'price' => 16000,
                    'description' => 'Soto ayam hangat dengan suwiran ayam, tauge, dan kuah kuning gurih.',
                    'image' => 'https://source.unsplash.com/400x300/?soto',
                    'variants' => ['Telur Rebus', 'Sambal', 'Kerupuk'],
                    'reviews' => [
                        ['name' => 'Rio', 'rating' => 4, 'comment' => 'Cocok buat sarapan.'],
                        ['name' => 'Siska', 'rating' => 5, 'comment' => 'Seger banget kuahnya!'],
                    ]
                ],
                [
                    'id' => 5,
                    'name' => 'Rawon Daging',
                    'price' => 25000,
                    'description' => 'Rawon daging sapi dengan kuah hitam khas dan nasi hangat.',
                    'image' => 'https://source.unsplash.com/400x300/?rawon',
                    'variants' => ['Telur Asin', 'Empal', 'Extra Daging'],
                    'reviews' => [
                        ['name' => 'Fajar', 'rating' => 5, 'comment' => 'Khas Jawa Timur banget!'],
                        ['name' => 'Yuni', 'rating' => 4, 'comment' => 'Dagingnya empuk dan gurih.'],
                    ]
                ],
                [
                    'id' => 6,
                    'name' => 'Bakso Urat',
                    'price' => 14000,
                    'description' => 'Bakso urat daging sapi kenyal dengan kuah kaldu gurih.',
                    'image' => 'https://source.unsplash.com/400x300/?meatballs',
                    'variants' => ['Bakso Biasa', 'Bakso Telur', 'Extra Mie'],
                    'reviews' => [
                        ['name' => 'Galih', 'rating' => 5, 'comment' => 'Basonya gede dan kenyangin!'],
                        ['name' => 'Citra', 'rating' => 4, 'comment' => 'Kuahnya gurih banget.'],
                    ]
                ],
                [
                    'id' => 7,
                    'name' => 'Mie Ayam Bakso',
                    'price' => 15000,
                    'description' => 'Mie ayam dengan topping bakso, pangsit, dan sawi rebus.',
                    'image' => 'https://source.unsplash.com/400x300/?noodles',
                    'variants' => ['Pedas', 'Pangsit Rebus', 'Pangsit Goreng'],
                    'reviews' => [
                        ['name' => 'Rani', 'rating' => 4, 'comment' => 'Komplit dan enak banget.'],
                        ['name' => 'Wawan', 'rating' => 5, 'comment' => 'Best mie ayam in town.'],
                    ]
                ],
                [
                    'id' => 8,
                    'name' => 'Rendang Padang',
                    'price' => 27000,
                    'description' => 'Rendang daging sapi dengan bumbu rempah kental, khas Padang.',
                    'image' => 'https://source.unsplash.com/400x300/?rendang',
                    'variants' => ['Nasi Putih', 'Sambal Ijo', 'Paru'],
                    'reviews' => [
                        ['name' => 'Nana', 'rating' => 5, 'comment' => 'Authentic banget rendangnya.'],
                        ['name' => 'Oka', 'rating' => 4, 'comment' => 'Dagingnya juicy dan empuk.'],
                    ]
                ],
                [
                    'id' => 9,
                    'name' => 'Tahu Tek Surabaya',
                    'price' => 12000,
                    'description' => 'Tahu goreng, lontong, tauge, dan telur dengan bumbu petis khas.',
                    'image' => 'https://source.unsplash.com/400x300/?tahu',
                    'variants' => ['Pedas', 'Tanpa Telur', 'Kerupuk'],
                    'reviews' => [
                        ['name' => 'Joko', 'rating' => 4, 'comment' => 'Petisnya nendang banget!'],
                        ['name' => 'Lilis', 'rating' => 4, 'comment' => 'Unik dan enak.'],
                    ]
                ],
                [
                    'id' => 10,
                    'name' => 'Pecel Lele',
                    'price' => 17000,
                    'description' => 'Lele goreng renyah dengan sambal tomat dan nasi.',
                    'image' => 'https://source.unsplash.com/400x300/?catfish',
                    'variants' => ['Paha Ayam', 'Lele', 'Tahu Tempe'],
                    'reviews' => [
                        ['name' => 'Rizki', 'rating' => 5, 'comment' => 'Sambalnya nampol!'],
                        ['name' => 'Putra', 'rating' => 4, 'comment' => 'Gurih dan puas banget.'],
                    ]
                ],
            ],

            'minuman' => [
                [
                    'id' => 11,
                    'name' => 'Es Teh Manis',
                    'price' => 5000,
                    'description' => 'Minuman klasik segar yang cocok diminum kapan saja, disajikan dingin dengan es batu.',
                    'image' => 'https://source.unsplash.com/400x300/?iced-tea',
                    'variants' => ['Manis', 'Tawar', 'Tanpa Es'],
                    'reviews' => [
                        ['name' => 'Aldi', 'rating' => 4, 'comment' => 'Segar banget, manisnya pas!'],
                        ['name' => 'Rara', 'rating' => 5, 'comment' => 'Minuman favorit setiap makan.'],
                    ]
                ],
                [
                    'id' => 12,
                    'name' => 'Jus Jeruk Segar',
                    'price' => 10000,
                    'description' => 'Dibuat dari jeruk peras asli, tanpa tambahan gula buatan.',
                    'image' => 'https://source.unsplash.com/400x300/?orange-juice',
                    'variants' => ['Dengan Es', 'Tanpa Es', 'Extra Jeruk'],
                    'reviews' => [
                        ['name' => 'Nia', 'rating' => 5, 'comment' => 'Sehat dan menyegarkan!'],
                        ['name' => 'Yoga', 'rating' => 4, 'comment' => 'Jeruknya fresh banget.'],
                    ]
                ],
                [
                    'id' => 13,
                    'name' => 'Es Cincau',
                    'price' => 7000,
                    'description' => 'Minuman khas dengan cincau hitam dan gula merah cair, sangat menyegarkan.',
                    'image' => 'https://source.unsplash.com/400x300/?cincau',
                    'variants' => ['Susu', 'Gula Merah', 'Tanpa Gula'],
                    'reviews' => [
                        ['name' => 'Putri', 'rating' => 5, 'comment' => 'Cincaunya lembut dan segar!'],
                        ['name' => 'Rian', 'rating' => 4, 'comment' => 'Pas untuk cuaca panas.'],
                    ]
                ],
                [
                    'id' => 14,
                    'name' => 'Kopi Tubruk',
                    'price' => 8000,
                    'description' => 'Kopi hitam pekat khas Indonesia yang disajikan panas tanpa ampas disaring.',
                    'image' => 'https://source.unsplash.com/400x300/?coffee',
                    'variants' => ['Manis', 'Tawar', 'Extra Pekat'],
                    'reviews' => [
                        ['name' => 'Dodi', 'rating' => 4, 'comment' => 'Bangkitin semangat banget.'],
                        ['name' => 'Selvi', 'rating' => 5, 'comment' => 'Aroma kopinya mantap.'],
                    ]
                ],
                [
                    'id' => 15,
                    'name' => 'Es Kelapa Muda',
                    'price' => 12000,
                    'description' => 'Daging kelapa segar dengan air kelapa alami dan es batu.',
                    'image' => 'https://source.unsplash.com/400x300/?coconut-drink',
                    'variants' => ['Gula', 'Jeruk Nipis', 'Murni'],
                    'reviews' => [
                        ['name' => 'Intan', 'rating' => 5, 'comment' => 'Rasanya asli banget kelapanya.'],
                        ['name' => 'Arif', 'rating' => 5, 'comment' => 'Seger pol, cocok pas panas.'],
                    ]
                ],
                [
                    'id' => 16,
                    'name' => 'Susu Cokelat Dingin',
                    'price' => 9000,
                    'description' => 'Minuman susu segar dengan rasa cokelat manis yang disukai semua umur.',
                    'image' => 'https://source.unsplash.com/400x300/?chocolate-milk',
                    'variants' => ['Dingin', 'Panas', 'Extra Cokelat'],
                    'reviews' => [
                        ['name' => 'Zaki', 'rating' => 5, 'comment' => 'Anak-anak pasti suka.'],
                        ['name' => 'Mira', 'rating' => 4, 'comment' => 'Manisnya pas.'],
                    ]
                ],
                [
                    'id' => 17,
                    'name' => 'Wedang Jahe',
                    'price' => 7000,
                    'description' => 'Minuman hangat berbahan dasar jahe segar, cocok diminum malam hari.',
                    'image' => 'https://source.unsplash.com/400x300/?ginger-tea',
                    'variants' => ['Tanpa Gula', 'Gula Aren', 'Jahe Merah'],
                    'reviews' => [
                        ['name' => 'Winda', 'rating' => 5, 'comment' => 'Bikin badan hangat dan rileks.'],
                        ['name' => 'Reza', 'rating' => 4, 'comment' => 'Cocok buat cuaca dingin.'],
                    ]
                ],
                [
                    'id' => 18,
                    'name' => 'Teh Tarik',
                    'price' => 10000,
                    'description' => 'Teh kental dengan susu, dikocok sampai berbuih, khas Malaysia.',
                    'image' => 'https://source.unsplash.com/400x300/?teh-tarik',
                    'variants' => ['Dingin', 'Panas', 'Less Sugar'],
                    'reviews' => [
                        ['name' => 'Fani', 'rating' => 5, 'comment' => 'Buihnya creamy banget.'],
                        ['name' => 'Gilang', 'rating' => 4, 'comment' => 'Manis dan gurih.'],
                    ]
                ],
                [
                    'id' => 19,
                    'name' => 'Jus Alpukat',
                    'price' => 11000,
                    'description' => 'Jus alpukat kental dengan topping cokelat leleh.',
                    'image' => 'https://source.unsplash.com/400x300/?avocado-juice',
                    'variants' => ['Cokelat', 'Tanpa Gula', 'Susu Kental Manis'],
                    'reviews' => [
                        ['name' => 'Maya', 'rating' => 5, 'comment' => 'Creamy banget, suka!'],
                        ['name' => 'Jefri', 'rating' => 4, 'comment' => 'Rasanya pas, nggak pahit.'],
                    ]
                ],
                [
                    'id' => 20,
                    'name' => 'Air Mineral Botol',
                    'price' => 3000,
                    'description' => 'Air mineral segar dalam botol, pilihan tepat untuk melepas dahaga.',
                    'image' => 'https://source.unsplash.com/400x300/?mineral-water',
                    'variants' => ['Dingin', 'Suhu Ruangan'],
                    'reviews' => [
                        ['name' => 'Tono', 'rating' => 5, 'comment' => 'Simple tapi perlu.'],
                        ['name' => 'Mega', 'rating' => 5, 'comment' => 'Selalu ada di meja.'],
                    ]
                ],
            ],
            'camilan' => [
                [
                    'id' => 21,
                    'name' => 'Keripik Singkong',
                    'price' => 7000,
                    'description' => 'Keripik singkong renyah dengan rasa gurih dan sedikit asin, cocok buat camilan sore.',
                    'image' => 'https://source.unsplash.com/400x300/?cassava-chips',
                    'variants' => ['Original', 'Balado', 'Keju'],
                    'reviews' => [
                        ['name' => 'Rani', 'rating' => 5, 'comment' => 'Renyah dan nagih banget.'],
                        ['name' => 'Budi', 'rating' => 4, 'comment' => 'Favorit buat nonton.'],
                    ]
                ],
                [
                    'id' => 22,
                    'name' => 'Kue Cubit',
                    'price' => 8000,
                    'description' => 'Kue mungil yang lembut dan manis, tersedia dalam berbagai rasa menarik.',
                    'image' => 'https://source.unsplash.com/400x300/?kue-cubit',
                    'variants' => ['Cokelat', 'Keju', 'Green Tea'],
                    'reviews' => [
                        ['name' => 'Dina', 'rating' => 5, 'comment' => 'Manisnya pas, empuk banget.'],
                        ['name' => 'Yoga', 'rating' => 4, 'comment' => 'Rasa green tea-nya unik.'],
                    ]
                ],
                [
                    'id' => 23,
                    'name' => 'Pisang Goreng',
                    'price' => 6000,
                    'description' => 'Pisang matang dibalut tepung renyah, cocok dinikmati saat hangat.',
                    'image' => 'https://source.unsplash.com/400x300/?banana-fritters',
                    'variants' => ['Cokelat', 'Keju', 'Original'],
                    'reviews' => [
                        ['name' => 'Rosa', 'rating' => 5, 'comment' => 'Enak dimakan pas masih panas.'],
                        ['name' => 'Ali', 'rating' => 5, 'comment' => 'Cocok buat teman ngopi.'],
                    ]
                ],
                [
                    'id' => 24,
                    'name' => 'Tahu Crispy',
                    'price' => 8000,
                    'description' => 'Tahu digoreng garing dengan bumbu gurih yang bikin ketagihan.',
                    'image' => 'https://source.unsplash.com/400x300/?fried-tofu',
                    'variants' => ['Pedas', 'Original', 'Keju'],
                    'reviews' => [
                        ['name' => 'Rio', 'rating' => 4, 'comment' => 'Tahu garing dan gurih.'],
                        ['name' => 'Yuli', 'rating' => 5, 'comment' => 'Cocok buat ngemil rame-rame.'],
                    ]
                ],
                [
                    'id' => 25,
                    'name' => 'Cireng Isi',
                    'price' => 9000,
                    'description' => 'Cireng kenyal berisi ayam suwir atau keju, disajikan dengan sambal khas.',
                    'image' => 'https://source.unsplash.com/400x300/?cireng',
                    'variants' => ['Ayam', 'Keju', 'Pedas'],
                    'reviews' => [
                        ['name' => 'Gina', 'rating' => 5, 'comment' => 'Isi ayamnya banyak!'],
                        ['name' => 'Adit', 'rating' => 4, 'comment' => 'Pedesnya nampol!'],
                    ]
                ],
                [
                    'id' => 26,
                    'name' => 'Sempol Ayam',
                    'price' => 5000,
                    'description' => 'Camilan jalanan populer dari ayam cincang yang digoreng dan disajikan dengan saus.',
                    'image' => 'https://source.unsplash.com/400x300/?sempol',
                    'variants' => ['Biasa', 'Keju', 'Super Pedas'],
                    'reviews' => [
                        ['name' => 'Intan', 'rating' => 4, 'comment' => 'Murah dan enak.'],
                        ['name' => 'Taufik', 'rating' => 5, 'comment' => 'Bikin nostalgia jajan SD.'],
                    ]
                ],
                [
                    'id' => 27,
                    'name' => 'Martabak Mini',
                    'price' => 10000,
                    'description' => 'Martabak manis berukuran kecil dengan topping beragam seperti cokelat, keju, dan kacang.',
                    'image' => 'https://source.unsplash.com/400x300/?mini-martabak',
                    'variants' => ['Cokelat Keju', 'Kacang', 'Green Tea'],
                    'reviews' => [
                        ['name' => 'Erna', 'rating' => 5, 'comment' => 'Mini tapi toppingnya banyak.'],
                        ['name' => 'Fajar', 'rating' => 4, 'comment' => 'Pas buat cemilan malam.'],
                    ]
                ],
                [
                    'id' => 28,
                    'name' => 'Bakwan Sayur',
                    'price' => 4000,
                    'description' => 'Gorengan sayur sederhana dengan rasa gurih yang cocok jadi teman makan atau camilan.',
                    'image' => 'https://source.unsplash.com/400x300/?vegetable-fritter',
                    'variants' => ['Biasa', 'Pedas', 'Krispi'],
                    'reviews' => [
                        ['name' => 'Dede', 'rating' => 4, 'comment' => 'Klasik dan gurih.'],
                        ['name' => 'Uli', 'rating' => 5, 'comment' => 'Enak banget pakai cabai rawit.'],
                    ]
                ],
                [
                    'id' => 29,
                    'name' => 'Roti Bakar Mini',
                    'price' => 8000,
                    'description' => 'Roti bakar berukuran kecil dengan isian manis seperti cokelat atau selai stroberi.',
                    'image' => 'https://source.unsplash.com/400x300/?toast',
                    'variants' => ['Cokelat', 'Strawberry', 'Kacang'],
                    'reviews' => [
                        ['name' => 'Nando', 'rating' => 5, 'comment' => 'Cocok buat malam santai.'],
                        ['name' => 'Siska', 'rating' => 4, 'comment' => 'Ukuran mini, rasanya maksimal.'],
                    ]
                ],
                [
                    'id' => 30,
                    'name' => 'Telur Gulung',
                    'price' => 5000,
                    'description' => 'Camilan khas jajanan SD berupa telur yang digulung pada tusuk sate dan disajikan dengan saus.',
                    'image' => 'https://source.unsplash.com/400x300/?egg-roll',
                    'variants' => ['Original', 'Sosis', 'Pedas'],
                    'reviews' => [
                        ['name' => 'Rika', 'rating' => 5, 'comment' => 'Rasa nostalgia banget.'],
                        ['name' => 'Donny', 'rating' => 4, 'comment' => 'Enak dimakan kapan aja.'],
                    ]
                ],
            ],

        ];


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
