@props(['produk'])
<div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
    <div class="h-56 w-full">
        <a href="{{ route('products.show', $produk) }}">
            <img class="mx-auto h-full dark:hidden" src="{{ asset($produk->thumbnail) }}" alt="" />
            <img class="mx-auto hidden h-full dark:block"
                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="" />
        </a>
    </div>
    <div class="pt-6">
        <div class="mb-4 flex items-center justify-between gap-4">
            <span
                class="me-2 rounded bg-wood-200 px-2.5 py-0.5 text-xs font-medium text-wood-800 dark:bg-wood-900 dark:text-wood-300">
                Diskon {{ round((($produk->price - $produk->sale_price) / $produk->price) * 100) }} % </span>

            <div class="flex items-center justify-end gap-1">

                {{-- <button type="button" data-tooltip-target="tooltip-quick-look"
                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only"> Quick look </span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
                <div id="tooltip-quick-look" role="tooltip"
                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                    data-popper-placement="top">
                    Quick look
                    <div class="tooltip-arrow" data-popper-arrow=""></div>
                </div>

                <button type="button" data-tooltip-target="tooltip-add-to-favorites"
                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only"> Add to Favorites </span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                    </svg>
                </button>
                <div id="tooltip-add-to-favorites" role="tooltip"
                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                    data-popper-placement="top">
                    Add to favorites
                    <div class="tooltip-arrow" data-popper-arrow=""></div>
                </div> --}}

            </div>
        </div>

        <a href="{{ route('products.show', $produk) }}"
            class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $produk->name }}</a>

        <div class="mt-2 flex items-center gap-2">
            {{-- <div class="flex items-center">
                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                </svg>

                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                </svg>

                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                </svg>

                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                </svg>

                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                </svg>
            </div> --}}
            <x-rating :rating="$produk->rating_average" />
            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $produk->rating_average }}</p>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">({{ $produk->rating_count }})</p>
        </div>

        <ul class="mt-2 flex items-center gap-4">
            <li class="flex items-center gap-2">
                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m7.171 12.906-2.153 6.411 2.672-.89 1.568 2.34 1.825-5.183m5.73-2.678 2.154 6.411-2.673-.89-1.568 2.34-1.825-5.183M9.165 4.3c.58.068 1.153-.17 1.515-.628a1.681 1.681 0 0 1 2.64 0 1.68 1.68 0 0 0 1.515.628 1.681 1.681 0 0 1 1.866 1.866c-.068.58.17 1.154.628 1.516a1.681 1.681 0 0 1 0 2.639 1.682 1.682 0 0 0-.628 1.515 1.681 1.681 0 0 1-1.866 1.866 1.681 1.681 0 0 0-1.516.628 1.681 1.681 0 0 1-2.639 0 1.681 1.681 0 0 0-1.515-.628 1.681 1.681 0 0 1-1.867-1.866 1.681 1.681 0 0 0-.627-1.515 1.681 1.681 0 0 1 0-2.64c.458-.361.696-.935.627-1.515A1.681 1.681 0 0 1 9.165 4.3ZM14 9a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                </svg>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Best Seller</p>
            </li>

            <li class="flex items-center gap-2">
                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                </svg>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Best Price</p>
            </li>
        </ul>

        <div class="mt-4 flex items-center">
            <span class="text-sm text-gray-400 line-through">
                {{ 'Rp. ' . number_format($produk->price, 0, ',', '.') }}
            </span>
            <p class="text-medium ml-4 font-bold leading-tight text-gray-900 dark:text-white">
                {{ 'Rp ' . number_format($produk->sale_price, 0, ',', '.') }}
            </p>
        </div>
        <div class="mt-4 flex items-center">
            <button type="button"
                class="whatsapp-buy-btn inline-flex w-full justify-center items-center rounded-lg bg-wood-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-wood-800 focus:outline-none focus:ring-4 focus:ring-wood-300 dark:bg-wood-600 dark:hover:bg-wood-700 dark:focus:ring-wood-800"
                data-product-name="{{ $produk->name }}" data-product-url="{{ url()->current() }}"
                data-wa-number="{{ config('app.whatsapp_number', '628123456789') }}"
                data-qty-target="quantity-input-{{ $produk->id }}">
                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="current" viewBox="0 0 32 32">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16.001 3C8.82 3 3 8.82 3 16c0 2.58.75 5.1 2.17 7.26L3 29l5.91-2.11A12.94 12.94 0 0 0 16 29c7.18 0 13-5.82 13-13S23.18 3 16.001 3zm0 23.63c-2.16 0-4.27-.58-6.11-1.69l-.44-.26-3.5 1.25 1.29-3.41-.29-.47A10.6 10.6 0 0 1 5.37 16c0-5.86 4.77-10.63 10.63-10.63S26.63 10.14 26.63 16s-4.76 10.63-10.63 10.63zm5.83-7.97c-.32-.16-1.88-.93-2.17-1.04-.29-.11-.5-.16-.71.16-.21.32-.82 1.04-1.01 1.25-.18.21-.37.24-.69.08-.32-.16-1.34-.49-2.55-1.56-.94-.84-1.58-1.87-1.76-2.18-.18-.32-.02-.49.14-.65.14-.14.32-.37.48-.55.16-.19.21-.32.32-.53.11-.21.05-.4-.03-.56-.08-.16-.71-1.72-.97-2.35-.26-.63-.53-.55-.71-.56h-.61c-.21 0-.56.08-.85.4-.29.32-1.12 1.09-1.12 2.66s1.15 3.09 1.31 3.3c.16.21 2.26 3.45 5.47 4.83.76.33 1.36.53 1.83.68.77.25 1.47.22 2.02.13.62-.09 1.88-.77 2.15-1.52.26-.75.26-1.39.18-1.52-.08-.13-.29-.21-.61-.37z" />
                </svg>
                Beli Via Whatsapp
            </button>
        </div>
    </div>
</div>
