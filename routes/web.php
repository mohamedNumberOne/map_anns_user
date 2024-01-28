<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WilayaController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\TypestructuresController;

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
Route::get('/clear_cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');   
    dd(Artisan::output());
});



Route::post('/getWilayasf', [App\Http\Controllers\AccueilController::class, 'getWilayas'])->name('front.getWilayas');
Route::post('/getCommunesf', [App\Http\Controllers\AccueilController::class, 'getCommunes'])->name('front.getCommunes');
Route::get('/', [App\Http\Controllers\AccueilController::class, 'accueil'])->name('accueil');
Route::post('/map_json', [App\Http\Controllers\AccueilController::class, 'map_json'])->name('front.map_json');
Route::post('/map_json_search', [App\Http\Controllers\AccueilController::class, 'map_json_search'])->name('front.map_json_search');

Route::get('/login', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/showindex', [App\Http\Controllers\HomeController::class, 'showindex'])->name('showindex');

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

// Permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

// Users 
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');

    
    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');

    Route::get('export/', [UserController::class, 'export'])->name('export');

});

Route::middleware('auth')->prefix('wilaya')->name('wilaya.')->group(function(){

    Route::get('/',           [WilayaController::class, 'index'])->name('index'); 
    Route::get('/create',     [WilayaController::class, 'create'])->name('create');
    Route::get('/{id}/edit',  [WilayaController::class, 'edit'])->name('edit'); 
    Route::post('/store',     [WilayaController::class, 'store'])->name('store');
    Route::post('/update',    [WilayaController::class, 'update'])->name('update');
    Route::post('/destroy',   [WilayaController::class, 'destroy'])->name('destroy');
    Route::post('/show',      [WilayaController::class, 'show'])->name('show');
    Route::post('getWilayas', [WilayaController::class, 'getWilayas'])->name('getWilayas'); 
    Route::post('getCommunes', [WilayaController::class, 'getCommunes'])->name('getCommunes'); 
    
});


Route::middleware('auth')->prefix('structure')->name('structure.')->group(function(){
    Route::get('/', [StructureController::class, 'index'])->name('index');
    Route::get('/create', [StructureController::class, 'create'])->name('create');
    Route::post('/store', [StructureController::class, 'store'])->name('store');
    Route::get('/edit/{structures}', [StructureController::class, 'edit'])->name('edit');
    Route::post('/update', [StructureController::class, 'update'])->name('update');
    Route::post('/valide', [StructureController::class, 'valide'])->name('valide');
    Route::post('/refuse', [StructureController::class, 'refuse'])->name('refuse');
    Route::post('/destroy', [StructureController::class, 'destroy'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [StructureController::class, 'updateStatus'])->name('status');
    Route::get('/import-structure', [StructureController::class, 'importstructure'])->name('import');
    Route::post('/upload-bon_de_sortie', [StructureController::class, 'uploadbon_de_sortie'])->name('upload');
    Route::post('/show', [StructureController::class, 'show'])->name('show');
    Route::post('/getStructure', [StructureController::class, 'getStructure'])->name('getStructure');
    Route::post('/find_long', [StructureController::class, 'find_long'])->name('find_long');
    Route::post('/importer_depuis_Excel', [StructureController::class, 'importer_depuis_Excel'])->name('importer_depuis_Excel');
    Route::post('/refrach', [StructureController::class, 'refrach'])->name('refrach');
    Route::get('export/', [StructureController::class, 'export'])->name('export');
});


Route::middleware('auth')->prefix('typestructures')->name('typestructures.')->group(function(){
    Route::get('/', [TypestructuresController::class, 'index'])->name('index');
    Route::get('/create', [TypestructuresController::class, 'create'])->name('create');
    Route::post('/store', [TypestructuresController::class, 'store'])->name('store');
    Route::get('/edit/{typestructures}', [TypestructuresController::class, 'edit'])->name('edit');
    Route::post('/update', [TypestructuresController::class, 'update'])->name('update');
    Route::post('/destroy', [TypestructuresController::class, 'destroy'])->name('destroy');
    Route::post('/show', [TypestructuresController::class, 'show'])->name('show');
    Route::post('/geTypestructures', [TypestructuresController::class, 'getTypestructures'])->name('getTypestructures');
});

