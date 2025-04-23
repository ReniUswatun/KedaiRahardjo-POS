
<div class="min-w-[250px] bg-white rounded-2xl shadow-md border px-4 pt-4 pb-2 flex flex-col">
  <img src="{{ $menu['image'] }}" alt="{{ $menu['name'] }}" class="w-full h-40 rounded-2xl object-cover mb-2 transition-transform hover:scale-105">
  
  {{-- Judul Kategori (Opsional) --}}
  {{-- <h3 class="text-sm font-semibold text-gray-700">{{ $menu['category'] }}</h3> --}}
  
<div class="flex-1">
  {{-- Harga Menu --}}
  <p class="text-red-600 font-bold text-lg hover:text-red-800 transition-colors">Rp {{ number_format($menu['price'], 0, ',', '.') }}</p>

  {{-- Judul Menu --}}
  <h3 class="text-xl font-semibold hover:text-red-500 transition-colors">{{ $menu['name'] }}</h3>
  
  {{-- Deskripsi Menu --}}
  <p class="text-sm text-gray-500">{{ \Illuminate\Support\Str::words($menu['description'], 5, ' ...') }}</p>
  
</div>
  
  {{-- Button Ambil Menu --}}
  <div class="flex items-center justify-center gap-4 pb-2 mb-3 mt-4">
    <!-- Tombol minus -->
    <button class="bg-red-400 text-white text-2xl rounded-xl w-10 h-10 flex items-center justify-center hover:bg-red-600 transition-colors">
      &minus;
    </button>

    <!-- Angka tengah -->
    <div class="bg-gray-100 text-black text-xl font-medium px-6 py-3 rounded-xl w-14 text-center">
      0
    </div>

    <!-- Tombol plus -->
    <button class="bg-red-400 text-white text-2xl rounded-xl w-10 h-10 flex items-center justify-center hover:bg-red-600 transition-colors">
      &#43;
    </button>
  </div>
</div>

