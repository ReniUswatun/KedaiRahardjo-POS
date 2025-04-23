@extends('customer.dashboard.body.main')

@section('container')


<div class="mx-4 pb-32">
{{-- Card untuk search --}}
  <!-- Card -->
  <div class="group relative bg-gradient-to-br from-rose-500 to-red-400 rounded-3xl p-6 text-white max-w-xl w-full mx-auto shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">


<!-- Hiasan Lingkaran Blur di Tengah + Animasi Hover -->
<div class="absolute top-1/2 left-1/2 w-60 h-60 bg-red-200 bg-opacity-25 rounded-full blur-lg transform -translate-x-full -translate-y-1/2 transition-all duration-500 ease-in-out group-hover:-translate-x-px "></div>


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
      <div class="min-w-[250px] bg-white rounded-2xl shadow-md border px-4 pt-4 pb-2">
        <img src="{{ $menu['image'] }}" alt="{{ $menu['name'] }}" class="w-full h-40 rounded-2xl object-cover mb-2">
        <h3 class="text-sm font-semibold">{{ $menu['category'] }}</h3>
        <h3 class="text-xl font-semibold">{{ $menu['name'] }}</h3>
        <p class="text-sm text-gray-500 mb-2">Rp {{ \Illuminate\Support\Str::words($menu['description'], 7, ' ...') }}</p>
        <p class="text-red-600 font-bold mb-2 text-lg">Rp {{ number_format($menu['price'], 0, ',', '.') }}</p>
        {{-- Button Ambil menu --}}
        <div class="flex items-center justify-center gap-4 pb-2">
          <!-- Tombol minus -->
          <button class="bg-red-400 text-white text-2xl rounded-xl w-10 h-10 flex items-center justify-center hover:bg-red-600">
            &minus;
          </button>

          <!-- Angka tengah -->
          <div class="bg-gray-100 text-black text-xl font-medium px-6 py-3 rounded-xl w-14 text-center">
            0
          </div>

          <!-- Tombol plus -->
          <button class="bg-red-400 text-white text-2xl rounded-xl w-10 h-10 flex items-center justify-center hover:bg-red-600">
            &#43;
          </button>
        </div>
      </div>
    @endforeach
  </div>
</div>




{{-- Kategori --}}
<div class="mt-4">
    <h2 class="text-lg font-bold">Menu Kategori</h2>
    <div class="flex flex-wrap justify-evenly mt-2">
        @foreach ($categories as $category)
           <div class="border border-red-500 px-10 py-1 rounded-full shadow-sm hover:bg-red-100 transition mb-2">
                <a href="">
                    <button>
                       <p class="font-semibold text-red-500"> {{ $category }}</p>
                    </button>
                </a>
           </div>
        @endforeach
    </div> 
</div>



   
</div>
@endsection