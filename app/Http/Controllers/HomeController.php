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
    {           // تحديد اللغة الحالية للموقع (ar أو en)
        $locale = App::getLocale();
        // إرسال طلب للـ API مع تمرير اللغة
        $response = Http::get("https://dashbord-main-oubfum.laravel.cloud/api/categories/", [
            'locale' => $locale
        ]);
         $categories = $response->successful() ? $response->json()['data'] : [];
        return view('home', compact('categories'));
    }


}
