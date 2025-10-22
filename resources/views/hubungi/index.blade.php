@extends('layouts.app')

@section('title', 'Hubungi Kami | Dar Ibnu Abbas')

@section('meta')
    <meta name="description"
        content="Hubungi Dar Ibnu Abbas - Distributor kitab Arab terpercaya. Kami siap membantu Anda dengan pertanyaan, pemesanan, atau informasi lainnya.">
    <meta name="keywords"
        content="kontak Dar Ibnu Abbas, hubungi Dar Ibnu Abbas, alamat Dar Ibnu Abbas, telepon Dar Ibnu Abbas">
    <meta name="author" content="Dar Ibnu Abbas">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/hubungi') }}">
    <meta property="og:title" content="Hubungi Kami | Dar Ibnu Abbas">
    <meta property="og:description"
        content="Hubungi Dar Ibnu Abbas - Distributor kitab Arab terpercaya. Kami siap membantu Anda dengan pertanyaan, pemesanan, atau informasi lainnya.">
    <meta property="og:image" content="{{ asset('images/og-image-kontak.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/hubungi') }}">
    <meta property="twitter:title" content="Hubungi Kami | Dar Ibnu Abbas">
    <meta property="twitter:description"
        content="Hubungi Dar Ibnu Abbas - Distributor kitab Arab terpercaya. Kami siap membantu Anda dengan pertanyaan, pemesanan, atau informasi lainnya.">
    <meta property="twitter:image" content="{{ asset('images/og-image-kontak.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/hubungi') }}" />
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-primary-600 text-white pt-32 pb-20 md:pt-40 md:pb-28">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 animate-fade-in">{{ __('messages.hubungi') }}</h1>
            <div class="flex justify-center">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center text-sm font-medium text-primary-200 hover:text-white">
                                <i class="fas fa-home mr-2"></i>
                                Beranda
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-xs text-primary-300 mx-2"></i>
                                <span class="text-sm font-medium text-white">Hubungi Kami</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">{{ __('messages.bantu') }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">{{ __('messages.bantu_des') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                <!-- Contact Info -->
                <div class="bg-gray-50 rounded-lg p-6 md:p-8 shadow-sm">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6">{{ __('messages.informasi_kontak') }}</h3>

                    <div class="space-y-5">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary-100 p-3 rounded-full text-primary-600">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-semibold text-gray-500">ALAMAT</h4>
                                <p class="mt-1 text-gray-700">Jl. Tileng Jl. Kp. Kramat No.Rt01/04, RT.1/RW.4, Setu, Kec.
                                    Cipayung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13880</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary-100 p-3 rounded-full text-primary-600">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-semibold text-gray-500">TELEPON</h4>
                                <p class="mt-1 text-gray-700">+62895806109754</p>
                                <p class="mt-1 text-gray-700">+6281313839619</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary-100 p-3 rounded-full text-primary-600">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-semibold text-gray-500">EMAIL</h4>
                                <p class="mt-1 text-gray-700">official.daribnuabbas@gmail.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-primary-100 p-3 rounded-full text-primary-600">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-semibold text-gray-500">JAM OPERASIONAL</h4>
                                <p class="mt-1 text-gray-700">Senin - Minggu (08:00 - 20:00)</p>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Contact Form -->
                <div class="bg-white rounded-lg p-6 md:p-8 border border-gray-200 shadow-sm">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6">Kirim Pesan</h3>
                    <form id="contactForm" class="space-y-5">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Masukkan nama Anda" required>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat
                                Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Masukkan email Anda" required>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Masukkan nomor telepon">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                            <select id="subject" name="subject"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                required>
                                <option value="" disabled selected>Pilih subjek</option>
                                <option value="Pertanyaan Produk">Pertanyaan Produk</option>
                                <option value="Pemesanan">Pemesanan</option>
                                <option value="Keluhan">Keluhan</option>
                                <option value="Kerjasama">Kerjasama</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea id="message" name="message" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Tulis pesan Anda di sini..." required></textarea>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full bg-primary-600 text-white py-2 px-6 rounded-md hover:bg-primary-700 transition-colors font-medium">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="bg-gray-50 py-12 md:py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">{{ __('messages.lokasi') }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">{{ __('messages.lokasi_des') }}</p>
            </div>

            <div class="rounded-lg overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2845.1187402183505!2d106.9181914!3d-6.314833299999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69934177063c3f%3A0x199f58d3a0ee706!2zVG9rbyBLaXRhYiBEYXIgSWJudSBBYmJhcyDZhdmD2KrYqNipINiv2KfYsSDYp9io2YYg2LnYqNin2LMg2KzYp9mD2LHYqtinINil2YbYr9mI2YbZitiz2YrYpyBEYXIgSWJudSBBYmJhcyBJc2xhbWljIEJvb2tzdG9yZQ!5e1!3m2!1sid!2sid!4v1754491833377!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    class="w-full"></iframe>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Berikut adalah beberapa pertanyaan umum yang sering kami terima
                    dari pelanggan.</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="space-y-4" id="faqAccordion">
                    <!-- FAQ Item -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button
                            class="faq-toggle w-full flex justify-between items-center p-4 md:p-5 bg-gray-50 hover:bg-gray-100 transition-colors">
                            <h3 class="text-left font-medium text-gray-800">Bagaimana cara memesan kitab dari Dar Ibnu
                                Abbas?
                            </h3>
                            <i class="fas fa-chevron-down ml-4 text-primary-600 transition-transform duration-200"></i>
                        </button>
                        <div class="faq-content hidden p-4 md:p-5 border-t border-gray-200">
                            <div class="text-gray-600 space-y-4">
                                <p>Berikut tata cara pembelian produk di website resmi Dar Ibnu Abbas:</p>

                                <div class="space-y-2">
                                    <h4 class="font-medium">1. Telusuri Produk di Website</h4>
                                    <p class="pl-4">Silakan jelajahi seluruh katalog kitab kami melalui halaman produk.
                                        Setiap produk sudah dilengkapi deskripsi, foto, dan harga.</p>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="font-medium">2. Klik Tombol WhatsApp untuk Order</h4>
                                    <p class="pl-4">Setelah menemukan produk yang diinginkan, klik tombol "Pesan via
                                        WhatsApp" di halaman produk. Anda akan diarahkan langsung ke admin Dar Ibnu Abbas.
                                    </p>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="font-medium">3. Kirim Format Pemesanan</h4>
                                    <p class="pl-4">Gunakan format berikut saat menghubungi admin:</p>
                                    <div class="bg-gray-50 p-3 rounded-md text-sm pl-4">
                                        <p>Assalamu'alaikum, saya ingin memesan:</p>
                                        <p>Nama: [Nama Lengkap]</p>
                                        <p>Alamat lengkap (kecamatan & kota): [Alamat Lengkap]</p>
                                        <p>Nomor WA aktif: [Nomor WhatsApp]</p>
                                        <p>Nama produk: [Nama Produk]</p>
                                        <p>Jumlah: [Jumlah Pesanan]</p>
                                        <p>Ekspedisi: [JNE/JNT/Sicepat/Pos/AnterAja]</p>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="font-medium">4. Konfirmasi Admin</h4>
                                    <p class="pl-4">Kami akan memeriksa ketersediaan stok dan menghitung total harga +
                                        ongkir. Anda akan menerima rincian lengkap untuk segera transfer.</p>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="font-medium">5. Pembayaran</h4>
                                    <p class="pl-4">Transfer ke rekening resmi Dar Ibnu Abbas yang dikirimkan oleh admin.
                                        Kirim
                                        bukti transfer agar kami bisa segera memproses pesanan Anda.</p>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="font-medium">6. Pengemasan & Pengiriman</h4>
                                    <p class="pl-4">Pesanan dikemas dengan aman dan dikirim sesuai antrean pengiriman.
                                        Nomor resi akan kami kirimkan maksimal H+3 setelah pengiriman.</p>
                                </div>

                                <div class="space-y-2">
                                    <h4 class="font-medium">7. Layanan Purna Jual</h4>
                                    <p class="pl-4">Jika ada kendala seperti barang rusak atau kurang, silakan laporkan
                                        ke admin maksimal 2x24 jam setelah barang diterima.</p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- FAQ Item -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button
                            class="faq-toggle w-full flex justify-between items-center p-4 md:p-5 bg-gray-50 hover:bg-gray-100 transition-colors">
                            <h3 class="text-left font-medium text-gray-800">Apakah saya bisa datang langsung ke toko untuk
                                melihat koleksi kitab?</h3>
                            <i class="fas fa-chevron-down ml-4 text-primary-600 transition-transform duration-200"></i>
                        </button>
                        <div class="faq-content hidden p-4 md:p-5 border-t border-gray-200">
                            <p class="text-gray-600">Tentu saja! Kami sangat menyambut kedatangan Anda di toko fisik kami
                                di Jakarta Timur. Silakan kunjungi kami selama jam operasional (Senin-Sabtu, 08:00-20:00
                                WIB).
                                Untuk koleksi lengkap, Anda bisa melihat katalog online kami terlebih dahulu.</p>
                        </div>
                    </div>

                    <!-- FAQ Item -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button
                            class="faq-toggle w-full flex justify-between items-center p-4 md:p-5 bg-gray-50 hover:bg-gray-100 transition-colors">
                            <h3 class="text-left font-medium text-gray-800">Bagaimana jika kitab yang saya terima rusak?
                            </h3>
                            <i class="fas fa-chevron-down ml-4 text-primary-600 transition-transform duration-200"></i>
                        </button>
                        <div class="faq-content hidden p-4 md:p-5 border-t border-gray-200">
                            <p class="text-gray-600">Jika kitab yang Anda terima dalam kondisi rusak, segera hubungi kami
                                melalui WhatsApp atau email dengan melampirkan foto kerusakan. Kami akan memproses
                                penggantian atau refund sesuai kebijakan kami. Produk yang sudah dibaca/dibuka segelnya
                                tidak bisa dikembalikan.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <p class="text-gray-600">Masih ada pertanyaan? <a href="https://wa.me/6281334567890"
                            class="text-primary-600 hover:text-primary-800 font-medium">Hubungi kami langsung</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
