<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
     public function show(Request $request, $slug)
    {
        $baseUrl = config('services.backend_url') ?? 'https://dashbord-main-oubfum.laravel.cloud';
        $locale = app()->getLocale(); // من Session

        $response =  Http::get("{$baseUrl}/api/posts/{$slug}", [
            'locale' => $locale,
        ]);

        abort_if(!$response->ok(), 404);

        $post = $response->json('data');

        // redirect تلقائي إذا slug تغيّر
        if ($post['slug'] !== $slug) {
            return redirect()->route('post', [
                'slug' => $post['slug']
            ]);
        }

        return view('post.index', compact('post'));
    }

}
