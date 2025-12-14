@extends('layouts.app')


@section('title', $seo['title'] ?? 'Dar Ibnu Abbas - Koleksi Kitab Arab Terlengkap')

@section('meta')
    <meta name="description"
        content="{{ $seo['description'] ?? 'Temukan ribuan kitab Arab terbaik untuk memperdalam ilmu Islam' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'kitab arab, buku islam, fiqh, hadits, tafsir' }}">
    <meta name="author" content="Dar Ibnu Abbas">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['canonical'] ?? url('/') }}">
    <meta property="og:title" content="{{ $seo['title'] ?? 'Dar Ibnu Abbas - Koleksi Kitab Arab Terlengkap' }}">
    <meta property="og:description"
        content="{{ $seo['description'] ?? 'Temukan ribuan kitab Arab terbaik untuk memperdalam ilmu Islam' }}">
    <meta property="og:image" content="{{ $seo['og_image'] ?? asset('images/og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $seo['canonical'] ?? url('/') }}">
    <meta property="twitter:title" content="{{ $seo['title'] ?? 'Dar Ibnu Abbas - Koleksi Kitab Arab Terlengkap' }}">
    <meta property="twitter:description"
        content="{{ $seo['description'] ?? 'Temukan ribuan kitab Arab terbaik untuk memperdalam ilmu Islam' }}">
    <meta property="twitter:image" content="{{ $seo['og_image'] ?? asset('images/og-image.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ $seo['canonical'] ?? url('/') }}" />
@endsection

