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
// بدلاً من كتابة الرابط يدوياً، استخدم config أو env
$baseUrl = config('services.backend_url') ?? 'https://dashbord-main-oubfum.laravel.cloud';
    // 1. جلب التصنيفات للهيدر
    $responseCat = Http::get("{$baseUrl}/api/categories/", [
        'locale' => $locale
    ]);
    $categories = $responseCat->successful() ? $responseCat->json()['data'] : [];

    // 2. جلب المقالات المفلترة
    // ملاحظة: نرسل 'category_slug' وهو الاسم المتوقع في الـ API للبحث في علاقة الـ Many-to-Many
    $postsResponse = Http::get("{$baseUrl}/api/posts", [
        'locale' => $locale,
        'category_id' => $slug
    ]);

    $posts = $postsResponse->successful() ? $postsResponse->json()['data'] : [];

    // البحث عن اسم التصنيف الحالي لعرضه كعنوان للصفحة
    $currentCategory = collect($categories)->firstWhere('id', $slug);
    $categoryName = $currentCategory ? $currentCategory['name'] : $slug;

    return view('category.index', compact('categories', 'posts', 'categoryName'));
}
    // public function index(Request $request, $slug)
    // {           // تحديد اللغة الحالية للموقع (ar أو en)
    //     $locale = App::getLocale();
    //     // إرسال طلب للـ API مع تمرير اللغة
    //     $response = Http::get("http://127.0.0.1:8000/api/categories/", [
    //         'locale' => $locale
    //     ]);
    //     $categories = $response->successful() ? $response->json()['data'] : [];
    //     $postsResponse = Http::get("http://127.0.0.1:8000/api/posts/", [
    //         'locale' => $locale,
    //         'categories.slug' => $slug // سيرسل null إذا لم يتم اختيار تصنيف
    //     ]);

    //     $posts = $postsResponse->successful() ? $postsResponse->json()['data'] : [];
    //     return view('category.index', compact('categories', 'posts'));
    // }
}
