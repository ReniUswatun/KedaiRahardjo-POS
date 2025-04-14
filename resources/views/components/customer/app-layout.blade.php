<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') 
</head>
<body class="bg-gray-100">

    <!-- Container utama untuk membatasi lebar dan center -->
    <div class="max-w-xl mx-auto min-h-screen bg-white shadow-md">
        <header>
            <div class="bg-gray-800 text-white p-4">
                {{ $header }}
            </div>
        </header>
        <main>
            <div class="p-4">
                {{ $content }}
            </div>
        </main>
        <bottom>
            <div class="bg-gray-800 text-white p-4 text-center">
                {{$bottomNav}}
            </div>
        </bottom>
    </div>

</body>
</html>
