<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\L3EngineerController;
use App\Http\Controllers\L3TesterController;
use App\Http\Controllers\AccountsManagerController;
use App\Http\Controllers\GeneralManagerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

Route::middleware(['auth', 'role:inventory_manager'])->group(function () {
    Route::get('/inventory/dashboard', [InventoryController::class, 'index']);
});

Route::middleware(['auth', 'role:l3_engineer'])->group(function () {
    Route::get('/l3-engineer/dashboard', [L3EngineerController::class, 'index']);
});

Route::middleware(['auth', 'role:l3_tester'])->group(function () {
    Route::get('/l3-tester/dashboard', [L3TesterController::class, 'index']);
});

Route::middleware(['auth', 'role:accounts_manager'])->group(function () {
    Route::get('/accounts/dashboard', [AccountsManagerController::class, 'index']);
});

Route::middleware(['auth', 'role:general_manager'])->group(function () {
    Route::get('/general-manager/dashboard', [GeneralManagerController::class, 'index']);
});
