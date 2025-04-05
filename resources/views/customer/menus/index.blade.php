
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menus') }}
        </h2>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- @foreach ($menus as $menu)
                        <div class="mb-4 p-4 border rounded-lg shadow-sm">
                            <h3 class="text-lg font-bold">{{ $menu->name }}</h3>
                            <p>{{ $menu->description }}</p>
                            <a href="{{ route('customer.menus.show', $menu) }}" class="text-blue-500">View Menu</a>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>