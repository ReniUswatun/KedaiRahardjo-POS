<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kedai Rahardjo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-800 pb-16 overflow-hidden">
  <!-- Container utama dengan maksimum lebar mobile -->
  <div class="fixed inset-0 m-auto max-w-md w-full bg-white min-h-screen shadow-md relative">
    <!-- Header -->
    <div class="p-4">
      <h1 class="text-xl font-semibold text-red-600">Kedai Rahardjo</h1>
      <p class="text-sm text-gray-500">alamat kedai</p>
    </div>

    <!-- Sliding Carousel -->
    <div x-data="{ 
        activeSlide: 0, 
        slides: [
          '{{ asset('assets/images/carousel1.jpg') }}',
          '{{ asset('assets/images/carousel2.jpg') }}',
          '{{ asset('assets/images/carousel3.jpg') }}'
        ],
        interval: null,
        init() {
          this.autoSlide();
        },
        autoSlide() {
          this.interval = setInterval(() => {
            this.nextSlide();
          }, 3000);
        },
        stopAutoSlide() {
          clearInterval(this.interval);
        },
        prevSlide() {
          this.activeSlide = this.activeSlide === 0 ? this.slides.length - 1 : this.activeSlide - 1;
        },
        nextSlide() {
          this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        }
      }" 
      class="w-full px-4 mt-2"
      @mouseenter="stopAutoSlide()"
      @mouseleave="autoSlide()">
      
      <!-- Carousel Container -->
      <div class="relative w-full mx-auto rounded-xl overflow-hidden" style="aspect-ratio: 16/9;">
        <!-- Sliding Images Container -->
        <div 
          class="flex transition-transform duration-500 h-full"
          :style="`transform: translateX(-${activeSlide * 100}%);`">
          
          <!-- Individual Slides -->
          <template x-for="(slide, index) in slides" :key="index">
            <div class="w-full h-full flex-shrink-0">
              <img 
                :src="slide" 
                class="w-full h-full object-cover"
                alt="Promo Image"
              />
            </div>
          </template>
        </div>

        <!-- Navigation Arrows -->
        <button @click.prevent="prevSlide()" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/60 rounded-full p-1 shadow-md z-10">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button @click.prevent="nextSlide()" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/60 rounded-full p-1 shadow-md z-10">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>

        <!-- Dots -->
        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-1 z-10">
          <template x-for="(slide, index) in slides" :key="index">
            <button
              @click="activeSlide = index"
              class="w-2 h-2 rounded-full transition-colors"
              :class="activeSlide === index ? 'bg-red-600' : 'bg-gray-300'"
            ></button>
          </template>
        </div>
      </div>
    </div>

    <!-- Menu Kategori -->
    <div class="px-4 mt-6 mb-4">
      <h2 class="text-lg font-bold">Menu Kategori</h2>
      <div class="grid grid-cols-2 gap-4 mt-4">

        <!-- Makanan -->
        <a href="/menu/makanan" class="flex flex-col items-center justify-center bg-red-50 p-4 rounded-xl shadow-sm hover:bg-red-100 transition">
          <img src="https://img.icons8.com/ios/50/FA5252/rice-bowl.png" class="w-10 h-10" />
          <p class="text-red-600 mt-2 font-medium">Makanan</p>
        </a>

        <!-- Minuman -->
        <div class="flex flex-col items-center justify-center bg-red-50 p-4 rounded-xl shadow-sm">
          <img src="https://img.icons8.com/ios/50/FA5252/soda-cup.png" class="w-10 h-10" />
          <p class="text-red-600 mt-2 font-medium">Minuman</p>
        </div>

        <!-- Snack -->
        <div class="flex flex-col items-center justify-center bg-red-50 p-4 rounded-xl shadow-sm">
          <img src="https://img.icons8.com/ios/50/FA5252/french-fries.png" class="w-10 h-10" />
          <p class="text-red-600 mt-2 font-medium">Snack</p>
        </div>

        <!-- Paket -->
        <div class="flex flex-col items-center justify-center bg-red-50 p-4 rounded-xl shadow-sm">
          <img src="https://img.icons8.com/external-konkapp-detailed-outline-konkapp/64/FA5252/external-takeaway-cafe-konkapp-detailed-outline-konkapp.png" class="w-10 h-10" />
          <p class="text-red-600 mt-2 font-medium">Paket</p>
        </div>

      </div>
    </div>
    
    <!-- Bottom Navigation -->
    <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-200 flex justify-around py-2 shadow-lg"
        x-data="{ activeTab: 'home' }">
      <div class="w-full flex justify-around">
        <!-- Beranda -->
        <button 
          class="flex flex-col items-center transition-colors"
          :class="activeTab === 'home' ? 'text-red-600' : 'text-gray-400 hover:text-red-500'"
          @click="activeTab = 'home'">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10h6v-6h4v6h6V10"/>
          </svg>
          <span class="text-xs">Beranda</span>
        </button>
        <!-- Menu -->
        <button 
          class="flex flex-col items-center transition-colors"
          :class="activeTab === 'menu' ? 'text-red-600' : 'text-gray-400 hover:text-red-500'"
          @click="activeTab = 'menu'">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <span class="text-xs">Menu</span>
        </button>
      </div>
    </div>
  </div>

</body>
</html>