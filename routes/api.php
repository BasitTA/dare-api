<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('apimakan','MakanController@createMakan');
// Route::get('apimakanget','MakanController@index');
// Route::put('apimakanput/{id}','MakanController@update');
// Route::delete('apimakandelete/{id}','MakanController@delete');

Route::get('/', function(){
    return redirect('/dare');
});

//PROFILE//
        //[STORE/CREATE] (Buat profil baru)
    Route::post('/profile','ProfileController@store');
        //[INDEX] (Ambil semua data)
    Route::get('/profile','ProfileController@index');
        //[UPDATE] (Ngupdate salah satu data)
    Route::put('/profile/{id}','ProfileController@update');

//DARE//
        //[STORE/CREATE] (Buat posting data baru)
    Route::post('/dare','DareController@store');
        //[INDEX] (Halaman utama)
    Route::get('/dare','DareController@index');
        //[ALL INDEX] (Ambil Semua Data)
    Route::get('/dares','DareController@indexAll');
        //[SHOW] (Buat nampilin salah satu data)
    Route::get('/dare/{dare}','DareController@show');
        //PUT Spesific Data [UPDATE] (Buat ngubah salah satu data)
    Route::put('/dare/{id}','DareController@update');
        //Delete One Data [DESTROY/DELETE] (Buat ngapus salah satu data)
    Route::delete('/dare/{id}','DareController@destroy');