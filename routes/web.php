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
	Route::get('/view/product/{product}','MainController@show')->name('view.product');
    Route::get('catalogs/{category}','MainController@catalog')->name('view.catalog');
});

Route::group(['prefix'=>'cart','namespace'=>'Cart','middleware'=>'cart' ],function(){
    Route::get('get','CartController@get')->name('cart.get');
    Route::post('add/{product}','CartController@add')->name('cart.add');
});

Route::group(['namespace'=>'Admin','prefix'=>'admin',],function(){

	Route::resource('categories', 'CategoryController');
	Route::resource('banners', 'BannerController');
    Route::resource('products', 'ProductController');
    Route::resource('parameters', 'ParameterController');

    Route::group(['prefix'=>'ajax','namespace'=>'Ajax'],function(){
    	Route::post('category/values', 'CategoryAjaxController@parameters')->name('category.values');
        Route::delete('parameter/value/{value}/destroy','ValueAjaxController@destroy')->name('value.destroy');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
