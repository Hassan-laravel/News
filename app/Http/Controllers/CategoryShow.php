<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use App\Services\CategoryService;

class CategoryShow extends Controller
{
    public function index(Request $request, $slug)
    {
        $locale = app()->getLocale();

        // Instead of hardcoding the URL, use config or env helpers
        $baseUrl = config('services.backend_url') ?? 'https://dashbord-main-oubfum.laravel.cloud';

        // 1. Fetch categories for the header navigation
        $responseCat = Http::get("{$baseUrl}/api/categories/", [
            'locale' => $locale
        ]);
        $categories = $responseCat->successful() ? $responseCat->json()['data'] : [];

        // 2. Fetch filtered posts
        // Note: We send 'category_id' (which represents the slug here) to the API
        // to handle the Many-to-Many relationship search.
        $postsResponse = Http::get("{$baseUrl}/api/posts", [
            'locale' => $locale,
            'category_id' => $slug
        ]);

        $posts = $postsResponse->successful() ? $postsResponse->json()['data'] : [];

        // Find the current category name to display as the page title
        $currentCategory = collect($categories)->firstWhere('id', $slug);
        $categoryName = $currentCategory ? $currentCategory['name'] : $slug;

        return view('category.index', compact('categories', 'posts', 'categoryName'));
    }

}
