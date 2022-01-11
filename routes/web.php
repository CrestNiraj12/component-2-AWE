<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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


Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [HomeController::class, "index"]);
Route::get('/products', [ProductsController::class, "index"]);
Route::get('/products/search', [ProductsController::class, "searchProducts"])->name("search");

Route::middleware(['auth:sanctum', 'verified'])->prefix("admin")->group(function () {
    Route::prefix("products")->group(function () {
        Route::prefix("categories")->group(function () {
            Route::get('/', [ProductCategoryController::class, 'index']);
            Route::get('add', [ProductCategoryController::class, 'showAddPage'])->name('productCategories.storePage')->middleware('can:create-product-category');
            Route::post('/', [ProductCategoryController::class, 'store'])->name('productCategories.store')->middleware('can:create-product-category');
            Route::put('{id}', [ProductCategoryController::class, 'update'])->name('productCategories.update')->middleware('can:update-product-category');
            Route::post('{id}/edit', [ProductCategoryController::class, 'showEditPage'])->name('productCategories.updatePage')->middleware('can:update-product-category');
            Route::delete('{id}', [ProductCategoryController::class, 'destroy'])->name('productCategories.destroy')->middleware('can:delete-product-category');
        });
        Route::get('/', [ProductController::class, 'index']);
        Route::get('{product}', [ProductController::class, 'show'])->name('products.show')->middleware('can:view-product');
        Route::get('add', [ProductController::class, 'showAddPage'])->name('products.storePage')->middleware('can:create-product');
        Route::post('/', [ProductController::class, 'store'])->name('products.store')->middleware('can:create-product');
        Route::put('{product}', [ProductController::class, 'update'])->name('products.update')->middleware('can:update-product');
        Route::post('{product}/edit', [ProductController::class, 'showEditPage'])->name('products.updatePage')->middleware('can:update-product');
        Route::delete('{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('can:delete-product');
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
