<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HardwareInventory;
use App\Http\Controllers\ComputerInventory;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\AudittrailController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EtcITMember;
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

 Route::get('/home',[HomeController::class, 'home']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

Route::resource('/hardware', HardwareInventory::class)->middleware(['auth']);
Route::resource('/computer', ComputerInventory::class)->middleware(['auth']);
Route::resource('/department',DepartmentController::class)->middleware(['auth']);
Route::resource('/Item',ItemController::class)->middleware(['auth']);
Route::resource('/users',ManageUserController::class)->middleware(['auth']);
Route::resource('/audittrail',AudittrailController::class)->middleware(['auth']);
Route::resource('/pdf',PdfController::class)->middleware(['auth']);
Route::resource('/etcit',EtcITMember::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
