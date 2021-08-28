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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ObeydaDire;

Route::get('obeyda', [ObeydaDire::class, 'makes']);

Route::get('users/{id}', [ObeydaDire::class, 'obeyda']);




// resu-> index - show - update....
use App\Http\Controllers\Obeyda;

Route::get('resu', [Obeyda::class, 'index']);
Route::get('resu/{id}', [Obeyda::class, 'show']);


use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


// use App\Http\Controllers\SocialController;

Route::get('/with/{server}', 'App\Http\Controllers\SocialController@facebook');

Route::get('/callback/{server}', 'App\Http\Controllers\SocialController@callback');

// use App\Http\Controllers\InsertDB;

// use Mcamara\LaravelLocalization\LaravelLocalization;




Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::prefix('user')->group(function () {

        Route::get('show', [App\Http\Controllers\InsertDB::class, 'Show']);
        Route::post('insert', [App\Http\Controllers\InsertDB::class, 'Insert'])->name('user.insert');

        // Update data
        Route::get('edit/{id}', [App\Http\Controllers\InsertDB::class, 'EditData']);
        Route::get('delete/{id}', [App\Http\Controllers\InsertDB::class, 'deleteData'])->name('user.Delete');
        Route::post('update/{id}', [App\Http\Controllers\InsertDB::class, 'UpdateData'])->name('user.Update');


        Route::get('showData', [App\Http\Controllers\InsertDB::class, 'ShowData']);

        Route::get('ShowVideo', [App\Http\Controllers\InsertDB::class, 'ShowVideo']);


        Route::get('ShowVideo/Count', [App\Http\Controllers\InsertDB::class, 'Reset']);
    });
});


########################  AJAX ##############
use App\Http\Controllers\UseAjaxController;

Route::prefix('Ajax-frinds')->group(function () {
    Route::get('create', [UseAjaxController::class, 'create']);
    Route::post('store', [UseAjaxController::class, 'store']);
});
