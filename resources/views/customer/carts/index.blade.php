@extends('customer.dashboard.body.main')

<script>
    let deleteMode = false;

    function toggleDeleteMode() {
        deleteMode = !deleteMode;
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            if (deleteMode) {
                button.classList.remove('hidden');
                setTimeout(() => {
                    button.classList.remove('opacity-0', 'translate-x-5');
                }, 10); // kasih delay sedikit supaya transisi jalan
            } else {
                button.classList.add('opacity-0', 'translate-x-5');
                setTimeout(() => {
                    button.classList.add('hidden');
                }, 300); // tunggu transisi selesai baru hidden
            }
        });
    }

    function deleteItem(cartId, itemId) {
    window.location.href = '';
    }
</script>

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
            <div class="bg-white shadow-sm rounded-2xl p-4 mb-4 border border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex flex-col">
                        <div class="text-lg font-semibold text-gray-800">Pesanan {{ $loop->iteration }}</div>
                        <span class="text-sm text-gray-500">Total Items: {{ $cart['total_quantity'] }}</span>
                    </div>

                    <!-- Tombol Edit mengarahkan ke halaman edit cart -->
                    <div class="flex space-x-2">
                        <a href="{{ route('customer.menu.show', ['cartId' => $cartId,'pesanan' => $loop->iteration]) }}" class="w-16 py-2 text-green-500 font-medium flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>

                        <button onclick="toggleDeleteMode()" class="w-16 py-2 text-red-500 font-medium flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus
                        </button>
                    </div>
                </div>


                @foreach ($cart['items'] as $itemId => $item)
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

                        <!-- Tombol hapus per item, awalnya hidden -->
                        <button onclick="deleteItem('{{ $cartId }}', '{{ $itemId }}')" class="delete-button hidden opacity-0 translate-x-5 transition-all duration-300 ease-in-out bg-gray-300 text-white text-sm font-bold px-4 py-4">
                            Hapus
                        </button>
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
</div>
@endsection