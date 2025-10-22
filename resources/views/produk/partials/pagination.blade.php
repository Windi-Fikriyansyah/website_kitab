@if (count($produk) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($produk as $book)
            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <!-- Badge -->
                @if (isset($book['is_new']) && $book['is_new'])
                    <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                        Baru
                    </div>
                @endif

                <!-- Product Image - Lazy Loading -->
                <div class="bg-gradient-to-br from-gray-100 to-gray-200 h-64 flex items-center justify-center relative">
                    @if (isset($book['images'][0]))
                        <img src="{{ $book['images'][0] }}" alt="{{ $book['judul'] }}" loading="lazy"
                            class="w-full h-full object-contain p-4 hover:scale-105 transition-transform duration-300">
                    @else
                        <i class="fas fa-book-open text-5xl text-gray-400"></i>
                    @endif

                    <!-- Quick View Button -->
                    <div
                        class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-10 flex items-center justify-center opacity-0 hover:opacity-100 transition-all duration-300">
                        <a href="{{ route('produk.detail', $book['id']) }}"
                            class="bg-white text-primary-600 font-medium py-2 px-4 rounded-full shadow-md hover:bg-primary-600 hover:text-white transition-colors">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="p-4">
                    <span class="inline-block text-xs font-semibold text-primary-600 mb-1">
                        {{ $book['kategori'] ?? 'Kitab Islam' }}
                    </span>
                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">
                        Stok: {{ $book['stok'] ?? 0 }}
                    </span>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1 truncate">{{ $book['judul'] }}</h3>
                    <p class="text-sm text-gray-500 mb-2">
                        {{ $book['penulis'] ?? 'Penulis tidak diketahui' }}</p>

                    <!-- Action Buttons -->
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('produk.detail', $book['id']) }}"
                            class="flex-1 bg-primary-600 hover:bg-primary-700 text-white py-2 px-4 rounded-lg transition-colors text-center text-sm">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </a>
                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg transition-colors">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <!-- Empty State -->
    <div class="bg-white rounded-xl shadow-sm p-12 text-center">
        <i class="fas fa-book-open text-5xl text-gray-400 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Produk tidak tersedia</h3>
        <p class="text-gray-500 mb-6">Maaf, kami tidak menemukan produk yang sesuai dengan kriteria Anda.</p>
        <a href="{{ route('produk.semua') }}" class="text-primary-600 hover:text-primary-800 font-medium">
            <i class="fas fa-sync-alt mr-1"></i> Reset Filter
        </a>
    </div>
@endif
