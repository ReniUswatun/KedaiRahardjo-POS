@extends('cashier.orders.body.main')

@section('container')
    <div class="h-screeno mx-4 pb-32">
        <h1 class="text-2xl font-bold mb-4">Welcome Kasir!</h1>
      <!-- Search -->
      <div class="relative">
        <input type="text" placeholder="Cari Menu" class="w-full border border-gray-300 rounded-md px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-red-500" />
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute top-3 left-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>

<div class="relative" x-data="menuData()" x-init="init()">
  
  <!-- Menu List -->
  <div class="overflow-y-auto px-4 pt-4 pb-28 max-h-[calc(100vh-160px)]">
    <div class="grid grid-cols-2 gap-4">
      <template x-for="item in menu" :key="item.id">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden flex flex-col">
          <img :src="item.gambar" alt="" class="w-full h-24 object-cover">
          <div class="p-2 flex-1">
            <p class="text-xs text-gray-500">Makanan</p>
            <h3 class="font-semibold text-sm leading-tight" x-text="item.nama"></h3>
            <p class="text-sm font-semibold text-gray-700 mt-1" x-text="`Rp ${item.harga.toLocaleString()}`"></p>
          </div>
          <div class="flex items-center justify-center gap-3 pb-2">
            <button @click="kurang(item.id)" class="bg-red-500 text-white px-2 rounded-md text-sm font-bold">-</button>
            <span class="text-sm font-medium" x-text="cart[item.id] || 0"></span>
            <button @click="tambah(item.id)" class="bg-red-500 text-white px-2 rounded-md text-sm font-bold">+</button>
          </div>
        </div>
      </template>
    </div>
  </div>

<!-- Alpine Script -->
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
      showCart: false,

      init() {
        // bisa ditambah load dari localStorage di sini
      },
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
      },
      checkout() {
        alert('Checkout berhasil! Total: Rp ' + this.totalHarga().toLocaleString());
        this.cart = {};
        this.showCart = false;
      }
    }
  }
</script>




   
    </div>
@endsection