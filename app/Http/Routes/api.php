<?php

Route::group(['prefix' => '/api', 'middleware' => ['auth:api']], function(){
    Route::get('products', 'ProductsController@index');

    Route::post('product', 'ProductController@store');
    Route::get('product/{product_id}', 'ProductController@index')->where('product_id', '[0-9]+');
    Route::post('product/{product_id}', 'ProductController@update')->where('product_id', '[0-9]+');
    Route::delete('product/{product_id}', 'ProductController@delete')->where('product_id', '[0-9]+');

    Route::get('user/products', 'UserProductsController@index');
    Route::put('user/product/{product_id}', 'UserProductController@store')->where('product_id', '[0-9]+');
    Route::delete('user/product/{product_id}', 'UserProductController@delete')->where('product_id', '[0-9]+');

    Route::post('product-image', 'ProductImageController@store');
});