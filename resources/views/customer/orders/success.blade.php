<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Berhasil Melakukan Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') <!-- Pastikan Tailwind CSS terhubung dengan benar -->
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white shadow-xl rounded-2xl p-8 max-w-md w-full text-center">
        <div class="flex justify-center mb-4">
            <svg class="w-20 h-20 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <h1 class="text-2xl font-semibold text-gray-800 mb-2">Pembayaran Berhasil!</h1>
        <p class="text-gray-600 mb-6">Terima kasih, pesanan Anda telah diproses. Silakan tunggu pesanan Anda disiapkan oleh tim kami.</p>

        <a href="{{ route('customer.index') }}"
           class="inline-block px-6 py-3 bg-green-600 text-black font-medium rounded-lg shadow hover:bg-green-700 transition">
            Kembali ke Dashboard
        </a>
    </div>

</body>
</html>
