<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
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
            ],
            [
                'customer_name' => 'Jane Smith',
                'table_number' => 2,
                'order_note' => 'Extra spicy',
                'order_date' => Carbon::parse('2025-04-23 10:15:00'),
                'order_status' => 'processing',
                'total_products' => 2,
                'invoice_no' => 'INV002',
                'total_amount' => 120000,
                'payment_method' => 'qris',
                'payment_status' => 'paid',
                'qris_url' => 'https://qris.example.com/123456',
                'qris_expiration' => Carbon::parse('2025-04-23 10:45:00'),
                'qris_transaction_id' => 'TRX123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_name' => 'Alice Brown',
                'table_number' => 1,
                'order_note' => null,
                'order_date' => Carbon::parse('2025-04-23 09:45:00'),
                'order_status' => 'completed',
                'total_products' => 5,
                'invoice_no' => 'INV003',
                'total_amount' => 200000,
                'payment_method' => 'kasir',
                'payment_status' => 'paid',
                'qris_url' => null,
                'qris_expiration' => null,
                'qris_transaction_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
