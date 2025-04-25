<!-- resources/views/components/cashier/navbar.blade.php -->
<nav class="fixed top-0 left-0 right-0 max-w-xl mx-auto bg-white shadow p-2 z-50">
    <div class="flex justify-between items-center p-4">
        <button onclick="window.history.back()">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        </button>
        <h1 class="mx-auto text-lg font-semibold">
            @if(request()->routeIs('cashier.orders.index'))
                Orders
            @elseif(request()->routeIs('cashier.orders.processing'))
                Processing Orders
            @elseif(request()->routeIs('cashier.orders.completed'))
                Completed Orders
            @elseif(request()->routeIs('cashier.history.index'))
                History
            @else
                Orders
            @endif  
        </div>
</nav>

