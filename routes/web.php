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

Route::get('/coins','IcosController@index');

Route::get('/coins/add','IcosController@add');

Route::get('/coins/{ico}', 'IcosController@show');

Route::get('/coins/{ico}/edit', 'IcosController@showedit');

Route::patch('/coins/{ico}/edit', 'IcosController@update');

Route::post('/coins', 'IcosController@store');

Route::post('/coins/{ico}/comments', 'CommentsController@store');

Route::post('/coins/{ico}/likes', 'LikesController@store');

Route::post('/coins/{ico}/disable', 'IcosController@disable');

Route::post('/coins/{ico}/enable', 'IcosController@enable');

Route::delete('/coins/{ico}', 'IcosController@destroy');

Route::get('/coins/categories/{category}','CategoriesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/index', 'AdminController@index')->middleware('admin');
Route::get('/admin/edit/{user}', 'AdminController@showedit')->middleware('admin');
Route::patch('/admin/edit/{user}', 'AdminController@update')->middleware('admin');

Route::get('/profile/{user}', 'ProfilesController@show');

