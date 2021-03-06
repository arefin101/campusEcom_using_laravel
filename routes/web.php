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

Route::get('/','homeController@index');
Route::get('/about','homeController@about')->name('about');
Route::get('/login','loginController@index')->name('login');
Route::get('/logout','logoutController@index')->name('logout');

Route::post('/login','loginController@verify');
Route::get('/admin','adminController@adminDash')->name('adminDashboard')->middleware('adminSess');
Route::get('/delete/{id}', 'adminController@commodityDestroy');
Route::get('/admin/transactions','adminController@transactions')->name('transactions')->middleware('adminSess');


Route::get('/register','registerController@index')->name('register');
Route::post('/register','registerController@signUp');
Route::get('/adminLogin','adminController@index')->name('adminLogin');
Route::post('/adminLogin','adminController@verify');

Route::get('/myAccount','accountController@index')->name('myAccount')->middleware('sess');

Route::get('/personalInfoEditLog','accountController@editLog')->name('editLog')->middleware('sess');
Route::post('/personalInfoEditLog','accountController@updatePersonal');

Route::get('/profilePicture','accountController@profilePic')->name('profilePic')->middleware('sess');
Route::post('/profilePicture','accountController@editProfilePic');
Route::get('/orderList','accountController@orderList')->name('orderList')->middleware('sess');
Route::get('/personalCommodity','accountController@personalCommodity')->name('personalCommodity')->middleware('sess');
Route::get('/deletePersonalCommodity/{id}', 'accountController@commodityDestroy');

Route::get('/sell','accountController@sellInfo')->name('sellCommodity')->middleware('sess');
Route::post('/sell','accountController@sellcommodity');
