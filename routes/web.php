<?php

use Illuminate\Support\Facades\URL;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/about', 'PagesController@about');
Route::get('/', 'PagesController@index');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');
Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/ticket/{slug?}/edit','TicketsController@edit');
Route::post('/ticket/{slug?}/edit','TicketsController@update');
Route::post('/ticket/{slug?}/delete','TicketsController@destroy');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


Route::get('admin/routes','DashboardController@admin')->middleware('admin');


Route::post('/comment', 'CommentsController@newComment');

Route::get('/search', 'TicketsController@search');

Route::get('/adminsearch', 'TicketsController@adminsearch');

URL::forceScheme('https');