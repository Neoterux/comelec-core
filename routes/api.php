<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 |------------------------------------------------------------------------
 |  API Authentication Routes
 |------------------------------------------------------------------------
 |
 | Here we will define all the Authentication-related routes, they will
 | be unprotected due interact directly with the input without an API token
 | or JWT.
 |
 */
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('me', [AuthController::class, 'me']);
});

Route::middleware('auth:api')->group(function () {

});
