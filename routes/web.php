<?php
Route::group(['prefix' => 'vxml'], function() {
    Route::get('/forecast/{town}/{time}', 'Vxml\ForecastController@index');

    Route::post('/time-period/{option}', 'Vxml\TimePeriodSelectionController@create');
    Route::get('/time-period/{option}', 'Vxml\TimePeriodSelectionController@index');

    Route::post('/towns/{option}', 'Vxml\TownSelectionController@create');
    Route::get('/towns/{option}', 'Vxml\TownSelectionController@index');

    Route::post('/', 'Vxml\WelcomeController@create');
    Route::get('/', 'Vxml\WelcomeController@index');
});

Route::get('/forecast/{time}', 'ICT4D\ForecastController@index');
Route::get('/towns/{option}', 'ICT4D\TownSelectionController@show');
Route::get('/time-period/{option}', 'ICT4D\TimePeriodSelectionController@index');

Route::get('/', 'ICT4D\WelcomeController@index');
