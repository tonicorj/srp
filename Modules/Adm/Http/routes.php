<?php

Route::group(['middleware' => 'web', 'prefix' => 'adm', 'namespace' => 'srpM\Adm\Http\Controllers'], function()
{
    Route::get('/', 'AdmController@index');
});
