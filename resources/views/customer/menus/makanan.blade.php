@extends('customer.menus.body.main')

@section('container')
<div x-data="menuData()" class="relative">
  <div class="fixed top-0 left-0 right-0 max-w-xl mx-auto bg-white shadow z-50">
    <!-- Header -->
    <nav class="flex items-center justify-center relative p-3">
      <button onclick="window.history.back()" class="absolute left-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <h1 class="text-lg font-semibold">Makanan</h1>
    </nav>

    <!-- Search -->
    <div class="px-4 pb-3">
      <div class="relative">
        <input type="text" placeholder="Cari Menu" class="w-full border border-gray-300 rounded-md px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-red-500" />
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute top-3 left-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>
    </div>
  </div>

  <!-- MENU LIST -->
  <div class="overflow-y-auto px-4 pt-16 pb-16 max-h-[calc(100vh-160px)]">
    <div class="grid grid-cols-2 gap-4">
      <template x-for="item in menu" :key="item.id">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden flex flex-col">
          <img :src="item.gambar" alt="" class="w-full h-36 object-cover">
          <div class="p-2 flex-1">
            <p class="text-xs text-gray-500">Makanan</p>
            <h3 class="font-semibold text-sm leading-tight" x-text="item.nama"></h3>
            <p class="text-sm font-semibold text-gray-700 mt-1" x-text="`Rp ${item.harga.toLocaleString()}`"></p>
          </div>
          <div class="flex items-center justify-center gap-16 pb-2">
            <button @click="kurang(item.id)" class="bg-red-500 text-white rounded-md text-sm font-bold w-8 h-8">-</button>
            <span class="text-sm font-medium text-center w-6" x-text="cart[item.id] || 0"></span>
            <button @click="tambah(item.id)" class="bg-red-500 text-white rounded-md text-sm font-bold w-8 h-8">+</button>
          </div>
        </div>
      </template>
    </div>
  </div>

  <!-- BOTTOM CART -->
  <div class="fixed bottom-0 left-0 right-0 max-w-xl mx-auto bg-white border-t border-gray-200 px-4 py-3 flex justify-between items-center shadow-inner z-40">
    <div class="bg-gray-100 px-4 py-1 rounded-full text-red-600 font-bold text-sm" x-text="`${totalQty()}`"></div>
    <a href="/keranjang" class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold text-sm w-full ml-3 text-center">Lihat Keranjang</a>
  </div>
</div>

<!-- ALPINE SCRIPT -->
<script>
  function menuData() {
    return {
      menu: [
        { id: 1, nama: 'Acai Bowl', harga: 35000, gambar: 'https://source.unsplash.com/400x300/?fruit,bowl' },
        { id: 2, nama: 'Burger', harga: 25000, gambar: 'https://source.unsplash.com/400x300/?burger' },
        { id: 3, nama: 'Aglio e Olio', harga: 45000, gambar: 'https://source.unsplash.com/400x300/?pasta' },
        { id: 4, nama: 'Dimsum Kuah', harga: 20000, gambar: 'https://source.unsplash.com/400x300/?dimsum' },
        { id: 5, nama: 'Sate Ayam', harga: 30000, gambar: 'https://source.unsplash.com/400x300/?sate' },
        { id: 6, nama: 'Nasi Goreng', harga: 28000, gambar: 'https://source.unsplash.com/400x300/?friedrice' }
      ],
      cart: {},
      tambah(id) {
        this.cart[id] = (this.cart[id] || 0) + 1;
      },
      kurang(id) {
        if (this.cart[id]) this.cart[id] = Math.max(this.cart[id] - 1, 0);
      },
      totalQty() {
        return Object.values(this.cart).reduce((a, b) => a + b, 0);
      },
      totalHarga() {
        return this.menu.reduce((total, item) => {
          return total + (this.cart[item.id] || 0) * item.harga;
        }, 0);
      }
    }
  }
</script>
@endsection