<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body class="bg-gray-100">

    <!-- Container utama untuk membatasi lebar dan center -->
    <div class="max-w-xl mx-auto min-h-screen bg-white shadow-md p-4">
        <header>
            <div>
                {{ $header }}
            </div>
        </header>
        <main>
            <div class="mt-14 pt-3">
                {{ $content }}
            </div>
        </main>
        <bottom>
            <div>
                {{$bottomNav}}
            </div>
        </bottom>
    </div>

</body>
</html>
