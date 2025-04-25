@extends('cashier.orders.body.main')

@section('container')
<div class="p-4 pb-32 min-h-screen bg-white">
    <div class="max-w-md mx-auto border rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold mb-4 text-center">INVOICE</h2>

        <div class="mb-4">
            <p><strong>Order ID:</strong> #ORD{{ $order['order_id'] }}</p>
            <p><strong>Customer:</strong> {{ $order['customer'] }}</p>
            <p><strong>Waktu Pesan:</strong> {{ $order['waktu_pesan'] }}</p>
            <p><strong>Total:</strong> Rp{{ number_format($order['total'], 0, ',', '.') }}</p>
        </div>

        <div class="text-center">
            <button onclick="window.print()"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">
                Cetak Struk
            </button>
        </div>
    </div>
</div>
@endsection
