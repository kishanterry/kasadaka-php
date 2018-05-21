<?php
Route::get('/forecast/{time}', 'ICT4D\ForecastController@index');
Route::get('/towns/{option}', 'ICT4D\TownSelectionController@show');
Route::get('/time-period/{option}', 'ICT4D\TimePeriodSelectionController@index');

Route::get('/', 'ICT4D\WelcomeController@index');
