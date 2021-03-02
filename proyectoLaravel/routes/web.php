<?php

use \App\Http\Controllers\CatalogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [MainController::class,'index']);
Route::get('/listado', [CatalogController::class, 'getIndex'])->name('listado');

Route::middleware("auth","verified")->group(function() {

    Route::get('/listado/user', [UserController::class, 'getUserList'])->name('usuarios')->middleware('es_admin');

    Route::get('/listado/user/historial/{id}', [UserController::class, 'getHistorial'])->name('historial')->middleware('es_user');

    Route::get('/listado/user/cesta/{id}', [UserController::class, 'getCesta'])->name('cesta')->middleware('es_user');

    Route::get('/listado/user/create', [UserController::class, 'getCreate']);
    Route::put('/listado/user/create', [UserController::class, 'store']);

    Route::get('/listado/user/edit/{id}', [UserController::class, 'getEdit']);
    Route::put('/listado/user/edit/{id}', [UserController::class, 'update']);

    Route::get('/listado/user/delete/{id}', [UserController::class, 'getDelete'])->middleware('es_admin');

    Route::get('/listado/user/miCuenta', [UserController::class, 'getMiCuenta'])->name('miCuenta')->middleware('es_user');

    Route::get('/listado/create', [CatalogController::class, 'getCreate'])->middleware('es_admin');
    Route::put('/listado/create', [ProductController::class, 'store'])->middleware('es_admin');

    Route::get('/listado/agregarProducto/{id}', [CatalogController::class, 'agregarproducto'])->middleware('es_user');

    Route::get('/listado/agregarACesta/{id}', [CatalogController::class, 'agregarACesta'])->middleware('es_user');
    Route::get('/listado/quitarDeCesta/{id}', [CatalogController::class, 'quitarDeCesta'])->middleware('es_user');
    Route::get('/listado/quitarProducto/{id}', [CatalogController::class, 'quitarProducto'])->middleware('es_user');
    Route::get('/listado/vaciarCesta', [CatalogController::class, 'vaciarCesta'])->middleware('es_user');
    Route::get('/listado/comprarCesta', [CatalogController::class, 'comprarCesta'])->middleware('es_user');

    Route::get('/listado/edit/{id}', [CatalogController::class, 'getEdit'])->middleware('es_admin');
    Route::put('/listado/edit/{id}', [ProductController::class, 'update'])->middleware('es_admin');

    Route::get('/listado/create/save/{id}', [ProductController::class, 'store'])->middleware('es_admin');

    Route::get('/listado/edit/save/{id}', [ProductController::class, 'update'])->middleware('es_admin');

    Route::get('/listado/eliminarProducto/{id}', [CatalogController::class, 'eliminarProducto'])->middleware('es_admin');

});

Route::get('/dashboard', [MainController::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
