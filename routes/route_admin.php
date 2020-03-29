<?php


    Route::group(['prefix' => 'api-admin'], function(){
            Route::get('/',function(){
                return view ('admin.index');
            });
    });

