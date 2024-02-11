<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;

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
//USERS
Route::apiResource('/users', UserController::class);
Route::post('/users/consultar', [UserController::class,'consultar'])->name('users.consultar');

//ITEMS
Route::apiResource('/items', ItemController::class);
Route::post('/items/consultar', [ItemController::class,'consultar'])->name('items.consult');
Route::post('/items/uploadimage', [ItemController::class,'uploadimage'])->name('items.uploadimage');
//Route::put('/items/{item}/uploadimage', [ItemController::class,'uploadimage'])->name('items.uploadimage');