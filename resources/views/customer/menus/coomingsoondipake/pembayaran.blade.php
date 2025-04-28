@extends('customer.menus.body.main')

@section('container')
<div class="relative">
  <!-- Header -->
  <div class="fixed top-0 left-0 right-0 max-w-xl mx-auto bg-white shadow z-50">
    <nav class="flex items-center justify-center relative p-3">
      <button onclick="window.history.back()" class="absolute left-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <h1 class="text-lg font-semibold">Pembayaran</h1>
    </nav>
  </div>

  <!-- Form -->
  <div class="mt-20 px-4 pb-32">
    <form class="space-y-5">
      @csrf

      <!-- Dropdown -->
      <div>
        <label for="metode" class="block font-semibold text-sm mb-1">Metode Pembayaran</label>
        <select id="metode" name="metode" class="w-full border border-red-400 focus:ring-2 focus:ring-red-500 rounded-md px-4 py-2 text-sm shadow-sm focus:outline-none">
            <option value="">Pilih Metode</option>
          <option value="cash">Tunai</option>
          <option value="qris">QRIS</option>
        </select>
      </div>
    </form>
  </div>

  <!-- Fixed Bottom Buttons -->
  <div class="fixed bottom-0 left-0 right-0 max-w-xl mx-auto bg-white px-4 pb-4 pt-2">
    <div class="flex justify-between">
        <button type="button" onclick="window.history.back()" class="w-1/2 border border-red-500 text-red-500 font-semibold py-2 rounded-lg mr-2">Batal</button>
        <a href="" type="submit" class="w-1/2 bg-red-500 text-white font-semibold py-2 rounded-lg ml-2 text-center">Lanjut</a>
    </div>
  </div>
</div>
@endsection