@extends('cashier.orders.body.main')

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

    function toggleDetails(orderId) {
        const detailSection = document.getElementById('details-' + orderId);
        const allDetails = document.querySelectorAll('[id^="details-"]');

        allDetails.forEach(section => {
            if (section !== detailSection) {
                section.classList.add('hidden');
            }
        });

        detailSection.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        const isClickInside = event.target.closest('.order-card');
        if (!isClickInside) {
            const allDetails = document.querySelectorAll('[id^="details-"]');
            allDetails.forEach(section => {
                section.classList.add('hidden');
            });
        }
    });

    function deleteItem(orderId) {
        if (confirm('Yakin mau hapus pesanan ini?')) {
            document.getElementById('delete-form-' + orderId).submit();
        }
    }
</script>

@section('container')
    <div class="mx-4 pb-32">
    <div class="p-4 pb-32 min-h-screen">
        <div class="mb-6">
            <div class="grid grid-cols-3 gap-2 w-full">
                <a href="{{ route('cashier.orders.index') }}" class="w-full px-4 py-2 rounded-full font-semibold text-center  
                    {{ request()->routeIs('cashier.orders.index') ? 'text-white bg-red-500' : 'text-red-500 bg-white border border-red-500 hover:bg-red-500 hover:text-white' }} transition">
                    Pending
                </a>
                <a href="{{ route('cashier.orders.processing') }}" class="w-full px-4 py-2 rounded-full font-semibold text-center 
                    {{ request()->routeIs('cashier.orders.processing') ? 'text-white bg-red-500' : 'text-red-500 bg-white border border-red-500 hover:bg-red-500 hover:text-white' }} transition">
                    Processing
                </a>
                <a href="{{ route('cashier.orders.completed') }}" class="w-full px-4 py-2 rounded-full font-semibold text-center 
                    {{ request()->routeIs('cashier.orders.completed') ? 'text-white bg-red-500' : 'text-red-500 bg-white border border-red-500 hover:bg-red-500 hover:text-white' }} transition">
                    Completed
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            @if(session('message'))
                <div class="mt-2 flex items-center p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg" role="alert">
                    <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 19h18M3 12h18" />
                    </svg>
                    <span><strong>{{ session('message') }}</strong></span>
                </div>
            @endif

            @if ($orders->count() > 0)
                @foreach ($orders as $order)
                    <div class="order-card bg-white shadow-sm rounded-2xl p-4 mb-4 border border-gray-200 relative">
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex flex-col">
                                <div class="text-lg font-semibold text-gray-800">Pesanan {{ $order->invoice_no }}</div>
                                <span class="text-sm text-gray-500">Customer: {{ $order->customer_name }}</span>
                                <span class="text-sm text-gray-500">Meja: {{ $order->table_number }}</span>
                                <span class="text-sm text-gray-500">Total Items: {{ $order->total_products }}</span>
                            </div>
                            <button onclick="toggleDetails('{{ $order->id }}')" class="text-sm text-blue-500 hover:underline">
                                Lihat Detail
                            </button>
                        </div>

                        <!-- Detail Section -->
                        <div id="details-{{ $order->id }}" class="hidden mt-2 mb-2">
                            <div class="bg-white p-3 rounded-lg space-y-3">
                            @foreach ($order->orderDetails as $detail)
                                <div class="flex items-center border-b border-gray-300 pb-2 last:border-b-0">
                                    <div class="w-16 h-16 bg-gray-100 rounded-xl flex-shrink-0">
                                        <img src="{{ asset('assets/images/product/nasi-goreng.jpg') }}" alt="{{ $detail->product->name }}" class="w-16 h-16 rounded-xl object-cover">
                                    </div>
                                    <div class="flex-1 ml-3">
                                    <div class="font-semibold text-gray-800">{{ $detail->product->product_name }}</div>
                                    <div class="text-sm text-gray-500">
                                        Harga Satuan: Rp {{ number_format($detail->product->selling_price, 0, ',', '.') }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Qty: {{ $detail->quantity }}
                                    </div>
                                    <div class="text-red-500 font-bold">
                                        Subtotal: Rp {{ number_format($detail->total, 0, ',', '.') }}
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>

                            <button onclick="toggleDetails('{{ $order->id }}')" class="mt-3 text-center w-full text-blue-500 hover:underline text-sm">
                                Tutup Detail
                            </button>
                        </div>

                        <div class="mt-2">
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Status: <strong class="capitalize">{{ $order->order_status }}</strong></span>
                                <span>Pembayaran: <strong class="{{ $order->payment_status == 'paid' ? 'text-green-600' : 'text-red-600' }}">{{ $order->payment_status }}</strong></span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-4 border-t pt-2">
                            <span class="text-gray-600">Total Harga</span>
                            <span class="text-lg font-bold text-red-500">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>

                        <div class="mt-2 grid grid-cols-2 gap-2 w-full">
                            <form action="{{ route('cashier.orders.confirm', $order->id) }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-xl">
                                    Selesai
                                </button>
                            </form>

                            <form action="" method="POST" id="delete-form-{{ $order->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteItem('{{ $order->id }}')" class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 rounded-xl">
                                    Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            @else
                <div class="text-center text-gray-500 mt-10">
                    Belum ada pesanan completed.
                </div>
            @endif
        </div>
    </div>

@endsection