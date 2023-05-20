<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
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



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//guest routes
Route::get("/view-categories", [FrontendCategoryController::class,'index']);
Route::get("/category/{id}", [FrontendCategoryController::class,'show']);
Route::get("/test", [FrontendCategoryController::class,'test']);
Route::get("/view-menus", [FrontendMenuController::class,'index']);
Route::get("/reservations/create", [FrontendReservationController::class,'create']);
//Route::get("/reservations/step-two", [FrontendReservationController::class,'stepTwo']);
Route::post("/reservations/create", [FrontendReservationController::class,'store']);

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get("/dashboard", [AdminController::class, 'index']);

    //categories routes
    Route::get("/categories", [CategoryController::class, 'index']);
    Route::get("/categories/create", [CategoryController::class, 'create']);
    Route::get("/categories/{id}", [CategoryController::class, 'show']);
    Route::post("/categories/create", [CategoryController::class, 'store']);
    Route::get("/categories/edit/{id}", [CategoryController::class, 'edit']);
    Route::put("/categories/edit/{id}", [CategoryController::class, 'update']);
    Route::get("/categories/delete/{id}", [CategoryController::class, 'delete']);

    //menus routes
    Route::get("/menus", [MenuController::class, 'index']);
    Route::get("/menus/create", [MenuController::class, 'create']);
    Route::get("/menus/{id}", [MenuController::class, 'show']);
    Route::post("/menus/create", [MenuController::class, 'store']);
    Route::get("/menus/edit/{id}", [MenuController::class, 'edit']);
    Route::put("/menus/edit/{id}", [MenuController::class, 'update']);
    Route::get("/menus/delete/{id}", [MenuController::class, 'delete']);

    //tables routes
    Route::get("/tables", [TableController::class, 'index']);
    Route::get("/tables/create", [TableController::class, 'create']);
    Route::get("/tables/{id}", [TableController::class, 'show']);
    Route::post("/tables/create", [TableController::class, 'store']);
    Route::get("/tables/edit/{id}", [TableController::class, 'edit']);
    Route::put("/tables/edit/{id}", [TableController::class, 'update']);
    Route::get("/tables/delete/{id}", [TableController::class, 'delete']);

    //reservations routes
    Route::get("/reservations", [ReservationController::class, 'index']);
    Route::get("/reservations/create", [ReservationController::class, 'create']);
    Route::get("/reservations/{id}", [ReservationController::class, 'show']);
    Route::post("/reservations/create", [ReservationController::class, 'store']);
    Route::get("/reservations/edit/{id}", [ReservationController::class, 'edit']);
    Route::put("/reservations/edit/{id}", [ReservationController::class, 'update']);
    Route::get("/reservations/delete/{id}", [ReservationController::class, 'delete']);
});

