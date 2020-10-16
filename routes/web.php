<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Website\WebsiteController@index')->name('index');
Route::get('/category/{slug}', 'Website\WebsiteController@category')->name('category');
Route::post('load-more-category-product', 'Website\WebsiteController@loadMoreCatProduct')->name('load-more-cat-product');
Route::get('/product/{slug}', 'Website\WebsiteController@product')->name('product');

#cart route
Route::post('add-to-cart', 'Website\CartController@add')->name('cart.add');
Route::get('cart/show', 'Website\CartController@show')->name('cart.show');
Route::post('cart/remove', 'Website\CartController@remove')->name('cart.remove');
Route::post('cart/update', 'Website\CartController@update')->name('cart.update');




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
    /**
     * SubCategory Routes
     */
    Route::prefix('subcategories')->name('subcategories.')->group(function () {
        Route::get('/', 'Admin\SubCategoryController@index')->name('manage');
        Route::get('/add', 'Admin\SubCategoryController@create')->name('create');
        Route::post('/store', 'Admin\SubCategoryController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\SubCategoryController@edit')->name('edit');
        Route::put('/update', 'Admin\SubCategoryController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\SubCategoryController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\SubCategoryController@updateStatus')->name('update.status');
    });

    /**
     * Slider Routes
     */
    Route::prefix('sliders')->name('sliders.')->group(function () {
        Route::get('/', 'Admin\SliderController@index')->name('manage');
        Route::get('/add', 'Admin\SliderController@create')->name('create');
        Route::post('/store', 'Admin\SliderController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\SliderController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\SliderController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\SliderController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\SliderController@updateStatus')->name('update.status');
    });



    /**
     * AfterSlider Routes
     */
    Route::prefix('aftersliders')->name('aftersliders.')->group(function () {
        Route::get('/', 'Admin\AfterSliderController@index')->name('manage');
        Route::get('/add', 'Admin\AfterSliderController@create')->name('create');
        Route::post('/store', 'Admin\AfterSliderController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\AfterSliderController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\AfterSliderController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\AfterSliderController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\AfterSliderController@updateStatus')->name('update.status');
    });


    /**
     * Products Route
     */
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', 'Admin\ProductController@index')->name('manage');
        Route::get('/add', 'Admin\ProductController@create')->name('create');
        Route::post('/store', 'Admin\ProductController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\ProductController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('delete');
        Route::get('/find-categories/{id}', 'Admin\ProductController@findCategories');
        Route::get('/updateBuyingPrice/{id}/{p}', 'Admin\ProductController@updateBuyingPrice');
        Route::post('/update-selling-Price', 'Admin\ProductController@updateSellingPrice');
        Route::post('/update-special-Price', 'Admin\ProductController@updateSpecialPrice');
        Route::get('/update-status/{id}/{status}', 'Admin\ProductController@updateStatus')->name('update.status');
        Route::get('/hot-deals/{id}/{hot_deals}', 'Admin\ProductController@hotDeals')->name('hot.deals');
        Route::get('/f_products/{id}/{f_products}', 'Admin\ProductController@f_products')->name('feature.products');
    });

});
