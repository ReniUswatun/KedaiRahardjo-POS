@extends('cashier.orders.body.main')

@section('container')
<div class="p-4 pb-32 min-h-screen">
    <!-- Tabel Orders -->
    <div class="bg-white rounded-xl shadow-md overflow-x-auto border border-gray-200">
        <table class="min-w-full text-sm text-left border-t border-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">Order ID</th>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Waktu Pesan</th>
                    <th class="px-4 py-3">Waktu Pesan</th>
                    <th class="px-4 py-3">Total</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr class="border-t">
                    <td class="px-4 py-2">#ORD2345</td>
                    <td class="px-4 py-2">Rudi</td>
                    <td class="px-4 py-2">10:02 AM</td>
                    <td class="px-4 py-2">10:02 AM</td>
                    <td class="px-4 py-2">Rp25.000</td>
                </tr>
                <tr class="border-t">
                    <td class="px-4 py-2">#ORD2346</td>
                    <td class="px-4 py-2">Tini</td>
                    <td class="px-4 py-2">10:05 AM</td>
                    <td class="px-4 py-2">10:02 AM</td>
                    <td class="px-4 py-2">Rp40.000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
