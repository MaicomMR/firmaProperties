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

Route::get('/', function () {
    return view('welcome');
});

Route::get('seller', 'Sellers@index')->name('seller');

Route::get('add', 'Estate@create')->name('');

Route::get('estates/index', 'Estate@index')->name('listagemPatrimonio');

Route::post('estate-edit/store', 'Estate@store')->name('estateAdd');

Route::put('estate-edit/{id}', 'Estate@edit')->name('estateEditMethod');

Route::get('estates/index/{id}', 'Estate@search')->name('estateEdit');

Route::get('categories', 'Categories@index');

Route::get('bill-of-sale', 'BillController@index');

Route::post('bill-of-sale/save', 'BillController@store')->name('saveBill');



