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

Route::get('/', 'HomeController@index');

// Route::get('/men/cloth', 'CategoryController@men_cloth');

// Route::get('/women/cloth', 'CategoryController@women_cloth');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

/*
===========================
	Category Routes
===========================
*/

Route::get('/category/add', 'CategoryController@categoryAdd');
Route::post('/category/entry', 'CategoryController@categoryEntry');

Route::get('/category/show', 'CategoryController@categoryShow');
Route::get('/cat_status/edit/{p_id}', 'CategoryController@categoryPBS');

Route::get('/category/edit/{id}', 'CategoryController@categoryEdit');
Route::post('/category/update', 'CategoryController@categoryUpdate');

Route::get('/category/delete/{delete_id}', 'CategoryController@categoryDelete');


/*
===========================
	Product Routes
===========================
*/

Route::get('/add/product', 'ProductController@addProduct');
Route::post('/product/entry', 'ProductController@insertProduct');

Route::get('/all/product', 'ProductController@productShow');
Route::get('/pro_status/edit/{porduct_id}', 'ProductController@productStatus');

Route::get('/product/singleView/{porduct_id}', 'ProductController@singleView');

Route::get('/product/edit/{p_id}', 'ProductController@productEdit')->name('pro_edit');
Route::post('/product/update', 'ProductController@productUpdate')->name('pro_update');

Route::get('/product/delete/{delete_id}', 'ProductController@productDelete');

