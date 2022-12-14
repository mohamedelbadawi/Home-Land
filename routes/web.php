<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Building;
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
    return redirect()->route('home');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/building/{building}', [HomeController::class, 'viewBuilding'])->name('building.view');

Route::group(['prefix' => 'admin', 'middleware' => "auth"], function () {
    Route::get('/', function () {
        return redirect()->route('admin.home');
    });
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware('IsAdmin')->name('admin.home');
    Route::get('/requests', [BuildingController::class, 'getRequests'])->middleware('IsAdmin')->name('building.requests');
    Route::get('/buildings', [BuildingController::class, 'buildings'])->middleware('IsAdmin')->name('building.index');
    Route::post('/buildings/create', [BuildingController::class, 'addBuilding'])->name('building.add');
    Route::post('/buildings/updateStatus/{building}', [BuildingController::class, 'updateBuildingStatus'])->middleware('IsAdmin')->name('building.updateStatus');
    Route::post('/building/delete/{building}', [BuildingController::class, 'deleteBuilding'])->name('building.delete');
    Route::get('/account', [AdminController::class, 'accountSettings'])->name('admin.account');
    Route::post('/account/update', [AdminController::class, 'updateAccount'])->name('admin.account.update');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::group(['prefix' => 'agent', 'middleware' => "auth"], function () {
    Route::get('/dashboard', [AgentController::class, 'index'])->name('agent.home');
    Route::post('/buildings/update/{id}', [BuildingController::class, 'updateBuilding'])->name('building.update');
    Route::get('/account', [AgentController::class, 'accountSettings'])->name('agent.account');
    Route::post('/account/update', [AgentController::class, 'updateAccount'])->name('agent.account.update');
});
