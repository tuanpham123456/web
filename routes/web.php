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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' => 'Auth','prefix' => 'account'], function () {
    Route::get('register', 'RegisterController@getFormRegister')->name('get.register');
    Route::post('register', 'RegisterController@postFormRegister') ;

    Route::get('login', 'LoginController@getFormLogin')->name('get.login');
    Route::post('login', 'LoginController@postFormLogin') ;



});

Route::group(['namespace' => 'Frontend'],function(){
    Route::get('','HomeController@index')->name('get.home');
    Route::get('san-pham','ProductController@index')->name('get.product.list');
    Route::get('danh-muc/{slug}','CategoryController@index')->name('get.category.list');
    Route::get('san-pham/{slug}','ProductDetailController@getProductDetail')->name('get.product.detail');
});
include('route_admin.php');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
