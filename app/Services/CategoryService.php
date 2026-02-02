<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class CategoryService
{
    public function getCategories()
    {
        // تحديد اللغة الحالية للموقع (ar أو en)
        $locale = App::getLocale();

        // إرسال طلب للـ API مع تمرير اللغة
        $response = Http::get("http://127.0.0.1:8000/api/categories/", [
            'locale' => $locale
        ]);

        if ($response->successful()) {
            return $response->json()['data'];
        }

        return [];
    }
}
