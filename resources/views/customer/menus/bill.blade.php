@extends('customer.dashboard.body.main')

@section('container')
<div class="max-w-xl mx-auto px-4 py-6">
  <h2 class="text-xl font-bold mb-4">Rincian Pesanan</h2>

  <div class="mb-3">
    <p><strong>Nama:</strong> {{ $nama }}</p>
    <p><strong>Nomor Meja:</strong> {{ $nomor_meja }}</p>
    @if ($catatan)
      <p><strong>Catatan:</strong> {{ $catatan }}</p>
    @endif
  </div>

  <div class="border rounded-lg p-4 shadow">
    @php $total = 0; @endphp
    @foreach ($items as $item)
      <div class="flex justify-between mb-2">
        <div>
          <p class="font-semibold">{{ $item['name'] }}</p>
          <p class="text-sm text-gray-500">x{{ $item['quantity'] }}</p>
        </div>
        @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
        <p class="font-bold text-red-600">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
      </div>
    @endforeach

    <div class="border-t pt-3 mt-3 flex justify-between font-bold text-lg">
      <p>Total</p>
      <p class="text-red-600">Rp {{ number_format($total, 0, ',', '.') }}</p>
    </div>
  </div>
</div>
@endsection