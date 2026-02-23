<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogController extends Controller
{
    private function is_json($string)
    {
        if (!is_string($string)) return false;
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    protected function processImage($image)
    {
        if (empty($image)) return null;

        if ($this->is_json($image)) {
            $decoded = json_decode($image, true);
            if (is_array($decoded)) {
                // If it's a single object with 'url'
                if (isset($decoded['url'])) {
                    return $decoded['url'];
                }
                // If it's an array of objects
                if (isset($decoded[0]['url'])) {
                    return $decoded[0]['url'];
                }
            }
        }

        // Return direct URL if absolute, or handle as asset
        if (is_string($image) && str_starts_with($image, 'http')) {
            return $image;
        }

        return $image;
    }

    public function index()
    {
        $featured = DB::table('articles')
            ->where('is_featured', 1)
            ->first();
            
        if ($featured) {
            $featured->image = $this->processImage($featured->image);
        }
            
        $articles = DB::table('articles')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        foreach ($articles as $article) {
            $article->image = $this->processImage($article->image);
        }

        return view('blog.index', compact('featured', 'articles'));
    }

    public function show($slug)
    {
        $article = DB::table('articles')
            ->where('slug', $slug)
            ->first();

        if (!$article) {
            abort(404);
        }

        $article->image = $this->processImage($article->image);

        $related = DB::table('articles')
            ->where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->limit(3)
            ->get();

        foreach ($related as $item) {
            $item->image = $this->processImage($item->image);
        }

        return view('blog.show', compact('article', 'related'));
    }
}
