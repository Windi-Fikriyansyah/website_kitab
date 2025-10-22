<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk-by-subkategori/{subkategoriId}', [LayoutController::class, 'getBySubkategori']);
Route::get('/produk-by-kategori/{kategoriId}', [LayoutController::class, 'getByKategori']);
Route::get('/kitab-fiqh', [HomeController::class, 'kitabFiqh'])->name('kitab.fiqh');
Route::get('/kitab-hadits', [HomeController::class, 'kitabHadits'])->name('kitab.hadits');
Route::get('/kitab-tafsir', [HomeController::class, 'kitabTafsir'])->name('kitab.tafsir');
Route::get('/kitab-aqidah', [HomeController::class, 'kitabAqidah'])->name('kitab.aqidah');
Route::get('/kitab-sirah', [HomeController::class, 'kitabSirah'])->name('kitab.sirah');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/produk', [ProductController::class, 'index'])->name('produk.semua');
Route::get('/produk-by-subkategori/{subcategory}', [ProductController::class, 'getProductsBySubcategory']);
Route::get('/produk/{id}/{slug?}', [ProductController::class, 'show'])->name('produk.detail');
// routes/web.php
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/produk/search', [ProductController::class, 'search'])->name('produk.search');
Route::get('/tentang', function () {
    return view('tentang.index', [
        'seo' => [
            'title' => 'Tentang Kami | Dar Ibnu Abbas',
            'description' => 'Tentang Dar Ibnu Abbas - Distributor kitab Arab terpercaya sejak 1995. Menyediakan koleksi kitab Arab berkualitas tinggi di seluruh Indonesia.',
            'keywords' => 'tentang Dar Ibnu Abbas, sejarah Dar Ibnu Abbas, visi misi Dar Ibnu Abbas, distributor kitab arab',
            'canonical' => url('/tentang'),
            'og_image' => asset('images/og-image-tentang.jpg')
        ]
    ]);
})->name('tentang');

Route::get('/hubungi', function () {
    return view('hubungi.index');
})->name('kontak');
Route::get('/blog', function () {
    return view('blog.index');
})->name('blog');
Route::get('/language/{locale}', [LayoutController::class, 'switch'])
    ->name('language.switch');
Route::get('/api/autocomplete', [ProductController::class, 'autocomplete'])->name('api.autocomplete');
