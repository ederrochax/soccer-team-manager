<?php

// Times Routes
Route::get('/', 'TimeController@index');
Route::get('/times/{type}/file', 'TimeController@exportTimes');
Route::resource('/times', 'TimeController');

// Jogadores Routes
Route::get('/jogadores/search', 'JogadorController@search');
Route::get('/jogadores/{type}/file', 'JogadorController@exportJogadores');
Route::resource('/jogadores', 'JogadorController');
