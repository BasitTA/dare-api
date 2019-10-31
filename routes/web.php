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

Route::get('/', function(){
    return redirect('/dare');
});
Route::get('/profile','ProfileController@index');

Route::get('/dare','DareController@index');
Route::get('/dare/new','DareController@create');
Route::post('/dare','DareController@store');
Route::get('/dare/{dare}','DareController@show');
Route::get('/dare/{id}/edit','DareController@edit');
Route::put('/dare/{id}','DareController@update');
Route::delete('/dare/{id}','DareController@destroy');

// Route::get('/login','AdminController@login');

// Route::middleware(['adminAuth'])->group(function (){
// });