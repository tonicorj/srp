<?php

Route::group(['middleware' => 'web', 'prefix' => 'jogobservacao', 'namespace' => 'srpM\JogObservacao\Http\Controllers'], function()
{
    //Route::resource('jogobservacao'   , 'JogObservacaoController'   , ['except' => 'show']);

    //Route::get ('destroy/{id}'  , 'JogObservacaoController@destroy');
    Route::get('/'            , ['as' => 'JogObservacao'        , 'uses' => 'JogObservacaoController@index']);
    Route::get ('create'      , ['as' => 'JogObservacao.create' , 'uses' => 'JogObservacaoController@create']);
    Route::post('store'       , ['as' => 'JogObservacao.store'  , 'uses' => 'JogObservacaoController@store']);
    Route::get ('{id}/edit'   , ['as' => 'JogObservacao.edit'   , 'uses' => 'JogObservacaoController@edit']);
    Route::put ('{id}/update' , ['as' => 'JogObservacao.update' , 'uses' => 'JogObservacaoController@update']);
    Route::delete('{id}/destroy', ['as' => 'JogObservacao.destroy', 'uses' => 'JogObservacaoController@destroy']);

    /*
    Route::resource(''       , 'JogObservacaoController' , array('as' => 'JObservaocao'));    //, 'except' => 'show']);
    Route::get('/', 'JogObservacaoController@index');
    Route::get ('create'        , 'JogObservacaoController@create');
    Route::post('store'         , 'JogObservacaoController@store' );
    Route::get ('edit/{id}'     , 'JogObservacaoController@edit');
    Route::put ('update/{id}'   , 'JogObservacaoController@update' );
    */

});
