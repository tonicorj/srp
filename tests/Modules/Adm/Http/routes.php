<?php

Route::group(['middleware' => 'web', 'prefix' => 'adm', 'namespace' => 'App\\Modules\\\Adm\Http\Controllers'], function()
{
    Route::get('/', 'AdmController@index');
});
