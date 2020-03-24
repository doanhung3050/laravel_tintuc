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

use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/product/index','ProductController@index')->name('product.index');

Route::get('admin/product/create','ProductController@create')->name('product.create');
Route::post('admin/product/create','ProductController@store')->name('product.store');

Route::get('admin/product/edit/{id}','ProductController@edit')->name('product.edit');
Route::post('admin/product/edit/{id}','ProductController@update')->name('product.update');

Route::get('admin/product/delete/{id}','ProductController@delete')->name('product.delete');


Route::get('admin/user/index','UserController@index')->name('user.index');

Route::get('admin/user/create','UserController@create')->name('user.create');
Route::post('admin/user/create','UserController@store')->name('user.store');

Route::get('admin/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('admin/user/edit/{id}','UserController@update')->name('user.update');

Route::get('admin/user/delete/{id}','UserController@delete')->name('user.delete');

route::get('home', function(){
    return view('page.trang01');
});

route::get('home-02', function(){
    return view('page.trang02');
});

route::prefix('db')->group(function() {
    route::get('get-data','DBController@getAll');
    route::get('where-data','DBController@whereData');
    route::get('first-data','DBController@getOneData');
    route::get('find-data','DBController@findData');
    route::get('pluck-data','DBController@pluckData');
    route::get('count-data','DBController@countData');
    route::get('max-data','DBController@maxData');
    route::get('avg-data','DBController@avgData');
    route::get('existdata-data','DBController@existData');
    route::get('distinct-data','DBController@distinctData');
    route::get('addselect-data','DBController@addSelectData');
    route::get('raw-data','DBController@rawData');
    route::get('innerjoin-data','DBController@innerJoinData');
    route::get('khac-data','DBController@khacData');
    route::get('like-data','DBController@likeData');
    route::get('likeor-data','DBController@likeorData');
    route::get('between-data','DBController@betweenData');
    route::get('notbetween-data','DBController@betNotweenData');
    route::get('whereinData-data','DBController@whereInData');
    route::get('wherenotinData-data','DBController@whereNotInData');
    route::get('wherenull-data','DBController@wherenull');
    route::get('wherenotnull-data','DBController@whereNotNull');
    route::get('wheremonth-data','DBController@whereMonth');
    route::get('wherecolumm-data','DBController@whereColumm');
    route::get('orderby-data','DBController@orderBy');
    route::get('lastest-data','DBController@lastest');
    route::get('having-data','DBController@having');
    route::get('skiptake-data','DBController@skipTake');
    route::get('insertdata-data','DBController@insertData');
    route::get('updatedata-data','DBController@updateData');
    route::get('increment-data','DBController@increment');
    route::get('delete-data','DBController@delete');
});


route::namespace('Admin')->prefix('admin')->group(function(){
    route::get('index', 'IndexController@index');
    route::prefix('category')->group(function(){
        route::get('list', 'CategoryController@cate_list')->name('category.list');
        route::get('add', 'CategoryController@cate_addview')->name('category.addview');
        Route::post('add','CategoryController@cate_add')->name('category.add');

        route::get('edit/{id}', 'CategoryController@cate_edit_view')->name('category.editview');
        Route::post('edit/{id}','CategoryController@cate_edit')->name('category.edit');

        route::get('delete/{id}', 'CategoryController@cate_delete')->name('category.delete');
       
        
    });
});

