<?php

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

Route::get('/home', 'HomeController@index')->name('home');
//cli control
Route::get('/cli', 'CliController@index')->name('index');
Route::get('/cli_new', 'CliController@cli_new')->name('cli_new');

//cat control
Route::get('/cat', 'CatController@index');
Route::get('/cat/new', 'CatController@create');
Route::post('/cat', 'CatController@store');
Route::get('/cat/del/{id}', 'CatController@destroy');


//prod control
Route::get('/prod', 'ProdController@index')->name('index');
Route::get('/prod_new', 'ProdController@cat_new')->name('prod_new');
