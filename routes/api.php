<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DrugsController;
use App\Http\Controllers\CategoryController;
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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

//Api Drugs
Route::get('Drugs', [DrugsController::class, 'index']);
Route::get('Drugs/{id}', [DrugsController::class, 'show']);
Route::post('Drugs', [DrugsController::class, 'store']);
Route::put('Drugs/{id}', [DrugsController::class, 'update']);
Route::delete('Drugs/{id}', [DrugsController::class, 'delete']);

//Api Category
Route::get('Category', [CategoryController::class, 'index']);
Route::get('Category/{id}', [CategoryController::class, 'show']);
Route::post('Category', [CategoryController::class, 'store']);
Route::put('Category/{id}', [CategoryController::class, 'update']);
Route::delete('Category/{id}', [CategoryController::class, 'delete']);

//Api Relationship
Route::get('Drugs/{id}/Category', [DrugsController::class, 'show1']);

Route::get('Category/{id}/Drugs', [CategoryController::class, 'show1']);