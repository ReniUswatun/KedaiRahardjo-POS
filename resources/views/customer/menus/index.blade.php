@extends('customer.dashboard.body.main')

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('keranjangBelanja', () => ({
      items: [],
      showDetail: false,

      tambah(menu) {
        const index = this.items.findIndex(item => item.id === menu.id);
        if (index !== -1) {
          this.items[index].quantity += 1;
        } else {
          this.items.push({
            id: menu.id,
            name: menu.name,
            price: menu.price,
            quantity: 1
          });
        }
      },

      kurang(menu) {
        const index = this.items.findIndex(item => item.id === menu.id);
        if (index !== -1) {
          if (this.items[index].quantity > 1) {
            this.items[index].quantity -= 1;
          } else {
            this.items.splice(index, 1);
          }
        }
      },

      daftar() {
        return this.items;
      },

      jumlahMenu(menuId) {
        const found = this.items.find(item => item.id === menuId);
        return found ? found.quantity : 0;
      },

      totalHarga() {
        return this.items.reduce((total, item) => total + item.price * item.quantity, 0);
      },

      checkout() {
        localStorage.setItem('keranjang', JSON.stringify(this.items));
        window.location.href = '{{ route("data.create") }}';
      },
    }));
  });
</script>

@section('container')

<div class="mx-4 pb-32" x-data="keranjangBelanja()">
  {{-- Card untuk search --}}
  <div class="group relative bg-gradient-to-br from-rose-500 to-red-400 rounded-3xl p-6 text-white max-w-xl w-full mx-auto shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
    <!-- Hiasan Lingkaran Blur di Tengah + Animasi Hover -->
    <div class="absolute top-1/2 left-1/2 w-60 h-60 bg-red-200 bg-opacity-25 rounded-full blur-lg transform -translate-x-full -translate-y-1/2 transition-all duration-500 ease-in-out group-hover:-translate-x-px"></div>

    <h2 class="text-2xl font-bold mb-1 relative z-10">Kedai Rahardjo</h2>
    <p class="text-sm mb-5 relative z-10">Temukan comforting food mu!</p>

    <div class="relative z-10">
      <input 
        type="text" 
        placeholder="Cari Makanan" 
        class="w-full pl-5 pr-12 py-3 rounded-full text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-rose-100 focus:ring-offset-2 focus:ring-offset-rose-500 transition-all duration-300 shadow-md"
      />
      <svg 
        class="w-5 h-5 text-gray-400 absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none" 
        xmlns="http://www.w3.org/2000/svg" 
        fill="none" 
        viewBox="0 0 24 24" 
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
          d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
      </svg>
    </div>
  </div>

  {{-- Paling Laris --}}
  <div class="mt-2">
    <h2 class="text-lg font-bold">Paling Laris</h2>
    <div class="flex gap-6 overflow-x-scroll pb-3 pt-3 ps-7 -mx-8" style="scrollbar-width: none; -ms-overflow-style: none; ::-webkit-scrollbar { display: none; }">
      @foreach ($bestSellers as $menu)
        @include('customer.menus.components.menu-card', ['menu' => $menu])
      @endforeach
    </div>
  </div>

  {{-- Kategori --}}
  <div class="mt-4" x-data="{ kategoriAktif: 'makanan' }">
    <h2 class="text-lg font-bold">Menu Kategori</h2>

    <!-- Tombol Kategori -->
    <div class="flex flex-wrap justify-evenly mt-2">
      @foreach (array_keys($menus) as $category)
        <button 
          @click="kategoriAktif = '{{ $category }}'"
          :class="kategoriAktif === '{{ $category }}' 
            ? 'bg-red-500 text-white' 
            : 'text-red-500 border hover:bg-red-100'"
          class="border px-10 py-1 rounded-full shadow-sm font-semibold transition mb-2 border-red-500"
        >
          {{ ucfirst($category) }}
        </button>
      @endforeach
    </div>

    <!-- Daftar Menu -->
    <div class="mt-4 mb-12">
      @foreach ($menus as $kategori => $items)
        <div 
          x-show="kategoriAktif === '{{ $kategori }}'"
          x-cloak
          x-transition:enter="transition ease-out duration-400"
          x-transition:enter-start="opacity-0 translate-y-2"
          x-transition:enter-end="opacity-100 translate-y-0"
        >
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($items as $item)
              @include('customer.menus.components.menu-card', ['menu' => $item])
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- KERANJANG BELANJA -->
  <div 
    x-data="{ showDetail: false }"
    class="fixed bottom-0 inset-x-0 z-40 px-4 mb-[75px]">
    
    <div class="bg-white rounded-t-2xl max-w-xl mx-auto border overflow-hidden">

      <!-- Bar Ringkasan -->
      <div 
        class="flex items-center justify-between px-4 py-3 cursor-pointer"
        @click="showDetail = !showDetail">
        <div>
          <p class="text-sm text-gray-600" x-text="'Total item: ' + daftar().reduce((sum, i) => sum + i.quantity, 0)"></p>
          <p class="font-semibold text-red-600" x-text="'Rp ' + totalHarga().toLocaleString('id-ID')"></p>
        </div>
        <div class="text-red-500 text-xl transition-transform duration-300">
          <template x-if="showDetail">
            <!-- Panah ke bawah -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </template>
          <template x-if="!showDetail">
            <!-- Panah ke atas -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </template>
        </div>
      </div>

      <!-- Rincian Item -->
      <div 
        x-show="showDetail && daftar().length > 0"
        x-transition
        class="border-t px-4 pb-4 max-h-[200px] overflow-y-auto">
        
        <template x-for="item in daftar()" :key="item.id">
          <div class="flex justify-between items-center mb-2">
            <div>
              <p class="font-semibold text-sm" x-text="item.name"></p>
              <p class="text-sm text-gray-500">x<span x-text="item.quantity"></span></p>
            </div>
            <div class="text-sm font-bold text-red-600" x-text="'Rp ' + (item.price * item.quantity).toLocaleString('id-ID')"></div>
          </div>
        </template>

        <!-- Tombol Checkout -->
        <div class="sticky bottom-0 bg-white pt-3 mt-3">
          <button 
            @click="checkout()" 
            class="block w-full bg-red-500 text-white py-2 rounded-xl font-semibold text-center hover:bg-red-600 transition">
            Bayar
          </button>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
