<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/home", [CategoryController::class, "getAllCategoryName"]);

Route::get("createNewCategory", [CategoryController::class, "createNewCategory"]);
Route::post("addCategory", [CategoryController::class, "addNewCategory"]);

// Add new images
Route::get("addImages", [ImageController::class, "showData"]);
Route::post("addImageFile", [ImageController::class, "addImageFile"]);

Route::get("showImagesOfCategory/{name}", [ImageController::class, "showImagesOfCategory"]);

// Add new premium images
Route::get("addPremiumImages", [ImageController::class, "showDataPremium"]);
Route::post("addPremiumImageFile", [ImageController::class, "addPremiumImageFile"]);

Route::get("showPremiumImagesOfCategory/{name}", [ImageController::class, "showPremiumImagesOfCategory"]);

// Delete images item
Route::get("deleteItems/{myJSON}", [ImageController::class, "deleteItems"]);
Route::get("deletePremiumItems/{myJSON}", [ImageController::class, "deletePremiumItems"]);

// Login
Route::get("/", [LoginController::class, "showLoginPage"]);
Route::get("login", [LoginController::class, "showLoginPage"]);
Route::post("login_action", [LoginController::class, "moveToHomePage"]);

// Logout
Route::get("logout", [LogoutController::class, "logoutAccount"]);

Route::get("test", [TestController::class, "test"]);

// To run Laravel local server, let run command: php artisan serve

// http://localhost:8000/home
