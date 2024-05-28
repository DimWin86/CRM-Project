<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Worker -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('workers', [\App\Http\Controllers\Api\Worker\IndexController::class, 'index']
);
Route::get('/worker/{worker}', [\App\Http\Controllers\Api\Worker\ShowController::class, 'show']
);
Route::post('/worker', [\App\Http\Controllers\Api\Worker\StoreController::class, 'store']
);
Route::get('/worker/{worker}/edit', [\App\Http\Controllers\Api\Worker\EditController::class, 'edit']
);
Route::patch('/worker/{worker}', [\App\Http\Controllers\Api\Worker\UpdateController::class, 'update']
);
Route::delete('/worker/{worker}/delete', [\App\Http\Controllers\Api\Worker\DeleteController::class, 'delete']
);
/////////////////////////////////////////////////////////////////////////////////////////////////////

// WorkerSales -- Routes /////////////////////////////////////////////////////////////////////////////////

Route::get('/workerSales/{worker}', [\App\Http\Controllers\Api\Worker\ShowSalesController::class, 'show']
);
/////////////////////////////////////////////////////////////////////////////////////////////////////
