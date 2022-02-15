<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [App\HTTP\Controllers\FrontEndController::class, 'home'])->name('home');
Route::get('/home', [App\HTTP\Controllers\FrontEndController::class, 'home'])->name('home');
Route::get('/about', [App\HTTP\Controllers\FrontEndController::class, 'about'])->name('about');
Route::get('/contact', [App\HTTP\Controllers\FrontEndController::class, 'contact'])->name('contact');
Route::get('/faq', [App\HTTP\Controllers\FrontEndController::class, 'faq'])->name('faq');
Route::get('/terms', [App\HTTP\Controllers\FrontEndController::class, 'terms'])->name('terms');
Route::get('/privacy', [App\HTTP\Controllers\FrontEndController::class, 'privacy'])->name('privacy');
Route::get('/dashboard', [App\HTTP\Controllers\FrontEndController::class, 'dashboard'])->name('dashboard');
Route::get('/return', [App\HTTP\Controllers\FrontEndController::class, 'return'])->name('return');
Route::get('/category/{slug}', [App\HTTP\Controllers\FrontEndController::class, 'category'])->name('category');
Route::get('/categoryList/{slug}', [App\HTTP\Controllers\FrontEndController::class, 'categoryList'])->name('categoryList');
Route::get('/category2grid/{slug}', [App\HTTP\Controllers\FrontEndController::class, 'category2Grid'])->name('category2grid');
Route::get('/category4grid/{slug}', [App\HTTP\Controllers\FrontEndController::class, 'category4Grid'])->name('category4grid');
Route::get('/blogs', [App\HTTP\Controllers\FrontEndController::class, 'blogs'])->name('blogs');
Route::get('/product/{slug}/show', [App\HTTP\Controllers\FrontEndController::class, 'product'])->name('product');
Route::get('/checkout', [App\HTTP\Controllers\FrontEndController::class, 'checkout'])->name('checkout');
Route::get('/storeContact',[App\Http\Controllers\FrontEndController::class,'storeContact'])->name('storeContact');
Route::post('/wishlists',[App\Http\Controllers\WishlistController::class,'store'])->name('wishlists');
Route::post('/carts',[App\Http\Controllers\CartController::class,'store'])->name('carts');

Route::group(['middleware'=>'auth'], function(){

Route::get('/wishlist', [App\HTTP\Controllers\FrontEndController::class, 'wishlist'])->name('wishlist');
Route::get('/wishlist/{id}/Cart', [App\HTTP\Controllers\CartController::class, 'fromWishlist'])->name('wishlist.Cart');
Route::get('/wishlist/{id}/Delete', [App\HTTP\Controllers\WishlistController::class, 'destroy'])->name('wishlist.Delete');
Route::get('/cart', [App\HTTP\Controllers\FrontEndController::class, 'cart'])->name('cart');
Route::get('/cart/{id}/remove', [App\HTTP\Controllers\CartController::class, 'destroy'])->name('cart.remove');
Route::post('/cart/update', [App\HTTP\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/address',  [App\HTTP\Controllers\AddressController::class, 'store'])->name('address');
Route::post('/address/edit',  [App\HTTP\Controllers\AddressController::class, 'update'])->name('address.edit');
Route::post('/address/{id}/activate',  [App\HTTP\Controllers\AddressController::class, 'activate'])->name('address.activate');
Route::post('/placeOrder',   [App\HTTP\Controllers\OrderController::class, 'placeOrder'])->name('placeOrder');
Route::get('/orderCompleted',   [App\HTTP\Controllers\FrontEndController::class, 'orderCompleted'])->name('orderCompleted');

});

Route::group(['middleware'=>'role:super|admin'], function(){
//Backend
Route::get('/admin', [App\HTTP\Controllers\BackEndController::class, 'admin'])->name('admin');
Route::get('/Contact', [App\Http\Controllers\BackEndController::class,'Contact'])->name('Contact');
Route::get('/conInfo/{id}',[App\Http\Controllers\BackEndController::class,'conInfo'])->name('conInfo');


//Blogs
Route::get('/createBlogs', [App\Http\Controllers\BlogController::class, 'create'])->name('createBlogs');
Route::post('/storeBlogs', [App\Http\Controllers\BlogController::class, 'store'])->name('storeBlogs');
Route::get('/editBlogs/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('editBlogs');
Route::post('/updateBlogs/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('updateBlogs');
Route::get('/deleteBlogs/{id}', [App\Http\Controllers\BlogController::class, 'delete'])->name('deleteBlogs');
Route::get('/viewBlogs', [App\Http\Controllers\BlogController::class, 'index'])->name('viewBlogs');
Route::get('/status-updateBlog/{id}',[App\Http\Controllers\BlogController::class,'status'])->name('statusBlogs');

//category
Route::resource('admin/categories', CategoryController::class);

//Products
Route::resource('admin/products', ProductsController::class);
Route::get('admin/products/{id}/changeStatus', [App\Http\Controllers\ProductsController::class, 'toggleStatus'])->name('Product.toggleStatus');


//user
Route::resource('admin/users', UserController::class);
Route::get('admin/users/{id}/changeStatus', [App\Http\Controllers\UserController::class, 'toggleStatus'])->name('user.toggleStatus');

//order
Route::resource('admin/orders', OrderController::class);
});

Route::get('/mail/OrderConfirmed', [App\Http\Controllers\MailController::class, 'orderConfirmed'])->name('mail.OrderConfirmed');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//compare
Route::get('/compare', [App\HTTP\Controllers\FrontEndController::class, 'compare'])->name('compare');

