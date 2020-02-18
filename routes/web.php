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
Route::match(['get','post'],'/admin/login', 'Dashboard\JobManageController@admin_login');

Route::group(['middleware' => 'admin'], function () {
Route::group(['prefix' => 'dashboard'], function () {
	Route::get('/', 'Dashboard\PostController@index');

	Route::match(['get','post'],'/logout', 'Dashboard\JobManageController@logout');
	Route::get('/news', function(){

	});
	Route::match(['get','post'],'/add-post', 'Dashboard\PostController@store');
	Route::post('/imagepost', 'Dashboard\PostController@imagestore');
	Route::post('/mediastore', 'Dashboard\PostController@mediastore');
	Route::get('/deletepost/{id}', 'Dashboard\PostController@deletepost');
	// Route::get('/teamsearch/{id}', 'Dashboard\PostController@teamsearch');
	Route::match(['get','post'],'/teamsearch', 'Dashboard\PostController@teamsearch');
	// Route::get('/postionsearch/{id}', 'Dashboard\PostController@postionsearch');
	Route::match(['get','post'],'/postionsearch', 'Dashboard\PostController@postionsearch');
	Route::post('/search', 'Dashboard\PostController@search');

	Route::match(['get','post'], 'edit-post-text/{id}', 'Dashboard\PostController@editPost');
	Route::match(['get','post'], 'edit-post-image/{id}', 'Dashboard\PostController@editPostImage');
	Route::match(['get','post'], 'edit-post-link/{id}', 'Dashboard\PostController@editPostLink');

	Route::get('posts', 'Dashboard\PostController@showPosts');
	Route::get('team-post/{id}', 'Dashboard\PostController@teamPost');
	Route::get('roles-post/{id}', 'Dashboard\PostController@postionPost');

    Route::get('allcsv', 'Dashboard\PostController@allcsv');

	Route::get('/job_management', 'Dashboard\JobManageController@index');
	Route::get('/blogs', 'Dashboard\JobManageController@blogs');
	Route::get('/blog/create', 'frontend\BlogController@create');
	Route::get('/blog/edit/{id}', 'frontend\BlogController@edit');
	Route::get('/blog/delete/{id}', 'frontend\BlogController@destroy');
	Route::post('/blog/store', 'frontend\BlogController@store');
	Route::match(['get','post'],'/template/{id}', 'Dashboard\JobManageController@template');
	Route::get('/upload_tamplate', 'Dashboard\JobManageController@showtemplate');
	Route::get('/job_delete/{id}', 'Dashboard\JobManageController@destroy');
	Route::post('/post_portal', 'Dashboard\JobManageController@post_portal');
	Route::post('/mark', 'Dashboard\JobManageController@mark');
	Route::match(['get','post'],'/jobstatus_update/{id}', 'Dashboard\JobManageController@jobstatus_update');


	// Route::get('/edit-post-image', function(){
	// 	return view('/admin.edit_post_image');
	// });
	// Route::get('/edit-post-text', function(){
	// 	return view('/admin.edit_post_text');
	// });
	// Route::get('/edit-post-link', function(){
	// 	return view('/admin.edit_post_link');
	// });
	Route::get('/add_tamplate', function(){
		return view('/admin.add_tamplate');
	});
	Route::get('/quotes','Dashboard\JobManageController@quotes');
	Route::get('/map', function(){
		return view('/admin.map');
	});
	Route::get('/notifications', function(){
		return view('/admin.notifications');
	});
	Route::get('/user', 'Dashboard\ProfileController@show_partner');
	Route::get('/tables', function(){
		return view('/admin.tables');
	});
	Route::get('/typography', function(){
		return view('/admin.typography');
	});
	Route::get('/upgrade', function(){
		return view('/admin.upgrade');
	});
	Route::get('/add-users', function(){
		return view('/admin.add-users');
	});
	Route::get('/edit_user/{id}', function(){
		return view('/admin.edit_user');
	});
});
});
//////////////////////// Admin Dashboard Close ////////////////////////////
