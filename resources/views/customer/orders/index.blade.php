@extends('customer.dashboard.body.main')

@php
    $orders_status = ['pending', 'processing', 'completed', 'cancelled'];

    $dummy_orders = [
        [
            'id' => 1,
            'customer_name' => 'John Doe',
            'table_number' => 5,
            'order_note' => 'Please make it spicy',
            'order_date' => '2025-04-28 12:00:00',
            'order_status' => 'pending',
            'total_products' => 3,
            'invoice_no' => 'INV001',
            'total_amount' => 150000,
            'payment_method' => 'kasir',
            'payment_status' => 'paid',
            'items' => [
                ['name' => 'Nasi Goreng', 'quantity' => 2, 'price' => 40000, 'image' => asset('assets/images/product/nasi-goreng.jpg')],
                ['name' => 'Es Teh Manis', 'quantity' => 1, 'price' => 10000, 'image' => asset('assets/images/product/es-teh.jpg')],
            ]
        ],
        [
            'id' => 2,
            'customer_name' => 'Jane Smith',
            'table_number' => 2,
            'order_note' => null,
            'order_date' => '2025-04-28 13:00:00',
            'order_status' => 'processing',
            'total_products' => 2,
            'invoice_no' => 'INV002',
            'total_amount' => 100000,
            'payment_method' => 'qris',
            'payment_status' => 'paid',
            'items' => [
                ['name' => 'Mie Ayam', 'quantity' => 1, 'price' => 30000, 'image' => asset('assets/images/product/mie-ayam.jpg')],
                ['name' => 'Jus Alpukat', 'quantity' => 1, 'price' => 20000, 'image' => asset('assets/images/product/jus-alpukat.jpg')],
            ]
        ],
        [
            'id' => 3,
            'customer_name' => 'Rudi Baskara',
            'table_number' => 3,
            'order_note' => null,
            'order_date' => '2025-04-29 14:00:00',
            'order_status' => 'completed',
            'total_products' => 2,
            'invoice_no' => 'INV003',
            'total_amount' => 100000,
            'payment_method' => 'qris',
            'payment_status' => 'paid',
            'items' => [
                ['name' => 'Mie Ayam', 'quantity' => 1, 'price' => 30000, 'image' => asset('assets/images/product/mie-ayam.jpg')],
                ['name' => 'Jus Alpukat', 'quantity' => 1, 'price' => 20000, 'image' => asset('assets/images/product/jus-alpukat.jpg')],
            ]
        ],
        [
            'id' => 4,
            'customer_name' => 'Haris Doen',
            'table_number' => 4,
            'order_note' => null,
            'order_date' => '2025-04-28 13:00:00',
            'order_status' => 'cancelled',
            'total_products' => 2,
            'invoice_no' => 'INV004',
            'total_amount' => 100000,
            'payment_method' => 'qris',
            'payment_status' => 'paid',
            'items' => [
                ['name' => 'Mie Ayam', 'quantity' => 1, 'price' => 30000, 'image' => asset('assets/images/product/mie-ayam.jpg')],
                ['name' => 'Jus Alpukat', 'quantity' => 1, 'price' => 20000, 'image' => asset('assets/images/product/jus-alpukat.jpg')],
            ]
        ],
    ];
@endphp

@section('container')

<div class="mx-4 pb-32" x-data="{ kategoriAktif: '', orders: {!! Js::from($dummy_orders) !!}, openOrderId: null }">
    <!-- Dropdown Status -->
    <div class="mt-4">
        <select x-model="kategoriAktif" class="border border-red-500 text-red-500 focus:ring-red-500 focus:border-red-500 rounded-xl px-4 py-2 w-full">
            <option value="">All Status</option>
            @foreach ($orders_status as $order_status)
                <option value="{{ $order_status }}">{{ ucfirst($order_status) }}</option>
            @endforeach
        </select>
    </div>

    <!-- List Orders -->
    <div class="mt-6 space-y-4">
        <template x-for="order in orders" :key="order.id">
            <div x-show="kategoriAktif === '' || order.order_status === kategoriAktif" class="border p-4 rounded-xl shadow relative">

                <!-- Status Order di kanan atas sebagai teks -->
                <div class="absolute top-4 right-2 flex items-center font-semibold">
                    <span x-bind:class="{
                        'text-gray-400': order.order_status === 'pending',
                        'text-yellow-500': order.order_status === 'processing',
                        'text-green-500': order.order_status === 'completed',
                        'text-red-500': order.order_status === 'cancelled',
                    }" x-text="order.order_status.charAt(0).toUpperCase() + order.order_status.slice(1)"></span>
                </div>

                <!-- Header Order -->
                <div class="flex items-center justify-between cursor-pointer" @click="openOrderId = openOrderId === order.id ? null : order.id">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg" x-text="order.customer_name"></h3>
                        <p class="text-gray-600">Nomor Meja : <span x-text="order.table_number"></span></p>
                        <p class="text-gray-600">Total Item : <span x-text="order.total_products"></span></p>
                        <p class="text-gray-600">Total Harga : Rp<span x-text="order.total_amount.toLocaleString('id-ID')"></span></p>                    
                    </div>
                    <div>
                        <svg :class="{ 'rotate-180': openOrderId === order.id }" class="w-5 h-5 text-red-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Expand Detail -->
                <div x-show="openOrderId === order.id" x-transition class="mt-4 text-sm text-gray-700 space-y-2">
                    <!-- List Items -->
                    <div class="mt-4">
                        <p class="font-semibold text-gray-800 mb-2">Rincian Pesanan:</p>
                        <template x-for="item in order.items" :key="item.name">
                            <div class="flex items-center border-b border-gray-200 py-3">
                                <div class="w-16 h-16 bg-gray-100 rounded-xl overflow-hidden flex-shrink-0">
                                    <img :src="item.image" class="object-cover w-full h-full" alt="Makanan">
                                </div>
                                <div class="ml-4 flex-1">
                                    <h4 class="text-md font-semibold text-gray-800" x-text="item.name"></h4>
                                    <div class="flex justify-between items-center mt-1">
                                        <span class="text-sm text-gray-600">Qty: <span x-text="item.quantity"></span></span>
                                        <span class="text-sm font-semibold text-red-500">Rp <span x-text="item.price.toLocaleString('id-ID')"></span></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <p><strong>Order Note:</strong> <span x-text="order.order_note ? order.order_note : '-'"></span></p>
                    <p><strong>Invoice No:</strong> <span x-text="order.invoice_no"></span></p>
                    <p><strong>Order Date:</strong> <span x-text="new Date(order.order_date).toLocaleString()"></span></p>
                    <p> <strong>Payment Method:</strong> <span x-text="order.payment_method.toUpperCase()"></span></p>
                </div>

            </div>
        </template>
    </div>
</div>

@endsection
