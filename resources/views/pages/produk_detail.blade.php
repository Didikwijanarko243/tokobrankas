@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 py-4">

        <div>
            <img id="main-image" src="{{ asset($product->thumbnail) }}" class="w-full rounded-xl shadow-md object-cover">

            <div class="flex gap-3 mt-4">
                @foreach ($product->gallery as $item)
                    <img src="{{ $item }}"
                        class="thumbnail w-20 h-20 object-cover rounded-lg border-2 border-transparent hover:border-blue-600 cursor-pointer {{ $loop->first ? 'border-blue-600' : '' }}"
                        data-full="{{ $item }}">
                @endforeach
            </div>
        </div>


        <div>
            <h1 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h1>
            <p class="text-sm text-gray-500 mt-1">({{ $product->rating_count }} Ulasan) ·
                Terjual {{ $product->rating_count }}+</p>
            <div class="mt-2">
                <span
                    class="me-2 rounded bg-wood-200 px-2.5 py-0.5 text-xs font-medium text-wood-800 dark:bg-wood-900 dark:text-wood-300">
                    Diskon {{ round((($product->price - $product->sale_price) / $product->price) * 100) }} % </span>
            </div>

            <div class="mt-4">
                <span class="text-gray-400 line-through">{{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}</span>
                <span
                    class="text-3xl font-bold text-gray-900 ml-2">{{ 'Rp. ' . number_format($product->sale_price, 0, ',', '.') }}</span>
            </div>

            <p class="text-gray-600 mt-4 leading-relaxed">
                {{ $product->description }}
            </p>

            <div class="mt-6">
                <p class="text-sm font-medium text-gray-700 mb-2">Dimensi</p>
                <p class="text-sm font-medium text-gray-700 mb-2">P 125cm x L 100cm x T 110cm</p>
                {{-- <div class="flex gap-2">
                    <button
                        class="w-12 h-12 border-2 border-gray-200 rounded-lg hover:border-blue-600 transition-colors">38</button>
                    <button
                        class="w-12 h-12 border-2 border-blue-600 bg-blue-50 text-blue-600 rounded-lg font-semibold">39</button>
                    <button
                        class="w-12 h-12 border-2 border-gray-200 rounded-lg hover:border-blue-600 transition-colors">40</button>
                    <button
                        class="w-12 h-12 border-2 border-gray-200 rounded-lg hover:border-blue-600 transition-colors">41</button>
                </div> --}}
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium text-gray-700 mb-2">Berat</p>
                <p class="text-sm font-medium text-gray-700 mb-2">980kg</p>
                {{-- <div class="flex gap-2">
                    <button
                        class="w-12 h-12 border-2 border-gray-200 rounded-lg hover:border-blue-600 transition-colors">38</button>
                    <button
                        class="w-12 h-12 border-2 border-blue-600 bg-blue-50 text-blue-600 rounded-lg font-semibold">39</button>
                    <button
                        class="w-12 h-12 border-2 border-gray-200 rounded-lg hover:border-blue-600 transition-colors">40</button>
                    <button
                        class="w-12 h-12 border-2 border-gray-200 rounded-lg hover:border-blue-600 transition-colors">41</button>
                </div> --}}
            </div>

            <div class="flex items-center gap-4 mt-8">
                <div class="flex items-center border border-gray-300 rounded-lg w-fit" id="quantity-selector"
                    data-max="{{ $product->stock ?? 99 }}">
                    <button type="button" class="qty-decrement px-4 py-2 text-gray-600 hover:bg-gray-100">−</button>
                    <input type="number" id="quantity-input" value="1" min="1"
                        max="{{ $product->stock ?? 99 }}"
                        class="w-12 text-center px-0 py-2 border-0 focus:ring-0 focus:outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                    <button type="button" class="qty-increment px-4 py-2 text-gray-600 hover:bg-gray-100">+</button>
                </div>
                <button type="button"  data-product-name="{{ $product->name }}"
                    data-product-url="{{ url()->current() }}"
                    data-wa-number="{{ config('app.whatsapp_number', '628123456789') }}"
                    class="whatsapp-buy-btn flex-1 bg-wood-600 hover:bg-wood-700 text-white font-semibold py-3 rounded-lg transition-colors">
                    Beli Via Whatsapp
                </button>
            </div>
        </div>

    </div>
@endsection
