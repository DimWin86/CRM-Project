<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Worker -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('workers', [\App\Http\Controllers\Api\Worker\IndexController::class, 'index']
);
Route::get('worker/{worker}', [\App\Http\Controllers\Api\Worker\ShowController::class, 'show']
);
Route::post('worker/create', [\App\Http\Controllers\Api\Worker\StoreController::class, 'store']
);
Route::get('worker/{worker}/edit', [\App\Http\Controllers\Api\Worker\EditController::class, 'edit']
);
Route::patch('worker/{worker}', [\App\Http\Controllers\Api\Worker\UpdateController::class, 'update']
);
Route::delete('worker/{worker}', [\App\Http\Controllers\Api\Worker\DeleteController::class, 'delete']
);
//////////////////////////////////////////////////////////////////////////////////////////////////////////

// WorkerSales -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('/workerSales/{worker}', [\App\Http\Controllers\Api\Worker\ShowSalesController::class, 'show']
);
/////////////////////////////////////////////////////////////////////////////////////////////////////



// Buyer -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('buyers', [\App\Http\Controllers\Api\Buyer\IndexController::class, 'index']
);
Route::post('buyer/create', [\App\Http\Controllers\Api\Buyer\StoreController::class, 'store']
);
Route::get('buyer/{buyer}', [\App\Http\Controllers\Api\Buyer\ShowController::class, 'show']
);
Route::get('buyer/{buyer}/edit', [\App\Http\Controllers\Api\Buyer\EditController::class, 'edit']
);
Route::patch('buyer/{buyer}/edit', [\App\Http\Controllers\Api\Buyer\UpdateController::class, 'update']
);
Route::delete('buyer/{buyer}', [\App\Http\Controllers\Api\Buyer\DeleteController::class, 'delete']
);
//////////////////////////////////////////////////////////////////////////////////////////////////////////

// BuyerSales -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('buyerSales/{buyer}', [\App\Http\Controllers\Api\Buyer\ShowSalesController::class, 'show']
);
///////////////////////////////////////////////////////////////////////////////////////////////////////


// Product -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('products', [\App\Http\Controllers\Api\Product\IndexController::class, 'index']
);
Route::post('product/create', [\App\Http\Controllers\Api\Product\StoreController::class, 'store']
);
Route::get('product/{product}', [\App\Http\Controllers\Api\Product\ShowController::class, 'show']
);
Route::get('product/{product}/edit', [\App\Http\Controllers\Api\Product\EditController::class, 'edit']
);
Route::patch('product/{product}', [\App\Http\Controllers\Api\Product\UpdateController::class, 'update']
);
Route::delete('product/{product}', [\App\Http\Controllers\Api\Product\DeleteController::class, 'delete']
);
/////////////////////////////////////////////////////////////////////////////////////////////////////

// ProductAddCount -- Routes /////////////////////////////////////////////////////////////////////////////////
Route::get('productAddCount/{product}', [\App\Http\Controllers\Api\Product\AddCountController::class, 'edit']
);
Route::patch('productAddCount/{product}', [\App\Http\Controllers\Api\Product\AddCountController::class, 'update']
);
/////////////////////////////////////////////////////////////////////////////////////////////////////
