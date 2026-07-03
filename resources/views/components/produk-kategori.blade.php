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
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Categories</h2>
                <nav class="flex flex-row lg:flex-col flex-wrap gap-2 lg:gap-1">
                    <a href="#" class="bg-indigo-50 text-indigo-700 px-3 py-2 rounded-md text-sm font-medium">All
                        Products</a>
                    <a href="#"
                        class="text-gray-600 hover:bg-gray-50 px-3 py-2 rounded-md text-sm font-medium">Electronics</a>
                    <a href="#"
                        class="text-gray-600 hover:bg-gray-50 px-3 py-2 rounded-md text-sm font-medium">Apparel</a>
                    <a href="#"
                        class="text-gray-600 hover:bg-gray-50 px-3 py-2 rounded-md text-sm font-medium">Home &
                        Kitchen</a>
                    <a href="#"
                        class="text-gray-600 hover:bg-gray-50 px-3 py-2 rounded-md text-sm font-medium">Accessories</a>
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

                    {{ $products->links() }}
                </div>
            </main>
        </div>
    </div>
</div>
