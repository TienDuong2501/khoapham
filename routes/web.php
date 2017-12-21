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

Route::get('/', function () {
    return view('welcome');
});


Route::get('index',['as' => 'trangchu','uses' => 'PageController@getIndex']);

Route::get('loaisanpham/{id_type}',['as'=> 'loaisanpham', 'uses' => 'PageController@getLoaisanpham']);

Route::get('chitietsanpham/{id}',['as'=> 'chitietsanpham', 'uses' => 'PageController@getChitietsanpham']);

Route::get('lienhe',['as'=> 'lienhe', 'uses' => 'PageController@getLienhe']);

Route::get('gioithieu',['as'=> 'gioithieu', 'uses' => 'PageController@getGioithieu']);

Route::get('addToCart/{id}',['as' => 'themgiohang','uses' => 'PageController@getAddToCart']);

Route::get('DeleteCart/{id}',['as' => 'xoagiohang','uses' => 'PageController@getDeleteToCart']);

Route::get('dat-hang',['as' => 'dathang','uses' => 'PageController@getCheckOut']);

Route::post('dat-hang',['as' => 'dathang','uses' => 'PageController@postCheckOut']);

Route::get('timkiem',['as' => 'timkiem','uses' => 'PageController@getTimKiem']);

// Route::get('dangnhap',['as' => 'dangnhap','uses' => 'PageController@getLogin']);

// Route::post('dangnhap',['as' => 'dangnhap','uses' => 'PageController@postLogin']);

// Route::get('dangky',['as' => 'dangky','uses' => 'PageController@getDangKy']);

// Route::post('dangky',['as' => 'dangky','uses' => 'PageController@postDangKy']);

// Route::get('dangxuat',['as' => 'dangxuat','uses' => 'PageController@postDangXuat']);



Route::group(['prefix' => 'customer'], function () {
  Route::get('/login', 'CustomerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CustomerAuth\RegisterController@register')->name('register');

  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});
