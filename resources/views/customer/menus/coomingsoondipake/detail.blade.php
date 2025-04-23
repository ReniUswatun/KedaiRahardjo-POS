@extends('customer.menus.body.main')

@section('container')
<div x-data="orderDetail()" class="relative min-h-screen bg-white px-4 pt-16 pb-24">

  <!-- Header -->
  <nav class="fixed top-0 left-0 right-0 max-w-xl mx-auto bg-white shadow z-50 flex items-center p-3">
    <button onclick="window.history.back()">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>
    <h1 class="text-lg font-semibold mx-auto">Detail Pesanan</h1>
  </nav>

  <!-- Detail Box -->
  <div class="bg-white rounded-xl shadow-md p-4 space-y-3 border" x-show="items.length">
    <div class="text-sm">
      <p class="font-bold">Detail</p>
      <div class="flex justify-between mt-2">
        <span class="text-gray-500">Nama</span>
        <span class="font-semibold">Jackson Maine</span>
      </div>
      <div class="flex justify-between">
        <span class="text-gray-500">Nomor Meja</span>
        <span class="font-semibold">15</span>
      </div>
      <div class="flex justify-between">
        <span class="text-gray-500">Nomor Pesanan</span>
        <span class="font-semibold">#2343543</span>
      </div>
    </div>

    <hr class="my-2">

    <!-- List Pesanan -->
    <template x-for="item in items" :key="item.id">
      <div class="flex justify-between text-sm">
        <span x-text="item.nama"></span>
        <span>x<span x-text="item.qty"></span></span>
        <span x-text="`Rp ${formatRupiah(item.harga * item.qty)}`"></span>
      </div>
    </template>

    <hr class="my-2">

    <div class="flex justify-between text-sm font-semibold">
      <span>TOTAL</span>
      <span class="text-red-500" x-text="`Rp ${formatRupiah(totalHarga())}`"></span>
    </div>
  </div>

  <!-- Buttons -->
  <div class="fixed bottom-0 left-0 right-0 max-w-xl mx-auto bg-white px-4 py-3 shadow-inner flex justify-between gap-3">
    <button @click="window.history.back()" class="w-1/2 border border-red-500 text-red-500 font-semibold py-2 rounded-lg">Batal</button>
    <a href="/pembayaran" class="w-1/2 bg-red-500 text-white font-semibold py-2 rounded-lg text-center">Bayar</a>
  </div>
</div>

<!-- SCRIPT -->
<script>
  function orderDetail() {
    const menu = [
      { id: 1, nama: 'Paket 1', harga: 20000 },
      { id: 2, nama: 'Paket 2', harga: 35000 },
      { id: 3, nama: 'Paket 3', harga: 21000 },
    ];

    const cart = {
      1: 1,
      2: 1,
      3: 1
    };

    return {
      items: menu.filter(item => cart[item.id]).map(item => ({
        ...item,
        qty: cart[item.id]
      })),
      totalHarga() {
        return this.items.reduce((total, item) => total + item.harga * item.qty, 0);
      },
      formatRupiah(value) {
        return value.toLocaleString('id-ID');
      }
    }
  }
</script>
@endsection