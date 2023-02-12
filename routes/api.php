<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HashController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\EncryptController;
use App\Http\Controllers\DecryptController;
use App\Http\Controllers\KeyController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth'], function() {
    Route::post('signin', 'SignInController');
    Route::post('signout', 'SignOutController');
    Route::post('register', 'RegisterController');
    Route::get('me', 'MeController');
});

Route::post('hash/convert', [HashController::class, 'convert']);
Route::get('hash/algos', [HashController::class, 'algos']);
Route::get('hash/password-algos', [HashController::class, 'passwordAlgos']);
Route::get('hash/crypt-algos', [HashController::class, 'cryptAlgos']);
Route::post('block/mine', [BlockController::class, 'mine']);
Route::post('crypt/encrypt', [EncryptController::class, 'encrypt']);
Route::post('crypt/decrypt', [DecryptController::class, 'decrypt']);
Route::post('key/get-keys', [KeyController::class, 'generateKeys']);
Route::post('key/sign-message', [KeyController::class, 'signMessage']);
