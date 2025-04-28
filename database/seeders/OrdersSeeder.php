<?php

// database/seeders/OrdersSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        // Insert data pesanan
        $orderIds = DB::table('orders')->insertGetId([
            'customer_name' => 'John Doe',
            'table_number' => 5,
            'order_note' => null,
            'order_date' => Carbon::parse('2025-04-23 10:00:00'),
            'order_status' => 'pending',
            'total_products' => 3,
            'invoice_no' => 'INV001',
            'total_amount' => 150000,
            'payment_method' => 'kasir',
            'payment_status' => 'unpaid',
            'qris_url' => null,
            'qris_expiration' => null,
            'qris_transaction_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert OrderDetails untuk pesanan tersebut
        DB::table('order_details')->insert([
            ['order_id' => $orderIds, 'product_id' => 1, 'quantity' => 2, 'unitcost' => 50000, 'total' => 100000],
            ['order_id' => $orderIds, 'product_id' => 2, 'quantity' => 1, 'unitcost' => 50000, 'total' => 50000],
        ]);
    }
}
