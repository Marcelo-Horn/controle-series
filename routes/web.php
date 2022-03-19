<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/series', 'SeriesController@index')->name('series_list');
Route::get('/series/add', 'SeriesController@create')->name('form_insert_serie');
Route::post('/series/add', 'SeriesController@store');
Route::post('/series/rm/{id}', 'SeriesController@destroy');
Route::post('/series/{id}/nameUpdate', 'SeriesController@nameUpdate');

Route::get('/series/{serieId}/seasons', 'SeasonsController@index');
