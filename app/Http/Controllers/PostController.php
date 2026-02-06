<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * Display the specified post.
     */
    public function show(Request $request, $slug)
    {
        // Use backend URL from configuration or fallback to the default cloud URL
        $baseUrl = config('services.backend_url') ?? 'https://dashbord-main-oubfum.laravel.cloud';

        // Retrieve the current locale from the session
        $locale = app()->getLocale();

        // Fetch post data from the API
        $response = Http::get("{$baseUrl}/api/posts/{$slug}", [
            'locale' => $locale,
        ]);

        // Trigger a 404 error if the API response is not successful
        abort_if(!$response->ok(), 404);

        $post = $response->json('data');

        // Automatic redirection if the slug has changed
        // This ensures the URL stays synchronized with the localized content (SEO friendly)
        if ($post['slug'] !== $slug) {
            return redirect()->route('post', [
                'slug' => $post['slug']
            ]);
        }

        return view('post.index', compact('post'));
    }
}
