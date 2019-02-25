<?php

Route::group(['prefix' => 'frontend'], function (){
    Route::get('/', function () { return view('frontend.index'); });
    Route::get('/login', function () { return view('frontend.login'); });
});
