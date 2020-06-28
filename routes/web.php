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
    return view('main');
});

Route::resource('books', 'BookController')->except([
    'create','edit'
]);
Route::post('/lendBook','BookController@lendBook');
Route::post('/returnBook','BookController@lendBook');

Route::resource('categories', 'CategoryController');

Route::resource('categories', 'CategoryController')->only([
    'index'
]);
