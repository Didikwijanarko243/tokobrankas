      <nav class="bg-white shadow-sm sticky top-0 z-10">
          <div class="max-w-6xl mx-auto px-6">
              <input type="checkbox" id="menu-toggle" class="peer hidden">
              <div class="flex items-center justify-between h-16">

                  <!-- Logo -->
                  <a href="#" class="flex items-center gap-3">
                      <svg width="40" height="40" viewBox="0 0 56 56" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <rect x="10" y="4" width="36" height="7" rx="3" fill="#C8A97A" />
                          <rect x="10" y="10" width="5" height="26" rx="2.5" fill="#8B6F47" />
                          <rect x="41" y="10" width="5" height="26" rx="2.5" fill="#8B6F47" />
                          <rect x="12" y="22" width="32" height="18" rx="3" fill="#A0785A" />
                          <rect x="12" y="22" width="32" height="5" rx="2" fill="#C8A97A" />
                          <rect x="12" y="38" width="8" height="14" rx="3" fill="#8B6F47" />
                          <rect x="36" y="38" width="8" height="14" rx="3" fill="#8B6F47" />
                          <rect x="10" y="36" width="36" height="6" rx="3" fill="#8B6F47" />
                      </svg>
                      <div class="flex flex-col leading-tight">
                          <span class="text-xl font-bold text-wood-900"
                              style="font-family: Georgia, serif; letter-spacing: 1px;">Naima</span>
                          <span class="text-xs font-medium text-wood-600 tracking-widest">FURNITURE</span>
                      </div>
                  </a>

                  <!-- Menu desktop -->
                  <div class="hidden md:flex items-center gap-8">
                      <a href="#" class="text-wood-600 hover:text-wood-500 transition-colors">Beranda</a>
                      <a href="#" class="text-wood-600 hover:text-wood-500 transition-colors">Produk</a>
                      <a href="#" class="text-wood-600 hover:text-wood-500 transition-colors">Tentang</a>
                      <a href="#" class="text-wood-600 hover:text-wood-500 transition-colors">Kontak</a>
                  </div>

                  <!-- Kanan: search + cart + hamburger -->
                  <div class="flex items-center gap-4">

                      <!-- Search -->
                      <div class="relative hidden sm:block">
                          <span class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none text-wood-400">
                              <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <circle cx="11" cy="11" r="7" />
                                  <line x1="16.5" y1="16.5" x2="22" y2="22" />
                              </svg>
                          </span>
                          <input type="search" name="search" placeholder="Cari kebutuhan anda.."
                              class="h-9 pl-9 pr-4 w-52 text-sm text-wood-700 bg-wood-100
                   border border-wood-200 rounded-xl outline-none
                   focus:border-wood-400 focus:ring-2 focus:ring-wood-200
                   placeholder:text-wood-300 transition duration-200" />
                      </div>

                      <!-- Cart -->
                      <button class="relative p-1">
                          <svg class="w-6 h-6 text-wood-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
                          </svg>
                          <span
                              class="absolute -top-1 -right-1 bg-wood-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center leading-none">3</span>
                      </button>

                      <!-- Hamburger animasi -->
                      <label for="menu-toggle" class="md:hidden cursor-pointer p-1 group">
                          <div class="w-6 flex flex-col gap-[5px] transition-all duration-300">
                              <span
                                  class="block h-[2px] w-6 bg-wood-700 rounded-full transition-all duration-300
                         peer-checked:[label>div>&]:rotate-45 peer-checked:[label>div>&]:translate-y-[7px]
                         origin-center
                         group-has-[input:checked]:rotate-45 group-has-[input:checked]:translate-y-[7px]"></span>
                              <span
                                  class="block h-[2px] w-6 bg-wood-700 rounded-full transition-all duration-300
                         group-has-[input:checked]:opacity-0 group-has-[input:checked]:scale-x-0"></span>
                              <span
                                  class="block h-[2px] w-6 bg-wood-700 rounded-full transition-all duration-300
                         origin-center
                         group-has-[input:checked]:-rotate-45 group-has-[input:checked]:-translate-y-[7px]"></span>
                          </div>
                      </label>

                  </div>
              </div>

              <!-- Menu mobile -->
              <div
                  class="overflow-hidden max-h-0 peer-checked:max-h-96 transition-all duration-300 ease-in-out md:hidden">
                  <div class="flex flex-col gap-1 pb-4 pt-2 border-t border-wood-100">

                      <!-- Search mobile -->
                      <div class="relative sm:hidden mb-2">
                          <span class="absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none text-wood-400">
                              <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round">
                                  <circle cx="11" cy="11" r="7" />
                                  <line x1="16.5" y1="16.5" x2="22" y2="22" />
                              </svg>
                          </span>
                          <input type="search" placeholder="Cari kebutuhan anda.."
                              class="w-full h-9 pl-9 pr-4 text-sm text-wood-700 bg-base-50
                   border border-wood-200 rounded-xl outline-none
                   focus:border-wood-400 focus:ring-2 focus:ring-wood-200
                   placeholder:text-wood-300 transition duration-200" />
                      </div>

                      <a href="#"
                          class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-wood-700 hover:bg-wood-100 hover:text-wood-500 transition-colors font-medium">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                          </svg>
                          Beranda
                      </a>
                      <a href="#"
                          class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-wood-700 hover:bg-wood-100 hover:text-wood-500 transition-colors font-medium">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                          </svg>
                          Produk
                      </a>
                      <a href="#"
                          class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-wood-700 hover:bg-wood-100 hover:text-wood-500 transition-colors font-medium">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          Tentang
                      </a>
                      <a href="#"
                          class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-wood-700 hover:bg-wood-100 hover:text-wood-500 transition-colors font-medium">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                          </svg>
                          Kontak
                      </a>
                  </div>
              </div>

          </div>
      </nav>
