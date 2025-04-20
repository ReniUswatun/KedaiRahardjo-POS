@extends('customer.menus.body.main')

@section('container')
<div class="relative">
  <div class="fixed top-0 left-0 right-0 max-w-xl mx-auto bg-white shadow z-50">
    <!-- Header -->
    <nav class="flex items-center justify-center relative p-3">
      <button onclick="window.history.back()" class="absolute left-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <h1 class="text-lg font-semibold">Menu</h1>
    </nav>
  </div>

  <!-- Form -->
  <div class="px-4">
    <form class="space-y-5">
        @csrf

        <!-- Nama -->
        <div>
            <label for="nama" class="block font-semibold text-sm mb-1">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan Nama"
                class="w-full border border-red-400 focus:ring-2 focus:ring-red-500 rounded-md px-4 py-2 text-sm shadow-sm placeholder-gray-400 focus:outline-none" />
        </div>

        <!-- Nomor Meja -->
        <div>
            <label for="meja" class="block font-semibold text-sm mb-1">Nomor Meja</label>
            <input type="text" name="meja" id="meja" placeholder="Nomor Meja"
                class="w-full border border-red-400 focus:ring-2 focus:ring-red-500 rounded-md px-4 py-2 text-sm shadow-sm placeholder-gray-400 focus:outline-none" />
        </div>

        <!-- Catatan -->
        <div>
            <label for="catatan" class="block font-semibold text-sm mb-1">Catatan</label>
            <textarea name="catatan" id="catatan" placeholder="Opsional" rows="5"
                class="w-full border border-red-400 focus:ring-2 focus:ring-red-500 rounded-md px-4 py-2 text-sm shadow-sm placeholder-gray-400 focus:outline-none resize-none"></textarea>
        </div>
    </form>
  </div>

  <!-- Fixed Bottom Buttons -->
  <div class="fixed bottom-0 left-0 right-0 max-w-xl mx-auto bg-white px-4 pb-4 pt-2">
    <div class="flex justify-between">
        <button type="button" onclick="window.history.back()" class="w-1/2 border border-red-500 text-red-500 font-semibold py-2 rounded-lg mr-2">Batal</button>
        <button type="submit" class="w-1/2 bg-red-500 text-white font-semibold py-2 rounded-lg ml-2">Lanjut</button>
    </div>
  </div>
</div>
@endsection