@extends('cashier.dashboard.body.main')

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

    function deleteItem(orderId) {
        if (confirm('Yakin mau hapus pesanan ini?')) {
            document.getElementById('delete-form-' + orderId).submit();
        }
    }
</script>

@section('container')
<div class="mx-4 pb-32">
    <h1 class="text-2xl font-bold mb-4 mt-2 text-red-900">Keranjang Pesanan</h1>

    <div class="overflow-x-auto">
        @if(session('message'))
            <div class="mt-2 flex items-center p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg" role="alert">
                <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 19h18M3 12h18" />
                </svg>
                <span><strong>{{ session('message') }}</strong></span>
            </div>
        @endif

        @if (!empty($orders) && $orders->count() > 0)
            @foreach ($orders as $order)
                <div class="bg-white shadow-sm rounded-2xl p-4 mb-4 border border-gray-200">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex flex-col">
                            <div class="text-lg font-semibold text-gray-800">Invoice {{ $order->invoice_no }}</div>
                            <span class="text-sm text-gray-500">Customer: {{ $order->customer_name }}</span>
                            <span class="text-sm text-gray-500">Meja: {{ $order->table_number }}</span>
                            <span class="text-sm text-gray-500">Total Items: {{ $order->total_products }}</span>
                        </div>

                        <button onclick="toggleDeleteMode()" class="w-16 py-2 text-red-500 font-medium flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus
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

                    <form action="" method="POST" class="w-full mt-4">
                        @csrf
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 rounded-xl">
                            Checkout
                        </button>
                    </form>

                    <form action="" method="POST" id="delete-form-{{ $order->id }}">
                        @csrf
                        @method('DELETE')
                    </form>

                    <button onclick="deleteItem('{{ $order->id }}')" class="delete-button hidden opacity-0 translate-x-5 transition-all duration-300 ease-in-out bg-gray-300 text-white text-sm font-bold px-4 py-4 mt-2">
                        Hapus
                    </button>
                </div>
            @endforeach
        @else
            <div class="text-center text-gray-500 mt-10">
                Tidak ada pesanan.
            </div>
        @endif
    </div>
</div>
@endsection
