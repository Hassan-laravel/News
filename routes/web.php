<?php

use App\Http\Controllers\CategoryShow;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('switch-language/{lang}', function ($lang) {
    if (array_key_exists($lang, config('language.supported'))) {
        Session::put('locale', $lang);
    }
    return redirect()->back();
})->name('switch.language');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/article', function () {
    return view('article');
});


Route::get('/about', function () {
    return view('about');
});
Route::get('/category/{slug}', [CategoryShow::class, 'index']);
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post');
// routes/web.php
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
