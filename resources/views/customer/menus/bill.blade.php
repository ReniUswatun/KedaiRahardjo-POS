@extends('customer.dashboard.body.main')

@section('container')
<div class="max-w-2xl mx-auto px-4 py-6">
    <h2 class="text-xl font-bold mb-4">Detail Pesanan</h2>

    <div class="mb-4">
        <p><strong>Nama:</strong> {{ $order->nama }}</p>
        <p><strong>Nomor Meja:</strong> {{ $order->nomor_meja }}</p>
        @if ($order->catatan)
            <p><strong>Catatan:</strong> {{ $order->catatan }}</p>
        @endif
    </div>

    <table class="w-full border">
        <thead>
            <tr>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Jumlah</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td class="border p-2">{{ $item->nama_produk }}</td>
                <td class="border p-2 text-center">{{ $item->jumlah }}</td>
                <td class="border p-2 text-right">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td class="border p-2 text-right">Rp{{ number_format($item->jumlah * $item->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 text-right font-bold">
        Total: Rp{{ number_format($items->sum(fn($item) => $item->jumlah * $item->harga), 0, ',', '.') }}
    </div>
</div>
@endsection