@extends('layouts.app', ['kategoris' => $kategoris])

@section('title', $produk['judul'] . ' | Dar Ibnu Abbas')

@section('meta')
    <meta name="description" content="{{ $produk['deskripsi_singkat'] ?? 'Detail lengkap kitab ' . $produk['judul'] }}">
    <meta name="keywords" content="{{ $produk['judul'] }}, kitab arab, {{ $produk['kategori'] ?? 'buku islam' }}">
    <meta name="author" content="Dar Ibnu Abbas">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $produk['judul'] }} | Dar Ibnu Abbas">
    <meta property="og:description"
        content="{{ $produk['deskripsi_singkat'] ?? 'Detail lengkap kitab ' . $produk['judul'] }}">
    <meta property="og:image" content="{{ $produk['images'][0] ?? asset('images/og-image-default.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $produk['judul'] }} | Dar Ibnu Abbas">
    <meta property="twitter:description"
        content="{{ $produk['deskripsi_singkat'] ?? 'Detail lengkap kitab ' . $produk['judul'] }}">
    <meta property="twitter:image" content="{{ $produk['images'][0] ?? asset('images/og-image-default.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')
    <!-- Breadcrumb -->



    <!-- Product Detail Section -->
    <section class="py-15 pt-24">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Product Images -->
                    <div class="p-4">
                        <!-- Main Image -->
                        <div class="bg-gray-50 rounded-lg overflow-hidden mb-4 h-96 flex items-center justify-center">
                            @if (isset($produk['images'][0]))
                                <img src="{{ $produk['images'][0] }}" alt="{{ $produk['judul'] }}"
                                    class="w-full h-full object-contain p-8" id="mainImage">
                            @else
                                <i class="fas fa-book-open text-5xl text-gray-400"></i>
                            @endif
                        </div>

                        <!-- Thumbnail Gallery -->
                        <div class="grid grid-cols-4 gap-2">
                            @if (count($produk['images'] ?? []) > 0)
                                @foreach (array_slice($produk['images'], 0, 4) as $index => $image)
                                    <div
                                        class="border rounded-lg overflow-hidden cursor-pointer hover:border-primary-500 transition-colors {{ $index === 0 ? 'border-primary-500' : 'border-gray-200' }}">
                                        <img src="{{ $image }}"
                                            alt="{{ $produk['judul'] }} - Thumbnail {{ $index + 1 }}"
                                            class="w-full h-20 object-cover"
                                            onclick="document.getElementById('mainImage').src = this.src;
                                                     document.querySelectorAll('.thumbnail').forEach(el => el.classList.remove('border-primary-500'));
                                                     this.parentElement.classList.add('border-primary-500')">
                                    </div>
                                @endforeach
                            @else
                                @for ($i = 0; $i < 4; $i++)
                                    <div
                                        class="border border-gray-200 rounded-lg overflow-hidden h-20 flex items-center justify-center bg-gray-50">
                                        <i class="fas fa-book-open text-gray-400"></i>
                                    </div>
                                @endfor
                            @endif
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="p-6">
                        <!-- Title & Category -->
                        <div class="mb-4">
                            <span
                                class="inline-block text-xs font-semibold uppercase tracking-wider text-primary-600 border border-primary-200 rounded-full px-3 py-1">
                                @php
                                    $kat = $produk['kategori_label'] ?? null;
                                    $sub = $produk['subkategori_label'] ?? null;

                                    $clean = function ($v) {
                                        if ($v === null) {
                                            return null;
                                        }
                                        if (is_array($v)) {
                                            return count($v) ? $v : null;
                                        }
                                        $t = trim((string) $v);
                                        return $t === '' || $t === '[]' ? null : $t;
                                    };

                                    $kat = $clean($kat);
                                    $sub = $clean($sub);
                                @endphp


                                {{ $kat ?: '-' }}
                                @if ($sub)
                                    <span class="text-gray-400">•</span> {{ $sub }}
                                @endif


                            </span>
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">
                                {{ $produk['judul'] }}
                                @if (!empty($produk['judul_indo']))
                                    ({{ $produk['judul_indo'] }})
                                @endif
                            </h1>
                            <p class="text-gray-600 mt-1">Oleh: {{ $produk['penulis'] ?? 'Penulis tidak diketahui' }}</p>
                        </div>



                        <!-- Short Description -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-2">Deskripsi Singkat</h3>
                            <p class="text-gray-600">{{ $produk['deskripsi'] }}
                            </p>
                        </div>

                        <!-- Quantity & Add to Cart -->
                        <div class="mb-6">
                            <div class="flex flex-col sm:flex-row gap-3">
                                <a href="https://wa.me/62895806109754" target="_blank"
                                    class="w-auto bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-lg transition-colors font-medium">
                                    <i class="fab fa-whatsapp mr-2"></i> Pesan Sekarang
                                </a>
                            </div>
                        </div>

                        <!-- Delivery Info -->

                    </div>
                </div>
            </div>

            <!-- Product Tabs -->
            <div class="mt-8 bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="border-b border-gray-200">
                    <nav class="flex -mb-px">
                        <button id="video-tab"
                            class="tab-button active py-4 px-6 text-center border-b-2 font-medium text-sm border-primary-500 text-primary-600">
                            Video
                        </button>
                        <button id="specification-tab"
                            class="tab-button active py-4 px-6 text-center border-b-2 font-medium text-sm ">
                            Spesifikasi
                        </button>


                    </nav>
                </div>

                <div class="p-6">

                    <!-- Video Tab Content -->
                    <div id="video-content" class="tab-content active">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Video Kitab</h3>
                        @if (!empty($produk['link_youtube']))
                            @php
                                // Extract YouTube ID dari berbagai format URL YouTube
                                $youtubeId = null;
                                $url = $produk['link_youtube'];

                                // Pattern untuk berbagai format YouTube URL
                                $patterns = [
                                    '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/',
                                    '/youtube\.com\/.*[?&]v=([a-zA-Z0-9_-]{11})/',
                                ];

                                foreach ($patterns as $pattern) {
                                    if (preg_match($pattern, $url, $matches)) {
                                        $youtubeId = $matches[1];
                                        break;
                                    }
                                }
                            @endphp

                            @if ($youtubeId)
                                <div class="w-full max-w-2xl mx-auto"> <!-- Added max-width container -->
                                    <div class="relative" style="padding-bottom: 56.25%; /* 16:9 aspect ratio */">
                                        <iframe class="absolute top-0 left-0 w-full h-full rounded-lg shadow-lg"
                                            src="https://www.youtube.com/embed/{{ $youtubeId }}?rel=0&showinfo=0&modestbranding=1"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                    <div class="mt-4 text-sm text-gray-600">
                                        <a href="{{ $produk['link_youtube'] }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800">
                                            <i class="fab fa-youtube mr-1"></i> Tonton di YouTube
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-exclamation-triangle text-yellow-500 mr-2"></i>
                                        <p class="text-yellow-800">
                                            Format URL YouTube tidak valid.
                                            <a href="{{ $produk['link_youtube'] }}" target="_blank" class="underline">
                                                Klik di sini untuk membuka link
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="bg-gray-50 rounded-lg p-8 text-center">
                                <i class="fas fa-video text-4xl text-gray-400 mb-4"></i>
                                <p class="text-gray-600">Tidak ada video tersedia untuk produk ini.</p>
                            </div>
                        @endif
                    </div>

                    <!-- Specification Tab Content -->
                    <div id="specification-content" class="tab-content hidden">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Detail Kitab</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-medium text-gray-900 mb-2">Informasi Umum</h4>
                                <ul class="space-y-2">
                                    <li class="flex justify-between">
                                        <span class="text-gray-600">Judul</span>
                                        <span class="text-gray-900 font-medium">{{ $produk['judul'] }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-gray-600">Penulis</span>
                                        <span class="text-gray-900 font-medium">{{ $produk['penulis'] ?? '-' }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-gray-600">Penerbit</span>
                                        <span class="text-gray-900 font-medium">{{ $produk['penerbit'] ?? '-' }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-gray-600">Tahun Terbit</span>
                                        <span
                                            class="text-gray-900 font-medium">{{ $produk['tahun_terbit'] ?? '-' }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-medium text-gray-900 mb-2">Spesifikasi Fisik</h4>
                                <ul class="space-y-2">
                                    <li class="flex justify-between">
                                        <span class="text-gray-600">Cover</span>
                                        <span class="text-gray-900 font-medium">{{ $produk['cover'] ?? '-' }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-gray-600">Jumlah Halaman</span>
                                        <span class="text-gray-900 font-medium">{{ $produk['halaman'] ?? '-' }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-gray-600">Ukuran</span>
                                        <span class="text-gray-900 font-medium">{{ $produk['ukuran'] ?? '-' }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-gray-600">Berat</span>
                                        <span class="text-gray-900 font-medium">{{ $produk['berat'] ?? '-' }} gram</span>
                                    </li>
                                </ul>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50 p-4">
        <!-- Close Button -->
        <span class="absolute top-5 right-8 text-white text-4xl cursor-pointer hover:text-red-400 transition-colors"
            onclick="closeImageModal()">
            &times;
        </span>

        <!-- Prev Button -->
        <button id="prevBtn" onclick="prevImage()"
            class="absolute left-4 text-white text-3xl bg-white/20 hover:bg-white/40 rounded-full p-3 transition">
            <i class="fas fa-chevron-left"></i>
        </button>

        <!-- Image -->
        <img id="modalImage" src=""
            class="max-h-[85vh] max-w-[90vw] rounded-2xl shadow-2xl border-4 border-white/10" />

        <!-- Next Button -->
        <button id="nextBtn" onclick="nextImage()"
            class="absolute right-4 text-white text-3xl bg-white/20 hover:bg-white/40 rounded-full p-3 transition">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <!-- Related Products -->

@endsection

@section('scripts')
    <script>
        // Ambil semua gambar produk
        const images = @json($produk['images'] ?? []);
        let currentIndex = 0;

        function openImageModal(src, index = 0) {
            if (!src) return;
            currentIndex = index;
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.remove('flex');
            document.getElementById('imageModal').classList.add('hidden');
        }

        function nextImage() {
            if (images.length === 0) return;
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById('modalImage').src = images[currentIndex];
        }

        function prevImage() {
            if (images.length === 0) return;
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            document.getElementById('modalImage').src = images[currentIndex];
        }

        // Buka modal saat klik gambar utama
        const mainImage = document.getElementById('mainImage');
        if (mainImage) {
            mainImage.addEventListener('click', () => openImageModal(mainImage.src, 0));
        }

        // Buka modal saat klik thumbnail
        document.querySelectorAll('.grid img').forEach((thumb, index) => {
            thumb.addEventListener('click', () => openImageModal(thumb.src, index));
        });
    </script>

    <script>
        // Quantity control
        function increaseQuantity() {
            const input = document.getElementById('quantity');
            const max = parseInt(input.max);
            if (parseInt(input.value) < max) {
                input.value = parseInt(input.value) + 1;
            }
        }

        function decreaseQuantity() {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }

        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs and contents
                document.querySelectorAll('.tab-button').forEach(t => {
                    t.classList.remove('active', 'border-primary-500', 'text-primary-600');
                    t.classList.add('border-transparent', 'text-gray-500');
                });

                document.querySelectorAll('.tab-content').forEach(c => {
                    c.classList.add('hidden');
                    c.classList.remove('active');
                });

                // Add active class to clicked tab
                this.classList.add('active', 'border-primary-500', 'text-primary-600');
                this.classList.remove('border-transparent', 'text-gray-500');

                // Show corresponding content
                const contentId = this.id.replace('-tab', '-content');
                const content = document.getElementById(contentId);
                if (content) {
                    content.classList.remove('hidden');
                    content.classList.add('active');
                }
            });
        });

        // Image zoom functionality (would be enhanced with a proper zoom library in production)
        document.getElementById('mainImage').addEventListener('click', function() {
            this.classList.toggle('cursor-zoom-in');
            this.classList.toggle('cursor-zoom-out');
            this.classList.toggle('scale-150');
            this.classList.toggle('origin-center');
        });
        console.log('YouTube Link:', @json($produk['link_youtube'] ?? null));
    </script>
@endsection
