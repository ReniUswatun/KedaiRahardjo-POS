@extends('cashier.orders.body.main')

@section('container')
<div class="p-4 pb-32 min-h-screen">
    <div class="mb-6">
        <div class="grid grid-cols-3 gap-2 w-full">
            <a href="{{ route('cashier.orders.index') }}" class="w-full px-4 py-2 rounded-md font-semibold text-center  
                {{ request()->routeIs('cashier.orders.index') ? 'text-white bg-red-500' : 'text-red-500 bg-white border border-red-500 hover:bg-red-500 hover:text-white' }} transition">
                Pending
            </a>
            <a href="{{ route('cashier.orders.processing') }}" class="w-full px-4 py-2 rounded-md font-semibold text-center 
                {{ request()->routeIs('cashier.orders.processing') ? 'text-white bg-red-500' : 'text-red-500 bg-white border border-red-500 hover:bg-red-500 hover:text-white' }} transition">
                Processing
            </a>
            <a href="{{ route('cashier.orders.completed') }}" class="w-full px-4 py-2 rounded-md font-semibold text-center 
                {{ request()->routeIs('cashier.orders.completed') ? 'text-white bg-red-500' : 'text-red-500 bg-white border border-red-500 hover:bg-red-500 hover:text-white' }} transition">
                Completed
            </a>
        </div>
    </div>

    <!-- Tabel Orders -->
    <div class="bg-white rounded-xl shadow-md overflow-x-auto border border-gray-200">
        <table class="min-w-full text-sm text-left border-t border-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">Order ID</th>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Table No</th>
                    <th class="px-4 py-3">Order Time</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($orders as $order)
                    <tr class="border-t">
                    <td class="px-4 py-2">#{{ $order['order_id'] }}</td>
                    <td class="px-4 py-2">{{ $order['customer'] }}</td>
                    <td class="px-4 py-2">-</td> <!-- Karena table_number tidak ada di array -->
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($order['waktu_pesan'])->format('H:i') }}</td>
                    <td class="px-4 py-2">Rp{{ number_format($order['total'], 0, ',', '.') }}</td>
                    <td class="px-4 py-2 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('cashier.orders.invoice', $order['order_id']) }}"
                            class="inline-flex items-center justify-center gap-1 px-3 py-1.5 border border-green-600 text-green-600 rounded text-xs hover:bg-green-600 hover:text-white transition">
                            Konfirmasi & Cetak Struk
                            </a>
                            <form action="{{ route('cashier.orders.delete', $order['order_id']) }}" method="POST" onsubmit="return confirm('Yakin mau hapus order ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center justify-center gap-1 px-3 py-1.5 border border-red-600 text-red-600 rounded text-xs hover:bg-red-600 hover:text-white transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
