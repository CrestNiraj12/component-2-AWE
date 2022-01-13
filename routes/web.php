<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartHasProductsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailChimpController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\UserControlController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReviewsProductsController;
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

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/products', [ProductsController::class, "index"]);
Route::get('/products/search', [ProductsController::class, "searchProducts"])->name("search");
Route::view('/about', "pages.about");
Route::view('/contact', "pages.contact");
Route::get('/products/{id}', [ProductController::class, "show"])->name("products.show");
Route::post('/mailchimp/subscribe', [MailChimpController::class, "subscribe"])->name("mailchimp.subscribe");
Route::post('/product/review', [UserReviewsProductsController::class, "store"])->name("product.review");
Route::post('/send-message', [ContactController::class, "message"])->name("send-message");


Route::middleware(['auth:sanctum', 'verified'])->group(function () {    
    Route::prefix("admin")->group(function() {
        Route::get('contacts', [ContactController::class, "index"])->name("contacts")->middleware('can:view-contacts');
        Route::get('contacts/{id}', [ContactController::class, "show"])->name("contacts.show")->middleware('can:view-contacts');

        Route::get('dashboard', [DashboardController::class, "index"])->name('dashboard')->middleware('can:access-dashboard');
        Route::get("/payment/{id}", [PaymentController::class, "show"])->name("payment.show")->middleware('can:access-dashboard');

        Route::prefix("products")->group(function () {
            Route::prefix("categories")->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index'])->name('productCategory');
                Route::get('add', [ProductCategoryController::class, 'showAddForm'])->name('productCategories.storePage')->middleware('can:create-product-category');
                Route::post('/', [ProductCategoryController::class, 'store'])->name('productCategories.store')->middleware('can:create-product-category');
                Route::put('{id}', [ProductCategoryController::class, 'update'])->name('productCategories.update')->middleware('can:update-product-category');
                Route::get('edit/{id}', [ProductCategoryController::class, 'showEditForm'])->name('productCategories.updatePage')->middleware('can:update-product-category');
                Route::delete('{id}', [ProductCategoryController::class, 'destroy'])->name('productCategories.destroy')->middleware('can:delete-product-category');
            });
            Route::get('/', [ProductController::class, 'index'])->name("products");
            Route::get('add', [ProductController::class, 'showAddForm'])->name('products.storePage')->middleware('can:create-product');
            Route::post('/', [ProductController::class, 'store'])->name('products.store')->middleware('can:create-product');
            Route::put('{product}', [ProductController::class, 'update'])->name('products.update')->middleware('can:update-product,product');
            Route::get('edit/{product}', [ProductController::class, 'showEditForm'])->name('products.updatePage')->middleware('can:update-product,product');
            Route::delete('{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('can:delete-product,product');
        });

        Route::prefix("users")->group(function () {
            Route::get('/', [UserControlController::class, 'index']);
            Route::get('{user}', [UserControlController::class, 'show'])->name('users.show')->middleware('can:view-user');
            Route::get('add', [UserControlController::class, 'showAddPage'])->name('users.storePage')->middleware('can:create-user');
            Route::post('/', [UserControlController::class, 'store'])->name('users.store')->middleware('can:create-user');
            Route::put('{user}', [UserControlController::class, 'update'])->name('users.update')->middleware('can:update-user');
            Route::post('{user}/edit', [UserControlController::class, 'showEditPage'])->name('users.updatePage')->middleware('can:update-user');
            Route::delete('{user}', [UserControlController::class, 'destroy'])->name('users.destroy')->middleware('can:delete-user');
        });
    });

    Route::get("/cart/products", [CartController::class, "count"])->name("cart-products-count");
    
    Route::middleware(['can:buy-product'])->group(function() {
        Route::get("/checkout", [CheckoutController::class, "index"])->name("checkout");
        Route::post("/payment", [PaymentController::class, "store"])->name("payment");
        Route::get('/success', [SuccessController::class, "index"])->name("success");
        Route::get('/error', [ErrorController::class, "index"])->name("error");
        
        Route::prefix("cart")->group(function() {
            Route::get("/", [CartController::class, "index"])->name("cart");
            Route::post("/", [CartHasProductsController::class, "store"])->name("add-to-cart");
            Route::put("/", [CartHasProductsController::class, "update"])->name("update-cart");
            Route::get("{id}/delete", [CartHasProductsController::class, "destroy"])->name("remove-from-cart");
        });
    });
});
