<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('clients', 'ClientsController@index');
Route::post('clients', 'ClientsController@store');
Route::get('clients/{id}', 'ClientsController@show');
Route::delete('clients/{id}', 'ClientsController@destroy');
