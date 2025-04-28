@extends('customer.dashboard.body.main')


@section('container')

<div class="mx-4 pb-32" x-data="{ kategoriAktif: '', orders: {!! Js::from($orders) !!}, openOrderId: null }">
    <!-- Dropdown Status -->
    <div class="mt-4">
        <select x-model="kategoriAktif" class="border border-red-500 text-red-500 focus:ring-red-500 focus:border-red-500 rounded-xl px-4 py-2 w-full">
            <option value="">All Status</option>
            @foreach ($orders_status as $order_status)
                <option value="{{ $order_status }}">{{ ucfirst($order_status) }}</option>
            @endforeach
        </select>
    </div>

    {{-- Kalo Order belum ada --}}
    @if($orders->isEmpty())
        <div class="flex items-center justify-center mt-2">
            <div class="flex justify-center items-center p-6 text-lg text-gray-500">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 mr-1 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 10-18 0 9 9 0 0018 0z" />
                    </svg>
                </div>
                <div class="flex-1 text-center">
                    <span><strong>Kamu belum melakukan order</strong></span>
                </div>
            </div>
        </div>
    @endif


    <!-- List Orders -->
    <div class="mt-6 space-y-4">
        <template x-for="order in orders" :key="order.id">
            <div x-show="kategoriAktif === '' || order.order_status === kategoriAktif" class="border px-4 pb-3 pt-3 rounded-xl shadow relative">

                <!-- Status Order di kanan atas sebagai teks -->
                <div class="absolute top-4 right-2 flex items-center font-semibold">
                    <span 
                        x-bind:class="{
                            'bg-gray-200 text-gray-600 border border-gray-300 shadow-sm font-semibold': order.order_status === 'pending',
                            'bg-yellow-100 text-yellow-700 border border-yellow-200 shadow-sm font-semibold': order.order_status === 'processing',
                            'bg-green-100 text-green-700 border border-green-200 shadow-sm font-semibold': order.order_status === 'completed',
                            'bg-red-100 text-red-700 border border-red-200 shadow-sm font-semibold': order.order_status === 'cancelled',
                        }"
                        class="px-8 py-1 mr-2 rounded-full text-sm"
                        x-text="order.order_status.charAt(0).toUpperCase() + order.order_status.slice(1)">
                    </span>
                </div>


                <!-- Header Order -->
                <div class="flex items-center justify-between cursor-pointer" @click="openOrderId = openOrderId === order.id ? null : order.id">
                    <div class="flex-1 space-y-1">
                        <h3 class="mr-8 pb-2 font-bold text-lg text-gray-800 flex items-center justify-center border-b-2" x-text="order.customer_name"></h3>

                        
                        <div class="text-sm text-gray-600 flex items-center gap-1 pt-2">
                            <span class="font-medium">Nomor Meja:</span>
                            <span x-text="order.table_number"></span>
                        </div>

                        <div class="text-sm text-gray-600 flex items-center gap-1">
                            <span class="font-medium">Total Item:</span>
                            <span x-text="order.total_products"></span>
                        </div>

                        <div class="text-sm text-gray-600 flex items-center gap-1">
                            <span class="font-medium">Total Harga:</span>
                            <span>Rp</span><span x-text="order.total_amount.toLocaleString('id-ID')"></span>
                        </div>
                    </div>

                    <div class="flex items-end justify-center w-28 h-24 rounded-full">
                        <svg :class="{ 'rotate-180': openOrderId === order.id }" 
                            class="w-5 h-5 text-red-500 transition-transform duration-200" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Expand Detail -->
                <div x-show="openOrderId === order.id" x-transition class="mt-4 text-sm text-gray-700 space-y-2">
                    <!-- List Items -->
                    <div class="mt-4">
                        <p class="border-t-2 pt-2 font-bold text-gray-800">Rincian Pesanan:</p>
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
