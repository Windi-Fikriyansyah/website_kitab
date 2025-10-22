<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dar Ibnu Abbas - Koleksi Kitab Arab Terlengkap di Indonesia')</title>
    @yield('meta')
    <link rel="preconnect" href="https://your-image-cdn.com">
    <link rel="preload" as="image" href="{{ asset('images/hero-image.jpg') }}">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#1d2530',
                            50: '#f0f7ff',
                            100: '#dfcf9f',
                            200: '#dfcf9f',
                            300: '#7cc4fd',
                            400: '#36a6fa',
                            500: '#0c8aeb',
                            600: '#1d2530',
                            700: '#015dc4',
                            800: '#064e9e',
                            900: '#0b4283',
                        },
                        secondary: {
                            DEFAULT: '#6c757d',
                            50: '#f8f9fa',
                            100: '#f1f3f5',
                            200: '#e2e6ea',
                            300: '#d1d7dc',
                            400: '#aeb7c0',
                            500: '#8f9ba8',
                            600: '#6c757d',
                            700: '#495057',
                            800: '#343a40',
                            900: '#212529',
                        },
                        accent: {
                            DEFAULT: '#ffc107',
                            light: '#fff3cd',
                            dark: '#d39e00',
                        }
                    },
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @yield('style')
    <style>
        /* Reset dan konsistensi untuk search bar */
        #headerSearchInput {
            border-radius: 9999px !important;
            background: white !important;
            border: 1px solid #d1d5db !important;
        }

        #headerSearchButton {
            border-radius: 9999px !important;
            width: 32px !important;
            height: 32px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        /* Pastikan parent container tidak mengganggu */
        .relative.w-64 {
            border-radius: 0 !important;
            background: transparent !important;
        }

        /* Force rounded-full untuk button */
        .rounded-full {
            border-radius: 9999px !important;
        }
    </style>
    <style type="text/tailwindcss">
        #mobile-menu {
            -webkit-overflow-scrolling: touch;
        }

        @layer utilities {
            .text-shadow {
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .text-shadow-md {
                text-shadow: 0 4px 8px rgba(0, 0, 0, 0.12);
            }

            .text-shadow-lg {
                text-shadow: 0 15px 30px rgba(0, 0, 0, 0.11);
            }

            .text-shadow-none {
                text-shadow: none;
            }

            .transition-slow {
                transition: all 0.5s ease;
            }

            .bg-gradient-overlay {
                background: linear-gradient(rgba(0, 123, 255, 0.8), rgba(0, 123, 255, 0.8));
            }

            .bg-gradient-pengiriman {
                background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            }

            .bg-gradient-pembelian {
                background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            }

            .border-gold {
                border-color: #dfcf9f;
            }

            .text-gold {
                color: #dfcf9f;
            }

            .bg-gold {
                background-color: #dfcf9f;
            }
        }
    </style>
</head>

<body class="font-inter antialiased text-gray-900 bg-white">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#1d2530] shadow-sm transition-all duration-300">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Dar Ibnu Abbas" class="h-10 md:h-12 w-auto">
                </a>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button"
                        class="text-white hover:text-gray-300 focus:outline-none p-2" aria-controls="mobile-menu"
                        aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <!-- Menu Items Container -->
                    <div class="flex items-center space-x-1">
                        <div class="relative ml-2">
                            <div class="relative w-64">
                                <input type="text" id="headerSearchInput"
                                    class="w-full py-3 px-5 pr-12 rounded-full border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm transition-all duration-300 shadow-sm"
                                    placeholder="Cari kitab..." autocomplete="off">
                                <button
                                    class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary-600 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-primary-700 cursor-pointer transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary-400 focus:ring-offset-2"
                                    id="headerSearchButton" type="button">
                                    <i class="fas fa-search text-xs"></i>
                                </button>
                            </div>

                            <!-- Dropdown hasil autocomplete -->
                            <div id="headerAutocompleteResults"
                                class="absolute z-50 w-full mt-2 bg-white rounded-xl shadow-xl hidden overflow-hidden border border-gray-200">
                                <div class="max-h-60 overflow-y-auto">
                                    <!-- Hasil pencarian akan ditampilkan di sini -->
                                </div>
                            </div>
                        </div>
                        <!-- Beranda -->
                        <div class="relative group">
                            <a href="{{ route('home') }}"
                                class="px-3 py-2 text-sm font-medium text-white hover:text-gray-300 transition-colors">{{ __('messages.beranda') }}</a>
                        </div>

                        <!-- Static Menu -->
                        <a href="{{ route('produk.semua') }}"
                            class="px-3 py-2 text-sm font-medium text-white hover:text-gray-300 transition-colors">{{ __('messages.produk') }}</a>

                        <a href="{{ route('tentang') }}"
                            class="px-3 py-2 text-sm font-medium text-white hover:text-gray-300 transition-colors">{{ __('messages.tentang') }}</a>
                        <a href="{{ route('kontak') }}"
                            class="px-3 py-2 text-sm font-medium text-white hover:text-gray-300 transition-colors">{{ __('messages.hubungi') }}</a>
                        <a href="{{ route('blog') }}"
                            class="px-3 py-2 text-sm font-medium text-white hover:text-gray-300 transition-colors">{{ __('messages.blog') }}</a>
                    </div>

                    <div class="relative group ml-4">
                        <button
                            class="flex items-center px-3 py-2 text-sm font-medium text-white hover:text-gray-300 transition-colors">
                            <i class="fas fa-globe mr-2"></i>
                            <span id="current-language">ID</span>
                            <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>

                        <!-- Language Dropdown -->
                        <div
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <a href="{{ route('language.switch', 'id') }}"
                                    class="language-option flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'id' ? 'bg-blue-50 text-blue-600' : '' }}">
                                    <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/flags/4x3/id.svg"
                                        alt="Indonesia" class="w-5 h-4 mr-3 rounded-sm">
                                    <div>
                                        <div class="font-medium">Indonesia</div>
                                        <div class="text-xs text-gray-500">Bahasa Indonesia</div>
                                    </div>
                                </a>

                                <a href="{{ route('language.switch', 'en') }}"
                                    class="language-option flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'en' ? 'bg-blue-50 text-blue-600' : '' }}">
                                    <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/flags/4x3/us.svg"
                                        alt="English" class="w-5 h-4 mr-3 rounded-sm">
                                    <div>
                                        <div class="font-medium">English</div>
                                        <div class="text-xs text-gray-500">English</div>
                                    </div>
                                </a>

                                <a href="{{ route('language.switch', 'ar') }}"
                                    class="language-option flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ app()->getLocale() == 'ar' ? 'bg-blue-50 text-blue-600' : '' }}">
                                    <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/flags/4x3/sa.svg"
                                        alt="Arabic" class="w-5 h-4 mr-3 rounded-sm">
                                    <div>
                                        <div class="font-medium">العربية</div>
                                        <div class="text-xs text-gray-500">Arabic</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Search Bar di Header -->

                    </div>
                </div>
            </div>
        </div>

        <!-- Kategori Menu Bar -->
        <div id="kategori-bar" class="bg-[#f2f4f7] relative z-40">
            <div class="container mx-auto px-4">
                <div class="hidden md:flex items-center justify-center space-x-1 py-2" id="kategori-menu-container">
                    @foreach ($kategoris as $kategori)
                        <div class="relative group" data-kategori-id="{{ $kategori['id'] }}">
                            <button
                                class="px-3 py-2 text-sm font-medium text-gray-800 hover:text-primary-600 flex items-center transition-colors">
                                {{ $kategori['nama_indonesia'] }}
                                @if (count($kategori['subkategoris']) > 0)
                                    <i class="fas fa-chevron-down ml-1 text-xs"></i>
                                @endif
                            </button>

                            @if (count($kategori['subkategoris']) > 0)
                                <div
                                    class="fixed left-0 right-0 w-screen bg-white rounded-b-md shadow-xl py-1 z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-gray-200">
                                    <div class="container mx-auto px-4">
                                        <div class="flex">
                                            <!-- Kolom Subkategori (25% width) -->
                                            <div class="w-1/4 p-6 bg-gray-50">
                                                <h3 class="font-bold text-lg mb-4 text-primary-600">
                                                    {{ $kategori['nama_indonesia'] }}</h3>
                                                <ul class="space-y-3">
                                                    @foreach ($kategori['subkategoris'] as $subkategori)
                                                        <li>
                                                            <a href=""
                                                                class="subkategori-link block px-3 py-2 hover:bg-gray-100 rounded transition-colors"
                                                                data-kategori-id="{{ $kategori['id'] }}"
                                                                data-subkategori-id="{{ $subkategori['id'] }}">
                                                                <div class="flex flex-col">
                                                                    <span
                                                                        class="font-medium">{{ $subkategori['nama_arab'] }}</span>
                                                                    <span
                                                                        class="text-xs text-gray-500">{{ $subkategori['nama_indonesia'] }}</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <!-- Kolom Produk (75% width) -->
                                            <div class="w-3/4 p-6">
                                                <h3 class="font-bold text-lg mb-4 text-primary-600">
                                                    {{ __('messages.produk') }}</h3>
                                                <div id="produk-container-{{ $kategori['id'] }}"
                                                    class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                                                    <!-- Products will be loaded here automatically -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden bg-white shadow-lg rounded-b-lg
            max-h-[80vh] overflow-y-auto"
            id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Beranda Mobile -->
                <a href="{{ route('home') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">Beranda</a>

                <!-- Static Mobile Menu -->
                <a href="{{ route('produk.semua') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">Produk</a>
                <a href="{{ route('tentang') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">Tentang</a>
                <a href="{{ route('kontak') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">Kontak</a>
                <a href="{{ route('blog') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">Blog</a>

                <!-- Dynamic Mobile Menu -->
                <!-- Dynamic Mobile Menu -->
                @if (isset($kategoris) && count($kategoris) > 0)
                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <h3 class="px-3 py-2 text-sm font-semibold text-gray-500 uppercase tracking-wider">Kategori
                        </h3>
                        @foreach ($kategoris as $kategori)
                            <div class="relative mb-2">
                                <button onclick="toggleMobileDropdown({{ $kategori['id'] }})"
                                    class="w-full flex justify-between items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-primary-600 hover:bg-gray-50">
                                    {{ $kategori['nama_indonesia'] }}
                                    @if (!empty($kategori['subkategoris']))
                                        <i class="fas fa-chevron-down text-xs" id="icon-{{ $kategori['id'] }}"></i>
                                    @endif
                                </button>

                                @if (!empty($kategori['subkategoris']))
                                    <div class="pl-4 hidden" id="dropdown-{{ $kategori['id'] }}">
                                        <!-- Subkategori List -->
                                        @foreach ($kategori['subkategoris'] as $subkategori)
                                            <div class="mb-3">
                                                <h4 class="px-3 py-1 text-sm font-semibold text-primary-600">
                                                    {{ $subkategori['nama_arab'] }} -
                                                    {{ $subkategori['nama_indonesia'] }}
                                                </h4>

                                                <!-- Produk langsung tampil (via AJAX juga bisa) -->
                                                <div class="grid grid-cols-2 gap-3 px-3"
                                                    id="mobile-produk-{{ $subkategori['id'] }}">
                                                    <!-- Produk akan dimuat otomatis -->
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Language Selector Mobile -->
                <div class="border-t border-gray-200 pt-4 mt-4">
                    <h3 class="px-3 py-2 text-sm font-semibold text-gray-500 uppercase tracking-wider">Bahasa</h3>
                    <div class="grid grid-cols-3 gap-2 px-2 py-2">
                        <a href="{{ route('language.switch', 'id') }}"
                            class="flex flex-col items-center justify-center p-2 rounded-md text-sm font-medium {{ app()->getLocale() == 'id' ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                            <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/flags/4x3/id.svg"
                                alt="Indonesia" class="w-6 h-4 mb-1 rounded-sm">
                            <span>ID</span>
                        </a>
                        <a href="{{ route('language.switch', 'en') }}"
                            class="flex flex-col items-center justify-center p-2 rounded-md text-sm font-medium {{ app()->getLocale() == 'en' ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                            <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/flags/4x3/us.svg"
                                alt="English" class="w-6 h-4 mb-1 rounded-sm">
                            <span>EN</span>
                        </a>
                        <a href="{{ route('language.switch', 'ar') }}"
                            class="flex flex-col items-center justify-center p-2 rounded-md text-sm font-medium {{ app()->getLocale() == 'ar' ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' }}">
                            <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/flags/4x3/sa.svg"
                                alt="Arabic" class="w-6 h-4 mb-1 rounded-sm">
                            <span>AR</span>
                        </a>
                    </div>
                </div>

                <!-- Search Bar Mobile -->
                <div class="border-t border-gray-200 pt-4 mt-4 px-3">
                    <div class="relative">
                        <input type="text" id="mobileSearchInput"
                            class="w-full py-3 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-400 text-sm"
                            placeholder="Cari kitab..." autocomplete="off">
                        <div class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-primary-600 text-white p-2 rounded-full hover:bg-primary-700 cursor-pointer"
                            id="mobileSearchButton">
                            <i class="fas fa-search text-sm"></i>
                        </div>
                    </div>

                    <!-- Dropdown hasil autocomplete mobile -->
                    <div id="mobileAutocompleteResults"
                        class="absolute z-50 w-full mt-1 bg-white rounded-lg shadow-xl hidden overflow-hidden border border-gray-200 left-3 right-3">
                        <div class="max-h-60 overflow-y-auto">
                            <!-- Hasil pencarian akan ditampilkan di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main id="main-content"> <!-- Diperbesar padding top untuk mengakomodasi menu kategori -->
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary-600 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- About Column -->
                <div>
                    <h5 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-book-open mr-2"></i> Dar Ibnu Abbas (DIBAS)
                    </h5>
                    <p class="text-primary-100 mb-4">{{ __('messages.footer_des') }}</p>
                    <div class="flex flex-wrap gap-3 md:space-x-3 justify-center md:justify-start">

                        @if (!empty($socialLinks->facebook))
                            <a href="{{ $socialLinks->facebook }}" target="_blank"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary-500 flex items-center justify-center hover:bg-primary-400 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif

                        @if (!empty($socialLinks->instagram))
                            <a href="{{ $socialLinks->instagram }}" target="_blank"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary-500 flex items-center justify-center hover:bg-primary-400 transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif

                        @if (!empty($socialLinks->twitter))
                            <a href="{{ $socialLinks->twitter }}" target="_blank"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary-500 flex items-center justify-center hover:bg-primary-400 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif

                        @if (!empty($socialLinks->youtube))
                            <a href="{{ $socialLinks->youtube }}" target="_blank"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary-500 flex items-center justify-center hover:bg-primary-400 transition-colors">
                                <i class="fab fa-youtube"></i>
                            </a>
                        @endif

                        @if (!empty($socialLinks->tiktok))
                            <a href="{{ $socialLinks->tiktok }}" target="_blank"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary-500 flex items-center justify-center hover:bg-primary-400 transition-colors">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        @endif

                        @if (!empty($socialLinks->telegram))
                            <a href="{{ $socialLinks->telegram }}" target="_blank"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary-500 flex items-center justify-center hover:bg-primary-400 transition-colors">
                                <i class="fab fa-telegram"></i>
                            </a>
                        @endif

                        @if (!empty($socialLinks->google_maps))
                            <a href="{{ $socialLinks->google_maps }}" target="_blank"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary-500 flex items-center justify-center hover:bg-primary-400 transition-colors">
                                <i class="fas fa-map-marker-alt"></i>
                            </a>
                        @endif
                    </div>

                </div>

                <!-- Categories Column (Dynamic dari API) -->
                <div>
                    <h5 class="text-lg font-semibold mb-4">{{ __('messages.kategori_kitab') }}</h5>
                    <ul class="space-y-2">
                        @if (isset($kategoris) && count($kategoris) > 0)
                            @foreach ($kategoris as $kategori)
                                <li><a href="#"
                                        class="text-primary-100 hover:text-white transition-colors">{{ $kategori['nama_indonesia'] }}</a>
                                </li>
                            @endforeach
                        @else
                            <li><a href="#" class="text-primary-100 hover:text-white transition-colors">Kitab
                                    Fiqh</a></li>
                            <li><a href="#" class="text-primary-100 hover:text-white transition-colors">Kitab
                                    Hadits</a></li>
                            <li><a href="#" class="text-primary-100 hover:text-white transition-colors">Kitab
                                    Tafsir</a></li>
                            <li><a href="#" class="text-primary-100 hover:text-white transition-colors">Kitab
                                    Aqidah</a></li>
                            <li><a href="#" class="text-primary-100 hover:text-white transition-colors">Kitab
                                    Sirah</a></li>
                        @endif
                    </ul>
                </div>

                <!-- Services Column -->
                <div>
                    <h5 class="text-lg font-semibold mb-4">Layanan</h5>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-primary-100 hover:text-white transition-colors">Cara
                                Pembelian</a></li>
                        <li><a href="#"
                                class="text-primary-100 hover:text-white transition-colors">Pengiriman</a></li>
                        <li><a href="#"
                                class="text-primary-100 hover:text-white transition-colors">Pengembalian</a></li>
                        <li><a href="#" class="text-primary-100 hover:text-white transition-colors">Bantuan &
                                Refund</a></li>
                        <li><a href="#" class="text-primary-100 hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>

                <!-- Contact Column -->
                <div>
                    <h5 class="text-lg font-semibold mb-4">{{ __('messages.kontak_kami') }}</h5>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2 text-primary-200"></i>
                            <span>Jl. Tileng Kp. Kramat Rt01/04 Kel.Setu, Kec. Cipayung<br>Kota Jakarta Timur, Daerah
                                Khusus Ibukota Jakarta 13880</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-phone text-primary-200 mt-1"></i>
                            <div class="flex flex-col">
                                <span>+62895806109754</span>
                                <span>+6281313839619</span>
                            </div>
                        </li>

                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-primary-200"></i>
                            <span>official.daribnuabbas@gmail.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock mr-2 text-primary-200"></i>
                            <span>Senin - Minggu (08:00 - 20:00)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-primary-500 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-primary-200 mb-4 md:mb-0">&copy; {{ date('Y') }} Dar Ibnu Abbas. Semua hak
                        cipta dilindungi.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-primary-200 hover:text-white transition-colors">Kebijakan
                            Privasi</a>
                        <a href="#" class="text-primary-200 hover:text-white transition-colors">Syarat &
                            Ketentuan</a>
                        <a href="#" class="text-primary-200 hover:text-white transition-colors">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/62895806109754" target="_blank"
        class="fixed bottom-6 right-6 bg-green-500 text-white rounded-full flex items-center justify-center px-4 py-3 text-lg shadow-lg hover:bg-green-600 transition-colors z-40 space-x-2">
        <i class="fab fa-whatsapp text-2xl"></i>
        <span class="font-semibold hidden sm:inline">{{ __('messages.hubungi_kami') }}</span>
    </a>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const kategoriBar = document.getElementById("kategori-bar");
            const nav = document.querySelector("nav");
            const mainContent = document.getElementById("main-content");

            if (nav && mainContent) {
                mainContent.style.marginTop = nav.offsetHeight + "px";
            }

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize search functionality for both desktop and mobile
            initializeSearch('headerSearchInput', 'headerAutocompleteResults', 'headerSearchButton');
            initializeSearch('mobileSearchInput', 'mobileAutocompleteResults', 'mobileSearchButton');

            function initializeSearch(inputId, resultsId, buttonId) {
                const searchInput = document.getElementById(inputId);
                const autocompleteResults = document.getElementById(resultsId);
                const searchButton = document.getElementById(buttonId);
                let timeout = null;
                let currentRequest = null;

                // Fungsi untuk menampilkan hasil autocomplete
                function showAutocomplete(results) {
                    const resultsContainer = autocompleteResults.querySelector('.max-h-60');

                    if (results.length === 0) {
                        resultsContainer.innerHTML =
                            '<div class="no-results p-4 text-center text-gray-500">Tidak ada hasil ditemukan</div>';
                        autocompleteResults.classList.remove('hidden');
                        return;
                    }

                    let html = '';
                    results.forEach(product => {
                        const title = product.judul_indo || product.judul || 'Judul tidak tersedia';
                        const productSlug = slugify(title);
                        const productUrl = `/produk/${product.id}/${productSlug}`;

                        const imageName = product.images && product.images[0] ? product.images[0] : null;
                        const imageUrl = imageName ? `${imageName}` : '/images/placeholder-book.jpg';
                        const author = product.penulis || 'Penulis tidak diketahui';

                        html += `
                <div class="autocomplete-item border-b border-gray-100 last:border-b-0" data-url="${productUrl}">
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

                // Fungsi untuk menampilkan loading state
                function showLoading() {
                    const resultsContainer = autocompleteResults.querySelector('.max-h-60');
                    resultsContainer.innerHTML = `
            <div class="search-loading p-4 text-center">
                <div class="inline-block animate-spin rounded-full h-6 w-6 border-b-2 border-primary-600"></div>
                <p class="text-gray-500 mt-2">Mencari...</p>
            </div>
            `;
                    autocompleteResults.classList.remove('hidden');
                }

                // Fungsi untuk mendapatkan hasil autocomplete
                function fetchAutocomplete(query) {
                    if (currentRequest) {
                        currentRequest.abort();
                    }

                    if (query.length < 2) {
                        autocompleteResults.classList.add('hidden');
                        return;
                    }

                    showLoading();

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

                // Event listener untuk input pencarian
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
            }

            // Helper function untuk membuat slug
            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '');
            }
        });
    </script>
    <script>
        function loadProdukBySubkategorimobile(subkategoriId) {
            const produkContainer = document.getElementById(`mobile-produk-${subkategoriId}`);
            if (!produkContainer) return;

            // Tampilkan loading state
            produkContainer.innerHTML =
                '<div class="col-span-full text-center py-4">Memuat produk...</div>';

            // Ambil data produk via AJAX
            fetch(`/produk-by-subkategori/${subkategoriId}`)
                .then(response => {
                    if (!response.ok) throw new Error("Gagal memuat produk");
                    return response.json();
                })
                .then(res => {
                    const produkList = Array.isArray(res) ? res : res.data || [];

                    if (produkList.length === 0) {
                        produkContainer.innerHTML =
                            '<div class="col-span-full text-center py-4 text-gray-500">Belum ada produk</div>';
                        return;
                    }

                    // Render produk (gunakan gambar pertama dari array)
                    produkContainer.innerHTML = produkList.map(produk => {
                        const coverImage = produk.images && produk.images.length > 0 ?
                            produk.images[0] :
                            '/images/default-book.jpg';
                        const productUrl = `/produk/${produk.id}/${produk.slug}`;

                        return `
        <div class="bg-white border rounded-lg shadow hover:shadow-md transition p-2">
            <a href="${productUrl}">
                <img src="${coverImage}" alt="${produk.judul}"
                     class="w-full h-32 object-cover rounded-md mb-2"
                     onerror="this.src='/images/default-book.jpg'">
                <h3 class="text-sm font-semibold line-clamp-2">
                    ${produk.judul} (${produk.judul_indo ?? ''})
                </h3>
                <p class="text-xs text-gray-500">${produk.penulis || 'penulis tidak diketahui'}</p>
            </a>
        </div>
        `;
                    }).join('');
                })
                .catch(error => {
                    console.error(error);
                    produkContainer.innerHTML =
                        '<div class="col-span-full text-center py-4 text-red-500">Gagal memuat produk</div>';
                });
        }

        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                    mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
                    mobileMenu.classList.toggle('hidden');

                    // Change icon based on menu state
                    const icon = mobileMenuButton.querySelector('i');
                    if (icon) {
                        if (isExpanded) {
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars');
                        } else {
                            icon.classList.remove('fa-bars');
                            icon.classList.add('fa-times');
                        }
                    }
                });
            }

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (mobileMenu && !mobileMenu.classList.contains('hidden') &&
                    !mobileMenu.contains(event.target) &&
                    !mobileMenuButton.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    const icon = mobileMenuButton.querySelector('i');
                    if (icon) {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                }
            });

            // Prevent menu from closing when clicking inside it
            if (mobileMenu) {
                mobileMenu.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            }

            // Update tampilan bahasa saat dropdown dibuka
            document.querySelectorAll('.language-option').forEach(option => {
                option.addEventListener('click', function(e) {
                    e.preventDefault();
                    const locale = this.getAttribute('href').split('/').pop();

                    // Kirim request untuk ganti bahasa
                    fetch(`/language/${locale}`, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            },
                            credentials: 'same-origin'
                        })
                        .then(response => {
                            if (response.ok) {
                                window.location.reload();
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            // Set bahasa aktif saat load
            const currentLang = '{{ app()->getLocale() }}';
            document.getElementById('current-language').textContent = currentLang.toUpperCase();
        });

        // Function to toggle mobile dropdown
        function toggleMobileDropdown(kategoriId) {
            const dropdown = document.getElementById(`dropdown-${kategoriId}`);
            const icon = document.getElementById(`icon-${kategoriId}`);

            if (dropdown && icon) {
                dropdown.classList.toggle('hidden');

                if (dropdown.classList.contains('hidden')) {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                } else {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');

                    // Cari semua subkategori dalam kategori ini dan load produknya
                    dropdown.querySelectorAll('[id^="mobile-produk-"]').forEach(el => {
                        const subkategoriId = el.id.replace('mobile-produk-', '');
                        loadProdukBySubkategorimobile(subkategoriId);
                    });
                }
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to load products by category
            function loadProdukByKategori(kategoriId) {
                const produkContainer = document.getElementById(`produk-container-${kategoriId}`);

                // Show loading state
                produkContainer.innerHTML = '<div class="col-span-full text-center py-8">Memuat produk...</div>';

                // Fetch products for this category
                fetch(`/produk-by-kategori/${kategoriId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success && data.data && data.data.length > 0) {
                            renderProduk(data.data, produkContainer);
                        } else {
                            produkContainer.innerHTML =
                                '<div class="col-span-full text-center py-8">Tidak ada produk dalam kategori ini.</div>';
                        }
                    })
                    .catch(error => {
                        console.error('Error loading products:', error);
                        produkContainer.innerHTML =
                            '<div class="col-span-full text-center py-8">Gagal memuat produk.</div>';
                    });
            }


            // Function to load products by subcategory
            function loadProdukBySubkategori(linkElement) {
                const kategoriId = linkElement.getAttribute('data-kategori-id');
                const subkategoriId = linkElement.getAttribute('data-subkategori-id');
                const produkContainer = document.getElementById(`produk-container-${kategoriId}`);

                // Show loading state
                produkContainer.innerHTML = '<div class="col-span-full text-center py-8">Memuat produk...</div>';

                // Fetch products for this subcategory
                fetch(`/produk-by-subkategori/${subkategoriId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success && data.data && data.data.length > 0) {
                            renderProduk(data.data, produkContainer);
                        } else {
                            produkContainer.innerHTML =
                                '<div class="col-span-full text-center py-8">{{ __('messages.not_kategori') }}</div>';
                        }
                    })
                    .catch(error => {
                        console.error('Error loading products:', error);
                        produkContainer.innerHTML =
                            '<div class="col-span-full text-center py-8">Gagal memuat produk.</div>';
                    });
            }

            // Common function to render products
            function renderProduk(produks, container) {
                let html = '';
                produks.forEach(produk => {
                    // Gunakan gambar pertama jika ada, jika tidak gunakan gambar default
                    const coverImage = produk.images && produk.images.length > 0 ?
                        produk.images[0] : '/images/default-book.jpg';
                    const productUrl = `/produk/${produk.id}/${produk.slug}`;
                    html += `
            <a href="${productUrl}" class="group">
                <div class="bg-white p-3 rounded-lg border border-gray-200 hover:shadow-md transition-all">
                    <div class="h-40 bg-gray-100 rounded-md mb-3 overflow-hidden">
                        <img src="${coverImage}"
                             alt="${produk.judul}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                             onerror="this.src='/images/default-book.jpg'">
                    </div>
                    <h4 class="font-medium text-gray-800 group-hover:text-primary-600 truncate">${produk.judul}</h4>
                    <p class="text-sm text-gray-500 truncate">${produk.penulis || 'Penulis tidak diketahui'}</p>
                </div>
            </a>`;
                });
                container.innerHTML = html;
            }

            // Setup hover events for desktop menu
            document.querySelectorAll('.group[data-kategori-id]').forEach(group => {
                const kategoriId = group.getAttribute('data-kategori-id');

                group.addEventListener('mouseenter', function() {
                    loadProdukByKategori(kategoriId);
                });
            });

            // Setup mouseenter events for subcategory links
            document.querySelectorAll('.subkategori-link').forEach(link => {
                link.addEventListener('mouseenter', function(e) {
                    e.preventDefault();
                    loadProdukBySubkategori(this);
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Toggle Functionality
            const faqToggles = document.querySelectorAll('.faq-toggle');

            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    // Get the associated content and icon
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');

                    // Toggle the content visibility
                    content.classList.toggle('hidden');

                    // Toggle the icon
                    icon.classList.toggle('fa-chevron-down');
                    icon.classList.toggle('fa-chevron-up');

                    // Optional: Close other open FAQs when opening a new one
                    if (!content.classList.contains('hidden')) {
                        document.querySelectorAll('.faq-content').forEach(item => {
                            if (item !== content && !item.classList.contains('hidden')) {
                                item.classList.add('hidden');
                                const otherIcon = item.previousElementSibling.querySelector(
                                    'i');
                                otherIcon.classList.remove('fa-chevron-up');
                                otherIcon.classList.add('fa-chevron-down');
                            }
                        });
                    }
                });
            });

            // Contact Form Submission
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Simulate form submission
                    const submitButton = this.querySelector('button[type="submit"]');
                    submitButton.disabled = true;
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...';

                    // In a real application, you would send the form data to your server here
                    setTimeout(() => {
                        submitButton.disabled = false;
                        submitButton.textContent = 'Kirim Pesan';

                        // Show success message
                        alert(
                            'Terima kasih! Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.'
                        );
                        contactForm.reset();
                    }, 1500);
                });
            }
        });
    </script>
    @yield('scripts')

</body>

</html>
