@extends('customer.dashboard.body.main')

@php
    $orders_status = ['pending', 'processing', 'completed', 'cancelled'];

    $dummy_orders = [
        ['id' => 1, 'name' => 'Order #1', 'status' => 'pending'],
        ['id' => 2, 'name' => 'Order #2', 'status' => 'processing'],
        ['id' => 3, 'name' => 'Order #3', 'status' => 'completed'],
        ['id' => 4, 'name' => 'Order #4', 'status' => 'cancelled'],
        ['id' => 5, 'name' => 'Order #5', 'status' => 'pending'],
    ];
@endphp

@section('container')
<div class="mx-4 pb-32" x-data="{ kategoriAktif: '', orders: @json($dummy_orders) }">
    <!-- Dropdown Kategori -->
    <div class="mt-4">
        <select x-model="kategoriAktif" class="border border-red-500 text-red-500 focus:ring-red-500 focus:border-red-500 rounded-xl px-4 py-2 w-full">

            <option value="">All Status</option>
            @foreach ($orders_status as $order_status)
                <option value="{{ $order_status }}">{{ ucfirst($order_status) }}</option>
            @endforeach
        </select>
    </div>

    <!-- List Order -->
    <div class="mt-6">
        <template x-for="order in orders" :key="order.id">
            <div x-show="kategoriAktif === '' || order.status === kategoriAktif" class="border p-4 rounded-xl shadow">
                <h3 class="font-semibold" x-text="order.name"></h3>
                <p class="text-gray-600" x-text="order.status.charAt(0).toUpperCase() + order.status.slice(1)"></p>
            </div>
        </template>
    </div>
</div>
@endsection
