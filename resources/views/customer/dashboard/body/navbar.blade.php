<!-- resources/views/components/customer/navbar.blade.php -->
<nav class="fixed top-0 left-0 right-0 max-w-xl mx-auto bg-white shadow p-4">
    <div class="max-w-7xl mx-auto flex justify-around">
        <!-- Logo/nama aplikasi -->
        <div>
            <a href="" class="text-xl font-bold text-gray-800">
                MyApp
            </a>
        </div>
        <!-- Menu navigasi -->
        <div class="space-x-4">
            <a href="" class="text-gray-700 hover:text-gray-900">Dashboard</a>
            <a href="" class="text-gray-700 hover:text-gray-900">Profile</a>
            <a href="" class="text-gray-700 hover:text-gray-900">Orders</a>
            <a href="" class="text-gray-700 hover:text-gray-900"
               onclick="">
                Logout
            </a>
        </div>
    </div>

    <!-- Form logout tersembunyi jika diperlukan -->
    <form id="logout-form" action="" method="POST" class="hidden">
        @csrf
    </form>
</nav>
