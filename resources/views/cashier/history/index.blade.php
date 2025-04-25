@extends('cashier.dashboard.body.main')

@section('container')
    <!-- Main content -->
    <main class="flex-1 p-4 overflow-y-auto">
      <h2 class="font-extrabold text-lg mb-3">List Orders</h2>

      <section class="space-y-4 max-h-[70vh] overflow-y-auto pr-2">
        <!-- Order 1 -->
        <article class="border border-gray-200 rounded-lg p-3 bg-white shadow-sm flex flex-col gap-3">
          <div class="flex justify-between items-center">
            <h3 class="font-semibold text-base">Order #001</h3>
            <span class="text-xs text-gray-500">12 Apr 2025, 14:30</span>
          </div>
          <div class="flex justify-between font-semibold text-sm text-gray-700">
            <span>3 items</span>
            <span>Rp 95.000</span>
          </div>
          <div class="flex gap-3">
            <button class="flex-1 bg-gray-200 text-gray-700 rounded py-1 text-xs font-semibold hover:bg-gray-300">
              Lihat Detail
            </button>
            <button class="flex-1 bg-red-500 text-white rounded py-1 text-xs font-semibold hover:bg-red-600">
              Print Struk
            </button>
          </div>
        </article>

        <!-- Order 2 -->
        <article class="border border-gray-200 rounded-lg p-3 bg-white shadow-sm flex flex-col gap-3">
          <div class="flex justify-between items-center">
            <h3 class="font-semibold text-base">Order #002</h3>
            <span class="text-xs text-gray-500">13 Apr 2025, 10:15</span>
          </div>
          <div class="flex justify-between font-semibold text-sm text-gray-700">
            <span>4 items</span>
            <span>Rp 105.000</span>
          </div>
          <div class="flex gap-3">
            <button class="flex-1 bg-gray-200 text-gray-700 rounded py-1 text-xs font-semibold hover:bg-gray-300">
              Lihat Detail
            </button>
            <button class="flex-1 bg-red-500 text-white rounded py-1 text-xs font-semibold hover:bg-red-600">
              Print Struk
            </button>
          </div>
        </article>

        <!-- Order 3 -->
        <article class="border border-gray-200 rounded-lg p-3 bg-white shadow-sm flex flex-col gap-3">
          <div class="flex justify-between items-center">
            <h3 class="font-semibold text-base">Order #003</h3>
            <span class="text-xs text-gray-500">14 Apr 2025, 18:45</span>
          </div>
          <div class="flex justify-between font-semibold text-sm text-gray-700">
            <span>3 items</span>
            <span>Rp 85.000</span>
          </div>
          <div class="flex gap-3">
            <button class="flex-1 bg-gray-200 text-gray-700 rounded py-1 text-xs font-semibold hover:bg-gray-300">
              Lihat Detail
            </button>
            <button class="flex-1 bg-red-500 text-white rounded py-1 text-xs font-semibold hover:bg-red-600">
              Print Struk
            </button>
          </div>
        </article>

        <!-- Order 4 -->
        <article class="border border-gray-200 rounded-lg p-3 bg-white shadow-sm flex flex-col gap-3">
          <div class="flex justify-between items-center">
            <h3 class="font-semibold text-base">Order #004</h3>
            <span class="text-xs text-gray-500">15 Apr 2025, 09:00</span>
          </div>
          <div class="flex justify-between font-semibold text-sm text-gray-700">
            <span>1 item</span>
            <span>Rp 100.000</span>
          </div>
          <div class="flex gap-3">
            <button class="flex-1 bg-gray-200 text-gray-700 rounded py-1 text-xs font-semibold hover:bg-gray-300">
              Lihat Detail
            </button>
            <button class="flex-1 bg-red-500 text-white rounded py-1 text-xs font-semibold hover:bg-red-600">
              Print Struk
            </button>
          </div>
        </article>

        <!-- Order 5 -->
        <article class="border border-gray-200 rounded-lg p-3 bg-white shadow-sm flex flex-col gap-3">
          <div class="flex justify-between items-center">
            <h3 class="font-semibold text-base">Order #005</h3>
            <span class="text-xs text-gray-500">15 Apr 2025, 12:30</span>
          </div>
          <div class="flex justify-between font-semibold text-sm text-gray-700">
            <span>3 items</span>
            <span>Rp 115.000</span>
          </div>
          <div class="flex gap-3">
            <button class="flex-1 bg-gray-200 text-gray-700 rounded py-1 text-xs font-semibold hover:bg-gray-300">
              Lihat Detail
            </button>
            <button class="flex-1 bg-red-500 text-white rounded py-1 text-xs font-semibold hover:bg-red-600">
              Print Struk
            </button>
          </div>
        </article>
      </section>
    </main>
      
@endsection