@section('content')
    <!-- Ganti seluruh section hero dengan kode berikut: -->
    <section class="relative bg-gray-900 overflow-hidden" style="margin-top:0!important;">
        <!-- Carousel Container -->
        <div class="relative hero-mobile w-full" style="height: 100vh;">
            <!-- Carousel Items -->
            <!-- Carousel Items -->
            @if ($hero)
                @if (!empty($hero->hero_image_1))
                    <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0"
                        id="carousel-item-1">
                        <div class="absolute inset-0 bg-black/40 md:bg-transparent"></div>
                        <img src="{{ $hero->hero_image_1 }}" alt="Hero Image 1" class="w-full h-full object-cover">
                    </div>
                @endif

                @if (!empty($hero->hero_image_2))
                    <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0"
                        id="carousel-item-2">
                        <div class="absolute inset-0 bg-black/40 md:bg-transparent"></div>
                        <img src="{{ $hero->hero_image_2 }}" alt="Hero Image 2" class="w-full h-full object-cover">
                    </div>
                @endif
            @endif

            <!-- Content Overlay - Untuk semua device -->
            <!-- Content Overlay - Hidden on desktop, visible on mobile only -->
            <div class="absolute inset-0 flex items-center justify-center md:hidden">
                <div class="container mx-auto px-4 text-center z-10 hero-content-mobile">
                    <h1 class="text-3xl font-bold text-white mb-4 animate-fade-in hero-title-mobile">
                        {{ __('messages.koleksi_kitab') }} <br>
                        <span class="text-[#fde047]">{{ __('messages.terlengkap') }}</span>
                    </h1>
                    <p class="text-lg text-gray-200 max-w-2xl mx-auto mb-8 animate-fade-in hero-subtitle-mobile">
                        {{ __('messages.deskripsi') }}
                    </p>

                    <!-- Mobile CTA Button -->
                    <div class="mt-6 animate-fade-in">
                        <a href="{{ route('produk.semua') }}"
                            class="inline-block bg-[#dfcf9f] hover:bg-[#dfcf9f]/90 text-white font-semibold py-3 px-8 rounded-full transition-colors duration-300">
                            Lihat Koleksi Kitab
                        </a>
                    </div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-2 z-10">
                <button class="carousel-control w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors"
                    data-target="1"></button>
                <button class="carousel-control w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-colors"
                    data-target="2"></button>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-primary-600 mb-4">
                {{ __('messages.koleksi_terbaru') }}</h2>
            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">
                {{ __('messages.koleksi_deskripsi') }}
            </p>

            @if (count($produk) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach (array_slice($produk, 0, 8) as $book)
                        <div
                            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 hover:-translate-y-1">
                            <div class="bg-gradient-to-br from-gray-100 to-gray-200 h-64 relative overflow-hidden">
                                @if (isset($book['images']) && count($book['images']) > 1)
                                    <!-- Carousel for multiple images -->
                                    <div class="product-carousel h-full w-full relative">
                                        @foreach ($book['images'] as $image)
                                            <div
                                                class="absolute inset-0 transition-opacity duration-500 ease-in-out opacity-0">
                                                <img src="{{ $image }}" alt="{{ $book['judul'] }}"
                                                    class="w-full h-full object-contain p-4">
                                            </div>
                                        @endforeach

                                        <!-- Carousel Controls -->
                                        <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
                                            @foreach ($book['images'] as $index => $image)
                                                <button
                                                    class="product-carousel-control w-2 h-2 rounded-full bg-gray-400 hover:bg-gray-600 transition-colors"
                                                    data-target="{{ $index }}"></button>
                                            @endforeach
                                        </div>
                                    </div>
                                @elseif (isset($book['images'][0]))
                                    <!-- Single image -->
                                    <img src="{{ $book['images'][0] }}" alt="{{ $book['judul'] }}"
                                        class="w-full h-full object-contain p-4">
                                @else
                                    <!-- Fallback icon -->
                                    <i
                                        class="fas fa-book-open text-5xl text-gray-400 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></i>
                                @endif
                                @if (isset($book['images'][0]))
                                    <button data-image="{{ $book['images'][0] }}"
                                        class="btn-view-image absolute inset-0 flex items-center justify-center bg-black/40 opacity-0
              group-hover:opacity-100 transition-opacity duration-300">
                                        <div
                                            class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                                            <i class="fas fa-search-plus text-gray-800 text-xl"></i>
                                        </div>
                                    </button>
                                @endif
                            </div>
                            <div class="p-6">
                                <span
                                    class="inline-block text-xs font-semibold uppercase tracking-wider border border-gray-300 rounded-full px-3 py-1 mb-2">
                                    {{ $book['kategori_label'] ?? 'Kitab Islam' }}
                                    @if (!empty($book['subkategori_label']))
                                        <span class="mx-1 text-gray-400">•</span>{{ $book['subkategori_label'] }}
                                    @endif

                                </span>
                                <h3 class="text-lg font-semibold text-gray-800 mt-1 mb-1">{{ $book['judul'] }}</h3>
                                <p class="text-sm text-gray-500 mb-3">
                                    {{ $book['penulis'] ?? 'Penulis tidak diketahui' }}
                                </p>

                                <a href="{{ route('produk.detail', [
                                    'id' => $book['id'],
                                    'slug' => Str::slug($book['judul_indo'] ?? ($book['judul'] ?? '')),
                                ]) }}"
                                    class="block w-full bg-[#dfcf9f] hover:bg-[#dfcf9f]/90 text-white py-2 px-4 rounded-lg transition-colors flex items-center justify-center text-center">
                                    <i class="fas fa-eye mr-2"></i> Lihat Selengkapnya
                                </a>
                                <a href="https://api.whatsapp.com/send?phone=62895806109754&text=<?php echo urlencode('Assalamu\'alaikum, saya mau tanya detail kitab: ' . $book['judul']); ?>"
                                    target="_blank"
                                    class="mt-3 w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition-colors flex items-center justify-center text-center">
                                    <i class="fab fa-whatsapp mr-2"></i> Pesan via WhatsApp
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-book-open text-5xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700">Produk tidak tersedia saat ini</h3>
                    <p class="text-gray-500 mt-2">Silakan coba lagi nanti</p>
                </div>
            @endif

            <div class="text-center mt-12">
                <a href="{{ route('produk.semua') }}"
                    class="border-2 border-primary-600 text-primary-600 hover:bg-primary-600 hover:text-white font-semibold py-3 px-8 rounded-full transition-colors duration-300">
                    {{ __('messages.lihat_semua_produk') }}
                </a>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-primary-600 mb-4">
                {{ __('messages.mengapa_memilih') }}</h2>
            <p class="text-center text-gray-600 max-w-3xl mx-auto mb-12">
                {{ __('messages.mengapa_deskripsi') }}
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow text-center">
                    <div
                        class="w-20 h-20 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-award text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('messages.kualitas_terjamin') }}</h3>
                    <p class="text-gray-600">{{ __('messages.kualitas_terjamin_desc') }}</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow text-center">
                    <div
                        class="w-20 h-20 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shipping-fast text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('messages.pengiriman_cepat') }}</h3>
                    <p class="text-gray-600">{{ __('messages.pengiriman_cepat_desc') }}</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow text-center">
                    <div
                        class="w-20 h-20 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('messages.pelayanan_terbaik') }}</h3>
                    <p class="text-gray-600">{{ __('messages.pelayanan_terbaik_desc') }}</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow text-center">
                    <div
                        class="w-20 h-20 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-certificate text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('messages.terpercaya') }}</h3>
                    <p class="text-gray-600">{{ __('messages.terpercaya_desc') }}</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow text-center">
                    <div
                        class="w-20 h-20 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-book-reader text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('messages.stok_lengkap') }}</h3>
                    <p class="text-gray-600">{{ __('messages.stok_lengkap_desc') }}</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow text-center">
                    <div
                        class="w-20 h-20 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-money-bill-wave text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('messages.harga_terjangkau') }}</h3>
                    <p class="text-gray-600">{{ __('messages.harga_terjangkau_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni & Story Customer Section -->
    <!-- Testimoni & Story Customer Section - ELEGANT VERSION -->
    <section class="bg-gray-50 py-20 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#1d2530]/10 rounded-full -translate-y-48 translate-x-48"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#ffc107]/20 rounded-full translate-y-40 -translate-x-40"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#1d2530] rounded-full mb-6">
                    <i class="fas fa-quote-left text-white text-2xl"></i>
                </div>
                <h2
                    class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-[#1d2530] to-[#6c757d] bg-clip-text text-transparent mb-6">
                    {{ __('messages.testimoni') }}
                </h2>
                <p class="text-xl text-gray-600 font-light leading-relaxed">
                    {{ __('messages.kepuasan') }}
                    <span class="block mt-2 text-lg"> {{ __('messages.tangan_pertama') }}</span>
                </p>
                <div class="w-24 h-1 bg-[#ffc107] mx-auto mt-6 rounded-full"></div>
            </div>

            @if (isset($testimoni) && count($testimoni) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 lg:gap-10">
                    @foreach ($testimoni as $index => $item)
                        <div class="group relative">
                            <!-- Main Card -->
                            <div
                                class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden
                                    border border-gray-100 hover:border-[#dfcf9f] transform hover:-translate-y-2">

                                <!-- Image Container with Overlay -->
                                <div class="relative h-80 overflow-hidden">
                                    <!-- Gradient overlay -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent z-10">
                                    </div>

                                    <!-- Image -->
                                    <img src="{{ $item->foto_unboxing }}" alt="Testimoni {{ $item->nama_customer }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                        loading="lazy">

                                    <!-- Quote icon overlay -->
                                    <div
                                        class="absolute top-6 right-6 w-12 h-12 bg-[#1d2530]/80 backdrop-blur-sm rounded-full
                                           flex items-center justify-center z-20">
                                        <i class="fas fa-quote-right text-white text-lg"></i>
                                    </div>

                                    <!-- Customer name overlay -->
                                    <div class="absolute bottom-6 left-6 right-6 z-20">
                                        <h3 class="text-xl font-bold text-white mb-1 drop-shadow-lg">
                                            {{ $item->nama_customer }}
                                        </h3>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-8">
                                    <!-- Quote -->
                                    <div class="relative">
                                        <i
                                            class="fas fa-quote-left text-3xl text-[#1d2530]/20 absolute -top-2 -left-1"></i>
                                        <p class="text-gray-700 leading-relaxed text-base pl-8 pr-4 italic font-medium">
                                            {{ $item->caption }}
                                        </p>
                                    </div>

                                    <!-- Verified badge -->
                                    <div class="flex items-center justify-center mt-6 pt-6 border-t border-gray-100">
                                        <div class="flex items-center text-green-600 bg-green-50 px-4 py-2 rounded-full">
                                            <i class="fas fa-check-circle mr-2 text-sm"></i>
                                            <span class="text-sm font-semibold">Verified Purchase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating decoration -->
                            <div
                                class="absolute -top-3 -right-3 w-8 h-8 bg-[#ffc107] rounded-full opacity-0
                                    group-hover:opacity-100 transition-opacity duration-300 animate-pulse">
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Call to Action -->
                <div class="text-center mt-16">
                    <div class="inline-flex items-center justify-center p-1 bg-[#1d2530] rounded-full">
                        <a href="https://api.whatsapp.com/send?phone=62895806109754&text=<?php echo urlencode('Assalamu\'alaikum, saya ingin bergabung menjadi pelanggan setia Dar Ibnu Abbas!'); ?>"
                            target="_blank"
                            class="bg-white text-gray-800 hover:bg-gray-50 font-bold py-4 px-8 rounded-full
                              transition-all duration-300 flex items-center shadow-lg hover:shadow-xl">
                            <i class="fab fa-whatsapp text-green-500 mr-3 text-xl"></i>
                            Bergabung Menjadi Pelanggan Setia
                            <i class="fas fa-arrow-right ml-3 text-sm"></i>
                        </a>
                    </div>
                    <p class="text-gray-500 text-sm mt-4">Dapatkan penawaran terbaik dan update produk terbaru</p>
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="relative inline-block">
                        <div
                            class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full
                                flex items-center justify-center mb-8 mx-auto shadow-inner">
                            <i class="fas fa-comments text-5xl text-gray-400"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-[#ffc107] rounded-full animate-bounce">
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-4">Testimoni Segera Hadir</h3>
                    <p class="text-gray-500 max-w-md mx-auto leading-relaxed">
                        Kami sedang mengumpulkan cerita inspiratif dari pelanggan setia.
                        Jadilah yang pertama membagikan pengalaman Anda!
                    </p>
                    <div class="mt-8">
                        <a href="https://api.whatsapp.com/send?phone=62895806109754&text=<?php echo urlencode('Assalamu\'alaikum, saya ingin memberikan testimoni untuk Dar Ibnu Abbas!'); ?>"
                            target="_blank"
                            class="inline-flex items-center bg-[#1d2530] text-white font-semibold py-3 px-6 rounded-full
                              hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Bagikan Testimoni Anda
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Cara Pembelian Section -->
    <!-- Ganti seluruh section Cara Pembelian dengan kode berikut: -->
    <section class="py-20 bg-gradient-pembelian">
        <div class="container mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-600 rounded-full mb-6">
                    <i class="fas fa-shopping-cart text-white text-2xl"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-primary-600 mb-6">
                    {{ __('messages.cara_pembelian') }}
                </h2>
                <p class="text-xl text-gray-600 font-light leading-relaxed">
                    Langkah mudah belanja di Dar Ibnu Abbas Indonesia
                </p>
                <div class="w-24 h-1 bg-gold mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Steps -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-16">
                <!-- Step 1 -->
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div
                            class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto group-hover:shadow-xl transition-shadow duration-300 border-2 border-gold">
                            <i class="fas fa-search text-primary-600 text-2xl"></i>
                        </div>
                        <div
                            class="absolute -top-2 -right-2 w-8 h-8 bg-gold text-primary-600 rounded-full flex items-center justify-center text-sm font-bold">
                            1
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-primary-600 mb-2">Pilih Kitab</h3>
                    <p class="text-gray-600 text-sm">Pilih kitab yang tersedia di katalog kami</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div
                            class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto group-hover:shadow-xl transition-shadow duration-300 border-2 border-gold">
                            <i class="fab fa-whatsapp text-green-500 text-2xl"></i>
                        </div>
                        <div
                            class="absolute -top-2 -right-2 w-8 h-8 bg-gold text-primary-600 rounded-full flex items-center justify-center text-sm font-bold">
                            2
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-primary-600 mb-2">Pesan via WhatsApp</h3>
                    <p class="text-gray-600 text-sm">Klik tombol "Pesan via WhatsApp"</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div
                            class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto group-hover:shadow-xl transition-shadow duration-300 border-2 border-gold">
                            <i class="fas fa-info-circle text-primary-600 text-2xl"></i>
                        </div>
                        <div
                            class="absolute -top-2 -right-2 w-8 h-8 bg-gold text-primary-600 rounded-full flex items-center justify-center text-sm font-bold">
                            3
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-primary-600 mb-2">Detail Stok & Harga</h3>
                    <p class="text-gray-600 text-sm">Admin akan memberikan detail stok & harga</p>
                </div>

                <!-- Step 4 -->
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div
                            class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto group-hover:shadow-xl transition-shadow duration-300 border-2 border-gold">
                            <i class="fas fa-credit-card text-primary-600 text-2xl"></i>
                        </div>
                        <div
                            class="absolute -top-2 -right-2 w-8 h-8 bg-gold text-primary-600 rounded-full flex items-center justify-center text-sm font-bold">
                            4
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-primary-600 mb-2">Konfirmasi & Bayar</h3>
                    <p class="text-gray-600 text-sm">Konfirmasi pesanan dan pilih metode pembayaran</p>
                </div>

                <!-- Step 5 -->
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div
                            class="w-20 h-20 bg-white shadow-lg rounded-full flex items-center justify-center mx-auto group-hover:shadow-xl transition-shadow duration-300 border-2 border-gold">
                            <i class="fas fa-shipping-fast text-primary-600 text-2xl"></i>
                        </div>
                        <div
                            class="absolute -top-2 -right-2 w-8 h-8 bg-gold text-primary-600 rounded-full flex items-center justify-center text-sm font-bold">
                            5
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-primary-600 mb-2">Proses & Kirim</h3>
                    <p class="text-gray-600 text-sm">Pesanan segera diproses & dikirim</p>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 mb-8 border border-gold">
                <div class="flex items-start mb-6">
                    <div
                        class="flex-shrink-0 w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mr-4 border border-amber-300">
                        <i class="fas fa-exclamation-circle text-amber-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-primary-600 mb-4">Catatan Penting</h3>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Note 1 -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 mt-1 border border-blue-300">
                                <i class="fas fa-box text-blue-600 text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary-600 mb-2">Stok Kosong?</h4>
                                <p class="text-gray-600 text-sm">
                                    Jika stok kitab sedang kosong, Anda tetap bisa request kepada admin.
                                    Tim Dar Ibnu Abbas Indonesia akan berusaha mencarikan dari penerbit atau supplier resmi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Note 2 -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <div class="flex items-start">
                            <div
                                class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3 mt-1 border border-green-300">
                                <i class="fas fa-search text-green-600 text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary-600 mb-2">Kitab Tidak Ada?</h4>
                                <p class="text-gray-600 text-sm">
                                    Jika judul yang Anda cari belum ada di katalog, silakan tanyakan melalui WhatsApp.
                                    Kami melayani pencarian khusus kitab langka atau seri tertentu.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Disclaimer -->
                <div class="mt-8 bg-primary-50 rounded-xl p-6 border-l-4 border-primary-600">
                    <div class="flex items-start">
                        <div
                            class="flex-shrink-0 w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center mr-3 mt-1 border border-primary-300">
                            <i class="fas fa-shield-alt text-primary-600 text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary-800 mb-2">Transaksi Terpercaya</h4>
                            <p class="text-primary-700 text-sm">
                                Semua transaksi dilakukan langsung dengan admin resmi Dar Ibnu Abbas melalui WhatsApp.
                                Kami berkomitmen memberikan layanan terbaik untuk kepuasan pelanggan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="text-center">
                <div class="inline-flex items-center justify-center p-1 bg-green-600 rounded-full shadow-lg">
                    <a href="https://api.whatsapp.com/send?phone=62895806109754&text=<?php echo urlencode('Assalamu\'alaikum, saya ingin bertanya tentang cara pembelian kitab di Dar Ibnu Abbas'); ?>" target="_blank"
                        class="bg-white text-primary-600 hover:bg-gray-50 font-bold py-4 px-8 rounded-full
                          transition-all duration-300 flex items-center shadow-lg hover:shadow-xl">
                        <i class="fab fa-whatsapp text-green-500 mr-3 text-xl"></i>
                        Tanya Admin Sekarang
                        <i class="fas fa-arrow-right ml-3 text-sm"></i>
                    </a>
                </div>
                <p class="text-gray-500 text-sm mt-4">Tim customer service siap membantu Anda 24/7</p>
            </div>
        </div>
    </section>
    <!-- Why Choose Dar Ibnu Abbas Section -->

    <!-- Ganti seluruh section Pengiriman dengan kode berikut: -->
    <section class="py-20 bg-gradient-pengiriman">
        <div class="container mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-600 rounded-full mb-6">
                    <i class="fas fa-shipping-fast text-white text-2xl"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-primary-600 mb-6">
                    {{ __('messages.pengiriman') }}
                </h2>
                <p class="text-xl text-gray-600 font-light leading-relaxed">
                    Layanan pengiriman terpercaya ke seluruh Indonesia dan mancanegara
                </p>
                <div class="w-24 h-1 bg-gold mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Shipping Options Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Ekspedisi Reguler -->
                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-200">
                    <div class="bg-gradient-to-br from-primary-500 to-primary-600 p-6 text-white">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-box text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Ekspedisi Reguler</h3>
                        <p class="text-primary-100">Pengiriman standar ke seluruh Indonesia</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Kami bekerja sama dengan jasa pengiriman terpercaya:</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">LION</span>
                            <span
                                class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold">JNE</span>
                            <span
                                class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">J&T</span>
                            <span
                                class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">SiCepat</span>
                            <span
                                class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">POS</span>
                            <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">dll</span>
                        </div>
                    </div>
                </div>

                <!-- Ekspedisi Cargo -->
                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-200">
                    <div class="bg-gradient-to-br from-primary-500 to-primary-600 p-6 text-white">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-truck text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Ekspedisi Cargo</h3>
                        <p class="text-primary-100">Solusi ekonomis untuk pesanan besar</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Untuk pesanan dalam jumlah besar atau kitab berjilid banyak, kami
                            sarankan menggunakan layanan cargo agar lebih ekonomis.</p>
                        <div class="bg-primary-50 rounded-lg p-4 border border-primary-200">
                            <div class="flex items-center text-primary-800">
                                <i class="fas fa-info-circle mr-2"></i>
                                <span class="text-sm font-semibold">Hemat hingga 50% untuk pesanan besar</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- COD LIPIA -->
                <div
                    class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-200">
                    <div class="bg-gradient-to-br from-primary-500 to-primary-600 p-6 text-white">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-handshake text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">COD Kampus LIPIA</h3>
                        <p class="text-primary-100">Khusus mahasiswa LIPIA Jakarta</p>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Khusus mahasiswa/mahasiswi LIPIA, tersedia opsi COD atau pengambilan
                            langsung melalui admin DIBAS.</p>
                        <div class="bg-primary-50 rounded-lg p-4 border border-primary-200">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-primary-600 mr-2 mt-1"></i>
                                <span class="text-sm text-primary-800">Lokasi: Kampus LIPIA, Jakarta Selatan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping Information Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Estimasi Waktu & Tracking -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                    <div class="flex items-start mb-6">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4 border border-blue-300">
                            <i class="fas fa-clock text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-primary-600 mb-2">Estimasi Waktu & Tracking</h3>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Estimasi Waktu -->
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 mt-1 border border-blue-300">
                                    <i class="fas fa-shipping-fast text-blue-600 text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary-600 mb-2">Estimasi Waktu Pengiriman</h4>
                                    <p class="text-gray-600 text-sm mb-3">
                                        Lama pengiriman tergantung kota tujuan:
                                    </p>
                                    <ul class="text-sm text-gray-600 space-y-1">
                                        <li class="flex items-center">
                                            <i class="fas fa-check-circle text-green-500 mr-2 text-xs"></i>
                                            Domestik: ±1–5 hari kerja
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-globe text-blue-500 mr-2 text-xs"></i>
                                            Internasional: Berbeda sesuai negara
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Nomor Resi -->
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3 mt-1 border border-green-300">
                                    <i class="fas fa-barcode text-green-600 text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary-600 mb-2">Nomor Resi Otomatis</h4>
                                    <p class="text-gray-600 text-sm">
                                        Setelah pesanan dikirim, nomor resi akan dibagikan otomatis via WhatsApp agar bisa
                                        langsung dilacak.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- International & Proteksi -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                    <div class="flex items-start mb-6">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4 border border-purple-300">
                            <i class="fas fa-globe-asia text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-primary-600 mb-2">International & Proteksi</h3>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Pengiriman Internasional -->
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3 mt-1 border border-purple-300">
                                    <i class="fas fa-plane text-purple-600 text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary-600 mb-2">Pengiriman Internasional</h4>
                                    <p class="text-gray-600 text-sm mb-3">
                                        Dar Ibnu Abbas Indonesia melayani pengiriman ke luar negeri melalui:
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        <span
                                            class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs font-semibold">DHL</span>
                                        <span
                                            class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-xs font-semibold">Aramex</span>
                                        <span
                                            class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-semibold">EMS</span>
                                        <span
                                            class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-semibold">dll</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Proteksi Paket -->
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3 mt-1 border border-green-300">
                                    <i class="fas fa-shield-alt text-green-600 text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-primary-600 mb-2">Proteksi Paket Premium</h4>
                                    <p class="text-gray-600 text-sm mb-3">
                                        Semua kitab dikemas dengan standar khusus Dar Ibnu Abbas Indonesia:
                                    </p>
                                    <ul class="text-xs text-gray-600 space-y-1">
                                        <li class="flex items-center">
                                            <i class="fas fa-check text-green-500 mr-2"></i>
                                            Plastik pelindung
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-check text-green-500 mr-2"></i>
                                            Bubble wrap berkualitas
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-check text-green-500 mr-2"></i>
                                            Kardus tebal anti rusak
                                        </li>
                                        <li class="flex items-center">
                                            <i class="fas fa-plus text-blue-500 mr-2"></i>
                                            Lapisan ekstra (sesuai permintaan)
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pengembalian Section -->
    <section class="py-20 bg-gradient-to-br from-blue-50 to-blue-100">
        <div class="container mx-auto px-4">
            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-600 rounded-full mb-6">
                    <i class="fas fa-undo-alt text-white text-2xl"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-primary-600 mb-6">
                    {{ __('messages.pengembalian') ?? 'Kebijakan Pengembalian' }}
                </h2>
                <p class="text-xl text-gray-600 font-light leading-relaxed">
                    Ketentuan dan prosedur pengembalian produk Dar Ibnu Abbas Indonesia
                </p>
                <div class="w-24 h-1 bg-primary-600 mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Kebijakan Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Cacat Produksi / Salah Kirim -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border-l-4 border-primary-600">
                    <div class="flex items-start mb-6">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mr-4 border border-primary-300">
                            <span class="text-primary-600 text-xl font-bold">📕</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-primary-600 mb-4">Cacat Produksi / Salah Kirim</h3>
                        </div>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="bg-primary-50 rounded-xl p-4 border border-primary-200">
                            <h4 class="font-semibold text-primary-800 mb-2">Kondisi yang Dijamin Ganti:</h4>
                            <ul class="text-sm text-primary-700 space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary-600 mr-2 mt-1 text-xs"></i>
                                    <span>Judul/jilid tidak sesuai pesanan</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary-600 mr-2 mt-1 text-xs"></i>
                                    <span>Kitab ada kesalahan cetak serius (halaman hilang, terbalik, sobek pabrik,
                                        dsb)</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-green-50 rounded-xl p-4 border-l-4 border-green-600">
                        <div class="flex items-center">
                            <i class="fas fa-shield-check text-green-600 mr-2"></i>
                            <span class="font-semibold text-green-800">👉 Pasti kami ganti atau refund.</span>
                        </div>
                    </div>
                </div>

                <!-- Kerusakan Saat Pengiriman -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border-l-4 border-accent">
                    <div class="flex items-start mb-6">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-accent-light rounded-full flex items-center justify-center mr-4 border border-accent">
                            <span class="text-accent-dark text-xl font-bold">📦</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-accent-dark mb-4">Kerusakan Saat Pengiriman</h3>
                        </div>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="bg-accent-light rounded-xl p-4 border border-accent">
                            <h4 class="font-semibold text-accent-dark mb-2">Standar Packing Kami:</h4>
                            <p class="text-sm text-accent-dark mb-3">
                                Semua kitab dipacking dengan standar ketat (bubble wrap, kardus).
                            </p>
                        </div>
                    </div>

                    <div class="bg-yellow-50 rounded-xl p-4 border-l-4 border-yellow-500">
                        <h4 class="font-semibold text-yellow-800 mb-2">Catatan Penting:</h4>
                        <p class="text-sm text-yellow-700">
                            Risiko kecil seperti penyok tipis di ujung cover, penyok ringan pada kardus, atau kusut plastik
                            pembungkus
                            <strong>TIDAK termasuk cacat barang</strong>. Itu konsekuensi wajar dari perjalanan ekspedisi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Batas Waktu & Syarat -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Batas Waktu -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border-l-4 border-blue-600">
                    <div class="flex items-start mb-6">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4 border border-blue-300">
                            <span class="text-blue-600 text-xl font-bold">⏱️</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-600 mb-4">Batas Waktu</h3>
                        </div>
                    </div>

                    <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-2">2×24</div>
                            <div class="text-blue-800 font-semibold mb-3">Jam Setelah Barang Diterima</div>
                            <div class="bg-blue-100 rounded-lg p-3 border border-blue-300">
                                <div class="flex items-center justify-center text-blue-700">
                                    <i class="fas fa-video mr-2"></i>
                                    <span class="text-sm font-semibold">Wajib disertai video unboxing</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tidak Bisa Dikembalikan -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border-l-4 border-secondary-600">
                    <div class="flex items-start mb-6">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-secondary-100 rounded-full flex items-center justify-center mr-4 border border-secondary-300">
                            <span class="text-secondary-600 text-xl font-bold">🚫</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-secondary-600 mb-4">Tidak Bisa Dikembalikan Jika:</h3>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-secondary-50 rounded-xl p-4 border border-secondary-200">
                            <ul class="text-sm text-secondary-700 space-y-3">
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-500 mr-3 mt-1 text-xs"></i>
                                    <span>Hanya karena "cacat minor" (ujung penyok sedikit, dus penyok, dll)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-500 mr-3 mt-1 text-xs"></i>
                                    <span>Buku sudah dibuka, dipakai, atau rusak akibat kelalaian pembeli</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-times-circle text-red-500 mr-3 mt-1 text-xs"></i>
                                    <span>Perubahan keinginan/salah pilih judul</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prosedur Klaim -->
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 border border-primary-200">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-primary-600 mb-4">Prosedur Klaim Pengembalian</h3>
                    <p class="text-gray-600">Langkah mudah untuk mengajukan klaim pengembalian produk</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Step 1 -->
                    <div class="text-center">
                        <div class="relative mb-4">
                            <div
                                class="w-16 h-16 bg-primary-600 rounded-full flex items-center justify-center mx-auto text-white text-xl font-bold">
                                1
                            </div>
                        </div>
                        <h4 class="font-semibold text-primary-600 mb-2">Hubungi Admin</h4>
                        <p class="text-sm text-gray-600">Laporkan masalah via WhatsApp dalam 2×24 jam</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="text-center">
                        <div class="relative mb-4">
                            <div
                                class="w-16 h-16 bg-primary-600 rounded-full flex items-center justify-center mx-auto text-white text-xl font-bold">
                                2
                            </div>
                        </div>
                        <h4 class="font-semibold text-primary-600 mb-2">Kirim Bukti</h4>
                        <p class="text-sm text-gray-600">Kirimkan video unboxing dan foto kerusakan</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="text-center">
                        <div class="relative mb-4">
                            <div
                                class="w-16 h-16 bg-primary-600 rounded-full flex items-center justify-center mx-auto text-white text-xl font-bold">
                                3
                            </div>
                        </div>
                        <h4 class="font-semibold text-primary-600 mb-2">Proses Selesai</h4>
                        <p class="text-sm text-gray-600">Admin akan memproses ganti rugi atau refund</p>
                    </div>
                </div>

                <!-- CTA Button -->

            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-20 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#1d2530]/10 rounded-full -translate-y-48 translate-x-48"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#ffc107]/20 rounded-full translate-y-40 -translate-x-40"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#1d2530] rounded-full mb-6">
                    <i class="fas fa-headset text-white text-2xl"></i>
                </div>
                <h2
                    class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-[#1d2530] to-[#6c757d] bg-clip-text text-transparent mb-6">
                    Bantuan & Refund
                </h2>
                <p class="text-xl text-gray-600 font-light leading-relaxed">
                    Kami hadir untuk memberikan pelayanan terbaik jika terjadi kendala dalam pesanan Anda.
                </p>
                <div class="w-24 h-1 bg-[#ffc107] mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Bantuan -->
                <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                    <h3 class="text-2xl font-semibold text-[#1d2530] mb-4 flex items-center">
                        <i class="fas fa-phone-alt text-[#ffc107] mr-3"></i> 📞 Bantuan Cepat
                    </h3>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Jika ada kendala (barang belum sampai, salah kirim, atau masalah lain),
                        segera hubungi admin resmi <strong>DIBAS</strong> via WhatsApp.
                    </p>
                    <a href="https://api.whatsapp.com/send?phone=62895806109754&text=<?php echo urlencode('Assalamu\'alaikum, saya mengalami kendala dengan pesanan saya. Mohon bantuan admin DIBAS.'); ?>" target="_blank"
                        class="inline-flex items-center bg-[#1d2530] text-white font-semibold py-3 px-6 rounded-full
                          hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fab fa-whatsapp mr-2 text-green-400"></i>
                        Hubungi Admin
                    </a>
                </div>

                <!-- Refund -->
                <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                    <h3 class="text-2xl font-semibold text-[#1d2530] mb-4 flex items-center">
                        <i class="fas fa-money-check-alt text-[#ffc107] mr-3"></i> 💰 Ketentuan Refund
                    </h3>
                    <ul class="list-disc list-inside text-gray-600 leading-relaxed mb-6 space-y-2">
                        <li>Barang tidak tersedia setelah pembayaran.</li>
                        <li>Pesanan gagal terkirim karena faktor dari pihak DIBAS.</li>
                        <li><strong>Refund dilakukan penuh (100%).</strong></li>
                    </ul>

                    <h4 class="text-lg font-semibold text-red-600 mb-2">⛔ Tidak Ada Refund Jika:</h4>
                    <ul class="list-disc list-inside text-gray-600 leading-relaxed mb-6 space-y-2">
                        <li>Barang sudah dikirim sesuai pesanan, namun terlambat/rusak oleh ekspedisi.</li>
                        <li>Pembeli berubah pikiran atau salah pilih judul.</li>
                        <li>Kerusakan minor (penyok sedikit, kusut plastik, dus peyok).</li>
                    </ul>

                    <h4 class="text-lg font-semibold text-[#1d2530] mb-2">🏦 Proses Refund:</h4>
                    <p class="text-gray-600 leading-relaxed">
                        Refund dilakukan melalui transfer bank ke rekening pembeli dalam waktu
                        maksimal <strong>2–3 hari kerja</strong> setelah disetujui.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
                <!-- Judul -->
                <div class="text-center max-w-4xl mx-auto mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-primary-600 mb-6">
                        {{ __('messages.perjalanan_kami') }}
                    </h2>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('messages.perjalanan_paragraf1') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('messages.perjalanan_paragraf2') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('messages.perjalanan_paragraf3') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('messages.perjalanan_paragraf4') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('messages.perjalanan_paragraf5') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('messages.perjalanan_paragraf6') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ __('messages.perjalanan_paragraf7') }}
                    </p>
                </div>

                <!-- Poin Keunggulan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left max-w-3xl mx-auto">
                    <div class="bg-gray-50 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-primary-600 mb-2">📍 {{ __('messages.keunggulan1_title') }}
                        </h3>
                        <p class="text-gray-600">{{ __('messages.keunggulan1_desc') }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-primary-600 mb-2">📖 {{ __('messages.keunggulan2_title') }}
                        </h3>
                        <p class="text-gray-600">{{ __('messages.keunggulan2_desc') }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-primary-600 mb-2">🕌 {{ __('messages.keunggulan3_title') }}
                        </h3>
                        <p class="text-gray-600">{{ __('messages.keunggulan3_desc') }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-primary-600 mb-2">🤝 {{ __('messages.keunggulan4_title') }}
                        </h3>
                        <p class="text-gray-600">{{ __('messages.keunggulan4_desc') }}</p>
                    </div>
                </div>

                <!-- Penutup -->
                <div class="text-center max-w-3xl mx-auto mt-10">
                    <p class="text-gray-700 leading-relaxed font-medium">
                        {!! __('messages.perjalanan_penutup') !!}
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-gray-50 py-20 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#1d2530]/10 rounded-full -translate-y-48 translate-x-48"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#ffc107]/20 rounded-full translate-y-40 -translate-x-40"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#1d2530] rounded-full mb-6">
                    <i class="fas fa-question-circle text-white text-2xl"></i>
                </div>
                <h2
                    class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-[#1d2530] to-[#6c757d] bg-clip-text text-transparent mb-6">
                    FAQ (Pertanyaan Umum)
                </h2>
                <p class="text-xl text-gray-600 font-light leading-relaxed">
                    Jawaban atas pertanyaan yang sering ditanyakan mengenai kitab di DIBAS
                </p>
                <div class="w-24 h-1 bg-[#ffc107] mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- FAQ Accordion -->
            <div class="max-w-4xl mx-auto space-y-6">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <button
                        class="faq-trigger w-full px-8 py-6 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-300 focus:outline-none"
                        data-target="faq1">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-[#1d2530] rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold">Q</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-semibold text-[#1d2530]">
                                Apakah harga dicantumkan di website?
                            </h3>
                        </div>
                        <div class="faq-icon transition-transform duration-300">
                            <i class="fas fa-chevron-down text-[#1d2530] text-xl"></i>
                        </div>
                    </button>

                    <div id="faq1" class="faq-content max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-8">
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 bg-[#ffc107] rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                    <span class="text-[#1d2530] font-bold">A</span>
                                </div>
                                <div class="text-gray-700 space-y-4 leading-relaxed">
                                    <p class="font-semibold text-[#1d2530]">
                                        Tidak. Harga kitab di DIBAS tidak bersifat tetap karena:
                                    </p>
                                    <ul class="space-y-3">
                                        <li class="flex items-start">
                                            <span class="text-lg mr-3">📉</span>
                                            <div>
                                                <strong>Fluktuasi harga impor:</strong> kurs mata uang, ongkos kirim
                                                internasional, dan biaya pajak sering berubah.
                                            </div>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="text-lg mr-3">📚</span>
                                            <div>
                                                <strong>Koleksi langka & terbatas:</strong> banyak kitab turats edisi khusus
                                                atau cetakan langka, sehingga nilainya tidak bisa ditentukan secara baku.
                                            </div>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="text-lg mr-3">🛒</span>
                                            <div>
                                                <strong>Fleksibilitas layanan:</strong> setiap pembelian bisa berbeda
                                                tergantung jumlah, metode kirim, atau permintaan khusus (misal: set lengkap,
                                                paket grosir, atau satuan).
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="bg-[#1d2530]/5 border-l-4 border-[#ffc107] p-4 rounded-r-lg mt-6">
                                        <div class="flex items-start">
                                            <span class="text-lg mr-3">👉</span>
                                            <p class="text-[#1d2530] font-semibold">
                                                Karena itu, <strong>harga hanya dibagikan langsung oleh admin resmi DIBAS
                                                    melalui WhatsApp</strong> agar lebih jelas dan sesuai kondisi terbaru.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <button
                        class="faq-trigger w-full px-8 py-6 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-300 focus:outline-none"
                        data-target="faq2">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-[#1d2530] rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold">Q</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-semibold text-[#1d2530]">
                                Apakah bisa request kitab yang tidak ada di katalog?
                            </h3>
                        </div>
                        <div class="faq-icon transition-transform duration-300">
                            <i class="fas fa-chevron-down text-[#1d2530] text-xl"></i>
                        </div>
                    </button>

                    <div id="faq2" class="faq-content max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-8">
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 bg-[#ffc107] rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                                    <span class="text-[#1d2530] font-bold">A</span>
                                </div>
                                <div class="text-gray-700 space-y-4 leading-relaxed">
                                    <p class="font-semibold text-[#1d2530]">
                                        Bisa! Tim DIBAS akan berusaha mencarikan kitab sesuai permintaan Anda.
                                    </p>
                                    <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                                        <div class="flex items-start">
                                            <span class="text-lg mr-3">✅</span>
                                            <div>
                                                <p class="text-green-800 font-medium mb-2">Layanan Request Khusus:</p>
                                                <ul class="text-green-700 space-y-1 text-sm">
                                                    <li>• Kitab langka atau edisi terbatas</li>
                                                    <li>• Seri kitab tertentu yang belum tersedia</li>
                                                    <li>• Kitab dari penerbit atau pengarang spesifik</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-[#1d2530]/5 border-l-4 border-[#ffc107] p-4 rounded-r-lg">
                                        <div class="flex items-start">
                                            <span class="text-lg mr-3">💬</span>
                                            <p class="text-[#1d2530] font-medium">
                                                Silakan tanyakan via WhatsApp dengan menyebutkan detail judul, pengarang,
                                                atau penerbit yang diinginkan.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <button
                        class="faq-trigger w-full px-8 py-6 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-300 focus:outline-none"
                        data-target="faq4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-[#1d2530] rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold">Q</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-semibold text-[#1d2530]">
                                Apakah ada layanan grosir/partai besar?
                            </h3>
                        </div>
                        <div class="faq-icon transition-transform duration-300">
                            <i class="fas fa-chevron-down text-[#1d2530] text-xl"></i>
                        </div>
                    </button>
                    <div id="faq4" class="faq-content max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-8">
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 bg-[#ffc107] rounded-full flex items-center justify-center mr-4 mt-1">
                                    <span class="text-[#1d2530] font-bold">A</span>
                                </div>
                                <div class="text-gray-700 leading-relaxed">
                                    Ada. Kami melayani pembelian kolektif untuk pesantren, kampus, toko buku, maupun
                                    reseller, dengan harga khusus.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <button
                        class="faq-trigger w-full px-8 py-6 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-300 focus:outline-none"
                        data-target="faq5">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-[#1d2530] rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold">Q</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-semibold text-[#1d2530]">
                                Apakah bisa kirim ke luar negeri?
                            </h3>
                        </div>
                        <div class="faq-icon transition-transform duration-300">
                            <i class="fas fa-chevron-down text-[#1d2530] text-xl"></i>
                        </div>
                    </button>
                    <div id="faq5" class="faq-content max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-8">
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 bg-[#ffc107] rounded-full flex items-center justify-center mr-4 mt-1">
                                    <span class="text-[#1d2530] font-bold">A</span>
                                </div>
                                <div class="text-gray-700 leading-relaxed">
                                    Bisa. Kami menggunakan ekspedisi internasional (DHL, EMS, Aramex, dll). Ongkos kirim
                                    akan diinformasikan setelah detail pesanan masuk.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <button
                        class="faq-trigger w-full px-8 py-6 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-300 focus:outline-none"
                        data-target="faq6">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-[#1d2530] rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold">Q</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-semibold text-[#1d2530]">
                                Bagaimana cara memastikan keaslian produk DIBAS?
                            </h3>
                        </div>
                        <div class="faq-icon transition-transform duration-300">
                            <i class="fas fa-chevron-down text-[#1d2530] text-xl"></i>
                        </div>
                    </button>
                    <div id="faq6" class="faq-content max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-8">
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 bg-[#ffc107] rounded-full flex items-center justify-center mr-4 mt-1">
                                    <span class="text-[#1d2530] font-bold">A</span>
                                </div>
                                <div class="text-gray-700 leading-relaxed">
                                    Semua kitab di DIBAS langsung impor dari penerbit Timur Tengah, dijamin original, bukan
                                    cetakan bajakan.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 7 -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <button
                        class="faq-trigger w-full px-8 py-6 text-left flex items-center justify-between hover:bg-gray-50 transition-colors duration-300 focus:outline-none"
                        data-target="faq7">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-[#1d2530] rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold">Q</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-semibold text-[#1d2530]">
                                Apakah ada jaminan barang pasti sampai?
                            </h3>
                        </div>
                        <div class="faq-icon transition-transform duration-300">
                            <i class="fas fa-chevron-down text-[#1d2530] text-xl"></i>
                        </div>
                    </button>
                    <div id="faq7" class="faq-content max-h-0 overflow-hidden transition-all duration-500">
                        <div class="px-8 pb-8">
                            <div class="flex items-start">
                                <div
                                    class="w-10 h-10 bg-[#ffc107] rounded-full flex items-center justify-center mr-4 mt-1">
                                    <span class="text-[#1d2530] font-bold">A</span>
                                </div>
                                <div class="text-gray-700 leading-relaxed">
                                    InsyaAllah aman. Setelah pengiriman, nomor resi selalu diberikan. Segala
                                    keterlambatan/kerusakan dari ekspedisi berada di luar kendali kami, namun kami selalu
                                    memastikan packing maksimal.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- CTA Section -->
            <div class="text-center mt-16">
                <div class="bg-white rounded-2xl shadow-xl p-8 max-w-2xl mx-auto">
                    <h3 class="text-2xl font-bold text-[#1d2530] mb-4">Masih Ada Pertanyaan?</h3>
                    <p class="text-gray-600 mb-6">
                        Tim customer service DIBAS siap membantu menjawab pertanyaan Anda 24/7
                    </p>
                    <div class="inline-flex items-center justify-center p-1 bg-green-600 rounded-full shadow-lg">
                        <a href="https://api.whatsapp.com/send?phone=62895806109754&text=Assalamu%27alaikum,%20saya%20ingin%20bertanya%20tentang%20DIBAS"
                            target="_blank"
                            class="bg-white text-[#1d2530] hover:bg-gray-50 font-bold py-4 px-8 rounded-full
                              transition-all duration-300 flex items-center shadow-lg hover:shadow-xl">
                            <i class="fab fa-whatsapp text-green-500 mr-3 text-xl"></i>
                            Tanya Admin Sekarang
                            <i class="fas fa-arrow-right ml-3 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Modal Full Image -->
<div id="imageModal" class="fixed inset-0 bg-black/80 flex items-center justify-center hidden"
    style="z-index: 9999;">
    <div class="relative max-w-4xl w-full px-4">
        <button id="closeImageModal"
            class="absolute top-2 right-2 text-white bg-black/60 hover:bg-black/90 rounded-full p-2">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <img id="modalImage" src="" alt="Full Image" class="max-h-[80vh] mx-auto rounded-lg shadow-lg">
    </div>
</div>
@section('style')
    <style>
        /* Hero Section Responsive */
        .hero-mobile {
            height: 100vh;
            min-height: 600px;
        }

        @media (max-width: 768px) {
            .hero-mobile {
                height: 70vh !important;
                min-height: 500px !important;
            }

            .hero-content-mobile {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }

            .hero-title-mobile {
                font-size: 1.75rem !important;
                line-height: 1.2 !important;
                margin-bottom: 1rem !important;
            }

            .hero-subtitle-mobile {
                font-size: 0.9rem !important;
                line-height: 1.4 !important;
                margin-bottom: 1.5rem !important;
            }
        }

        @media (max-width: 640px) {
            .hero-mobile {
                height: 60vh !important;
                min-height: 400px !important;
            }

            .hero-title-mobile {
                font-size: 1.5rem !important;
            }

            .hero-subtitle-mobile {
                font-size: 0.85rem !important;
            }
        }

        @media (max-width: 480px) {
            .hero-mobile {
                height: 50vh !important;
                min-height: 350px !important;
            }
        }

        .faq-content {
            transition: max-height 0.5s ease-in-out;
        }

        .faq-trigger:hover .faq-icon {
            transform: translateX(5px);
        }

        .faq-trigger {
            border: none;
            background: none;
        }

        .faq-trigger:focus {
            outline: 2px solid #ffc107;
            outline-offset: -2px;
        }

        #autocompleteResults {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-top: 8px;
        }

        .autocomplete-item {
            transition: background-color 0.2s ease;
            border-bottom: 1px solid #f1f5f9;
        }

        .autocomplete-item:last-child {
            border-bottom: none;
        }

        .autocomplete-item:hover {
            background-color: #f8fafc;
        }

        .no-results {
            padding: 20px;
            text-align: center;
            color: #6b7280;
            font-style: italic;
        }

        .search-loading {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        /* Memastikan input search responsive */
        @media (max-width: 640px) {
            #searchInput {
                padding: 12px 16px;
                font-size: 16px;
                /* Mencegah zoom di iOS */
            }

            #autocompleteResults {
                width: 100%;
                left: 0;
                right: 0;
            }
        }
    </style>
@endsection
@section('scripts')
    <script>
        // Optimasi hero section untuk mobile
        function optimizeHeroForMobile() {
            const heroSection = document.querySelector('.hero-mobile');
            if (!heroSection) return;

            const isMobile = window.innerWidth < 768;

            if (isMobile) {
                heroSection.style.height = '70vh';
                heroSection.style.minHeight = '500px';
            } else {
                // Reset untuk desktop
                heroSection.style.height = '100vh';
                heroSection.style.minHeight = '600px';
            }
        }

        // Panggil saat load dan resize
        document.addEventListener('DOMContentLoaded', function() {
            optimizeHeroForMobile();
            window.addEventListener('resize', optimizeHeroForMobile);
        });
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const autocompleteResults = document.getElementById('autocompleteResults');
            const searchButton = document.getElementById('searchButton');
            let timeout = null;
            let currentRequest = null;

            // Fungsi untuk menampilkan hasil autocomplete
            function showAutocomplete(results) {
                const resultsContainer = autocompleteResults.querySelector('.max-h-60');

                if (results.length === 0) {
                    resultsContainer.innerHTML = '<div class="no-results">Tidak ada hasil ditemukan</div>';
                    autocompleteResults.classList.remove('hidden');
                    return;
                }

                let html = '';
                results.forEach(product => {
                    const productSlug = slugify(product.judul_indo || product.judul);
                    const productUrl = `/produk/${product.id}/${productSlug}`;

                    html += `
                    <div class="autocomplete-item" data-url="${productUrl}">
                        <div class="flex items-center">
                            <img src="${product.images && product.images[0] ? product.images[0] : '/images/placeholder-book.jpg'}"
                                 alt="${product.judul}" class="w-12 h-12 rounded mr-3">
                            <div class="flex-1 min-w-0">
                                <div class="product-title truncate">${product.judul}</div>
                                <div class="product-author">${product.penulis || 'Penulis tidak diketahui'}</div>
                            </div>
                        </div>
                    </div>
                `;
                });

                resultsContainer.innerHTML = html;
                autocompleteResults.classList.remove('hidden');

                // Tambahkan event listener untuk setiap item
                document.querySelectorAll('.autocomplete-item').forEach(item => {
                    item.addEventListener('click', () => {
                        window.location.href = item.getAttribute('data-url');
                    });
                });
            }

            // Fungsi untuk menampilkan loading state
            function showLoading() {
                const resultsContainer = autocompleteResults.querySelector('.max-h-60');
                resultsContainer.innerHTML = `
                <div class="search-loading">
                    <div class="spinner"></div>
                </div>
            `;
                autocompleteResults.classList.remove('hidden');
            }

            // Fungsi untuk mendapatkan hasil autocomplete
            // Fungsi untuk mendapatkan hasil autocomplete
            function fetchAutocomplete(query) {
                // Batalkan request sebelumnya jika masih pending
                if (currentRequest) {
                    currentRequest.abort();
                }

                if (query.length < 2) {
                    autocompleteResults.classList.add('hidden');
                    return;
                }

                showLoading();

                // Buat AJAX request dengan fetch API (lebih modern)
                currentRequest = new AbortController();
                const signal = currentRequest.signal;

                fetch(`/api/autocomplete?q=${encodeURIComponent(query)}`, {
                        signal: signal,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        showAutocomplete(data);
                        currentRequest = null;
                    })
                    .catch(error => {
                        if (error.name === 'AbortError') {
                            console.log('Request aborted');
                        } else {
                            console.error('Fetch error:', error);
                            autocompleteResults.classList.add('hidden');
                        }
                        currentRequest = null;
                    });
            }

            function showAutocomplete(results) {
                const resultsContainer = autocompleteResults.querySelector('.max-h-60');

                if (!results || results.length === 0) {
                    resultsContainer.innerHTML = '<div class="no-results">Tidak ada hasil ditemukan</div>';
                    autocompleteResults.classList.remove('hidden');
                    return;
                }

                let html = '';
                results.forEach(product => {
                    const title = product.judul_indo || product.judul || 'Judul tidak tersedia';
                    const productSlug = slugify(title);
                    const productUrl = `/produk/${product.id}/${productSlug}`;

                    // Perbaiki URL gambar
                    const imageName = product.images && product.images[0] ? product.images[0] : null;
                    const imageUrl = imageName ? `${imageName}` :
                        '/images/placeholder-book.jpg';

                    const author = product.penulis || 'Penulis tidak diketahui';

                    html += `
        <div class="autocomplete-item" data-url="${productUrl}">
            <div class="flex items-center p-3 hover:bg-gray-50 cursor-pointer">
                <img src="${imageUrl}"
                     alt="${title}"
                     class="w-12 h-16 object-contain rounded mr-3 bg-gray-100">
                <div class="flex-1 min-w-0">
                    <div class="product-title text-sm font-medium text-gray-900 truncate">${title}</div>
                    <div class="product-author text-xs text-gray-500 mt-1">${author}</div>
                    ${product.kategori ? `<div class="text-xs text-primary-600 mt-1">${product.kategori}</div>` : ''}
                </div>
            </div>
        </div>
        `;
                });

                resultsContainer.innerHTML = html;
                autocompleteResults.classList.remove('hidden');

                document.querySelectorAll('.autocomplete-item').forEach(item => {
                    item.addEventListener('click', () => {
                        window.location.href = item.getAttribute('data-url');
                    });
                });
            }

            // Event listener untuk input pencarian (diperbaiki)
            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                const query = this.value.trim();

                if (query.length === 0) {
                    autocompleteResults.classList.add('hidden');
                    return;
                }

                timeout = setTimeout(() => {
                    fetchAutocomplete(query);
                }, 300);
            });

            // Event listener untuk menutup autocomplete saat scroll
            window.addEventListener('scroll', function() {
                if (!autocompleteResults.classList.contains('hidden')) {
                    autocompleteResults.classList.add('hidden');
                }
            }, true);

            // Event listener untuk tombol pencarian
            searchButton.addEventListener('click', function() {
                performSearch(searchInput.value);
            });

            // Event listener untuk tombol enter
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    performSearch(this.value);
                }
            });

            // Fungsi untuk melakukan pencarian
            function performSearch(query) {
                if (query.trim() !== '') {
                    window.location.href = `/produk?search=${encodeURIComponent(query)}`;
                }
            }

            // Sembunyikan autocomplete ketika klik di luar
            document.addEventListener('click', function(e) {
                if (!autocompleteResults.contains(e.target) &&
                    e.target !== searchInput &&
                    !searchButton.contains(e.target)) {
                    autocompleteResults.classList.add('hidden');
                }
            });

            // Helper function untuk membuat slug
            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-') // Ganti spasi dengan -
                    .replace(/[^\w\-]+/g, '') // Hapus semua karakter non-word
                    .replace(/\-\-+/g, '-') // Ganti multiple - dengan single -
                    .replace(/^-+/, '') // Trim - dari awal text
                    .replace(/-+$/, ''); // Trim - dari akhir text
            }

            const faqTriggers = document.querySelectorAll('.faq-trigger');

            faqTriggers.forEach(trigger => {
                trigger.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const content = document.getElementById(targetId);
                    const icon = this.querySelector('.faq-icon i');
                    const allContents = document.querySelectorAll('.faq-content');
                    const allIcons = document.querySelectorAll('.faq-icon i');

                    // Close all other FAQ items
                    allContents.forEach(item => {
                        if (item.id !== targetId) {
                            item.style.maxHeight = '0px';
                        }
                    });

                    // Reset all other icons
                    allIcons.forEach(item => {
                        if (item !== icon) {
                            item.style.transform = 'rotate(0deg)';
                        }
                    });

                    // Toggle current item
                    if (content.style.maxHeight === '0px' || content.style.maxHeight === '') {
                        content.style.maxHeight = content.scrollHeight + 'px';
                        icon.style.transform = 'rotate(180deg)';
                    } else {
                        content.style.maxHeight = '0px';
                        icon.style.transform = 'rotate(0deg)';
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const closeBtn = document.getElementById('closeImageModal');

            // Event klik tombol lihat gambar
            document.querySelectorAll('.btn-view-image').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const imgSrc = this.getAttribute('data-image');
                    modalImage.src = imgSrc;
                    modal.classList.remove('hidden');
                });
            });

            // Event close modal
            closeBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                modalImage.src = "";
            });

            // Klik area luar gambar untuk close
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    modalImage.src = "";
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Carousel functionality - defer non-critical
            setTimeout(() => {
                const items = [
                    document.getElementById('carousel-item-1'),
                    document.getElementById('carousel-item-2')
                ];

                const controls = document.querySelectorAll('.carousel-control');
                let currentIndex = 0;

                // Show first item initially
                if (items[0]) {
                    items[0].classList.add('opacity-100');
                    controls[0]?.classList.remove('bg-white/50');
                    controls[0]?.classList.add('bg-white');
                }

                // Function to show specific slide
                function showSlide(index) {
                    // Hide all slides
                    items.forEach(item => {
                        item?.classList.remove('opacity-100');
                        item?.classList.add('opacity-0');
                    });

                    // Reset all controls
                    controls.forEach(control => {
                        control?.classList.remove('bg-white');
                        control?.classList.add('bg-white/50');
                    });

                    // Show selected slide
                    items[index]?.classList.remove('opacity-0');
                    items[index]?.classList.add('opacity-100');

                    // Highlight selected control
                    controls[index]?.classList.remove('bg-white/50');
                    controls[index]?.classList.add('bg-white');

                    currentIndex = index;
                }

                // Add click event to controls
                controls.forEach((control, index) => {
                    control?.addEventListener('click', () => {
                        showSlide(index);
                    });
                });

                // Auto rotate slides every 5 seconds
                if (items.length > 0) {
                    setInterval(() => {
                        const nextIndex = (currentIndex + 1) % items.length;
                        showSlide(nextIndex);
                    }, 5000);
                }
            }, 500);

            // Product carousels - load after main content
            setTimeout(() => {
                document.querySelectorAll('.product-carousel').forEach(carousel => {
                    const items = carousel.querySelectorAll('div[class*="transition-opacity"]');
                    const controls = carousel.querySelectorAll('.product-carousel-control');
                    let currentIndex = 0;

                    // Show first item initially
                    if (items.length > 0) {
                        items[0].classList.add('opacity-100');
                        controls[0]?.classList.remove('bg-gray-400');
                        controls[0]?.classList.add('bg-gray-600');
                    }

                    // Function to show specific slide
                    function showProductSlide(index) {
                        // Hide all slides
                        items.forEach(item => {
                            item?.classList.remove('opacity-100');
                            item?.classList.add('opacity-0');
                        });

                        // Reset all controls
                        controls.forEach(control => {
                            control?.classList.remove('bg-gray-600');
                            control?.classList.add('bg-gray-400');
                        });

                        // Show selected slide
                        items[index]?.classList.remove('opacity-0');
                        items[index]?.classList.add('opacity-100');

                        // Highlight selected control
                        controls[index]?.classList.remove('bg-gray-400');
                        controls[index]?.classList.add('bg-gray-600');

                        currentIndex = index;
                    }

                    // Add click event to controls
                    controls.forEach((control, index) => {
                        control?.addEventListener('click', (e) => {
                            e.stopPropagation();
                            showProductSlide(index);
                        });
                    });

                    // Auto rotate slides every 3 seconds if more than 1 image
                    if (items.length > 1) {
                        setInterval(() => {
                            const nextIndex = (currentIndex + 1) % items.length;
                            showProductSlide(nextIndex);
                        }, 3000);
                    }
                });
            }, 1000);

            // Lazy loading for images
            if ('IntersectionObserver' in window) {
                const lazyLoadObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            if (img.dataset.src) {
                                img.src = img.dataset.src;
                            }
                            lazyLoadObserver.unobserve(img);
                        }
                    });
                });

                document.querySelectorAll('img[loading="lazy"]').forEach(img => {
                    lazyLoadObserver.observe(img);
                });
            }
        });
    </script>
@endsection
