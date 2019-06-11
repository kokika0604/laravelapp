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
Route::get('user/homepage', 'HomepageController@index')->name('get_homepage');

Route::get('user/add', "UserController@add")->name("get_user_add");
Route::post('user/add', "UserController@add")->name("post_user_add");
Route::get('user/login', "UserController@login")->name("get_user_login");
Route::post('user/login', "UserController@login")->name("post_user_login");
Route::get('user/logout', "UserController@logout")->name("get_user_logout");
Route::get("user/mypage", "UserController@mypage")->name("get_user_mypage")->middleware("auth");
Route::get('user/info', "UserController@info")->name("get_user_info");
Route::get('user/edit', "UserController@edit")->name("get_user_edit");
Route::post('user/edit', "UserController@edit")->name("post_user_edit");
Route::get('user/favourites', "UserController@favourites")->name("get_user_favourites");



Route::get('restaurant/login', 'RestaurantController@login')->name('get_restaurant_login');
Route::post('restaurant/login', 'RestaurantController@login')->name('post_restaurant_login');
Route::get('restaurant/logout', 'RestaurantController@logout')->name('get_restaurant_logout');
Route::get('restaurant/mypage', 'RestaurantController@mypage')->name('get_restaurant_mypage')->middleware("auth:restaurants");
Route::get('restaurant/add', 'RestaurantController@add')->name('get_restaurant_add');
Route::post('restaurant/add', 'RestaurantController@add')->name('post_restaurant_add');
Route::get('restaurant/info', 'RestaurantController@info')->name('get_restaurant_info');
Route::get('restaurant/info/base/edit', 'RestaurantController@edit')->name('get_restaurant_info_edit');
Route::post('restaurant/info/base/edit', 'RestaurantController@edit')->name('post_restaurant_info_edit');

Route::get('restaurant/info/pic/add', 'RestaurantPicController@add')->name('get_restaurant_pic_add');
Route::post('restaurant/info/pic/add', 'RestaurantPicController@add')->name('post_restaurant_pic_add');
Route::get('restaurant/info/pic/edit/{id}', 'RestaurantPicController@edit')->name('get_restaurant_pic_edit');
Route::post('restaurant/info/pic/edit/{id}', 'RestaurantPicController@edit')->name('post_restaurant_pic_edit');
Route::get('restaurant/info/pic/delete/{id}', 'RestaurantPicController@delete')->name('get_restaurant_pic_delete');

Route::get('restaurant/menu', 'MenuController@index')->name('get_restaurant_menu');
Route::get('restaurant/menu/add', 'MenuController@add')->name('get_restaurant_menu_add');
Route::post('restaurant/menu/add', 'MenuController@add')->name('post_restaurant_menu_add');
Route::get('restaurant/menu/edit/{id}', 'MenuController@edit')->name('get_restaurant_menu_edit');
Route::post('restaurant/menu/edit/{id}', 'MenuController@edit')->name('post_restaurant_menu_edit');
Route::get('restaurant/menu/delete/{id}', 'MenuController@delete')->name('get_restaurant_menu_delete');

Route::get('restaurant/review/{order?}', 'ReviewController@index')->name('get_restaurant_review');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrysheet', 'EntrySheetController@index')->name('entrysheet');
Route::get('/tcpdf', 'EntrySheetController@tcpdf')->name('tcpdf');
Route::get('/snappy_pdf', 'EntrySheetController@snappy')->name('snappy_pdf');
