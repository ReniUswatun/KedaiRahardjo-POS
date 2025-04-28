<!-- resources/views/components/customer/navbar.blade.php -->
<nav class="fixed top-0 left-0 right-0 max-w-xl mx-auto bg-white shadow p-3 z-50">
     @if (request('pesanan'))
      <div class="max-w-7xl mx-auto flex items-center">
        <a href="{{ route('customer.cart.index') }}" class="text-gray-700 hover:text-gray-900 mx-4 my-3">
                    <!-- Icon back -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M20 12H4m0 0l6-6m-6 6l6 6" />
    </svg>
        </a>
        <div class="ml-3">
        <p class="text-xl font-bold text-grey-800">Pesanan {{ request('pesanan') }}</p>
        </div>
      </div>
    @else
    <div class="max-w-7xl mx-auto flex items-start">
        <!-- Logo/nama aplikasi -->
        <a href="{{ route('customer.index') }}" class="flex items-center">
            <img src="{{ asset('assets/images/icon/logo_kedai_rahardjo.svg') }}" alt="Logo" class="h-10 w-10 rounded-full">
            <div class="ml-2">
                <p class="text-xl font-bold text-red-600">
                Kedai Rahardjo
            </p>
                <p class="text-sm text-gray-500">Larangan 01/03, Gayam, Sukoharjo</p>
            </div>
        </a>
        
    </div>
    @endif
</nav>