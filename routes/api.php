<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\ItemController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

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
Route::group([
    #'middleware' => 'api',
    'prefix' => 'auth',
], function() {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('me', [AuthController::class, 'me'])->name('me');

});

Route::group(['prefix' => 'shopping-cart', 'name' => 'shopping_cart'], function () {
    Route::get('', [ShoppingCartController::class, 'index'])->name('index');
    Route::put('{id}', [ShoppingCartController::class, 'update'])->name('update_cart');
});

Route::group(['prefix' => 'credit-card', 'name' => 'credit_card'], function () {
    Route::get('', [CreditCardController::class, 'index'])->name('index');
    Route::post('', [CreditCardController::class, 'store'])->name('store_card');
    Route::delete('{id}', [CreditCardController::class, 'destroy'])->name('destroy_card');
});

Route::group(['prefix' => 'item', 'name' => 'item'], function () {
    Route::get('', [ItemController::class, 'index'])->name('index');
    Route::get('{id}', [ItemController::class, 'index'])->name('index_item');
    Route::put('{id}', [ItemController::class, 'update'])->name('update_item');
    Route::post('', [ItemController::class, 'store'])->name('store_item');
    Route::delete('{id}', [ItemController::class, 'destroy'])->name('destroy_item');
});
