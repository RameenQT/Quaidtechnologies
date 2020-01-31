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


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::group(['namespace' => 'admin','prefix' => 'webmaster'], function(){
	
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('generalsettings', 'GeneralsettingsController');

Route::get('categories/allData', 'CategoriesController@allData')->name('categories.data');
Route::resource('categories', 'CategoriesController');

Route::get('blog/allData', 'BlogController@allData')->name('blog.data');
Route::resource('blog', 'BlogController');


Route::get('pageSeo/allData', 'PageSeoController@allData')->name('pageSeo.data');
Route::resource('pageSeo', 'PageSeoController');

Route::get('team/allData', 'TeamController@allData')->name('team.data');
Route::resource('team', 'TeamController');

Route::get('clients/allData', 'ClientsController@allData')->name('clients.data');
Route::resource('clients', 'ClientsController');

//Services Managment 
Route::get('services/allData', 'ServicesController@allData')->name('services.data');
Route::resource('services', 'ServicesController');


//Photo Gallery
Route::get('photogallery/allData', 'PhotogalleryController@allData')->name('photogallery.data');
Route::resource('photogallery', 'PhotogalleryController');

//portfolio
Route::get('portfolio/allData', 'PortfolioController@allData')->name('portfolio.data');
Route::get('portfolio/deleteImage/{imageId}/{porId}/', 'PortfolioController@deleteImage')->name('deleteImage');
Route::resource('portfolio', 'PortfolioController');

});







