<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class LayoutController extends Controller
{
    protected $externalBaseUrl = 'https://manajemen.daribnuabbas.com/storage/products/';

    // App\Http\Controllers\LayoutController.php
    public function getByKategori($kategoriId)
    {
        try {
            $kategori = DB::table('kategori')
                ->where('id', $kategoriId)
                ->first();

            if (!$kategori) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kategori tidak ditemukan'
                ], 404);
            }

            $subkategoris = DB::table('sub_kategori')
                ->where('id_kategori', $kategoriId)
                ->pluck('nama_arab');

            $produks = DB::table('produk')
                ->whereIn('sub_kategori', $subkategoris)
                ->select('id', 'judul', 'penulis', 'images')
                ->limit(10)
                ->get()
                ->map(function ($produk) {
                    $images = [];
                    if ($produk->images) {
                        try {
                            $images = json_decode($produk->images, true, 512, JSON_THROW_ON_ERROR);
                            // Tambahkan base URL ke setiap gambar
                            $images = array_map(function ($image) {
                                return $this->externalBaseUrl . ltrim($image, '/');
                            }, $images);
                        } catch (\JsonException $e) {
                            $images = [];
                        }
                    }

                    $slug = strtolower(str_replace(' ', '-', $produk->judul));

                    return [
                        'id' => $produk->id,
                        'judul' => $produk->judul,
                        'penulis' => $produk->penulis,
                        'images' => $images,
                        'slug' => $slug
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
            $subkategori = DB::table('sub_kategori')
                ->where('id', $subkategoriId)
                ->first();

            if (!$subkategori) {
                return response()->json([
                    'success' => false,
                    'message' => 'Subkategori tidak ditemukan'
                ], 404);
            }

            $produks = DB::table('produk')
                ->where('sub_kategori', $subkategori->nama_arab)
                ->select('id', 'judul', 'penulis', 'images')
                ->limit(10)
                ->get()
                ->map(function ($produk) {
                    $images = [];
                    if ($produk->images) {
                        try {
                            $images = json_decode($produk->images, true, 512, JSON_THROW_ON_ERROR);
                            // Tambahkan base URL ke setiap gambar
                            $images = array_map(function ($image) {
                                return $this->externalBaseUrl . ltrim($image, '/');
                            }, $images);
                        } catch (\JsonException $e) {
                            $images = [];
                        }
                    }

                    $slug = strtolower(str_replace(' ', '-', $produk->judul));

                    return [
                        'id' => $produk->id,
                        'judul' => $produk->judul,
                        'penulis' => $produk->penulis,
                        'images' => $images,
                        'slug' => $slug
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
