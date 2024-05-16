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

Route::get('/workers', [\App\Http\Controllers\WorkerController::class, 'index']
)->middleware(['auth', 'verified'])->name('worker.index');

Route::get('/worker/create', function () {
    return Inertia::render('Worker/Create');
})->middleware(['auth', 'verified'])->name('worker.create');

Route::post('/worker/create', [\App\Http\Controllers\WorkerController::class, 'store']
)->middleware(['auth', 'verified'])->name('worker.store');

Route::get('/worker/{worker}', [\App\Http\Controllers\WorkerController::class, 'show']
)->middleware(['auth', 'verified'])->name('worker.show');

/////////////////////////////////////////////////////////////////////////////////////////////////////




Route::get('/products', function () {
    return Inertia::render('Product/Products');
})->middleware(['auth', 'verified'])->name('products');

Route::get('/sales', function () {
    return Inertia::render('Sale/Sales');
})->middleware(['auth', 'verified'])->name('sales');

Route::get('/buyers', function () {
    return Inertia::render('Buyer/Buyers');
})->middleware(['auth', 'verified'])->name('buyers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
