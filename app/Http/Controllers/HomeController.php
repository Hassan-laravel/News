<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use App\Services\CategoryService;
class HomeController extends Controller
{
protected $categoryService;

    public function index()
    {
        $baseUrl = config('services.backend_url') ?? 'https://dashbord-main-oubfum.laravel.cloud';   // تحديد اللغة الحالية للموقع (ar أو en)
        $locale = App::getLocale();
        // إرسال طلب للـ API مع تمرير اللغة
        $responseCategory = Http::get("{$baseUrl}/api/categories/", [
            'locale' => $locale
        ]);
         $categories = $responseCategory->successful() ? $responseCategory->json()['data'] : [];

           $responsepost = Http::get("{$baseUrl}/api/posts/", [
            'locale' => $locale
        ]);
        $posts=$responsepost->successful() ? $responsepost->json()['data'] : [];

        return view('home', compact('categories','posts'));
    }


}
