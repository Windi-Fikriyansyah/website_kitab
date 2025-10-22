@extends('layouts.app')

@section('title', $seo['title'] ?? 'Semua Produk Kitab Arab | Dar Ibnu Abbas')

@section('meta')
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta name="description"
        content="{{ $seo['description'] ?? 'Lihat koleksi lengkap kitab Arab kami dari berbagai disiplin ilmu Islam.' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'kitab arab, buku islam, koleksi kitab, fiqh, hadits, tafsir' }}">
    <meta name="author" content="Dar Ibnu Abbas">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['canonical'] ?? url('/produk') }}">
    <meta property="og:title" content="{{ $seo['title'] ?? 'Semua Produk Kitab Arab | Dar Ibnu Abbas' }}">
    <meta property="og:description"
        content="{{ $seo['description'] ?? 'Lihat koleksi lengkap kitab Arab kami dari berbagai disiplin ilmu Islam.' }}">
    <meta property="og:image" content="{{ $seo['og_image'] ?? asset('images/og-image-produk.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $seo['canonical'] ?? url('/produk') }}">
    <meta property="twitter:title" content="{{ $seo['title'] ?? 'Semua Produk Kitab Arab | Dar Ibnu Abbas' }}">
    <meta property="twitter:description"
        content="{{ $seo['description'] ?? 'Lihat koleksi lengkap kitab Arab kami dari berbagai disiplin ilmu Islam.' }}">
    <meta property="twitter:image" content="{{ $seo['og_image'] ?? asset('images/og-image-produk.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ $seo['canonical'] ?? url('/produk') }}" />
@endsection

