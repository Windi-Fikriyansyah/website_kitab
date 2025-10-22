<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            // Get categories with their subcategories
            $kategoris = DB::table('kategori')
                ->leftJoin('sub_kategori', 'kategori.id', '=', 'sub_kategori.id_kategori')
                ->select(
                    'kategori.id',
                    'kategori.nama_arab as nama_arab',
                    'kategori.nama_indonesia as nama_indonesia',
                    'sub_kategori.id as sub_id',
                    'sub_kategori.nama_arab as sub_nama_arab',
                    'sub_kategori.nama_indonesia as sub_nama_indonesia'
                )
                ->orderBy('kategori.nama_indonesia')
                ->orderBy('sub_kategori.nama_indonesia')
                ->get()
                ->groupBy('id')
                ->map(function ($group) {
                    $firstItem = $group->first();

                    return [
                        'id' => $firstItem->id,
                        'nama_arab' => $firstItem->nama_arab,
                        'nama_indonesia' => $firstItem->nama_indonesia,
                        'subkategoris' => $group->map(function ($item) {
                            return $item->sub_id ? [
                                'id' => $item->sub_id,
                                'nama_arab' => $item->sub_nama_arab,
                                'nama_indonesia' => $item->sub_nama_indonesia
                            ] : null;
                        })->filter()->values()->toArray()
                    ];
                })->values()->toArray();

            $socialLinks = DB::table('social_links')->first();

            $view->with([
                'kategoris'   => $kategoris,
                'socialLinks' => $socialLinks
            ]);
        });
    }
}
