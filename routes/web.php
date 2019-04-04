<?php

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@logout');

Route::middleware(['adminpanelguard'])->group(function() {
    Route::group(['prefix' => 'user-admins'], function () {
        Route::get('/', 'CrudController@index');
        Route::match(['get', 'post'], 'create', 'CrudController@create');
        Route::match(['get', 'put'], 'update/{id}', 'CrudController@update');
        Route::delete('delete/{id}', 'CrudController@delete');
        Route::get('contacts', 'CrudController@contacts');
        Route::get('views', 'CrudController@views');
    });
});

Route::get('/', 'LoginController@home');




