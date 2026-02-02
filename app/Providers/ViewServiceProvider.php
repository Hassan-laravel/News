<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class ViewServiceProvider extends ServiceProvider
{

public function boot()
{
    View::composer('layouts.*', function ($view) {
        $locale = app()->getLocale();

        // 1. جلب الإعدادات (Settings) - لاحظ أنها غالباً لا تتأثر باللغة لكن سنمرر الـ locale احتياطاً
        // $settings = cache()->remember("site_settings", 86400, function ($locale) {
        //     $response = Http::get("http://127.0.0.1:8000/api/settings", ['locale' => $locale]);
        //     return $response->successful() ? $response->json()['data'] : null;
        // });

          $settings = cache()->remember("site_settings_{$locale}", 3600, function () use ($locale) {
            $response = Http::get("https://dashbord-main-oubfum.laravel.cloud/api/settings", ['locale' => $locale]);
            return $response->successful() ? $response->json()['data'] : [];
        });

        // 2. جلب الصفحات (Pages)
        $pages = cache()->remember("pages_nav_{$locale}", 3600, function () use ($locale) {
            $response = Http::get("https://dashbord-main-oubfum.laravel.cloud/api/pages", ['locale' => $locale]);
            return $response->successful() ? $response->json()['data'] : [];
        });

        // 3. جلب التصنيفات (Categories)
        $categories = cache()->remember("categories_nav_{$locale}", 3600, function () use ($locale) {
            $response = Http::get("https://dashbord-main-oubfum.laravel.cloud/api/categories", ['locale' => $locale]);
            return $response->successful() ? $response->json()['data'] : [];
        });

        // تمرير كل البيانات للـ Views
        $view->with([
            'settings'   => $settings,
            'pages'      => $pages,
            'categories' => $categories
        ]);
    });
}

}
