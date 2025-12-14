<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;



class LayoutController extends Controller
{
    protected $externalBaseUrl = 'https://manajemen.daribnuabbas.com/storage/products/';

    // App\Http\Controllers\LayoutController.php
    public function getByKategori($kategoriId)
    {
        try {
            $kategori = DB::table('kategori')->where('id', $kategoriId)->first();

            if (!$kategori) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kategori tidak ditemukan'
                ], 404);
            }

            // Ambil semua nama_arab subkategori di kategori ini
            $subkategoris = DB::table('sub_kategori')
                ->where('id_kategori', $kategoriId)
                ->pluck('nama_arab')
                ->filter()
                ->values()
                ->all();

            $kategoriNama = $kategori->nama_arab;

            $produks = DB::table('produk')
                ->select('id', 'judul', 'penulis', 'images')
                ->where(function ($q) use ($subkategoris, $kategoriNama) {
                    // kalau produk menyimpan kategori juga di array ["القرآن","مصاحف"]
                    $q->where('sub_kategori', $kategoriNama)
                        ->orWhereRaw(
                            "(JSON_VALID(`sub_kategori`) AND JSON_CONTAINS(`sub_kategori`, ?))",
                            [json_encode($kategoriNama, JSON_UNESCAPED_UNICODE)]
                        );

                    // match salah satu subkategori di dalam JSON array
                    foreach ($subkategoris as $nama) {
                        $q->orWhere('sub_kategori', $nama)
                            ->orWhereRaw(
                                "(JSON_VALID(`sub_kategori`) AND JSON_CONTAINS(`sub_kategori`, ?))",
                                [json_encode($nama, JSON_UNESCAPED_UNICODE)]
                            );
                    }
                })
                ->limit(10)
                ->get()
                ->map(function ($produk) {
                    $images = [];
                    if ($produk->images) {
                        try {
                            $images = json_decode($produk->images, true, 512, JSON_THROW_ON_ERROR);
                            $images = array_map(fn($img) => $this->externalBaseUrl . ltrim($img, '/'), $images);
                        } catch (\JsonException $e) {
                            $images = [];
                        }
                    }

                    return [
                        'id' => $produk->id,
                        'judul' => $produk->judul,
                        'penulis' => $produk->penulis,
                        'images' => $images,
                        'slug' => Str::slug($produk->judul),
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $produks
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function getBySubkategori($subkategoriId)
    {
        try {
            $subkategori = DB::table('sub_kategori')->where('id', $subkategoriId)->first();

            if (!$subkategori) {
                return response()->json([
                    'success' => false,
                    'message' => 'Subkategori tidak ditemukan'
                ], 404);
            }

            $nama = $subkategori->nama_arab;

            $produks = DB::table('produk')
                ->select('id', 'judul', 'penulis', 'images')
                ->where(function ($q) use ($nama) {
                    $q->where('sub_kategori', $nama)
                        ->orWhereRaw(
                            "(JSON_VALID(`sub_kategori`) AND JSON_CONTAINS(`sub_kategori`, ?))",
                            [json_encode($nama, JSON_UNESCAPED_UNICODE)]
                        );
                })
                ->limit(10)
                ->get()
                ->map(function ($produk) {
                    $images = [];
                    if ($produk->images) {
                        try {
                            $images = json_decode($produk->images, true, 512, JSON_THROW_ON_ERROR);
                            $images = array_map(fn($img) => $this->externalBaseUrl . ltrim($img, '/'), $images);
                        } catch (\JsonException $e) {
                            $images = [];
                        }
                    }

                    return [
                        'id' => $produk->id,
                        'judul' => $produk->judul,
                        'penulis' => $produk->penulis,
                        'images' => $images,
                        'slug' => Str::slug($produk->judul),
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $produks
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function switch($locale)
    {
        // Validasi locale yang tersedia
        if (!in_array($locale, ['en', 'id', 'ar'])) {
            abort(400, 'Bahasa tidak didukung');
        }

        // Set locale
        App::setLocale($locale);

        // Simpan di session
        Session::put('locale', $locale);

        // Simpan di cookie untuk persistensi lebih lama
        cookie()->queue(cookie()->forever('lang', $locale));

        return Redirect::back();
    }

    public function footer()
    {
        // Ambil data social_links (misal baris pertama saja)
        $socialLinks = DB::table('social_links')->first();


        return view('layouts.footer', compact('socialLinks'));
    }
}
