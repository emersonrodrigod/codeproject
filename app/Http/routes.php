<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function() {

    Route::resource('clients', 'ClientsController', ['except' => ['create', 'edit']]);
    Route::resource('projects', 'ProjectsController', ['except' => ['create', 'edit']]);

    Route::group(['prefix' => 'projects'], function() {
        Route::get('{id}/notes', 'ProjectsNotesController@index');
        Route::get('{id}/notes/{noteId}', 'ProjectsNotesController@show');
        Route::put('{id}/notes/{noteId}', 'ProjectsNotesController@update');
        Route::delete('{id}/notes/{noteId}', 'ProjectsNotesController@destroy');
        Route::post('{id}/notes', 'ProjectsNotesController@store');
    });
});

