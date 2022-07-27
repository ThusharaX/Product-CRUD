<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

// product routes
Route::prefix('/product')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    // Add a new product
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    // Store a new product
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    // Edit a product
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    // Update a product
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    // Delete a product
    Route::delete('/delete/{product_id}', [ProductController::class, 'delete'])->name('product.delete');
    // Set active
    Route::get('/set-active/{product_id}', [ProductController::class, 'setActive'])->name('product.setActive');
    // Set inactive
    Route::get('/set-inactive/{product_id}', [ProductController::class, 'setInactive'])->name('product.setInactive');
    // View a product
    Route::get('/view/{product_id}', [ProductController::class, 'view'])->name('product.view');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
