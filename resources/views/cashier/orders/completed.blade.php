@extends('cashier.orders.body.main')

@section('container')
<div class="p-4 pb-32 min-h-screen">
    <div class="mb-6">
        <div class="grid grid-cols-3 gap-2 w-full">
            <button class="w-full px-4 py-2 rounded-md font-semibold text-red-500 bg-white border border-red-500 hover:bg-red-500 hover:text-white transition">Pending</button>
            <button class="w-full px-4 py-2 rounded-md font-semibold text-red-500 bg-white border border-red-500 hover:bg-red-500 hover:text-white transition">Processing</button>
            <button class="w-full px-4 py-2 rounded-md font-semibold text-white bg-red-500 hover:bg-red-600 transition">Completed</button>
        </div>
    </div>

    <!-- Tabel Orders -->
    <div class="bg-white rounded-xl shadow-md overflow-x-auto border border-gray-200">
        <table class="min-w-full text-sm text-left border-t border-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">Order ID</th>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Waktu Pesan</th>
                    <th class="px-4 py-3">Waktu Selesai</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($orders as $order)
                    @if ($order['status'] === 'completed')
                        <tr class="border-t">
                            <td class="px-4 py-2">#ORD2345</td>
                            <td class="px-4 py-2">Rudi</td>
                            <td class="px-4 py-2">10:02 AM</td>
                            <td class="px-4 py-2">10:15 AM</td>
                            <td class="px-4 py-2">Rp25.000</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('cashier.orders.invoice', $order['order_id']) }}"
                                class="inline-flex items-center justify-center gap-1 px-3 py-1.5 border border-gray-400 text-gray-700 rounded-md text-xs hover:bg-gray-700 hover:text-white transition">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
