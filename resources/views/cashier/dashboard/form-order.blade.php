@extends('cashier.dashboard.body.main')

@section('container')
<div class="mx-4 pb-32">

  <h2 class="text-2xl font-bold mb-4">Detail Pemesanan</h2>

  <form action="{{ route('data.store') }}" method="POST">
    @csrf
    <!-- Data Pembeli -->
    <div class="mb-4">
      <label class="block font-semibold mb-1">Nama</label>
      <input type="text" name="nama" class="w-full border px-4 py-2 rounded-lg" required>
    </div>

    <div class="mb-4">
      <label class="block font-semibold mb-1">Nomor Meja</label>
      <input type="number" name="nomor_meja" class="w-full border px-4 py-2 rounded-lg" min="1" required>
    </div>

    <div class="mb-4">
      <label class="block font-semibold mb-1">Catatan</label>
      <textarea name="catatan" rows="3" class="w-full border px-4 py-2 rounded-lg" placeholder="Opsional"></textarea>
    </div>

    <!-- Data Pesanan -->
    <input type="hidden" name="keranjang" value='@json($keranjang)'>

    <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-xl font-semibold hover:bg-red-600 transition">
      Konfirmasi
    </button>
  </form>
</div>
@endsection