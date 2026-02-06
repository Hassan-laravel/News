<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class CategoryService
{
    /**
     * Fetch all categories from the API based on the current locale.
     */
    public function getCategories()
    {
        // Define the current site locale (e.g., ar, en, or nl)
        $locale = App::getLocale();

        // Send a GET request to the API passing the locale as a parameter
        $response = Http::get("http://127.0.0.1:8000/api/categories/", [
            'locale' => $locale
        ]);

        // Return the data if the request was successful
        if ($response->successful()) {
            return $response->json()['data'];
        }

        // Return an empty array in case of failure
        return [];
    }
}
