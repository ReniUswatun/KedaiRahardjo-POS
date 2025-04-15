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
        {{ $slot }}
    </div>

</body>
</html>
