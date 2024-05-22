<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Worker -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('/workers', [\App\Http\Controllers\Worker\WorkerController::class, 'index']
)->middleware(['auth', 'verified'])->name('worker.index');

Route::get('/worker/create', function () {
    return Inertia::render('Worker/Create');
})->middleware(['auth', 'verified'])->name('worker.create');

Route::get('/worker/{worker}', [\App\Http\Controllers\Worker\WorkerController::class, 'show']
)->middleware(['auth', 'verified'])->name('worker.show');

Route::post('/worker/create', [\App\Http\Controllers\Worker\WorkerController::class, 'store']
)->middleware(['auth', 'verified'])->name('worker.store');

Route::get('/worker/{worker}/edit', [\App\Http\Controllers\Worker\WorkerController::class, 'edit']
)->middleware(['auth', 'verified'])->name('worker.edit');

Route::patch('/worker/{worker}', [\App\Http\Controllers\Worker\WorkerController::class, 'update']
)->middleware(['auth', 'verified'])->name('worker.update');

Route::delete('/worker/{worker}/delete', [\App\Http\Controllers\Worker\WorkerController::class, 'delete']
)->middleware(['auth', 'verified'])->name('worker.destroy');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// Product -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('/products', [\App\Http\Controllers\Product\ProductController::class, 'index']
)->middleware(['auth', 'verified'])->name('product.index');

Route::get('/product/create', [\App\Http\Controllers\Product\ProductController::class, 'create']
)->middleware(['auth', 'verified'])->name('product.create');

Route::post('/product/create', [\App\Http\Controllers\Product\ProductController::class, 'store']
)->middleware(['auth', 'verified'])->name('product.store');

Route::get('/product/{product}', [\App\Http\Controllers\Product\ProductController::class, 'show']
)->middleware(['auth', 'verified'])->name('product.show');

Route::get('/product/{product}/edit', [\App\Http\Controllers\Product\ProductController::class, 'edit']
)->middleware(['auth', 'verified'])->name('product.edit');

Route::patch('/product/{product}', [\App\Http\Controllers\Product\ProductController::class, 'update']
)->middleware(['auth', 'verified'])->name('product.update');

Route::delete('/product/{product}/delete', [\App\Http\Controllers\Product\ProductController::class, 'delete']
)->middleware(['auth', 'verified'])->name('product.destroy');
/////////////////////////////////////////////////////////////////////////////////////////////////////

// Sale -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('/sales', [\App\Http\Controllers\Sale\SaleController::class, 'index']
)->middleware(['auth', 'verified'])->name('sale.index');

Route::get('/sale/create', [\App\Http\Controllers\Sale\SaleController::class, 'create']
)->middleware(['auth', 'verified'])->name('sale.create');

Route::post('/sale/create', [\App\Http\Controllers\Sale\SaleController::class, 'store']
)->middleware(['auth', 'verified'])->name('sale.store');

Route::get('/sale/{sale}', [\App\Http\Controllers\Sale\SaleController::class, 'show']
)->middleware(['auth', 'verified'])->name('sale.show');

Route::get('/sale/{sale}/edit', [\App\Http\Controllers\Sale\SaleController::class, 'edit']
)->middleware(['auth', 'verified'])->name('sale.edit');

Route::patch('/sale/{sale}', [\App\Http\Controllers\Sale\SaleController::class, 'update']
)->middleware(['auth', 'verified'])->name('sale.update');

Route::delete('/sale/{sale}/delete', [\App\Http\Controllers\Sale\SaleController::class, 'delete']
)->middleware(['auth', 'verified'])->name('sale.destroy');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// Buyer -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('/buyers', [\App\Http\Controllers\Buyer\BuyerController::class, 'index']
)->middleware(['auth', 'verified'])->name('buyer.index');

Route::get('/buyer/create', [\App\Http\Controllers\Buyer\BuyerController::class, 'create']
)->middleware(['auth', 'verified'])->name('buyer.create');

Route::post('/buyer/create', [\App\Http\Controllers\Buyer\BuyerController::class, 'store']
)->middleware(['auth', 'verified'])->name('buyer.store');

Route::get('/buyer/{buyer}', [\App\Http\Controllers\Buyer\BuyerController::class, 'show']
)->middleware(['auth', 'verified'])->name('buyer.show');

Route::get('/buyer/{buyer}/edit', [\App\Http\Controllers\Buyer\BuyerController::class, 'edit']
)->middleware(['auth', 'verified'])->name('buyer.edit');

Route::patch('/buyer/{buyer}/edit', [\App\Http\Controllers\Buyer\BuyerController::class, 'update']
)->middleware(['auth', 'verified'])->name('buyer.update');

Route::delete('/buyer/{buyer}/delete', [\App\Http\Controllers\Buyer\BuyerController::class, 'delete']
)->middleware(['auth', 'verified'])->name('buyer.destroy');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// WorkerSales -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('/workerSales/{worker}', [\App\Http\Controllers\Worker\WorkerSalesController::class, 'show']
)->middleware(['auth', 'verified'])->name('workerSales.show');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// BuyerSales -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('/buyerSales/{buyer}', [\App\Http\Controllers\Buyer\BuyerSalesController::class, 'show']
)->middleware(['auth', 'verified'])->name('buyerSales.show');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// ProductAddCount -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('/productAddCount/{product}', [\App\Http\Controllers\Product\ProductAddCountController::class, 'edit']
)->middleware(['auth', 'verified'])->name('productAddCount.edit');

Route::patch('/productAddCount/{product}', [\App\Http\Controllers\Product\ProductAddCountController::class, 'update']
)->middleware(['auth', 'verified'])->name('productAddCount.update');

/////////////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
