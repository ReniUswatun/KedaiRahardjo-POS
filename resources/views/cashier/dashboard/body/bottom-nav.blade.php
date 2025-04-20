<!-- resources/views/components/cashier/bottom-nav.blade.php -->
<div class="fixed bottom-0 left-0 right-0 max-w-xl mx-auto bg-white shadow p-3">
    <div class="max-w-7xl mx-auto flex justify-around">
        <a href="{{ route('cashier.index') }}"  class="text-center block {{ request()->routeIs('cashier.index') ? 'text-red-500' : 'text-gray-700 hover:text-gray-900' }}">
        <svg class="w-6 h-6 mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
         viewBox="0 0 20 20" aria-hidden="true">
        <path d="M10.707 1.293a1 1 0 00-1.414 0l-7 7A1 1 0 003 9h1v7a2 2 0 002 2h2a1 1 0 001-1v-4h2v4a1 1 0 001 1h2a2 2 0 002-2V9h1a1 1 0 00.707-1.707l-7-7z" />
        </svg>
            Dashboard
        </a>
        <a href="" class="text-gray-700 hover:text-gray-900 text-center">
            <svg class="w-6 h-6 mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" 
                 viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path>
            </svg>
            Menus
        </a>
        <a href="" class="text-gray-700 hover:text-gray-900 text-center">
            <svg class="w-6 h-6 mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" 
                 viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4"></path>
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
            </svg>
            Carts
        </a>
        <a href="" class="text-gray-700 hover:text-gray-900 text-center">
            <svg class="w-6 h-6 mx-auto mb-1" fill="none" stroke="currentColor" stroke-width="2" 
       viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
          d="M9 2h6a2 2 0 012 2v2H7V4a2 2 0 012-2zM5 6h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                <path stroke-linecap="round" stroke-linejoin="round"
          d="M9 14l2 2 4-4" />
            </svg>
            Orders
        </a>
    </div>
</div>
