<x-customer.app-layout>
    <x-slot name="header">
        @include('customer.dashboard.body.navbar')
    </x-slot>
    <x-slot name="content">
         <div class="content-page">
            @yield('container')
        </div>
    </x-slot>
     <x-slot name="bottomNav">
        @include('customer.dashboard.body.bottom-nav')
    </x-slot>
</x-customer.app-layout>