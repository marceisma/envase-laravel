<?php

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

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaController;


Route::get('/', [Login::class, 'index'])->name('login.index');

Route::middleware(['auth'])->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'panel'])->name('dashboard');

    Route::prefix('empresa')->name('empresa.')->group(function() {
        Route::get('/panel', [EmpresaController::class, 'panel'])->name('panel');
        Route::get('/create', [EmpresaController::class, 'create'])->name('create');
        Route::post('/update-store-empresa', [EmpresaController::class, 'updateStora'])->name('update-store');
    });
    
});

/*
Route::middleware(['auth', 'permission.level-1'])->group(function () {  
});
*/
