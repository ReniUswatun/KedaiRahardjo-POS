@extends('customer.menus.body.main')

@section('container')
<div x-data="keranjangData()" class="relative min-h-screen bg-white">

  <!-- Header -->
  <div class="fixed top-0 left-0 right-0 max-w-xl mx-auto bg-white shadow z-50">
    <nav class="flex items-center justify-between p-3">
      <button onclick="window.history.back()">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <h1 class="text-lg font-semibold">Keranjang</h1>
      <div class="w-6 h-6"></div> <!-- Spacer -->
    </nav>
  </div>

  <!-- Cart Items -->
  <div class="overflow-y-auto px-4">
    <template x-for="item in itemsInCart()" :key="item.id">
      <div class="flex items-start bg-white border rounded-lg p-3 shadow-sm mb-3">
        <img :src="item.gambar" alt="item" class="w-16 h-16 rounded object-cover mr-3">
        <div class="flex-1 text-sm">
          <div class="font-bold" x-text="item.nama"></div>
          <div class="text-gray-500 text-xs">Deskripsi produk</div>
          <div class="text-xs mt-1" x-text="`Rp ${item.harga.toLocaleString()} x ${cart[item.id]} = Rp ${(item.harga * cart[item.id]).toLocaleString()}`"></div>
        </div>
        <div class="flex flex-col items-center space-y-1 ml-3">
          <button @click="kurang(item.id)" class="bg-red-500 text-white w-7 h-7 rounded flex items-center justify-center">−</button>
          <span class="text-sm font-semibold" x-text="cart[item.id]"></span>
          <button @click="tambah(item.id)" class="bg-red-500 text-white w-7 h-7 rounded flex items-center justify-center">+</button>
        </div>
      </div>
    </template>
  </div>

  <!-- Subtotal + Buttons -->
  <div class="fixed bottom-0 left-0 right-0 max-w-xl mx-auto bg-white border-t px-4 pb-4 pt-3">
    <!-- Subtotal -->
    <div class="text-sm space-y-1 mb-4">
      <div class="flex justify-between">
        <span>Subtotal</span>
        <span class="font-semibold" x-text="`Rp ${totalHarga().toLocaleString()}`"></span>
      </div>
      <div class="flex justify-between">
        <span>Pajak dan biaya lainnya</span>
        <span class="font-semibold">Rp 0</span>
      </div>
      <div class="flex justify-between border-t pt-4 mt-2 font-semibold">
        <span>Total Harga</span>
        <span x-text="`Rp ${totalHarga().toLocaleString()}`"></span>
      </div>
    </div>

    <!-- Buttons -->
    <div class="flex justify-between">
      <button type="button" onclick="window.history.back()" class="w-1/2 border border-red-500 text-red-500 font-semibold py-2 rounded-lg mr-2">Batal</button>
      <a href="/data" class="w-1/2 bg-red-500 text-white font-semibold py-2 rounded-lg ml-2 text-center">Lanjut</a>
    </div>
  </div>
</div>

<!-- SCRIPT -->
<script>
  function keranjangData() {
    return {
      menu: [
        { id: 1, nama: 'Acai Bowl', harga: 35000, gambar: 'https://source.unsplash.com/400x300/?fruit,bowl' },
        { id: 2, nama: 'Burger', harga: 25000, gambar: 'https://source.unsplash.com/400x300/?burger' },
        { id: 3, nama: 'Aglio e Olio', harga: 45000, gambar: 'https://source.unsplash.com/400x300/?pasta' },
        { id: 4, nama: 'Dimsum Kuah', harga: 20000, gambar: 'https://source.unsplash.com/400x300/?dimsum' },
        { id: 5, nama: 'Sate Ayam', harga: 30000, gambar: 'https://source.unsplash.com/400x300/?sate' },
        { id: 6, nama: 'Nasi Goreng', harga: 28000, gambar: 'https://source.unsplash.com/400x300/?friedrice' }
      ],
      cart: {
        1: 2,
        3: 1,
        5: 3
      },
      tambah(id) {
        this.cart[id] = (this.cart[id] || 0) + 1;
      },
      kurang(id) {
        if (this.cart[id]) this.cart[id] = Math.max(this.cart[id] - 1, 0);
      },
      itemsInCart() {
        return this.menu.filter(item => this.cart[item.id] > 0);
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