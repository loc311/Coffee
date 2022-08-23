<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

//các trang 
Route::get('/trang_chu', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/san_pham', [App\Http\Controllers\HomeController::class, 'product']);
Route::get('/chi_tiet_san_pham/{product_id}', [App\Http\Controllers\ProductController::class, 'detail_product']);
Route::get('/danh_muc_san_pham/{category_id}', [App\Http\Controllers\HomeController::class, 'show_category']);
Route::post('/tim_kiem', [App\Http\Controllers\HomeController::class, 'search']);
Route::get('/wishlist', [App\Http\Controllers\HomeController::class, 'wishlist']);
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/password_customer',[App\Http\Controllers\CheckoutController::class, 'password_customer']);
Route::post('/customer',[App\Http\Controllers\CheckoutController::class, 'customer']);
Route::get('/order_manage',[App\Http\Controllers\HomeController::class, 'order_manage']);
Route::get('/view_order_customer/{order_id}',[App\Http\Controllers\HomeController::class, 'view_order_customer']);



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index']);

Route::get('/dashboard',[App\Http\Controllers\AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard',[App\Http\Controllers\AdminController::class, 'dashboard']);
Route::get('/logout',[App\Http\Controllers\AdminController::class, 'logout']);
Route::get('/manage_order',[App\Http\Controllers\AdminController::class, 'manage_order']);
Route::get('/view_order/{order_id}',[App\Http\Controllers\AdminController::class, 'view_order']);


//Category Product
Route::get('/add_category_product',[App\Http\Controllers\CategoryProduct::class, 'add_category_product']);
Route::get('/all_category_product',[App\Http\Controllers\CategoryProduct::class, 'all_category_product']);
Route::get('/edit_category_product/{category_product_id}',[App\Http\Controllers\CategoryProduct::class, 'edit_category_product']);
Route::get('/delete_category_product/{category_product_id}',[App\Http\Controllers\CategoryProduct::class, 'delete_category_product']);


//save category product
Route::post('/save_category_product',[App\Http\Controllers\CategoryProduct::class, 'save_category_product']);

//update
Route::post('/update_category_product/{category_product_id}',[App\Http\Controllers\CategoryProduct::class, 'update_category_product']);

// Product
Route::get('/add_product',[App\Http\Controllers\ProductController::class, 'add_product']);
Route::get('/all_product',[App\Http\Controllers\ProductController::class, 'all_product']);
Route::get('/edit_product/{product_id}',[App\Http\Controllers\ProductController::class, 'edit_product']);
Route::get('/delete_product/{product_id}',[App\Http\Controllers\ProductController::class, 'delete_product']);


//save product
Route::post('/save_product',[App\Http\Controllers\ProductController::class, 'save_product']);

//update
Route::post('/update_product/{product_id}',[App\Http\Controllers\ProductController::class, 'update_product']);

//Cart
Route::post('/save_cart',[App\Http\Controllers\CartController::class, 'save_cart']);
Route::get('/show_cart',[App\Http\Controllers\CartController::class, 'show_cart']);
Route::get('/delete_to_cart/{rowId}',[App\Http\Controllers\CartController::class, 'delete_to_cart']);
Route::get('/update1_to_cart/{rowId}/{qty}',[App\Http\Controllers\CartController::class, 'update1_to_cart']);
Route::get('/update2_to_cart/{rowId}/{qty}',[App\Http\Controllers\CartController::class, 'update2_to_cart']);

//checkout
Route::get('/login_checkout',[App\Http\Controllers\CheckoutController::class, 'login_checkout']);
Route::get('/logout_checkout',[App\Http\Controllers\CheckoutController::class, 'logout_checkout']);
Route::post('/add_customer',[App\Http\Controllers\CheckoutController::class, 'add_customer']);
Route::post('/login_customer',[App\Http\Controllers\CheckoutController::class, 'login_customer']);
Route::get('/checkout',[App\Http\Controllers\CheckoutController::class, 'checkout']);
Route::post('/save_order',[App\Http\Controllers\CheckoutController::class, 'save_order']);
Route::get('/payment',[App\Http\Controllers\CheckoutController::class, 'payment']);

//wishlist
Route::get('/add_wishlist/{customerID}/{productID}',[App\Http\Controllers\HomeController::class, 'add_wishlist']);
Route::get('/remove_wishlist/{customerID}/{productID}',[App\Http\Controllers\HomeController::class, 'remove_wishlist']);

//pdf
Route::get('/print_order/{checkout_code}',[App\Http\Controllers\CheckoutController::class, 'print_order']);

