@extends('layouts.main')

@section('content')
    @props(['products'])
    <div class="bg-gray-50 min-h-screen">
        <!-- Header -->
        <header class="bg-wood-200 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900">Koleksi Kami</h2>
            </div>
        </header>

        <!-- Main Content Layout -->
        <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Sidebar Categories -->
                <aside
                    class="lg:w-64 shrink-0 lg:sticky lg:top-8 self-start bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Kategori</h2>
                    <nav class="flex flex-row lg:flex-col flex-wrap gap-2 lg:gap-1">
                        <div class="relative inline-block">
                            <a href="{{ route('products.index') }}"
                                class="relative inline-flex items-center gap-1.5 bg-wood-50 text-gray-600 px-3 py-2 rounded-md text-sm font-medium hover:bg-wood-100 transition-colors {{ request()->routeIs('products.index') && !request()->filled('category') ? 'ring-2 ring-wood-300' : '' }}">Semua
                                Produk
                                <span
                                    class="bg-wood-500 text-white text-xs rounded-full min-w-[18px] h-[18px] px-1 flex items-center justify-center leading-none">
                                    {{ $totalProducts ?? $categories->sum('products_count') }}
                                </span>
                            </a>
                        </div>

                        @foreach ($categories as $kat)
                            <a href="{{ route('products.index', ['category' => $kat->slug]) }}"
                                class="relative inline-flex items-center gap-1.5 px-3 py-2 rounded-md text-sm font-medium transition-colors
        {{ request('category') === $kat->slug
            ? 'bg-wood-50 text-wood-700 ring-2 ring-wood-300'
            : 'text-gray-600 hover:bg-gray-50' }}">
                                {{ $kat->name }}
                                <span
                                    class="bg-wood-500 text-white text-xs rounded-full min-w-[18px] h-[18px] px-1 flex items-center justify-center leading-none">
                                    {{ $kat->products_count > 99 ? '99+' : $kat->products_count }}
                                </span>
                            </a>
                        @endforeach


                    </nav>
                </aside>

                <!-- Product Grid -->
                <main class="flex-1">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                        @forelse ($products as $produk)
                            <x-produk-card :produk="$produk" />
                        @empty
                            <p>Tidak di temukan produk yang anda cari</p>
                        @endforelse
                       
                    </div>
                    <div class="mt-4 justify-end px-4">
                         {{ $products->links('vendor.pagination.simple-tailwind') }}
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
