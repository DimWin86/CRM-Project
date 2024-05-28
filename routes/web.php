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

Route::get('/workers', [\App\Http\Controllers\Worker\IndexController::class, 'index']
)->middleware(['auth', 'verified'])->name('worker.index');

Route::get('/worker', [\App\Http\Controllers\Worker\CreateController::class, 'create']
)->middleware(['auth', 'verified'])->name('worker.create');

Route::get('/worker/{worker}', [\App\Http\Controllers\Worker\ShowController::class, 'show']
)->middleware(['auth', 'verified'])->name('worker.show');

Route::post('/worker/create', [\App\Http\Controllers\Worker\StoreController::class, 'store']
)->middleware(['auth', 'verified'])->name('worker.store');

Route::get('/worker/{worker}/edit', [\App\Http\Controllers\Worker\EditController::class, 'edit']
)->middleware(['auth', 'verified'])->name('worker.edit');

Route::patch('/worker/{worker}', [\App\Http\Controllers\Worker\UpdateController::class, 'update']
)->middleware(['auth', 'verified'])->name('worker.update');

Route::delete('/worker/{worker}/delete', [\App\Http\Controllers\Worker\DeleteController::class, 'delete']
)->middleware(['auth', 'verified'])->name('worker.destroy');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// Product -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('/products', [\App\Http\Controllers\Product\IndexController::class, 'index']
)->middleware(['auth', 'verified'])->name('product.index');

Route::get('/product/create', [\App\Http\Controllers\Product\CreateController::class, 'create']
)->middleware(['auth', 'verified'])->name('product.create');

Route::post('/product/create', [\App\Http\Controllers\Product\StoreController::class, 'store']
)->middleware(['auth', 'verified'])->name('product.store');

Route::get('/product/{product}', [\App\Http\Controllers\Product\ShowController::class, 'show']
)->middleware(['auth', 'verified'])->name('product.show');

Route::get('/product/{product}/edit', [\App\Http\Controllers\Product\EditController::class, 'edit']
)->middleware(['auth', 'verified'])->name('product.edit');

Route::patch('/product/{product}', [\App\Http\Controllers\Product\UpdateController::class, 'update']
)->middleware(['auth', 'verified'])->name('product.update');

Route::delete('/product/{product}/delete', [\App\Http\Controllers\Product\DeleteController::class, 'delete']
)->middleware(['auth', 'verified'])->name('product.destroy');
/////////////////////////////////////////////////////////////////////////////////////////////////////

// Sale -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('/sales', [\App\Http\Controllers\Sale\IndexController::class, 'index']
)->middleware(['auth', 'verified'])->name('sale.index');

Route::get('/sale/create', [\App\Http\Controllers\Sale\CreateController::class, 'create']
)->middleware(['auth', 'verified'])->name('sale.create');

Route::post('/sale/create', [\App\Http\Controllers\Sale\StoreController::class, 'store']
)->middleware(['auth', 'verified'])->name('sale.store');

Route::get('/sale/{sale}', [\App\Http\Controllers\Sale\ShowController::class, 'show']
)->middleware(['auth', 'verified'])->name('sale.show');

Route::get('/sale/{sale}/edit', [\App\Http\Controllers\Sale\EditController::class, 'edit']
)->middleware(['auth', 'verified'])->name('sale.edit');

Route::patch('/sale/{sale}', [\App\Http\Controllers\Sale\UpdateController::class, 'update']
)->middleware(['auth', 'verified'])->name('sale.update');

Route::delete('/sale/{sale}/delete', [\App\Http\Controllers\Sale\DeleteController::class, 'delete']
)->middleware(['auth', 'verified'])->name('sale.destroy');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// Buyer -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('/buyers', [\App\Http\Controllers\Buyer\IndexController::class, 'index']
)->middleware(['auth', 'verified'])->name('buyer.index');

Route::get('/buyer/create', [\App\Http\Controllers\Buyer\CreateController::class, 'create']
)->middleware(['auth', 'verified'])->name('buyer.create');

Route::post('/buyer/create', [\App\Http\Controllers\Buyer\StoreController::class, 'store']
)->middleware(['auth', 'verified'])->name('buyer.store');

Route::get('/buyer/{buyer}', [\App\Http\Controllers\Buyer\ShowController::class, 'show']
)->middleware(['auth', 'verified'])->name('buyer.show');

Route::get('/buyer/{buyer}/edit', [\App\Http\Controllers\Buyer\EditController::class, 'edit']
)->middleware(['auth', 'verified'])->name('buyer.edit');

Route::patch('/buyer/{buyer}/edit', [\App\Http\Controllers\Buyer\UpdateController::class, 'update']
)->middleware(['auth', 'verified'])->name('buyer.update');

Route::delete('/buyer/{buyer}/delete', [\App\Http\Controllers\Buyer\DeleteController::class, 'delete']
)->middleware(['auth', 'verified'])->name('buyer.destroy');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// WorkerSales -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('/workerSales/{worker}', [\App\Http\Controllers\Worker\ShowSalesController::class, 'show']
)->middleware(['auth', 'verified'])->name('workerSales.show');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// BuyerSales -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('/buyerSales/{buyer}', [\App\Http\Controllers\Buyer\ShowSalesController::class, 'show']
)->middleware(['auth', 'verified'])->name('buyerSales.show');

/////////////////////////////////////////////////////////////////////////////////////////////////////

// ProductAddCount -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('/productAddCount/{product}', [\App\Http\Controllers\Product\AddCountController::class, 'edit']
)->middleware(['auth', 'verified'])->name('productAddCount.edit');

Route::patch('/productAddCount/{product}', [\App\Http\Controllers\Product\AddCountController::class, 'update']
)->middleware(['auth', 'verified'])->name('productAddCount.update');

/////////////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
