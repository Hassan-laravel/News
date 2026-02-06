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
        // Apply View Composer to all views in the 'layouts' directory
        View::composer('layouts.*', function ($view) {
            $locale = app()->getLocale();

            // 1. Fetch Site Settings
            // Note: While settings are often global, we pass the locale as a precaution
            // to retrieve localized versions of site names or descriptions.
            // We cache the results per locale to optimize performance.
            $settings = cache()->remember("site_settings_{$locale}", 3600, function () use ($locale) {
                $response = Http::get("https://dashbord-main-oubfum.laravel.cloud/api/settings", ['locale' => $locale]);
                return $response->successful() ? $response->json()['data'] : [];
            });

            // 2. Fetch Pages for navigation
            $pages = cache()->remember("pages_nav_{$locale}", 3600, function () use ($locale) {
                $response = Http::get("https://dashbord-main-oubfum.laravel.cloud/api/pages", ['locale' => $locale]);
                return $response->successful() ? $response->json()['data'] : [];
            });

            // 3. Fetch Categories for navigation
            $categories = cache()->remember("categories_nav_{$locale}", 3600, function () use ($locale) {
                $response = Http::get("https://dashbord-main-oubfum.laravel.cloud/api/categories", ['locale' => $locale]);
                return $response->successful() ? $response->json()['data'] : [];
            });

            // Share all retrieved data with the views
            $view->with([
                'settings'   => $settings,
                'pages'      => $pages,
                'categories' => $categories
            ]);
        });
    }
}
