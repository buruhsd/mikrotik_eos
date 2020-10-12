<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\DeviceController;

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

Route::get('/tes', [CobaController::class, 'index']);
Route::get('/tesadd', [CobaController::class, 'addUser']);
Route::get('/removeuser', [CobaController::class, 'removeUser']);

Route::get('/edituser', [CobaController::class, 'edit']);


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::name('dashboard.')->prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function(){

	Route::get('/', function () {
    	return view('dashboard');
    })->name('index');

    Route::get('/region', [RegionController::class, 'index'])->name('region.index');
    Route::get('/device', [DeviceController::class, 'index'])->name('device.index');
});

Route::get('dashboard2', function() {
    return view('dashboard2');
});



