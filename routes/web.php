<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Website\WebsiteController@index')->name('index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'Admin\DashboardController@index')->name('home');


    /**
     * Brand Routes
     */
    Route::prefix('brands')->name('brand.')->group(function () {
        Route::get('/', 'Admin\BrandController@index')->name('manage');
        Route::get('/add', 'Admin\BrandController@create')->name('create');
        Route::post('/store', 'Admin\BrandController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\BrandController@edit')->name('edit');
        Route::put('/update/{id}', 'Admin\BrandController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\BrandController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\BrandController@updateStatus')->name('update.status');
        Route::get('/update-top-brand/{id}/{top_brand}', 'Admin\BrandController@updatetopBrand');
    });


    /**
     * Category Routes
     */
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'Admin\CategoryController@index')->name('manage');
        Route::get('/add', 'Admin\CategoryController@create')->name('create');
        Route::post('/store', 'Admin\CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('edit');
        Route::put('/update', 'Admin\CategoryController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\CategoryController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\CategoryController@updateStatus')->name('update.status');
    });

});
