<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    /**
     * Display a specific page based on its slug.
     */
    public function show(Request $request, $slug)
    {
        // Use the backend URL from services config or fallback to the production URL
        $baseUrl = config('services.backend_url') ?? 'https://dashbord-main-oubfum.laravel.cloud';

        // Get the current locale from the application session
        $locale = app()->getLocale();

        // Fetch page data from the API
        $response = Http::get("{$baseUrl}/api/pages/{$slug}", [
            'locale' => $locale,
        ]);

        // Trigger a 404 error if the API response is not successful
        abort_if(!$response->ok(), 404);

        $page = $response->json('data');

        // Automatic redirection if the provided slug does not match the current translated slug
        // (Useful for SEO and handling language switches)
        if ($page['slug'] !== $slug) {
            return redirect()->route('page', [
                'slug' => $page['slug']
            ]);
        }

        return view('pages.index', compact('page'));
    }
}
