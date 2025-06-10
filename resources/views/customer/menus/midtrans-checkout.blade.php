<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Midtrans</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Midtrans Snap.js -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-2xl p-8 max-w-md w-full text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Pembayaran Pesanan</h1>
        <p class="text-gray-600 mb-6">Klik tombol di bawah untuk melakukan pembayaran melalui Midtrans.</p>

        <button id="pay-button"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200">
            Bayar Sekarang
        </button>

        <div class="mt-6 text-sm text-gray-400">
            Transaksi Anda aman dan dilindungi oleh Midtrans.
        </div>
    </div>

    <script type="text/javascript">
        document.getElementById('pay-button').addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert("Pembayaran sukses!");
                    window.location.href = "/order/success"; // Ganti sesuai kebutuhan
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran...");
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                    console.error(result);
                }
            });
        });
    </script>

</body>
</html>