<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('homepage');

Route::resource('/page', PageController::class)->only(['show']);

Route::resource('/product', ProductController::class)->only(['show']);

Route::post('/product/{product}/enquiry', [ProductController::class, 'enquiry'])->name('product.enquiry');

// this route is to see how the email will look. the email is set to log in the env file so will be sent there.
Route::get('/email-preview', function () {
    $product = App\Models\Product::first();
    return new App\Mail\ProductEnquiry($product, 'Haleem Hussain', 'haleem@gmail.com', 'Is this still available?');
});
