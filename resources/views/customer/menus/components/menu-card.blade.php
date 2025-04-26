<div class="min-w-[235px] bg-white rounded-2xl shadow-md border px-4 pt-4 pb-2 flex flex-col">
  <img src="{{ asset($menu->product_image) }}" alt="{{ $menu->product_name }}" class="w-full h-40 rounded-2xl object-cover mb-2 transition-transform duration-300 ease-in-out hover:scale-105">
  
  {{-- Judul Kategori (Opsional) --}}
  @if ($menu?->is_best_seller===1)
    <h3 class="text-sm font-bold">{{ $menu->category->name }}</h3>
  @endif

  <div class="flex-1">
    {{-- Harga Menu --}}
    <p class="text-red-600 font-bold text-lg">Rp {{ number_format($menu->selling_price, 0, ',', '.') }}</p>

    {{-- Judul Menu --}}
    <h3 class="text-xl font-semibold">{{ $menu->product_name }}</h3>

    {{-- Deskripsi Menu --}}
    <p class="text-sm text-gray-500">{{ \Illuminate\Support\Str::words($menu->product_description, 7, ' ...') }}</p>
  </div>

  {{-- Button Ambil Menu --}}
  <div class="flex items-center justify-center gap-4 pb-2 mx-3 mt-2">
    <!-- Tombol minus -->
    <button 
      @click="kurang({ id: {{ $menu->id }}, name: '{{ $menu->product_name }}', price: {{ $menu->selling_price }} })"
      class="bg-red-400 text-white text-2xl rounded-xl w-10 h-10 flex items-center justify-center hover:bg-red-600 transition-colors">
      &minus;
    </button>

    <!-- Angka tengah -->
    <div class="bg-gray-100 text-black text-xl font-medium px-6 py-3 rounded-xl w-14 text-center">
      <template x-if="daftar().find(i => i.id === {{ $menu->id }})">
        <span x-text="daftar().find(i => i.id === {{ $menu->id }}).quantity"></span>
      </template>
      <template x-if="!daftar().find(i => i.id === {{ $menu->id }})">
        <span>0</span>
      </template>
    </div>

    <!-- Tombol plus -->
    <button 
      @click="tambah({ id: {{ $menu->id }}, name: '{{ $menu->product_name }}', price: {{ $menu->selling_price }} })"
      class="bg-red-400 text-white text-2xl rounded-xl w-10 h-10 flex items-center justify-center hover:bg-red-600 transition-colors">
      &#43;
    </button>
  </div>
</div>
