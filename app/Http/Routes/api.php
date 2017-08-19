<?php

Route::group(['prefix' => '/api', 'middleware' => ['auth:api']], function(){
    Route::post('products', 'ProductsController@store');
    Route::patch('products/{product}', 'ProductsController@update');
});