<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

// Rate Limiting for a whole group of routes
Route::group(['middleware' => 'throttle:60,1'], function () {

    // register & login authentication
    Route::group(['prefix' => 'authentication'], function () {
        Route::post('/register', [ApiAuthController::class, 'register'])->name('authentication.register');
        Route::post('/login', [ApiAuthController::class, 'login'])->name('authentication.login');
    });

    // application access routes
    Route::group(['prefix' => 'application'], function () {
        Route::apiResource('/posts', PostController::class);
    });
});
