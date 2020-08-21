<?php

use Illuminate\Support\Facades\Route;

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

Route::group([],function(){
	Route::get('/', 'MainController@index')->name('main');
});

Route::group(['namespace'=>'Admin','prefix'=>'admin',],function(){
	Route::get('/', 'MainController@index')->name('main');

	Route::group(['prefix'=>'sections'],function(){
		Route::get('/','SectionController@index')->name('sections.index');
		Route::get('/create','SectionController@create')->name('sections.create');
		Route::post('/','SectionController@store')->name('sections.store');
		Route::get('/{id}/edit','SectionController@edit')->name('sections.edit');
		Route::patch('/{id}','SectionController@update')->name('sections.update');
		Route::delete('/{id}','SectionController@destroy')->name('sections.destroy');
		Route::get('/{id}','SectionController@show')->name('sections.show');
	});

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
