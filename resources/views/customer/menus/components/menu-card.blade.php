
<div class="min-w-[250px] bg-white rounded-2xl shadow-md border px-4 pt-4 pb-2 flex flex-col">
  <img src="{{ $menu['image'] }}" alt="{{ $menu['name'] }}" class="w-full h-40 rounded-2xl object-cover mb-2 transition-transform duration-300 ease-in-out hover:scale-105">
  
  {{-- Judul Kategori (Opsional) --}}
  @if(!empty($menu['category']))
  <h3 class="text-sm font-bold">{{ $menu['category'] }}</h3>
@endif
  
<div class="flex-1">
  {{-- Harga Menu --}}
  <p class="text-red-600 font-bold text-lg">Rp {{ number_format($menu['price'], 0, ',', '.') }}</p>

  {{-- Judul Menu --}}
  <h3 class="text-xl font-semibold">{{ $menu['name'] }}</h3>
  
  {{-- Deskripsi Menu --}}
  <p class="text-sm text-gray-500">{{ \Illuminate\Support\Str::words($menu['description'], 7, ' ...') }}</p>
  
</div>
  
  {{-- Button Ambil Menu --}}
  <div class="flex items-center justify-center gap-4 pb-2 mx-3">
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

