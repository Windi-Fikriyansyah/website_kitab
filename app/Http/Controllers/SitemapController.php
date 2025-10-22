<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $response = Http::get('https://manajemen.daribnuabbas.com/api/produk');
        $produk = $response->successful() ? $response->json()['data'] : [];

        $sitemap = view('sitemap.index', [
            'produk' => $produk,
            'lastmod' => Carbon::now()->toIso8601String()
        ]);

        return response($sitemap)->header('Content-Type', 'text/xml');
    }
}
