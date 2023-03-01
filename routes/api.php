<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StarController;

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

Route::get('star', [StarController::class, 'getAll']);
Route::post('star/store', [StarController::class, 'store']);
Route::get('star/name/{name}', [StarController::class, 'getStarByName']);
Route::get('star/{id}', [StarController::class, 'getById']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
