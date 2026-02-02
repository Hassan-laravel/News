<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{

 public function show(Request $request, $slug)
    {
        $baseUrl = config('services.backend_url') ?? 'https://dashbord-main-oubfum.laravel.cloud';
        $locale = app()->getLocale(); // من Session

        $response = Http::get("{$baseUrl}/api/pages/{$slug}", [
            'locale' => $locale,
        ]);

        abort_if(!$response->ok(), 404);

        $page = $response->json('data');

        // redirect تلقائي إذا slug تغيّر
        if ($page['slug'] !== $slug) {
            return redirect()->route('page', [
                'slug' => $page['slug']
            ]);
        }

        return view('pages.index', compact('page'));
    }


}
