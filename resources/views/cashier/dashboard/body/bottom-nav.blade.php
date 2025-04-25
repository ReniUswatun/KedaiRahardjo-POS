<div class="fixed bottom-0 left-0 right-0 max-w-xl mx-auto bg-white shadow p-3">
    <div class="max-w-7xl mx-auto flex justify-around">
        <!-- Dashboard -->
        <a href="{{ route('cashier.index') }}" class="text-center block {{ request()->routeIs('cashier.index') ? 'text-red-500' : 'text-gray-700 hover:text-red-500' }}">
            <svg class="w-6 h-6 mx-auto mb-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" />
            </svg>
            Dashboard
        </a>

        <!-- Orders -->
<<<<<<< HEAD
        <a href="/cashier/orders" class="text-gray-700 hover:text-red-500 text-center">
            <svg class="w-6 h-6 mx-auto mb-1" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
=======
        <a href="{{ route('cashier.orders.index') }}" class="text-center block {{ request()->routeIs('cashier.orders.index') || request()->routeIs('cashier.orders.processing') || request()->routeIs('cashier.orders.completed') ? 'text-red-500' : 'text-gray-700 hover:text-red-500' }}">
            <svg class="w-6 h-6 mx-auto mb-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
>>>>>>> 351363e2844231c423afb577831b9fcfd25b7265
            </svg>
            Orders
        </a>

        <!-- History -->
<<<<<<< HEAD
        <a href="/cashier/history" class="text-gray-700 hover:text-red-500 text-center">
            <svg class="w-6 h-6 mx-auto mb-1" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8v4l3 3M12 2a10 10 0 100 20 10 10 0 000-20z" />
=======
        <a href="{{ route('cashier.history.index') }}" class="text-center block {{ request()->routeIs('cashier.history.index') ? 'text-red-500' : 'text-gray-700 hover:text-red-500' }}">
            <svg class="w-6 h-6 mx-auto mb-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3M12 2a10 10 0 100 20 10 10 0 000-20z" />
>>>>>>> 351363e2844231c423afb577831b9fcfd25b7265
            </svg>
            History
        </a>
    </div>
</div>
