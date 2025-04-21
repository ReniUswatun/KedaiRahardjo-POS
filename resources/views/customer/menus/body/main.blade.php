<x-customer.app-layout>
    <x-slot name="header">
    </x-slot>
    <x-slot name="content">
         <div class="content-page">
            @yield('container')
        </div>
    </x-slot>
    <x-slot name="bottomNav">
    </x-slot>
</x-customer.app-layout>