<?php


    Route::group(['prefix' => 'api-admin','namespace' =>'Admin'], function(){
            Route::get('/',function(){
                return view ('admin.index');
            });
    
    Route::group(['prefix' => 'category'],function(){
            Route::get('','AdminCategoryController@index')->name('admin.category.index');
    });
});

