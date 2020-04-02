<?php


    Route::group(['prefix' => 'api-admin','namespace' =>'Admin'], function(){
            Route::get('/',function(){
                return view ('admin.index');
            });
    // route danh mục sản phẩm
    Route::group(['prefix' => 'category'],function(){
            Route::get('','AdminCategoryController@index')->name('admin.category.index');
            // thêm form
            Route::get('create','AdminCategoryController@create')->name('admin.category.create');
            // sử lý thêm mới
            Route::post('create','AdminCategoryController@store');
             
            // update
            Route::get('update{id}','AdminCategoryController@edit')->name('admin.category.update');
            Route::post('update{id}','AdminCategoryController@update');

            // xóa danh mục
            Route::get('delete{id}','AdminCategoryController@delete')->name('admin.category.delete');

            // xử lý hành động ẩn hiện danh mục
            Route::get('active{id}','AdminCategoryController@active')->name('admin.category.active');

            // xử lý sản phẩm có hot k
            Route::get('hot{id}','AdminCategoryController@hot')->name('admin.category.hot');


    });
    //  route keyword
    Route::group(['prefix' => 'keyword'], function(){
        Route::get('','AdminKeywordController@index')->name('admin.keyword.index');
        Route::get('create','AdminKeywordController@create')->name('admin.keyword.create');
        Route::post('create','AdminKeywordController@store');

        Route::get('update/{id}','AdminKeywordController@edit')->name('admin.keyword.update');
        Route::post('update/{id}','AdminKeywordController@update');
        Route::get('hot/{id}','AdminKeywordController@hot')->name('admin.keyword.hot');
        
        Route::get('delete/{id}','AdminKeywordController@delete')->name('admin.keyword.delete');

    });
});

