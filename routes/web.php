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



Route::get('/','WelcomeController@index');

Route::get('/category-view/{id}','WelcomeController@category');
Route::get('/product-details/{id}','WelcomeController@productDetails');
Route::get('/contact','WelcomeController@contactUs');




Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
/*Category info*/
Route::get('/category/add','CategoryController@createCategory');
Route::post('/category/save','CategoryController@storeCategory');
Route::get('/category/manage','CategoryController@manageCategory');
Route::get('/category/edit/{id}','CategoryController@editCategory');
Route::post('/category/update','CategoryController@updateCategory');
Route::get('/category/delete/{id}','CategoryController@deleteCategory');
/*Category info*/

/*Manufacturar info*/
Route::get('/manufacturar/add','ManufacturarController@createCategory');
Route::post('/manufacturar/save','ManufacturarController@storeCategory');
Route::get('/manufacturar/manage','ManufacturarController@manageCategory');
Route::get('/manufacturar/edit/{id}','ManufacturarController@editCategory');
Route::post('/manufacturar/update','ManufacturarController@updateCategory');
Route::get('/manufacturar/delete/{id}','ManufacturarController@deleteCategory');
/*Manufacturar info*/

/*Product info*/
Route::get('/product/add','ProductController@createProduct');
Route::post('/product/save','ProductController@storeProduct');
Route::get('/product/manage','ProductController@manageProduct');
Route::get('/product/edit/{id}','ProductController@editProduct');
Route::post('/product/update','ProductController@updateProduct');
Route::get('/product/delete/{id}','ProductController@deleteProduct');
Route::get('/product/view/{id}','ProductController@viewProduct');
/*Product info*/
