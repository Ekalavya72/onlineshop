<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Frontend.index');
});


Route::get('/category', function () {
    return view('Frontend.category');
});


Route::get('/product-details', function () {
    return view('Frontend.product-details');
});


Route::get('/checkout',function (){
    return view('Frontend.checkout');
});


Route::get('/cart',function () {

    return view('Frontend.cart');
});



Route::get('/blog', function () {
    return view('Frontend.blog');
});

Route::get('/blog-details', function () {
    return view('Frontend.blog-details');
});


Route::get('/tracking', function () {
    return view('Frontend.tracking');
});


Route::get('/elements', function (){
    return view('Frontend.elements');
});


Route::get('/contact', function () {
    return view('Frontend.contact');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
