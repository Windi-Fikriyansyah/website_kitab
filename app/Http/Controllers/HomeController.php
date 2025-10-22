<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    // Base URL for external images
    protected $externalBaseUrl = 'https://manajemen.daribnuabbas.com/storage/products/';
    protected $externalBase = 'https://manajemen.daribnuabbas.com/storage/testimoni/';
    protected $externalBaseHero = 'https://manajemen.daribnuabbas.com/storage/';
    // Ambil gambar hero dari base URL eksternal
    protected function getExternalHero($imagePath)
    {
        return $this->externalBaseHero . ltrim($imagePath, '/');
    }

    // Get external image URL
    protected function getExternalImage($imagePath)
    {
        return $this->externalBaseUrl . ltrim($imagePath, '/');
    }
    protected function getExternalfoto($imagePath)
    {
        return $this->externalBase . ltrim($imagePath, '/');
    }

    // Process images that could be array or JSON string
    protected function processImages($images)
    {
        if (empty($images)) {
            return [];
        }

        // If images is already an array, return it directly
        if (is_array($images)) {
            return array_map(function ($image) {
                return $this->getExternalImage($image);
            }, $images);
        }

        // Try to decode JSON
        $decoded = json_decode($images, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [];
        }

        return array_map(function ($image) {
            return $this->getExternalImage($image);
        }, $decoded);
    }

    // Home page
    public function index()
    {
        $produk = DB::table('produk')
            ->where('stok', '>', 0)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get()
            ->map(function ($item) {
                $item->images = $this->processImages($item->images);
                return (array)$item; // Convert to array to match view expectations
            })
            ->toArray();
        // Di dalam method index(), ubah pengambilan data testimoni:
        $testimoni = DB::table('testimoni')
            ->whereNotNull('foto_unboxing') // Hanya testimoni dengan foto
            ->where('foto_unboxing', '!=', '') // Pastikan tidak kosong
            ->latest()
            ->get()
            ->map(function ($item) {
                // Proses path gambar testimoni seperti produk
                if (!empty($item->foto_unboxing)) {
                    $item->foto_unboxing = $this->getExternalfoto($item->foto_unboxing);
                }
                return $item;
            });

        $hero = DB::table('hero_section')->first();

        if ($hero) {
            if (!empty($hero->hero_image_1)) {
                $hero->hero_image_1 = $this->getExternalHero($hero->hero_image_1);
            }
            if (!empty($hero->hero_image_2)) {
                $hero->hero_image_2 = $this->getExternalHero($hero->hero_image_2);
            }
        }
        $seo = [
            'title' => 'Dar Ibnu Abbas - Koleksi Kitab Arab Terlengkap di Indonesia',
            'description' => 'Temukan ribuan kitab Arab terbaik untuk memperdalam ilmu Islam. Stok lengkap dengan harga terjangkau dan pengiriman cepat ke seluruh Indonesia.',
            'keywords' => 'kitab arab, buku islam, fiqh, hadits, tafsir, kitab kuning, pesantren, pondok',
            'canonical' => url('/'),
            'og_image' => $this->getExternalImage('images/og-image.jpg')
        ];

        return view('home', compact('produk', 'seo', 'testimoni', 'hero'));
    }

    // All products page
    public function semuaProduk()
    {
        $produk = DB::table('produk')
            ->where('stok', '>', 0)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $item->images = $this->processImages($item->images);
                return (array)$item;
            })
            ->toArray();

        $seo = [
            'title' => 'Semua Kitab Arab - Dar Ibnu Abbas',
            'description' => 'Lihat koleksi lengkap kitab Arab kami. Tersedia berbagai kategori mulai dari Quran, Hadits, Fiqh, hingga Bahasa Arab.',
            'keywords' => 'daftar kitab, koleksi kitab arab, buku islam lengkap, kitab pesantren, kitab kuning',
            'canonical' => route('produk.semua'),
            'og_image' => $this->getExternalImage('images/og-image-produk.jpg')
        ];

        return view('produk.semua', compact('produk', 'seo'));
    }

    // Product detail page
    public function detailProduk($id)
    {
        $produk = DB::table('produk')
            ->where('id', $id)
            ->first();

        if (!$produk) {
            abort(404);
        }

        // Convert to array and process images
        $produk = (array)$produk;
        $produk['images'] = $this->processImages($produk['images']);

        $seo = [
            'title' => $produk['judul'] . ' - Dar Ibnu Abbas',
            'description' => 'Beli ' . $produk['judul'] . ' karya ' . ($produk['penulis'] ?? 'Penulis tidak diketahui') . '. ' . ($produk['kategori'] ?? 'Kitab Islam') . ' berkualitas tinggi.',
            'keywords' => strtolower($produk['judul']) . ', kitab ' . strtolower($produk['kategori']) . ', buku islam, ' . ($produk['penulis'] ?? ''),
            'canonical' => route('produk.detail', $id),
            'og_image' => $produk['images'][0] ?? $this->getExternalImage('images/og-image.jpg')
        ];

        $rekomendasi = DB::table('produk')
            ->where('kategori', $produk['kategori'])
            ->where('id', '!=', $id)
            ->where('stok', '>', 0)
            ->limit(4)
            ->get()
            ->map(function ($item) {
                $item->images = $this->processImages($item->images);
                return (array)$item;
            })
            ->toArray();

        return view('produk.detail', compact('produk', 'rekomendasi', 'seo'));
    }

    // Product search
    public function cariProduk(Request $request)
    {
        $keyword = $request->input('q', '');

        $produk = DB::table('produk')
            ->where(function ($query) use ($keyword) {
                $query->where('judul', 'like', '%' . $keyword . '%')
                    ->orWhere('penulis', 'like', '%' . $keyword . '%')
                    ->orWhere('kategori', 'like', '%' . $keyword . '%');
            })
            ->where('stok', '>', 0)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $item->images = $this->processImages($item->images);
                return (array)$item;
            })
            ->toArray();

        $seo = [
            'title' => 'Hasil Pencarian: ' . $keyword . ' - Dar Ibnu Abbas',
            'description' => 'Hasil pencarian kitab Arab untuk "' . $keyword . '". Temukan kitab yang Anda cari di koleksi kami.',
            'keywords' => 'pencarian kitab, cari kitab arab, ' . $keyword,
            'canonical' => route('produk.cari') . '?q=' . urlencode($keyword),
            'og_image' => $this->getExternalImage('images/og-image.jpg')
        ];

        return view('produk.cari', compact('produk', 'keyword', 'seo'));
    }
}
