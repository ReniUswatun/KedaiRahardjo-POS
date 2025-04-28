@extends('cashier.orders.body.main')

@section('container')
<div class="p-4 pb-32 min-h-screen bg-white">
    <div class="max-w-md mx-auto border rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-bold mb-4 text-center">INVOICE</h2>

        <div class="mb-4 text-sm">
            <p><strong>Invoice No:</strong> {{ $order->invoice_no }}</p>
            <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
            <p><strong>Meja:</strong> {{ $order->table_number }}</p>
            <p><strong>Waktu Pesan:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
        </div>

        <div class="mb-4">
            <h3 class="font-bold mb-2">Detail Pesanan:</h3>
            <ul class="space-y-2">
                @foreach ($order->orderDetails as $detail)
                    <li class="flex justify-between border-b pb-1">
                        <span>{{ $detail->product->product_name }} (x{{ $detail->quantity }})</span>
                        <span>Rp{{ number_format($detail->total, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex justify-between font-bold text-lg pt-2">
            <span>Total</span>
            <span>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
        </div>

        <div class="text-center mt-6">
            <button onclick="window.print()" 
                class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded transition">
                Cetak Struk
            </button>
        </div>
    </div>
</div>
@endsection
