<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{

    public function index() {
        return view('pages.contact');
    }

    public function store(Request $request) {
        $baseUrl = config('services.backend_url') ?? 'https://dashbord-main-oubfum.laravel.cloud';

        // 1. Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 2. Send data to the API
        $response = Http::post("{$baseUrl}/api/contact/send", $validated);

        if ($response->successful()) {
            return back()->with('success', __('site.contact_success'));
        }

        return back()->withErrors([
            'api_error' => __('site.contact_error')
        ])->withInput();
    }
}
