<?php

Route::group(['prefix' => '/api', 'middleware' => ['auth:api']], function(){
    Route::post('products', 'ProductsController@store');
    Route::get('products/{product_id}', 'ProductsController@index');
    Route::patch('products/{product_id}', 'ProductsController@update');
    Route::delete('products/{product_id}', 'ProductsController@delete');
});