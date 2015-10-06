<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/admin', function(){
    return view('welcome');
});

Route::group(['prefix' => '{hotsite_apelido}','middleware'=>'valid.hotsite'], function () {
    
    /*Route::get('/participante', 'ParticipanteController@index');
    Route::get('/participante/cadastro', 'ParticipanteController@create');
    Route::post('/participante', 'ParticipanteController@store');*/
    Route::resource('participante','ParticipanteController');

});

Route::get('{hotsite_apelido}','HotsiteController@show');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('hotsite','HotsiteController');
    Route::resource('concurso','ConcursoController');
});

