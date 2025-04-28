@extends('customer.dashboard.body.main')

@section('container')

<!-- Dialog Konfirmasi -->
<div id="confirmDialog" class="hidden">
    <div class="fixed inset-0 z-50 flex justify-center items-center bg-gray-900 bg-opacity-50">
        <div class="bg-white p-8 rounded-xl shadow-xl max-w-sm w-full">
            <h3 class="text-2xl font-semibold text-center text-gray-800 mb-6">Apakah Anda yakin ingin menghapus item ini?</h3>
            <div class="flex justify-evenly gap-2">
                <button id="confirmYes" class="w-full px-8 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-200">Ya, Hapus</button>
                <button id="confirmNo" class="w-full px-8 py-2 bg-gray-300 text-gray-800 rounded-xl hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-200">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Alert Notification -->
<div id="alertNotification" class="fixed bottom-5 left-1/2 transform -translate-x-1/2 z-50 hidden max-w-xs px-8 py-2 w-full border border-red-600 bg-red-100 text-red-600 text-center shadow-xl rounded-xl">
    <p id="alertMessage" class="text-lg">Pesan akan muncul di sini.</p>
</div>

<div class="mx-4 pb-32">
    <h1 class="text-2xl font-bold mb-4 mt-2 text-red-900">Keranjang Pesanan</h1>

    @if(isset($message))
        <div class="mt-2 flex items-center p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg" role="alert">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 19h18M3 12h18" />
            </svg>
            <span><strong>{{ $message }}</strong></span>
        </div>
    @endif

    @if (!empty($carts))
        @foreach ($carts as $cartId => $cart)
            <div x-data="{ showMore: false }" class="bg-white shadow-sm rounded-2xl p-4 mb-4 border border-gray-200">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex flex-col">
                        <div class="text-lg font-semibold text-gray-800">Pesanan {{ $loop->iteration }}</div>
                        <span class="text-sm text-gray-500">Total Items: {{ $cart['total_quantity'] }}</span>
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{ route('customer.menu.show', ['cartId' => $cartId, 'pesanan' => $loop->iteration]) }}" class="w-16 py-2 text-green-500 font-medium flex items-center justify-center">
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
                    <div 
                        x-show="showMore || {{ $loop->index < 2 ? 'true' : 'false' }}" 
                        x-transition:enter="transition ease-out duration-300" 
                        x-transition:enter-start="opacity-0 translate-y-2" 
                        x-transition:enter-end="opacity-100 translate-y-0" 
                        class="flex items-center border-t border-gray-200 py-3">

                        <div class="w-16 h-16 bg-gray-100 rounded-xl flex-shrink-0">
                            <img src="{{ asset('assets/images/product/nasi-goreng.jpg') }}" class="w-16 h-16 rounded-xl object-cover">
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

                        <button onclick="deleteItem('{{ $cartId }}', '{{ $item['id'] }}')" class="delete-button hidden opacity-0 rounded-lg translate-x-5 transition-all duration-300 ease-in-out bg-gray-300 text-white text-sm font-bold px-4 py-4 hover:bg-red-200 hover:text-red-500 hover:scale-105 hover:border hover:border-red-500">
                            Hapus
                        </button>
                    </div>
                @endforeach

                @if (count($cart['items']) > 2)
                    <div class="flex justify-center mt-2">
                        <button @click="showMore = !showMore" class="text-red-500 flex items-center transition-all duration-300 ease-in-out transform hover:scale-105">
                            <span x-text="showMore ? 'Tampilkan Lebih Sedikit' : 'Tampilkan Lebih Banyak'"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform transition-transform duration-300" :class="{ 'rotate-180': showMore }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                @endif

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

<!-- Script Section -->
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
                }, 10);
            } else {
                button.classList.add('opacity-0', 'translate-x-5');
                setTimeout(() => {
                    button.classList.add('hidden');
                }, 300);
            }
        });
    }

    function deleteItem(cartId, itemId) {
        const dialog = document.getElementById('confirmDialog');
        dialog.classList.remove('hidden');

        document.getElementById('confirmYes').onclick = function() {
            const url = '{{ route("customer.cart.items.delete", ["cartId" => "__cartId__", "itemId" => "__itemId__"]) }}'
                        .replace('__cartId__', cartId)
                        .replace('__itemId__', itemId);

            fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ cartId: cartId, itemId: itemId })
            })
            .then(response => response.json())
            .then(data => {
                const alertNotification = document.getElementById('alertNotification');
                const alertMessage = document.getElementById('alertMessage');
                alertMessage.textContent = data.message;
                alertNotification.classList.remove('hidden');
                alertNotification.classList.add('transition-opacity', 'opacity-0', 'duration-500');
                setTimeout(() => {
                    alertNotification.classList.remove('opacity-0');
                    alertNotification.classList.add('opacity-100');
                }, 10);
                setTimeout(() => {
                    alertNotification.classList.remove('opacity-100');
                    alertNotification.classList.add('opacity-0');
                    setTimeout(() => {
                        alertNotification.classList.add('hidden');
                    }, 500);
                }, 5000);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus item.');
            })
            .then(() => {
                dialog.classList.add('hidden');
                window.location.href = '{{ route("customer.cart.index") }}';
            });
        }

        document.getElementById('confirmNo').onclick = function() {
            dialog.classList.add('hidden');
        }
    }
</script>

@endsection