@section('content')
    <!-- Product Listing Section -->
    <section class="pt-2 md:pt-4 pb-6 md:pb-10">

        <div class="container mx-auto px-4">
            <!-- Header Section - Mobile Optimized -->
            <div class="flex flex-col gap-4 mb-6 md:mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ __('messages.semua_produk') }}</h1>

                <!-- Search Box - Full width on mobile -->
                <div class="w-full">
                    <form action="{{ route('produk.semua') }}" method="GET" id="search-form">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Cari kitab..."
                                value="{{ $searchQuery ?? '' }}"
                                class="w-full pl-10 pr-4 py-3 md:py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 text-base">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <!-- Hidden inputs to preserve filters during search -->
                        @if (!empty($selectedCategories))
                            @foreach ($selectedCategories as $category)
                                <input type="hidden" name="categories[]" value="{{ $category }}">
                            @endforeach
                        @endif
                        @if (!empty($selectedAuthors))
                            @foreach ($selectedAuthors as $author)
                                <input type="hidden" name="authors[]" value="{{ $author }}">
                            @endforeach
                        @endif
                        @if (!empty($selectedPublishers))
                            @foreach ($selectedPublishers as $publisher)
                                <input type="hidden" name="publishers[]" value="{{ $publisher }}">
                            @endforeach
                        @endif
                        @if (!empty($selectedHarakat))
                            @foreach ($selectedHarakat as $harakat)
                                <input type="hidden" name="harakat[]" value="{{ $harakat }}">
                            @endforeach
                        @endif
                        @if (!empty($selectedCovers))
                            @foreach ($selectedCovers as $cover)
                                <input type="hidden" name="covers[]" value="{{ $cover }}">
                            @endforeach
                        @endif
                    </form>
                </div>

                <!-- Mobile Filter Toggle Button -->
                <button id="mobile-filter-toggle"
                    class="lg:hidden w-full bg-primary-600 text-white py-3 px-4 rounded-lg flex items-center justify-center gap-2 font-medium">
                    <i class="fas fa-filter"></i>
                    <span>Filter Produk</span>
                    <i class="fas fa-chevron-down" id="filter-toggle-icon"></i>
                </button>
            </div>

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
                <!-- Sidebar Filters - Mobile Responsive -->
                <div class="lg:w-1/4">
                    <div id="filter-sidebar"
                        class="hidden lg:block bg-white p-4 md:p-6 rounded-lg shadow-sm lg:sticky lg:top-4">
                        <h3 class="font-semibold text-lg mb-4 flex items-center justify-between">
                            <span>Filter Produk</span>
                            <a href="{{ route('produk.semua') }}"
                                class="text-sm text-primary-600 hover:text-primary-800">Reset</a>
                        </h3>

                        <!-- Main Filter Form -->
                        <form id="filter-form" method="GET" action="{{ route('produk.semua') }}">
                            <!-- Preserve search query -->
                            @if (!empty($searchQuery))
                                <input type="hidden" name="search" value="{{ $searchQuery }}">
                            @endif

                            <!-- Kategori Filter -->
                            <div class="mb-6">
                                <h4 class="font-medium mb-3 flex items-center justify-between cursor-pointer filter-toggle">
                                    <span>Kategori</span>
                                    <i class="fas fa-chevron-up text-xs"></i>
                                </h4>
                                <div class="filter-content">
                                    <div class="space-y-2 max-h-48 overflow-y-auto">
                                        @foreach ($kategoris as $kategori)
                                            <div class="flex items-center">
                                                <input id="filter-category-{{ $kategori->id }}" type="checkbox"
                                                    name="categories[]" value="{{ $kategori->nama_arab }}"
                                                    class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500 filter-checkbox"
                                                    {{ in_array($kategori->nama_arab, $selectedCategories ?? []) ? 'checked' : '' }}>
                                                <label for="filter-category-{{ $kategori->id }}"
                                                    class="ml-2 text-sm text-gray-700 cursor-pointer">
                                                    {{ $kategori->nama_arab }}
                                                    @if (!empty($kategori->nama_indonesia))
                                                        <span
                                                            class="text-xs text-gray-500 block">{{ $kategori->nama_indonesia }}</span>
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Penulis Filter -->
                            <div class="mb-6">
                                <h4 class="font-medium mb-3 flex items-center justify-between cursor-pointer filter-toggle">
                                    <span>Penulis</span>
                                    <i class="fas fa-chevron-up text-xs"></i>
                                </h4>
                                <div class="filter-content space-y-2 max-h-48 overflow-y-auto">
                                    @foreach ($authors as $author)
                                        <div class="flex items-center">
                                            <input id="filter-author-{{ $author->id }}" type="checkbox"
                                                name="authors[]" value="{{ $author->nama_arab }}"
                                                class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500 filter-checkbox"
                                                {{ in_array($author->nama_arab, $selectedAuthors ?? []) ? 'checked' : '' }}>
                                            <label for="filter-author-{{ $author->id }}"
                                                class="ml-2 text-sm text-gray-700 cursor-pointer">
                                                {{ $author->nama_arab }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Penerbit Filter -->
                            <div class="mb-6">
                                <h4
                                    class="font-medium mb-3 flex items-center justify-between cursor-pointer filter-toggle">
                                    <span>Penerbit</span>
                                    <i class="fas fa-chevron-up text-xs"></i>
                                </h4>
                                <div class="filter-content space-y-2 max-h-48 overflow-y-auto">
                                    @foreach ($publishers as $publisher)
                                        <div class="flex items-center">
                                            <input id="filter-publisher-{{ $publisher->id }}" type="checkbox"
                                                name="publishers[]" value="{{ $publisher->nama_arab }}"
                                                class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500 filter-checkbox"
                                                {{ in_array($publisher->nama_arab, $selectedPublishers ?? []) ? 'checked' : '' }}>
                                            <label for="filter-publisher-{{ $publisher->id }}"
                                                class="ml-2 text-sm text-gray-700 cursor-pointer">
                                                {{ $publisher->nama_arab }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Harakat Filter -->
                            <div class="mb-6">
                                <h4
                                    class="font-medium mb-3 flex items-center justify-between cursor-pointer filter-toggle">
                                    <span>Harakat</span>
                                    <i class="fas fa-chevron-up text-xs"></i>
                                </h4>
                                <div class="filter-content space-y-2">
                                    @foreach ($harakatList as $haraka)
                                        <div class="flex items-center">
                                            <input id="filter-harakat-{{ $haraka->id }}" type="checkbox"
                                                name="harakat[]" value="{{ $haraka->nama_arab }}"
                                                class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500 filter-checkbox"
                                                {{ in_array($haraka->nama_arab, $selectedHarakat ?? []) ? 'checked' : '' }}>
                                            <label for="filter-harakat-{{ $haraka->id }}"
                                                class="ml-2 text-sm text-gray-700 cursor-pointer">
                                                {{ $haraka->nama_arab }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Cover Filter -->
                            <div class="mb-6">
                                <h4
                                    class="font-medium mb-3 flex items-center justify-between cursor-pointer filter-toggle">
                                    <span>Jenis Cover</span>
                                    <i class="fas fa-chevron-up text-xs"></i>
                                </h4>
                                <div class="filter-content space-y-2">
                                    @foreach ($covers as $cover)
                                        <div class="flex items-center">
                                            <input id="filter-cover-{{ $cover->id }}" type="checkbox" name="covers[]"
                                                value="{{ $cover->nama_arab }}"
                                                class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500 filter-checkbox"
                                                {{ in_array($cover->nama_arab, $selectedCovers ?? []) ? 'checked' : '' }}>
                                            <label for="filter-cover-{{ $cover->id }}"
                                                class="ml-2 text-sm text-gray-700 cursor-pointer">
                                                {{ $cover->nama_arab }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Mobile Filter Apply Button -->
                            <div class="lg:hidden mt-6 flex gap-3">
                                <button type="submit"
                                    class="flex-1 bg-primary-600 text-white py-3 px-4 rounded-lg font-medium">
                                    Terapkan Filter
                                </button>
                                <button type="button" id="close-mobile-filter"
                                    class="px-4 py-3 border border-gray-300 rounded-lg text-gray-700">
                                    Tutup
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="lg:w-3/4">
                    @if (count($produk) > 0)
                        <!-- Product Count -->
                        <div
                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 md:mb-6 gap-2">
                            <p class="text-sm text-gray-600">
                                Menampilkan {{ ($page - 1) * $perPage + 1 }}-{{ min($page * $perPage, $totalProduk) }}
                                dari {{ $totalProduk }} produk
                            </p>
                        </div>

                        <!-- Product Cards Grid - Responsive -->
                        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6">
                            @foreach ($produk as $book)
                                <div
                                    class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300 relative">
                                    <!-- Badge -->
                                    @if (isset($book['is_new']) && $book['is_new'])
                                        <div
                                            class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                                            Baru
                                        </div>
                                    @endif

                                    <!-- Product Image -->
                                    <div
                                        class="bg-gradient-to-br from-gray-100 to-gray-200 h-48 sm:h-56 md:h-64 flex items-center justify-center relative">
                                        @if (isset($book['images'][0]))
                                            <img src="{{ $book['images'][0] }}" alt="{{ $book['judul'] }}"
                                                loading="lazy"
                                                class="w-full h-full object-contain p-2 md:p-4 hover:scale-105 transition-transform duration-300">
                                        @else
                                            <i class="fas fa-book-open text-3xl md:text-5xl text-gray-400"></i>
                                        @endif

                                        <!-- Quick View Button -->
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-30 flex items-center justify-center opacity-0 hover:opacity-100 transition-all duration-300">
                                            <button onclick="openImageModal('{{ $book['images'][0] ?? '' }}')"
                                                class="w-10 h-10 md:w-12 md:h-12 flex items-center justify-center rounded-full bg-white/80 text-primary-600 shadow-lg
                       hover:bg-primary-600 hover:text-white hover:scale-110 transition-all duration-300">
                                                <i class="fas fa-search-plus text-sm md:text-lg"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Product Details -->
                                    <div class="p-3 md:p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="inline-block text-xs font-semibold text-primary-600">
                                                {{ $book['kategori'] ?? 'Kitab Islam' }}
                                            </span>
                                        </div>

                                        <h3
                                            class="text-sm md:text-lg font-semibold text-gray-800 mb-1 line-clamp-2 leading-tight">
                                            {{ $book['judul'] }}
                                            @if (!empty($book['judul_indo']))
                                                <span
                                                    class="block text-xs md:text-sm text-gray-600 font-normal">({{ $book['judul_indo'] }})</span>
                                            @endif
                                        </h3>

                                        <p class="text-xs md:text-sm text-gray-500 mb-2 line-clamp-1">
                                            {{ $book['penulis'] ?? 'Penulis tidak diketahui' }}
                                        </p>

                                        <p class="text-xs text-gray-400 mb-3">
                                            {{ $book['penerbit'] }}
                                        </p>

                                        <!-- Action Buttons - Mobile Optimized -->
                                        <div class="mt-3 md:mt-4 flex flex-col space-y-2">
                                            <!-- Tombol Detail -->
                                            <a href="{{ route('produk.detail', ['id' => $book['id'], 'slug' => Str::slug($book['judul_indo'] ?? ($book['judul'] ?? ''))]) }}"
                                                class="w-full bg-primary-600 hover:bg-primary-700 text-white py-2 px-3 md:px-4 rounded-lg transition-colors text-center text-xs md:text-sm font-medium">
                                                <i class="fas fa-eye mr-1"></i> Detail
                                            </a>

                                            <!-- Tombol Pesan Sekarang -->
                                            <a href="https://wa.me/62895806109754?text=Saya%20tertarik%20dengan%20produk%20{{ urlencode($book['judul']) }}%20di%20Dar Ibnu Abbas"
                                                target="_blank"
                                                class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-3 md:px-4 rounded-lg transition-colors text-center text-xs md:text-sm font-medium">
                                                <i class="fab fa-whatsapp mr-1"></i> Pesan Via WhatsApp
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination - Mobile Optimized -->
                        @if ($totalProduk > $perPage)
                            <div class="mt-6 md:mt-8 flex justify-center">
                                <nav class="inline-flex rounded-md shadow-sm">
                                    @php
                                        $queryParams = request()->query();
                                        $totalPages = ceil($totalProduk / $perPage);
                                        $currentPage = $page;
                                        $startPage = max(1, $currentPage - 1);
                                        $endPage = min($totalPages, $currentPage + 1);
                                    @endphp

                                    <!-- Previous Page Link -->
                                    @if ($currentPage > 1)
                                        @php $queryParams['page'] = $currentPage - 1; @endphp
                                        <a href="{{ route('produk.semua') }}?{{ http_build_query($queryParams) }}"
                                            class="px-2 md:px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                                            <i class="fas fa-chevron-left text-sm"></i>
                                        </a>
                                    @endif

                                    <!-- First Page Link -->
                                    @if ($startPage > 1)
                                        @php $queryParams['page'] = 1; @endphp
                                        <a href="{{ route('produk.semua') }}?{{ http_build_query($queryParams) }}"
                                            class="px-2 md:px-4 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 text-sm">
                                            1
                                        </a>
                                        @if ($startPage > 2)
                                            <span
                                                class="px-2 md:px-4 py-2 border border-gray-300 bg-white text-gray-500 text-sm">...</span>
                                        @endif
                                    @endif

                                    <!-- Page Number Links -->
                                    @for ($i = $startPage; $i <= $endPage; $i++)
                                        @php $queryParams['page'] = $i; @endphp
                                        <a href="{{ route('produk.semua') }}?{{ http_build_query($queryParams) }}"
                                            class="px-2 md:px-4 py-2 border border-gray-300 bg-white text-sm {{ $i == $currentPage ? 'text-primary-600 font-medium bg-primary-50' : 'text-gray-500 hover:bg-gray-50' }}">
                                            {{ $i }}
                                        </a>
                                    @endfor

                                    <!-- Last Page Link -->
                                    @if ($endPage < $totalPages)
                                        @if ($endPage < $totalPages - 1)
                                            <span
                                                class="px-2 md:px-4 py-2 border border-gray-300 bg-white text-gray-500 text-sm">...</span>
                                        @endif
                                        @php $queryParams['page'] = $totalPages; @endphp
                                        <a href="{{ route('produk.semua') }}?{{ http_build_query($queryParams) }}"
                                            class="px-2 md:px-4 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 text-sm">
                                            {{ $totalPages }}
                                        </a>
                                    @endif

                                    <!-- Next Page Link -->
                                    @if ($currentPage < $totalPages)
                                        @php $queryParams['page'] = $currentPage + 1; @endphp
                                        <a href="{{ route('produk.semua') }}?{{ http_build_query($queryParams) }}"
                                            class="px-2 md:px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                                            <i class="fas fa-chevron-right text-sm"></i>
                                        </a>
                                    @endif
                                </nav>
                            </div>
                        @endif
                    @else
                        <!-- Empty State -->
                        <div class="bg-white rounded-xl shadow-sm p-8 md:p-12 text-center">
                            <i class="fas fa-book-open text-4xl md:text-5xl text-gray-400 mb-4"></i>
                            <h3 class="text-lg md:text-xl font-semibold text-gray-700 mb-2">Produk tidak tersedia</h3>
                            <p class="text-sm md:text-base text-gray-500 mb-6">Maaf, kami tidak menemukan produk yang
                                sesuai dengan kriteria Anda.</p>
                            <a href="{{ route('produk.semua') }}"
                                class="text-primary-600 hover:text-primary-800 font-medium">
                                <i class="fas fa-sync-alt mr-1"></i> Reset Filter
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    <!-- Featured Categories -->
    <section class="bg-gray-50 py-8 md:py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-xl md:text-2xl font-bold text-center text-gray-900 mb-6 md:mb-8">
                {{ __('messages.kategori_populer') }}
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
                @foreach ($topCategories as $cat)
                    <a href="{{ route('produk.semua', ['categories[]' => $cat->kategori_indo]) }}"
                        class="group relative overflow-hidden rounded-lg h-24 md:h-32">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-primary-600 to-primary-800 opacity-90 group-hover:opacity-100 transition-opacity">
                        </div>
                        <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                            alt="{{ $cat->kategori_indo }}" class="w-full h-full object-cover">

                        <div class="absolute inset-0 flex items-center justify-center flex-col text-white p-2">
                            <i class="fas fa-book text-xl md:text-3xl mb-1 md:mb-2"></i>
                            <h3 class="font-bold text-sm md:text-lg text-center">{{ $cat->kategori_indo }}</h3>
                            <span class="text-xs opacity-0 group-hover:opacity-100 transition-opacity hidden md:block">
                                {{ $cat->total }} Produk
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-80 hidden items-center justify-center z-50 p-4">
        <span class="absolute top-4 right-6 md:top-5 md:right-8 text-white text-2xl md:text-3xl cursor-pointer"
            onclick="closeImageModal()">&times;</span>
        <img id="modalImage" src=""
            class="max-h-[85vh] max-w-[85vw] md:max-h-[90vh] md:max-w-[90vw] rounded-lg shadow-lg" />
    </div>
@endsection

@section('scripts')
    <script>
        function openImageModal(src) {
            if (!src) return;
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
            // Prevent body scroll when modal is open
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.remove('flex');
            document.getElementById('imageModal').classList.add('hidden');
            // Restore body scroll
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside the image
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Filter Toggle
            const mobileFilterToggle = document.getElementById('mobile-filter-toggle');
            const filterSidebar = document.getElementById('filter-sidebar');
            const closeMobileFilter = document.getElementById('close-mobile-filter');
            const filterToggleIcon = document.getElementById('filter-toggle-icon');

            if (mobileFilterToggle && filterSidebar) {
                mobileFilterToggle.addEventListener('click', function() {
                    filterSidebar.classList.toggle('hidden');
                    filterSidebar.classList.toggle('block');

                    // Toggle icon
                    if (filterSidebar.classList.contains('hidden')) {
                        filterToggleIcon.classList.remove('fa-chevron-up');
                        filterToggleIcon.classList.add('fa-chevron-down');
                    } else {
                        filterToggleIcon.classList.remove('fa-chevron-down');
                        filterToggleIcon.classList.add('fa-chevron-up');
                        // Scroll to filter section on mobile
                        filterSidebar.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            }

            if (closeMobileFilter && filterSidebar) {
                closeMobileFilter.addEventListener('click', function() {
                    filterSidebar.classList.add('hidden');
                    filterSidebar.classList.remove('block');
                    filterToggleIcon.classList.remove('fa-chevron-up');
                    filterToggleIcon.classList.add('fa-chevron-down');
                });
            }

            // Toggle filter sections
            document.querySelectorAll('.filter-toggle').forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');

                    if (content.style.display === 'none' || content.style.display === '') {
                        content.style.display = 'block';
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-up');
                    } else {
                        content.style.display = 'none';
                        icon.classList.remove('fa-chevron-up');
                        icon.classList.add('fa-chevron-down');
                    }
                });
            });

            // Handle filter checkbox changes
            document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Add loading state
                    document.body.style.cursor = 'wait';

                    // Submit the form
                    document.getElementById('filter-form').submit();
                });
            });

            // Handle search form submission
            document.getElementById('search-form').addEventListener('submit', function(e) {
                // Add loading state
                document.body.style.cursor = 'wait';
            });

            // Add cursor pointer to labels
            document.querySelectorAll('label[for^="filter-"]').forEach(label => {
                label.style.cursor = 'pointer';
            });

            // Close mobile filter when clicking outside
            document.addEventListener('click', function(e) {
                if (window.innerWidth < 1024 && filterSidebar && !filterSidebar.classList.contains(
                        'hidden')) {
                    if (!filterSidebar.contains(e.target) && !mobileFilterToggle.contains(e.target)) {
                        filterSidebar.classList.add('hidden');
                        filterSidebar.classList.remove('block');
                        filterToggleIcon.classList.remove('fa-chevron-up');
                        filterToggleIcon.classList.add('fa-chevron-down');
                    }
                }
            });
        });
    </script>

    <style>
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Loading state */
        body[style*="cursor: wait"] * {
            pointer-events: none;
        }

        /* Mobile filter overlay */
        @media (max-width: 1023px) {
            #filter-sidebar:not(.hidden) {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 50;
                background: white;
                overflow-y: auto;
                padding: 1rem;
                margin: 0;
            }
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>
@endsection
