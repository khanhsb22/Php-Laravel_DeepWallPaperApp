<?php

use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\ImageApiController;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("getAllCategory", [CategoryApiController::class, "getAllCategory"]);


// For normal user (Image by categoy)
Route::get("getImageOfCategory/{name}", [ImageApiController::class, "getImageOfCategory"]);

// For premium user (Image by categoy)
Route::get("getPremiumImageOfCategory/{name}", [ImageApiController::class, "getPremiumImageOfCategory"]);

// For Random Fragment
Route::get("getAllImage", [ImageApiController::class, "getAllImage"]);
Route::get("getAllPremiumImages", [ImageApiController::class, "getAllPremiumImages"]);

// To run laravel server testing api, let run command: php artisan serve --host=0.0.0.0 --port=8000

/* IP address is taken from the network ip address on the computer */

// http://192.168.1.8:8000/api/getAllCategory
