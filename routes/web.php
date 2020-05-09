<?php

use GuzzleHttp\Middleware;
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

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/obiekt'.'/{id}', 'FrontendController@object')->name('object');
Route::get('/room', 'FrontendController@room')->name('room');
Route::get('/article', 'FrontendController@article')->name('article');
Route::get('/roomSearch', 'FrontendController@roomsearch')->name('roomSearch');
Route::get(trans('routes.person'), 'FrontendController@person')->name('person');




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'BackendController@index')->name('adminHome');
    Route::get('/myObjects', 'BackendController@myobjects')->name('myObjects');
    Route::get('/saveObjects', 'BackendController@saveobject')->name('saveObject');
    Route::get('/profile', 'BackendController@profile')->name('profile');
    Route::get('/saveRoom', 'BackendController@saveRoom')->name('saveRoom');
    Route::get('/cities', 'BackendController@cities')->name('cities.index');

});


Auth::routes();


