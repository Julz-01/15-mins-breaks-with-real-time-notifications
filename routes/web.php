<?php

use App\Events\MyEvent;
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
//Default routes without authentication
//Linkserve Home page
Route::get('/', function () {
    return view('front');
});

//Linkserve Career page
Route::get('career', function () {
    return view('career');
});

//Linkserve Misson Visssion page
Route::get('mission-vision', function () {
    return view('mvc');
});


Auth::routes();

//ADMIN ROUTES

Route::group(['namespace' => 'Admin'],function(){

//ADMIN GET METHOD
Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');

Route::get('admin/home','AdminController@direct')->name('admin.home');

Route::get('get_employees', 'AdminController@get_user');

Route::get('get_admins', 'AdminController@get_admin');

Route::get('get_leave', 'AdminController@get_leave');

Route::get('get_timesheet', 'AdminController@get_timesheet');

Route::get('admin_timesheet', 'AdminController@admin_timesheet');

Route::get('get_announce', 'AdminController@get_announce');

Route::get('get_id/{id}', 'AdminController@get_id');

Route::get('admin_id/{id}', 'AdminController@admin_id');

Route::get('new_user', 'AdminController@new_user');

Route::get('filter', 'AdminController@get_timesheet');
//ADMIN DELETE METHOD USING AJAX
Route::get('destroy/{id}', 'AdminController@destroy_user');

Route::get('admin_destroy/{id}', 'AdminController@destroy_admin');

//ADMIN POST METHOD
Route::post('admin/timein', 'AdminController@timein');

Route::post('admin/timeout/{id}', 'AdminController@timeout');

Route::post('admin-login', 'Auth\LoginController@login');

Route::post('register_user', 'AdminController@register_user');

Route::post('filter', 'AdminController@get_timesheet');

Route::post('admin_filter', 'AdminController@admin_timesheet');

Route::post('leave_filter', 'AdminController@get_leave');

Route::post('truncate','AdminController@truncate');

Route::post('admin-truncate','AdminController@admin_truncate');
//Route::post('search', 'AdminController@search_date');

//ADMIN PUT METHOD
Route::put('up_announcement', 'AdminController@up_announcement');

Route::put('up_event', 'AdminController@up_event');

Route::put('/admin/announcement', 'AdminController@announcement');

Route::put('/admin/leave/accept/{id}', 'AdminController@accept_leave');

Route::put('/admin/leave/decline/{id}', 'AdminController@decline_leave');

Route::put('update/{id}', 'AdminController@update');

Route::put('update_admin/{id}', 'AdminController@update_admin');

});

//USER ROUTES

Route::group(['namespace' => 'User'],function(){

//GET METHOD
Route::get('/home', 'HomeController@index')->name('home');

Route::get('get_profile', 'HomeController@get_profile');

Route::get('request', 'HomeController@request');

//POST METHOD
Route::post('/timein', 'HomeController@timein');

Route::post('/timeout/{id}', 'HomeController@timeout');

Route::post('send_request', 'HomeController@send_request');

	});
