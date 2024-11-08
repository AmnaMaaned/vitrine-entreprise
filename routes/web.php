<?php

use App\Category;
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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();
Route::get('/','ExempleController@index');
    

Route::get('/products/show/{id}','ProductController@show')->name('showProd');

Route::get('/faq/show/{slug}','FAQController@show')->name('showF');
Route::get('/categories/show/{slug}','CategoryController@show')->name('showCat');
Route::get('/applications/show/{slug}','ApplicationController@show')->name('showApp');

//Route::resource('/applications','ApplicationController');




Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'middleware' =>'auth',
], function () {
    
//Route::resource('/products','ProductController');
Route::get('/products','ProductController@index');
Route::post('/products','ProductController@store');
Route::get('/products/create','ProductController@create');
Route::get('/products/edit/{id}','ProductController@edit')->name('editprod');
Route::post('/products/{id}','ProductController@update');
Route::delete('/products/{id}','ProductController@destroy')->name('deleteProduct');

Route::get('/applications','ApplicationController@index');
Route::post('/applications','ApplicationController@store');
Route::get('/applications/create','ApplicationController@create');

Route::get('/applications/edit/{id}','ApplicationController@edit')->name('editapp');
Route::post('/applications/{id}','ApplicationController@update');
Route::post('/applications/save','ApplicationController@saveProductToApp');
Route::delete('/applications/{id}','ApplicationController@destroy')->name('deleteApplication');

Route::resource('/categories','CategoryController');
Route::get('categories','CategoryController@index');
//Route::resource('/categories','CategoriesController');
Route::get('/categories','CategoryController@index');
Route::post('/categories','CategoryController@store');
Route::get('categories/create','CategoryController@create');
Route::get('/categories/edit/{id}','CategoryController@edit')->name('editcat');
Route::post('/categories/{id}','CategoryController@update');
Route::delete('/categories/{id}','CategoryController@destroy')->name('deleteCat');

// Route::get('/test','ApplicationController@testApp');

Route::get('faq','FAQController@index');
Route::post('/faq','FAQController@store');
Route::get('faq/create','FAQController@create');
Route::get('/faq/edit/{id}','FAQController@edit')->name('editF');
Route::post('/faq/{id}','FAQController@update');
Route::delete('/faq/{id}','FAQController@destroy')->name('deleteF');


Route::post('upload','CKEditorController@upload')->name('upload');


});