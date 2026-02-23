@extends('layouts.app')

@section('title', 'Blog | Dar Ibnu Abbas')

@section('meta')
    <meta name="description"
        content="Hubungi Dar Ibnu Abbas - Distributor kitab Arab terpercaya. Kami siap membantu Anda dengan pertanyaan, pemesanan, atau informasi lainnya.">
    <meta name="keywords"
        content="kontak Dar Ibnu Abbas, hubungi Dar Ibnu Abbas, alamat Dar Ibnu Abbas, telepon Dar Ibnu Abbas">
    <meta name="author" content="Dar Ibnu Abbas">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/blog') }}">
    <meta property="og:title" content="Blog | Dar Ibnu Abbas">
    <meta property="og:description"
        content="blog Dar Ibnu Abbas - Distributor kitab Arab terpercaya. Kami siap membantu Anda dengan pertanyaan, pemesanan, atau informasi lainnya.">
    <meta property="og:image" content="{{ asset('images/og-image-kontak.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/blog') }}">
    <meta property="twitter:title" content="Blog | Dar Ibnu Abbas">
    <meta property="twitter:description"
        content="blog Dar Ibnu Abbas - Distributor kitab Arab terpercaya. Kami siap membantu Anda dengan pertanyaan, pemesanan, atau informasi lainnya.">
    <meta property="twitter:image" content="{{ asset('images/og-image-kontak.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/blog') }}" />
@endsection

