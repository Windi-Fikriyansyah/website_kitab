@extends('layouts.app')

@section('title', 'Tentang Kami | Dar Ibnu Abbas')

@section('meta')
    <meta name="description"
        content="Tentang Dar Ibnu Abbas - Distributor kitab Arab terpercaya sejak 1995. Menyediakan koleksi kitab Arab berkualitas tinggi di seluruh Indonesia.">
    <meta name="keywords"
        content="tentang Dar Ibnu Abbas, sejarah Dar Ibnu Abbas, visi misi Dar Ibnu Abbas, distributor kitab arab">
    <meta name="author" content="Dar Ibnu Abbas">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/tentang') }}">
    <meta property="og:title" content="Tentang Kami | Dar Ibnu Abbas">
    <meta property="og:description"
        content="Tentang Dar Ibnu Abbas - Distributor kitab Arab terpercaya sejak 1995. Menyediakan koleksi kitab Arab berkualitas tinggi di seluruh Indonesia.">
    <meta property="og:image" content="{{ asset('images/og-image-tentang.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/tentang') }}">
    <meta property="twitter:title" content="Tentang Kami | Dar Ibnu Abbas">
    <meta property="twitter:description"
        content="Tentang Dar Ibnu Abbas - Distributor kitab Arab terpercaya sejak 1995. Menyediakan koleksi kitab Arab berkualitas tinggi di seluruh Indonesia.">
    <meta property="twitter:image" content="{{ asset('images/og-image-tentang.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/tentang') }}" />
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary-600 text-white pt-32 pb-20 md:pt-40 md:pb-28">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in">{{ __('messages.tentang_kami') }}</h1>
                <p class="text-xl text-primary-100 animate-fade-in animate-delay-100">{{ __('messages.distributor') }}</p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gray-50"></div>
    </section>

    <!-- Tentang Kami Section -->
    <!-- Tentang Kami Section -->
    <section class="py-16 bg-gray-50 relative z-10">
        <div class="container mx-auto px-6">
            <div class="text-center animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-8">
                    {{ __('messages.tentang_kami') }}
                </h2>
                <div class="prose prose-lg text-gray-600 leading-relaxed text-justify">
                    {!! nl2br(e(__('messages.tentang_des1'))) !!}
                </div>
            </div>
        </div>
    </section>




    <!-- Sejarah Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8 animate-slide-up">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ __('messages.sejarah_kami') }}</h2>
                    <div class="prose text-gray-600 max-w-none">
                        <p>{{ __('messages.sejarah_des1') }}</p>
                        <p class="mt-4">{{ __('messages.sejarah_des2') }}</p>
                    </div>
                </div>
                <div class="md:w-1/2 animate-slide-up animate-delay-200">
                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('images/sejarah-toko.jpeg') }}" alt="Sejarah Toko Dar Ibnu Abbas"
                            class="w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ __('messages.visi_misi') }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">{{ __('messages.komitmen') }}</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow animate-fade-in">
                    <div class="flex items-center mb-4">
                        <div class="bg-primary-100 text-primary-600 p-3 rounded-full mr-4">
                            <i class="fas fa-eye text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">{{ __('messages.visi') }}</h3>
                    </div>
                    <p class="text-gray-600">{{ __('messages.visi_des') }}
                    </p>
                </div>

                <div
                    class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow animate-fade-in animate-delay-200">
                    <div class="flex items-center mb-4">
                        <div class="bg-primary-100 text-primary-600 p-3 rounded-full mr-4">
                            <i class="fas fa-bullseye text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">{{ __('messages.misi') }}</h3>
                    </div>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check text-primary-600 mt-1 mr-2 text-sm"></i>
                            <span>{{ __('messages.misi1') }}</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-primary-600 mt-1 mr-2 text-sm"></i>
                            <span>{{ __('messages.misi2') }}</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-primary-600 mt-1 mr-2 text-sm"></i>
                            <span>{{ __('messages.misi3') }}</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-primary-600 mt-1 mr-2 text-sm"></i>
                            <span>{{ __('messages.misi4') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Nilai Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ __('messages.nilai_kami') }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">{{ __('messages.prinsip') }}</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Nilai 1 - Ilmiah -->
                <div
                    class="bg-gray-50 p-8 rounded-xl text-center transition-all hover:shadow-lg hover:-translate-y-1 animate-fade-in">
                    <div
                        class="bg-primary-100 text-primary-600 p-5 rounded-full inline-flex items-center justify-center mb-6 w-16 h-16 mx-auto">
                        <i class="fas fa-book-open text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ __('messages.ilmiah') }}</h3>
                    <p class="text-gray-600">{{ __('messages.ilmiah_desc') }}</p>
                </div>

                <!-- Nilai 2 - Amanah -->
                <div
                    class="bg-gray-50 p-8 rounded-xl text-center transition-all hover:shadow-lg hover:-translate-y-1 animate-fade-in animate-delay-100">
                    <div
                        class="bg-primary-100 text-primary-600 p-5 rounded-full inline-flex items-center justify-center mb-6 w-16 h-16 mx-auto">
                        <i class="fas fa-handshake text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ __('messages.amanah') }}</h3>
                    <p class="text-gray-600">{{ __('messages.amanah_desc') }}</p>
                </div>

                <!-- Nilai 3 - Elegan -->
                <div
                    class="bg-gray-50 p-8 rounded-xl text-center transition-all hover:shadow-lg hover:-translate-y-1 animate-fade-in animate-delay-200">
                    <div
                        class="bg-primary-100 text-primary-600 p-5 rounded-full inline-flex items-center justify-center mb-6 w-16 h-16 mx-auto">
                        <i class="fas fa-palette text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ __('messages.elegan') }}</h3>
                    <p class="text-gray-600">{{ __('messages.elegan_desc') }}</p>
                </div>

                <!-- Nilai 4 - Pelayanan Rahmah -->
                <div
                    class="bg-gray-50 p-8 rounded-xl text-center transition-all hover:shadow-lg hover:-translate-y-1 animate-fade-in">
                    <div
                        class="bg-primary-100 text-primary-600 p-5 rounded-full inline-flex items-center justify-center mb-6 w-16 h-16 mx-auto">
                        <i class="fas fa-heart text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ __('messages.rahmah') }}</h3>
                    <p class="text-gray-600">{{ __('messages.rahmah_desc') }}</p>
                </div>

                <!-- Nilai 5 - Berorientasi Akhirat -->
                <div
                    class="bg-gray-50 p-8 rounded-xl text-center transition-all hover:shadow-lg hover:-translate-y-1 animate-fade-in animate-delay-100">
                    <div
                        class="bg-primary-100 text-primary-600 p-5 rounded-full inline-flex items-center justify-center mb-6 w-16 h-16 mx-auto">
                        <i class="fas fa-mosque text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ __('messages.akhirat') }}</h3>
                    <p class="text-gray-600">{{ __('messages.akhirat_desc') }}</p>
                </div>

                <!-- Nilai 6 - (Optional) bisa ditambahkan nilai lain jika diperlukan -->
                <div
                    class="bg-gray-50 p-8 rounded-xl text-center transition-all hover:shadow-lg hover:-translate-y-1 animate-fade-in animate-delay-200">
                    <div
                        class="bg-primary-100 text-primary-600 p-5 rounded-full inline-flex items-center justify-center mb-6 w-16 h-16 mx-auto">
                        <i class="fas fa-hands-helping text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ __('messages.komunitas') }}</h3>
                    <p class="text-gray-600">{{ __('messages.komunitas_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-12 md:py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">{{ __('messages.lokasi') }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">{{ __('messages.lokasi_des') }}</p>
            </div>

            <div class="rounded-lg overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11380.475436820463!2d106.89973723162527!3d-6.31481164695994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69934177063c3f%3A0x199f58d3a0ee706!2zVG9rbyBLaXRhYiBEYXIgSWJudSBBYmJhcyDZhdmD2KrYqNipINiv2KfYsSDYp9io2YYg2LnYqNin2LMg2KzYp9mD2LHYqtinINil2YbYr9mI2YbZitiz2YrYpyBEYXIgSWJudSBBYmJhcyBJc2xhbWljIEJvb2tzdG9yZQ!5e1!3m2!1sid!2sid!4v1759577214532!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    class="w-full"></iframe>
            </div>
        </div>
    </section>
    <!-- Tim Section -->

    <!-- Pencapaian Section -->
    <section class="py-16 bg-primary-600 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">{{ __('messages.pencapaian_kami') }}</h2>
                <p class="text-primary-100 max-w-2xl mx-auto">{{ __('messages.pencapaian_desc') }}</p>
            </div>

            <div class="grid md:grid-cols-4 gap-6 text-center">
                <div class="animate-fade-in">
                    <div class="text-4xl font-bold mb-2">5+</div>
                    <div class="text-primary-100">{{ __('messages.tahun_pengalaman') }}</div>
                </div>

                <div class="animate-fade-in animate-delay-100">
                    <div class="text-4xl font-bold mb-2">10.000+</div>
                    <div class="text-primary-100">{{ __('messages.judul_kitab') }}</div>
                </div>

                <div class="animate-fade-in animate-delay-200">
                    <div class="text-4xl font-bold mb-2">50.000+</div>
                    <div class="text-primary-100">{{ __('messages.pelanggan1') }}</div>
                </div>

                <div class="animate-fade-in animate-delay-300">
                    <div class="text-4xl font-bold mb-2">34</div>
                    <div class="text-primary-100">{{ __('messages.kota') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="bg-primary-600 rounded-xl p-8 md:p-12 text-center text-white">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">{{ __('messages.cta_judul') }}</h2>
                <p class="text-primary-100 mb-6 max-w-2xl mx-auto">{{ __('messages.cta_deskripsi') }}</p>
                <a href="{{ route('produk.semua') }}"
                    class="inline-block bg-white text-primary-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors">
                    {{ __('messages.katalog_cta') }}
                </a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Animasi khusus untuk halaman tentang kami
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi teks yang muncul secara bertahap
            const animateElements = document.querySelectorAll('.animate-fade-in, .animate-slide-up');

            animateElements.forEach((el, index) => {
                // Set delay berdasarkan urutan elemen
                const delay = index * 100;
                el.style.animationDelay = `${delay}ms`;

                // Tambahkan class untuk memicu animasi
                setTimeout(() => {
                    el.classList.add('opacity-100');
                }, delay);
            });
        });
    </script>
@endsection
