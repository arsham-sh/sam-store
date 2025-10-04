<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Panel\AdminController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\ColorController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\OrderController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\ProductGalleryController;
use App\Http\Controllers\Panel\SizeController;
use App\Http\Controllers\Panel\SliderController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/products',[IndexController::class,'products'])->name('products');
Route::get('/products/{product:slug}',[IndexController::class,'singleProduct'])->name('single.product');

Route::get('/category' , [IndexController::class , 'category'])->name('category');
Route::get('/category/{category:slug}' , [IndexController::class , 'showCategory'])->name('show.category');

Route::post('/comments', [HomeController::class , 'comments'])->name('send.comment');

Route::post('cart/add/{product}',[CartController::class , 'addToCart'])->name('cart.add');

Route::get('cart',[CartController::class , 'cart'])->name('cart');
Route::patch('cart/quantity/change', [CartController::class , 'quantityChange']);
Route::delete('/cart/delete/{cart}', [CartController::class , 'deleteCart'])->name('cart.destroy');

Route::post('/payment' , [PaymentController::class , 'payment'])->name('cart.payment')->middleware('auth');
Route::get('/payment/callback' , [PaymentController::class , 'callback'])->name('payment.callback');


Route::prefix('/profile')->middleware('auth')->group(function(){
     Route::get('/' , [ProfileController::class , 'index'])->name('profile');
     Route::get('/{user}/edit' , [ProfileController::class , 'edit'])->name('edit');
     Route::patch('/{user}' , [ProfileController::class , 'update'])->name('update');
     Route::get('/orders' , [ProfileController::class , 'order'])->name('profile.orders');
     Route::get('/orders/{order}' , [ProfileController::class , 'showDetails'])->name('profile.order.detail');
     Route::get('/orders/{order}/payment' , [ProfileController::class , 'payment'])->name('profile.order.payment');
});


Route::get('search' , [IndexController::class , 'search'])->name('search');
Route::get('search-products' , [IndexController::class , 'searchProducts'])->name('products.search');

// route admin 
Route::prefix('admin')->middleware(['auth', 'checkuser'])->group(function () {
     Route::get('/', [AdminController::class, 'index'])->name('admin');
     Route::resource('/users', UserController::class);
     Route::resource('/sliders', SliderController::class);
     Route::resource('/products', ProductController::class);
     Route::resource('/colors', ColorController::class);
     Route::resource('/sizes' , SizeController::class);
     Route::resource('/categories' , CategoryController::class);
     Route::resource('/products.gallery', ProductGalleryController::class)->except(['edit' , 'update']);
     Route::resource('/comments', CommentController::class)->only(['index','update','destroy']);
     Route::get('/comments/unapproved',[CommentController::class , 'unApproved'])->name('comment.approved');
     Route::resource('/orders', OrderController::class);
     
     Route::get('/orders/{order}/orders' , [OrderController::class , 'payments'])->name('orders.payments');
});