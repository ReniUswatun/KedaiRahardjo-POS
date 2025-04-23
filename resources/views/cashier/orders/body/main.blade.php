<x-cashier.app-layout>
    <x-slot name="header">
        @include('cashier.orders.body.navbar')
    </x-slot>
    <x-slot name="content">
         <div class="content-page">
            @yield('container')
        </div>
    </x-slot>
     <x-slot name="bottomNav">
        @include('cashier.dashboard.body.bottom-nav')
    </x-slot>
</x-cashier.app-layout>