<!-- resources/views/form.blade.php (misalnya di Laravel) -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu - Kedai Rahardjo</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 overflow-hidden">

  <!-- Container utama -->
  <div class="fixed inset-0 m-auto max-w-md w-full bg-white h-screen shadow-md flex flex-col">

    <!-- Header -->
    <div class="p-4 border-b flex items-center">
      <button onclick="history.back()" class="mr-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <h1 class="text-lg font-semibold">Menu</h1>
    </div>

    <!-- Form (bisa discroll jika panjang) -->
    <div class="flex-1 overflow-y-auto px-4 pt-4 space-y-4">

      <!-- Nama -->
      <div>
        <label class="block text-sm font-medium mb-1">Nama</label>
        <input type="text" placeholder="Masukkan Nama"
          class="w-full border border-red-400 focus:ring-red-500 focus:border-red-500 rounded-md p-3 text-sm shadow-sm placeholder-gray-400" />
      </div>

      <!-- Nomor Meja -->
      <div>
        <label class="block text-sm font-medium mb-1">Nomor Meja</label>
        <input type="text" placeholder="Nomor Meja"
          class="w-full border border-red-400 focus:ring-red-500 focus:border-red-500 rounded-md p-3 text-sm shadow-sm placeholder-gray-400" />
      </div>

      <!-- Catatan -->
      <div>
        <label class="block text-sm font-medium mb-1">Catatan</label>
        <textarea rows="3" placeholder="Opsional"
          class="w-full border border-red-400 focus:ring-red-500 focus:border-red-500 rounded-md p-3 text-sm shadow-sm placeholder-gray-400"></textarea>
      </div>

    </div>

    <!-- Tombol Aksi -->
    <div class="p-4 flex justify-between gap-4 border-t">
      <button class="flex-1 border border-red-500 text-red-500 py-2 rounded-lg font-semibold hover:bg-red-50 transition">Batal</button>
      <button class="flex-1 bg-red-500 text-white py-2 rounded-lg font-semibold hover:bg-red-600 transition">Lanjut</button>
    </div>

  </div>

</body>
</html>