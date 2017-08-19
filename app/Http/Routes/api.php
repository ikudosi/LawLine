<?php

Route::group(['prefix' => '/api', 'middleware' => ['auth:api']], function(){
    Route::get('products', 'ProductsController@index');

    Route::post('product', 'ProductController@store');
    Route::get('product/{product_id}', 'ProductController@index');
    Route::patch('product/{product_id}', 'ProductController@update');
    Route::delete('product/{product_id}', 'ProductController@delete');

    Route::get('user/products', 'UserProductsController@index');
    Route::put('user/product/{product_id}', 'UserProductController@store');
    Route::delete('user/product/{product_id}', 'UserProductController@delete');

    Route::post('product-image', 'ProductImageController@store');
});