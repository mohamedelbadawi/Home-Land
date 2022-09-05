<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuildingController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/requests', [BuildingController::class, 'getRequests'])->name('building.requests');
    Route::get('/buildings', [BuildingController::class, 'getApprovedBuildings'])->name('building.approved');
    Route::post('/buildings/create', [BuildingController::class, 'addBuilding'])->name('building.add');
    Route::post('/buildings/updateStatus/{building}', [BuildingController::class, 'updateBuildingStatus'])->name('building.updateStatus');
});
