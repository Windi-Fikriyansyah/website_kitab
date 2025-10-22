<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    protected $externalBaseUrl1 = 'https://manajemen.daribnuabbas.com/storage/products/';

    public function index(Request $request)
    {
        // Get filter inputs
        $selectedCategories = $this->normalizeFilterInput($request->input('categories', []));
        $selectedAuthors = $this->normalizeFilterInput($request->input('authors', []));
        $selectedPublishers = $this->normalizeFilterInput($request->input('publishers', []));
        $selectedHarakat = $this->normalizeFilterInput($request->input('harakat', []));
        $selectedCovers = $this->normalizeFilterInput($request->input('covers', []));
        $searchQuery = trim($request->input('search', ''));
        $page = max(1, (int)$request->input('page', 1));
        $perPage = 6;

        // Get all filter data (keeping as stdClass objects)
        $filterData = [
            'kategoris' => DB::table('kategori')->select('id', 'nama_arab', 'nama_indonesia')->get(),
            'authors' => DB::table('penulis')->select('id', 'nama_arab', 'nama_indonesia')->get(),
            'publishers' => DB::table('penerbit')->select('id', 'nama_arab', 'nama_indonesia')->get(),
            'harakat' => DB::table('harakat')->select('id', 'nama_arab', 'nama_indonesia')->get(),
            'covers' => DB::table('cover')->select('id', 'nama_arab', 'nama_indonesia')->get(),
        ];

        $query = DB::table('produk')
            ->leftJoin('produk_indo', 'produk_indo.id_produk', '=', 'produk.id')
            ->select([
                'produk.id',
                'produk.judul',
                'produk_indo.judul_indo',
                'produk.kategori',
                'produk.sub_kategori',
                'produk.penulis',
                'produk.penerbit',
                'produk.harakat',
                'produk.cover',
                'produk.stok',
                'produk.images',
                'produk.harga_jual',
                'produk.harga_modal',
                'produk.created_at',
                'produk.link_youtube',
            ]);

        // Apply filters
        if (!empty($selectedCategories)) {
            $query->whereIn('produk.kategori', $selectedCategories);
        }

        if (!empty($selectedAuthors)) {
            $query->whereIn('produk.penulis', $selectedAuthors);
        }

        if (!empty($selectedPublishers)) {
            $query->whereIn('produk.penerbit', $selectedPublishers);
        }

        if (!empty($selectedHarakat)) {
            $query->whereIn('produk.harakat', $selectedHarakat);
        }

        if (!empty($selectedCovers)) {
            $query->whereIn('produk.cover', $selectedCovers);
        }

        // Apply search query
        if (!empty($searchQuery)) {
            $searchTerm = '%' . $searchQuery . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('produk.judul', 'like', $searchTerm)
                    ->orWhere('produk_indo.judul_indo', 'like', $searchTerm)
                    ->orWhere('produk.penulis', 'like', $searchTerm)
                    ->orWhere('produk.kategori', 'like', $searchTerm);
            });
        }

        // Get total count
        $totalProduk = $query->count();

        // Get paginated results
        $produk = $query->orderBy('produk.created_at', 'desc')
            ->offset(($page - 1) * $perPage)
            ->limit($perPage)
            ->get()
            ->map(function ($item) {
                // Handle images
                $images = [];
                if (!empty($item->images)) {
                    if ($this->is_json($item->images)) {
                        $decodedImages = json_decode($item->images, true);
                        foreach ($decodedImages as $image) {
                            $images[] = $this->externalBaseUrl1 . $image;
                        }
                    } else {
                        $images[] = $this->externalBaseUrl1 . $item->images;
                    }
                }

                return [
                    'id' => $item->id,
                    'judul' => $item->judul,
                    'judul_indo' => $item->judul_indo ?? null,
                    'kategori' => $item->kategori,
                    'sub_kategori' => $item->sub_kategori,
                    'penulis' => $item->penulis,
                    'penerbit' => $item->penerbit,
                    'harakat' => $item->harakat,
                    'cover' => $item->cover,
                    'stok' => $item->stok,
                    'images' => $images,
                    'harga_jual' => $item->harga_jual,
                    'harga_modal' => $item->harga_modal,
                    'created_at' => $item->created_at,
                    'link_youtube' => $item->link_youtube,
                    'is_new' => strtotime($item->created_at) > strtotime('-7 days'), // Mark as new if created within last 7 days
                ];
            });

        // Generate SEO data
        $seo = $this->generateSeoData($searchQuery, $selectedCategories, $selectedAuthors, $selectedPublishers);
        // Ambil 8 kategori dengan jumlah produk terbanyak
        $topCategories = DB::table('produk_indo')
            ->select('kategori_indo', DB::raw('COUNT(*) as total'))
            ->groupBy('kategori_indo')
            ->orderByDesc('total')
            ->limit(8)
            ->get();


        return view('produk.index', [
            'produk' => $produk,
            'totalProduk' => $totalProduk,
            'perPage' => $perPage,
            'page' => $page,
            'selectedCategories' => $selectedCategories,
            'selectedAuthors' => $selectedAuthors,
            'selectedPublishers' => $selectedPublishers,
            'selectedHarakat' => $selectedHarakat,
            'selectedCovers' => $selectedCovers,
            'searchQuery' => $searchQuery,
            'seo' => $seo,
            'kategoris' => $filterData['kategoris'],
            'authors' => $filterData['authors'],
            'publishers' => $filterData['publishers'],
            'harakatList' => $filterData['harakat'],
            'covers' => $filterData['covers'],
            'topCategories' => $topCategories,
        ]);
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('q');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        try {
            $products = DB::table('produk')
                ->leftJoin('produk_indo', 'produk_indo.id_produk', '=', 'produk.id')
                ->select(
                    'produk.id',
                    'produk.judul',
                    'produk.penulis',
                    'produk.kategori',
                    'produk.images',
                    'produk.stok',
                    'produk_indo.judul_indo'
                )
                ->where('produk.stok', '>', 0)
                ->where(function ($q) use ($query) {
                    $q->where('produk.judul', 'like', "%{$query}%")
                        ->orWhere('produk.penulis', 'like', "%{$query}%")
                        ->orWhere('produk.kategori', 'like', "%{$query}%")
                        ->orWhere(function ($q2) use ($query) {
                            $q2->whereNotNull('produk_indo.judul_indo')
                                ->where('produk_indo.judul_indo', 'like', "%{$query}%");
                        });
                })
                ->orderBy('produk.judul')
                ->limit(10)
                ->get();

            // Tambahkan URL base untuk gambar eksternal
            $products->transform(function ($product) {
                $images = [];

                if ($product->images) {
                    if (is_string($product->images) && $this->is_json($product->images)) {
                        $decoded = json_decode($product->images, true);
                        foreach ($decoded as $img) {
                            $images[] = $this->externalBaseUrl1 . $img;
                        }
                    } else if (is_string($product->images)) {
                        $images[] = $this->externalBaseUrl1 . $product->images;
                    } else if (is_array($product->images)) {
                        foreach ($product->images as $img) {
                            $images[] = $this->externalBaseUrl1 . $img;
                        }
                    }
                }

                $product->images = $images;

                return $product;
            });

            return response()->json($products);
        } catch (\Exception $e) {
            \Log::error('Autocomplete error: ' . $e->getMessage());
            return response()->json([]);
        }
    }


    private function normalizeFilterInput($input)
    {
        if (is_string($input)) {
            return [$input];
        }
        return is_array($input) ? $input : [];
    }


    /**
     * Generate SEO data based on current filters and search
     */
    private function generateSeoData($searchQuery, $selectedCategories, $selectedAuthors, $selectedPublishers)
    {
        $filters = [];
        if (!empty($selectedCategories)) $filters[] = 'Kategori: ' . implode(', ', $selectedCategories);
        if (!empty($selectedAuthors)) $filters[] = 'Penulis: ' . implode(', ', $selectedAuthors);
        if (!empty($selectedPublishers)) $filters[] = 'Penerbit: ' . implode(', ', $selectedPublishers);

        $filterText = !empty($filters) ? ' (' . implode(' | ', $filters) . ')' : '';
        $baseUrl = url('/produk');
        $currentUrl = $baseUrl . (request()->getQueryString() ? '?' . request()->getQueryString() : '');

        if (!empty($searchQuery)) {
            return [
                'title' => 'Hasil pencarian "' . $searchQuery . '"' . $filterText . ' | Dar Ibnu Abbas',
                'description' => 'Hasil pencarian untuk "' . $searchQuery . '"' . $filterText . ' di koleksi kitab Dar Ibnu Abbas.',
                'keywords' => $searchQuery . ', kitab arab, buku islam, pencarian kitab',
                'canonical' => $currentUrl
            ];
        }

        if (!empty($filters)) {
            return [
                'title' => 'Kitab Filter' . $filterText . ' | Dar Ibnu Abbas',
                'description' => 'Koleksi kitab berdasarkan filter' . $filterText . ' untuk memperdalam ilmu Islam.',
                'keywords' => 'kitab arab, ' . implode(', ', array_merge($selectedCategories, $selectedAuthors, $selectedPublishers)) . ', buku islam',
                'canonical' => $currentUrl
            ];
        }

        return [
            'title' => 'Semua Produk Kitab Arab | Dar Ibnu Abbas',
            'description' => 'Lihat koleksi lengkap kitab Arab kami dari berbagai disiplin ilmu Islam.',
            'keywords' => 'kitab arab, buku islam, koleksi kitab, fiqh, hadits, tafsir',
            'canonical' => $baseUrl
        ];
    }

    /**
     * Show product detail
     */
    public function show($id, $slug = null)
    {
        $produk = DB::table('produk')
            ->leftJoin('produk_indo', 'produk_indo.id_produk', '=', 'produk.id')
            ->select([
                'produk.id',
                'produk.judul',
                'produk_indo.judul_indo',
                'produk.kategori',
                'produk.sub_kategori',
                'produk.penulis',
                'produk.penerbit',
                'produk.harakat',
                'produk.halaman',
                'produk.berat',
                'produk.cover',
                'produk.deskripsi',
                'produk.stok',
                'produk.images',
                'produk.harga_jual',
                'produk.harga_modal',
                'produk.created_at',
                'produk.link_youtube',
            ])
            ->where('produk.id', $id)
            ->first();

        if (!$produk) {
            abort(404, 'Produk tidak ditemukan');
        }

        // Convert object to array
        $produkArray = (array)$produk;

        // Handle images - check if images is JSON or single path
        $produkArray['images'] = [];
        if (!empty($produk->images)) {
            if ($this->is_json($produk->images)) {
                // If images is JSON, decode it
                $images = json_decode($produk->images, true);
                foreach ($images as $image) {
                    $produkArray['images'][] = $this->externalBaseUrl1 . $image;
                }
            } else {
                // If images is a single path
                $produkArray['images'][] = $this->externalBaseUrl1 . $produk->images;
            }
        }

        // Slug check and redirect
        $expectedSlug = Str::slug($produk->judul_indo ?? $produk->judul ?? '');
        if ($slug && $slug !== $expectedSlug) {
            return redirect()->route('produk.detail', [
                'id' => $id,
                'slug' => $expectedSlug
            ], 301);
        }

        // Get basic kategori data and convert to array
        $kategoris = DB::table('kategori')->select('id', 'nama_arab', 'nama_indonesia')->get()->map(function ($item) {
            return (array)$item;
        })->toArray();

        // Generate SEO data for detail page
        $seo = [
            'title' => ($produk->judul ?? 'Produk') . ' | Dar Ibnu Abbas',
            'description' => substr(strip_tags('Kitab ' . ($produk->judul ?? '') . ' karya ' . ($produk->penulis ?? '')), 0, 160),
            'keywords' => ($produk->judul ?? '') . ', kitab arab, ' . ($produk->kategori ?? 'buku islam'),
            'canonical' => url()->current(),
            'og_image' => $produkArray['images'][0] ?? asset('images/default-book.jpg')
        ];

        return view('produk.detail', ['produk' => $produkArray, 'kategoris' => $kategoris, 'seo' => $seo]);
    }
    private function is_json($string)
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
