<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;

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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    $products = Product::all(); // Retrieve all products
    return view('web.index', ['products' => $products]); // Pass the $products variable to the view
})->name('home');

Route::get('/shop', function () {
    $products = Product::all();
    return view('web.shop', ['products' => $products]);
})->name('shop');

Route::middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

Route::get('/shoppingcart', function () {
    return view('Components.shoppingcart');
})->name('shoppingcart');

Route::get('/checkout', function () {
    return view('Components.checkout');
})->name('checkout');

Route::resource('product', ProductController::class)->middleware(['auth', 'is_admin']);
// Route::resource('products', ProductController::class);


// Route::get('/dashboard', function () {
// $products = \App\Models\Product::all();
// return view('dashboard', compact('products'));
// })->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified', 'is_admin'])
->name('dashboard');


Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::post('/cart/add/{productId}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');



Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Add this POST route to handle the filter action
Route::post('/products/filter', [ProductController::class, 'filter'])->name('products.filter');




Route::post('/submit-order', [OrderController::class, 'submitOrder'])->name('submit-order')->middleware('auth');


    
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('users', 'UserController');
});
Route::resource('users', UserController::class)->middleware(['auth', 'is_admin']);


// If defining individual routes
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('/newsletter-signup', [NewsletterController::class, 'signup'])->name('newsletter.signup')->middleware('auth');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
