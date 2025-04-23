@extends('customer.dashboard.body.main')

@section('container')

<div class="mx-4 pb-32">
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
    <div class="mt-4">
      @foreach ($menus as $kategori => $items)
        <div 
          x-show="kategoriAktif === '{{ $kategori }}'"
          x-cloak
          x-transition:enter="transition ease-out duration-400"
          x-transition:enter-start="opacity-0 translate-y-2"
          x-transition:enter-end="opacity-100 translate-y-0"
        >
          <div class="grid grid-cols-2 gap-4">
            @foreach ($items as $item)
              @include('customer.menus.components.menu-card', ['menu' => $item])
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
