<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Customer App' }} | {{ config('app.name') }}</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <style>
        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #fff;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            padding: 0.5rem 0;
            z-index: 50;
        }
        .bottom-nav a {
            text-align: center;
            flex: 1;
            color: #555;
            font-size: 0.9rem;
        }
        .bottom-nav a.active {
            color: #007bff;
            font-weight: bold;
        }
        body {
            padding-bottom: 60px;
        }
    </style>
</head>
<body class="bg-gray-200 min-h-screen m-10">

    <!-- Kontainer Tengah -->
    <div class="w-full max-w-sm bg-white min-h-screen flex flex-col justify-between">
        <!-- Main Content -->
        <main class="p-4 pb-20">
            {{ $slot }}
        </main>

        <!-- Bottom Navigation -->
        <nav class="bottom-nav">
            <a href="{{ route('customer.index') }}" class="{{ request()->routeIs('customer.index') ? 'active' : '' }}">
                🏠<br>Home
            </a>
            <a href="#">
                📋<br>Menu
            </a>
            <a href="#">
                👤<br>Profile
            </a>
        </nav>
    </div>

</body>
</html>
