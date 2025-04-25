@extends('customer.dashboard.body.main')

@section('container')
<div>
    <h1 class="text-2xl font-bold mb-4">Daftar Keranjang Pesanan</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">No</th>
                    <th class="py-3 px-6 text-left">Nama Produk</th>
                    <th class="py-3 px-6 text-left">Jumlah</th>
                    <th class="py-3 px-6 text-left">Total Harga</th>
                    <th class="py-3 px-6 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                {{-- @foreach($orders as $order)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                    <td class="py-3 px-6">{{ $order->product_name }}</td>
                    <td class="py-3 px-6">{{ $order->quantity }}</td>
                    <td class="py-3 px-6">{{ number_format($order->total_price, 2) }}</td>
                    <td class="py-3 px-6">{{ $order->status }}</td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection