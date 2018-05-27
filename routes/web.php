<?php
Route::group(['prefix' => 'vxml'], function() {
    Route::post('/', 'Vxml\WelcomeController@create');
    Route::get('/', 'Vxml\WelcomeController@index');
});

Route::get('/forecast/{time}', 'ICT4D\ForecastController@index');
Route::get('/towns/{option}', 'ICT4D\TownSelectionController@show');
Route::get('/time-period/{option}', 'ICT4D\TimePeriodSelectionController@index');

Route::get('/', 'ICT4D\WelcomeController@index');
