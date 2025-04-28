@extends('customer.dashboard.body.main')

@section('container')
<div class="mx-4 pb-32">
  <h2 class="text-2xl font-bold mb-3 mt-1">Form Pemesanan</h2>
  <form action="{{ route('customer.payment.processCheckoutFromCart', ['cartId' => $cartId]) }}" method="POST">
    @csrf
    <!-- Data Pembeli -->
    <div class="mb-4">
      <label class="block font-semibold mb-1">Nama</label>
      <input type="text" name="customer_name" class="w-full border px-4 py-2 rounded-lg" required>
    </div>

    <div class="mb-4">
      <label class="block font-semibold mb-1">Nomor Meja</label>
      <input type="number" name="table_number" class="w-full border px-4 py-2 rounded-lg" min="1" required>
    </div>

    <div class="mb-4">
      <label class="block font-semibold mb-1">Metode Pembayaran</label>
      <select name="payment_method" class="w-full p-2 border-2 px-4 py-2 rounded-lg focus:ring-2 focus:outline-none" required>
          <option value="kasir">Bayar di Kasir</option>
          <option value="qris">Bayar menggunakan QRIS</option>
      </select>
    </div>  

    <div class="mb-4">
      <label class="block font-semibold mb-1">Catatan</label>
      <textarea name="order_note" rows="3" class="w-full border px-4 py-2 rounded-lg" placeholder="Opsional"></textarea>
    </div>

   <div class="mb-4">
    <h2 class="border-t-2 pt-4 text-2xl font-bold text-gray-800 mb-4 text-center">🛒 Detail Pesanan</h2>
     <div class="border-y-2">
      @foreach ($cart['items'] as $item)
         <div class="flex justify-between items-center p-1">
            <div>
              <p class="font-semibold text-gray-800">{{ $item['name'] }}</p>
              <p class="text-sm text-gray-500">
                {{ $item['quantity'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}
              </p>
            </div>
            <p class="font-semibold">
              Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
            </p>
          </div>
      @endforeach
    </div>

    <hr class="my-4">

    <div class="flex justify-between text-xl font-bold text-gray-800">
      <p>Total</p>
      <p class="text-red-600">
        Rp{{ number_format($cart['total_price'], 0, ',', '.') }}
      </p>
    </div>
   </div>

    <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-xl font-semibold hover:bg-red-600 transition">
      Konfirmasi
    </button>
  </form>
</div>
@endsection
