<?php

Route::group(['prefix' => 'frontend'], function (){
    Route::get('/', function () { return view('frontend.index'); });
    Route::get('/login', function () { return view('frontend.login'); });
    Route::get('/builders', function () { return view('frontend.builders'); });
});
