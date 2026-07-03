@if ($promotions->isNotEmpty())
<section class="bg-white px-4 py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl">
        <div class="relative overflow-hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="promo-slider">

            {{-- Slides wrapper --}}
            <div class="flex transition-transform duration-500 ease-in-out" id="promo-slider-track">
                @foreach ($promotions as $promotion)
                <div class="w-full flex-shrink-0 grid p-4 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16">
                    <div class="lg:col-span-5 lg:mt-0">
                        <a href="{{ $promotion->display_link }}">
                            <img class="mb-4 h-56 w-56 sm:h-96 sm:w-96 md:h-full md:w-full object-contain"
                                src="{{ $promotion->display_image }}" alt="{{ $promotion->title }}">
                        </a>
                    </div>
                    <div class="me-auto place-self-center lg:col-span-7">
                        <h1 class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl">
                            {{ $promotion->title }}
                        </h1>

                        @if ($promotion->discount_amount)
                            <p class="mb-2 text-lg font-semibold text-wood-700">
                                Hemat Rp{{ number_format($promotion->discount_amount, 0, ',', '.') }}
                            </p>
                        @elseif ($promotion->discount_percent)
                            <p class="mb-2 text-lg font-semibold text-wood-700">
                                Diskon {{ $promotion->discount_percent }}%
                            </p>
                        @endif

                        <p class="mb-6 text-gray-500 dark:text-gray-400">
                            {{ $promotion->description }}
                        </p>

                        <a href="{{ $promotion->display_link }}"
                            class="inline-flex items-center justify-center rounded-lg bg-wood-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-wood-800 focus:ring-4 focus:ring-wood-300 dark:focus:ring-wood-900">
                            {{ $promotion->button_text }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Prev/Next arrows --}}
            @if ($promotions->count() > 1)
            <button type="button" id="promo-prev"
                class="absolute top-1/2 left-2 -translate-y-1/2 flex items-center justify-center w-10 h-10 rounded-full bg-white/80 hover:bg-white shadow dark:bg-gray-700/80 dark:hover:bg-gray-700">
                <svg class="w-5 h-5 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button type="button" id="promo-next"
                class="absolute top-1/2 right-2 -translate-y-1/2 flex items-center justify-center w-10 h-10 rounded-full bg-white/80 hover:bg-white shadow dark:bg-gray-700/80 dark:hover:bg-gray-700">
                <svg class="w-5 h-5 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            {{-- Dots indicator --}}
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2" id="promo-dots">
                @foreach ($promotions as $index => $promotion)
                <button type="button" 
                    class="promo-dot w-2.5 h-2.5 rounded-full {{ $index === 0 ? 'bg-wood-700' : 'bg-gray-300 dark:bg-gray-600' }}" 
                    data-slide-to="{{ $index }}">
                </button>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</section>
@endif