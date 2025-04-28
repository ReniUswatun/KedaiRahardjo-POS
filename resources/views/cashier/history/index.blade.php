@extends('cashier.orders.body.main')

@section('container')
<main class="p-4 pb-32 min-h-screen">

    <!-- Header Info (dalam card) -->
    <div class="bg-white p-4 mb-2">
        <div class="space-y-3 text-gray-700">
            <div class="flex justify-between">
                <span class="text-lg font-bold">Tanggal Hari Ini</span>
                <span class="text-lg font-bold">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-lg font-bold">Total Pesanan</span>
                <span class="text-lg font-bold">{{ $totalOrders }} Pesanan</span>
            </div>
            <div class="flex justify-between">
                <span class="text-lg font-bold text-green-600">Total Pendapatan</span>
                <span class="text-lg font-bold text-green-600">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>

    <!-- Riwayat Pesanan -->
    <section class="space-y-4">
        @forelse ($histories as $order)
            <div class="order-card bg-white shadow-md rounded-2xl p-4 border border-gray-200 hover:shadow-lg hover:border-red-400 transition-all duration-300">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-lg font-bold text-gray-800">
                        {{ $order->invoice_no ?? 'INV-' . strtoupper(substr(md5($order->id), 0, 8)) }}
                    </span>
                    <span class="text-xs text-gray-500">{{ $order->updated_at->format('d M Y, H:i') }}</span>
                </div>
                <div class="text-sm text-gray-600 mb-2">
                    <span class="font-semibold">Customer:</span> {{ $order->customer_name ?? '-' }}
                </div>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-sm text-gray-500">{{ $order->orderDetails->count() }} Items</span>
                    <span class="text-lg font-extrabold text-red-500">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 mt-10">
                Belum ada riwayat pesanan.
            </div>
        @endforelse
    </section>

</main>
@endsection