@section('content')





    <!-- Hero Section -->
    <section class="relative bg-primary-600 text-white pt-32 pb-20 md:pt-40 md:pb-28">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="container mx-auto px-4 relative">
            <div class="max-w-4xl mx-auto text-center animate-fade-in">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-shadow-lg">
                    <i class="fas fa-blog mr-3 text-accent-DEFAULT"></i>
                    Blog Dar Ibnu Abbas
                </h1>
                <p class="text-xl md:text-2xl text-primary-100 mb-8 leading-relaxed">
                    Temukan wawasan mendalam tentang kitab-kitab klasik, ulasan buku, dan artikel keislaman yang
                    memperkaya pengetahuan Anda
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <div class="bg-white bg-opacity-10 rounded-full px-6 py-3 backdrop-blur-sm">
                        <i class="fas fa-newspaper mr-2 text-accent-DEFAULT"></i>
                        <span>Artikel Terbaru Setiap Minggu</span>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-full px-6 py-3 backdrop-blur-sm">
                        <i class="fas fa-book-reader mr-2 text-accent-DEFAULT"></i>
                        <span>Ulasan Mendalam</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-8 bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                    <!-- Search Bar -->
                    <div class="relative flex-1 max-w-md">
                        <input type="text" placeholder="Cari artikel..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>

                    <!-- Category Filter -->
                    <div class="flex flex-wrap gap-2">
                        <button
                            class="px-4 py-2 bg-primary-600 text-white rounded-full text-sm font-medium hover:bg-primary-700 transition-colors">
                            Semua
                        </button>
                        <button
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition-colors">
                            Ulasan Kitab
                        </button>
                        <button
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition-colors">
                            Tips & Panduan
                        </button>
                        <button
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition-colors">
                            Wawasan Islam
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Article -->
    @if($featured)
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12 text-primary-800">
                    <i class="fas fa-star text-accent-DEFAULT mr-3"></i>
                    Artikel Pilihan
                </h2>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden blog-card">
                    <div class="md:flex">
                        <div class="md:w-1/2">
                            <img src="{{ $featured->image ?? 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80' }}"
                                alt="{{ $featured->title }}" class="w-full h-64 md:h-full object-cover">
                        </div>
                        <div class="md:w-1/2 p-8">
                            <div class="flex items-center mb-4">
                                <span class="category-tag text-white px-3 py-1 rounded-full text-sm font-medium mr-3">
                                    {{ $featured->category ?? 'Umum' }}
                                </span>
                                <span class="text-gray-500 text-sm">
                                    <i class="far fa-clock mr-1"></i>
                                    {{ $featured->read_time ?? '5 Menit Baca' }}
                                </span>
                            </div>

                            <h3 class="text-2xl md:text-3xl font-bold text-primary-800 mb-4 leading-tight">
                                {{ $featured->title }}
                            </h3>

                            <p class="text-gray-600 mb-6 leading-relaxed">
                                {{ $featured->excerpt }}
                            </p>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-primary-800">{{ $featured->author ?? 'Admin' }}</p>
                                        <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($featured->created_at)->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>

                                <a href="{{ route('blog.show', $featured->slug) }}"
                                    class="bg-primary-600 text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors font-medium">
                                    Baca Selengkapnya
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Blog Grid -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12 text-primary-800">
                    Artikel Terbaru
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($articles as $article)
                    <!-- Blog Card -->
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden blog-card">
                        <div class="relative">
                            <img src="{{ $article->image ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80' }}"
                                alt="{{ $article->title }}" class="w-full h-48 object-cover">
                            <span
                                class="absolute top-4 left-4 bg-accent-DEFAULT text-primary-800 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $article->category ?? 'Umum' }}
                            </span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-primary-800 mb-3 hover:text-primary-600 transition-colors line-clamp-2">
                                <a href="{{ route('blog.show', $article->slug) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">
                                {{ $article->excerpt }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-clock mr-1"></i>
                                    <span>{{ $article->read_time ?? '5 Min' }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d M Y') }}</span>
                                </div>
                                <a href="{{ route('blog.show', $article->slug) }}" class="text-primary-600 hover:text-primary-800 font-medium">
                                    Baca <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20">
                        <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                        <p class="text-xl text-gray-500">Belum ada artikel yang dipublikasikan.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </section>





@endsection
@push('style')
    <style type="text/tailwindcss">
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

            .bg-gradient-overlay {
                background: linear-gradient(135deg, rgba(29, 37, 48, 0.9), rgba(29, 37, 48, 0.7));
            }

            .blog-card {
                transition: all 0.3s ease;
                transform: translateY(0);
            }

            .blog-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            }

            .category-tag {
                background: linear-gradient(135deg, #1d2530, #36a6fa);
            }
        }
    </style>
@endpush
@push('js')
    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.querySelector('input[placeholder="Cari artikel..."]');
            const blogCards = document.querySelectorAll('article.blog-card');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();

                    blogCards.forEach(card => {
                        const title = card.querySelector('h3').textContent.toLowerCase();
                        const content = card.querySelector('p').textContent.toLowerCase();

                        if (title.includes(searchTerm) || content.includes(searchTerm)) {
                            card.style.display = 'block';
                            card.style.animation = 'fadeIn 0.5s ease-in-out';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            }

            // Category filter functionality
            const filterButtons = document.querySelectorAll('button[class*="px-4 py-2"]');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-primary-600', 'text-white');
                        btn.classList.add('bg-gray-200', 'text-gray-700');
                    });

                    // Add active class to clicked button
                    this.classList.remove('bg-gray-200', 'text-gray-700');
                    this.classList.add('bg-primary-600', 'text-white');

                    const category = this.textContent.trim();

                    blogCards.forEach(card => {
                        if (category === 'Semua') {
                            card.style.display = 'block';
                            card.style.animation = 'fadeIn 0.5s ease-in-out';
                        } else {
                            const cardCategory = card.querySelector('.absolute span')
                                .textContent.trim();
                            if (cardCategory === category) {
                                card.style.display = 'block';
                                card.style.animation = 'fadeIn 0.5s ease-in-out';
                            } else {
                                card.style.display = 'none';
                            }
                        }
                    });
                });
            });

            // Newsletter subscription
            const newsletterForm = document.querySelector('.max-w-md form, .flex');
            const emailInput = document.querySelector('input[type="email"]');
            const subscribeBtn = document.querySelector('button:contains("Berlangganan"), .bg-accent-DEFAULT');

            if (subscribeBtn && emailInput) {
                subscribeBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const email = emailInput.value.trim();

                    if (email && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                        // Simulate subscription
                        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Berlangganan...';
                        this.disabled = true;

                        setTimeout(() => {
                            this.innerHTML = '<i class="fas fa-check mr-2"></i>Berhasil!';
                            this.classList.remove('bg-accent-DEFAULT');
                            this.classList.add('bg-green-500');

                            setTimeout(() => {
                                this.innerHTML = 'Berlangganan';
                                this.classList.remove('bg-green-500');
                                this.classList.add('bg-accent-DEFAULT');
                                this.disabled = false;
                                emailInput.value = '';
                            }, 2000);
                        }, 1500);
                    } else {
                        // Show error
                        emailInput.style.borderColor = '#ef4444';
                        emailInput.placeholder = 'Email tidak valid';

                        setTimeout(() => {
                            emailInput.style.borderColor = '';
                            emailInput.placeholder = 'Masukkan email Anda...';
                        }, 3000);
                    }
                });
            }

            // Smooth scroll for internal links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add reading progress indicator
            function addProgressBar() {
                const progressBar = document.createElement('div');
                progressBar.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 0%;
                    height: 3px;
                    background: linear-gradient(90deg, #ffc107, #36a6fa);
                    z-index: 9999;
                    transition: width 0.3s ease;
                `;
                document.body.appendChild(progressBar);

                window.addEventListener('scroll', () => {
                    const scrolled = (window.scrollY / (document.documentElement.scrollHeight - window
                        .innerHeight)) * 100;
                    progressBar.style.width = Math.min(scrolled, 100) + '%';
                });
            }

            addProgressBar();

            // Lazy loading for images
            const images = document.querySelectorAll('img');
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.remove('opacity-0');
                            img.classList.add('opacity-100');
                        }
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => {
                img.classList.add('transition-opacity', 'duration-500');
                imageObserver.observe(img);
            });

            // Mobile menu toggle
            const mobileMenuButton = document.querySelector('.md\\:hidden button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });

        // Add some nice entrance animations
        window.addEventListener('load', function() {
            const animateOnScroll = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.blog-card, section').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'all 0.6s ease-out';
                animateOnScroll.observe(el);
            });
        });
    </script>
@endpush
