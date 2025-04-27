@extends('customer.dashboard.body.main')

@section('container')
<div class="mx-4 pb-32">
    <h1 class="text-2xl font-bold mb-4 mt-2 text-red-900">Keranjang Pesanan</h1>
    <div class="overflow-x-auto">
        @if(isset($message))
            <div class="mt-2 flex items-center p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg" role="alert">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 19h18M3 12h18" />
                </svg>
                <span><strong>{{ $message }}</strong></span>
            </div>
        @endif


    <!-- Tampilkan cart jika ada -->
    @if (!empty($carts))
        @foreach ($carts as $cartId => $cart)
            <div class="bg-white shadow-md rounded-2xl p-4 mb-4">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex flex-col">
                        <div class="text-lg font-semibold text-gray-800">Cart ID: {{ $cartId }}</div>
                        <span class="text-sm text-gray-500">Total Items: {{ $cart['total_quantity'] }}</span>
                    </div>

                    <button class="text-black px-4 py-4 font-semibold">
                        Ubah
                    </button>
                </div>


                @foreach ($cart['items'] as $item)
                    <div class="flex items-center border-t border-gray-200 py-3">
                        <div class="w-16 h-16 bg-gray-100 rounded-xl flex-shrink-0">
                            <!-- Kalau mau tambah gambar, bisa taruh -->
                            <img src="{{  asset('assets/images/product/nasi-goreng.jpg')}}" class="w-16 h-16 rounded-xl object-cover"> 
                        </div> 
                        
                        <div class="ml-4 flex-1">
                            <h4 class="text-md font-semibold text-gray-800">{{ $item['name'] }}</h4>
                            <div class="flex justify-between items-center mt-1">
                                <span class="text-sm text-gray-600">Qty: {{ $item['quantity'] }}</span>
                            </div>
                            <div class="flex justify-between items-center mt-1">
                                <span class="text-sm font-semibold text-red-500">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-between items-center mt-4 border-t pt-2">
                    <span class="text-gray-600">Total Harga</span>
                    <span class="text-lg font-bold text-red-500">Rp {{ number_format($cart['total_price'], 0, ',', '.') }}</span>
                </div>

                <button class="w-full mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 rounded-xl">
                    Checkout
                </button>
            </div>
        @endforeach
    @endif

</div>
@endsection