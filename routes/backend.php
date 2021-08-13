<?php

Route::group(['prefix' => 'admin'], function () {
    Route::get('/test-admin', function (){
        return 'test-admin';
    });
});
