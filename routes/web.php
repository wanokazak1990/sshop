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
    Route::get('catalogs/{category?}','MainController@catalog')->name('view.catalog');
    Route::get('/search','MainController@search')->name('view.search');
});


//CART
Route::group(['prefix'=>'cart','namespace'=>'Cart','middleware'=>'cart' ],function(){
    Route::match(['get','post'],'/','CartController@get')->name('cart.get');
    Route::post('add/{product}','CartController@add')->name('cart.add');
    Route::post('del/{product}','CartController@delete')->name('cart.del');
    Route::get('/total','CartController@total')->name('cart.total');
    Route::post('/clear/{product}','CartController@clear')->name('cart.clear');
});

//ORDER
Route::group(['prefix'=>'order','namespace'=>'Order','middleware'=>'cart'],function(){
	Route::post('/store','OrderController@store')->name('order.store');
	Route::get('/show/{id}', 'OrderController@show')->name('order.show');
});


//ADMIN
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

Route::group(['namespace'=>'Parser','prefix'=>'parser'], function(){
    Route::get('wiper', 'WiperController@parsing')->name('wiper.parser');
});


Auth::routes();

Route::get('/home', 'MainController@index')->name('home');
