<?php 

/* public */
App::route('/',			['uses' => 'App\Controllers\HomeController@index']);
App::route('/blog',		['uses' => 'App\Controllers\BlogController@index']);
App::route('/blog/([^/]+)', [ 'uses' => 'App\Controllers\BlogController@show']);
App::route('/blog/files/(\d+)', [ 'uses' => 'App\Controllers\BlogController@files']);
App::route('/blog/tag/([^/]+)', [ 'uses' => 'App\Controllers\BlogController@tag']);
App::route('/login', 	[ 'uses' => 'App\Controllers\AuthController@login', 'method' => 'post']);
App::route('/logout', 	[ 'uses' => 'App\Controllers\AuthController@logout']);


/* admin */
App::route('/admin', 	[ 'uses' => 'App\Controllers\AdminController@index', 'prefix' => 'admin', 'before' => 'auth.admin']);
App::route('/admin/posts', [ 'uses' => 'App\Controllers\AdminController@posts', 'prefix' => 'admin', 'before' => 'auth.admin']);
App::route('/admin/posts/update', [ 'uses' => 'App\Controllers\AdminController@post_update', 'prefix' => 'admin', 'before' => 'auth.admin', 'method' => 'post']);
App::route('/admin/posts/(\d+)', [ 'uses' => 'App\Controllers\AdminController@post', 'prefix' => 'admin', 'before' => 'auth.admin']);
App::route('/admin/tags/remove/(\d+)', [ 'uses' => 'App\Controllers\AdminController@tags_remove', 'prefix' => 'admin', 'before' => 'auth.admin', 'method' => 'post']);
App::route('/admin/tags/add/(\d+)', [ 'uses' => 'App\Controllers\AdminController@tags_add', 'prefix' => 'admin', 'before' => 'auth.admin', 'method' => 'post']);
App::route('/admin/tags/(\d+)', [ 'uses' => 'App\Controllers\AdminController@tags', 'prefix' => 'admin', 'before' => 'auth.admin']);
App::route('/admin/files/resize', [ 'uses' => 'App\Controllers\FileController@resize', 'prefix' => 'admin', 'before' => 'auth.admin','method' => 'post']);
App::route('/admin/files/upload', [ 'uses' => 'App\Controllers\FileController@upload', 'prefix' => 'admin', 'before' => 'auth.admin']);
App::route('/admin/files/order', [ 'uses' => 'App\Controllers\FileController@order', 'prefix' => 'admin', 'before' => 'auth.admin','method' => 'post']);
App::route('/admin/files/remove', [ 'uses' => 'App\Controllers\FileController@destroy', 'prefix' => 'admin', 'before' => 'auth.admin', 'method' => 'post']);

/* pages */
App::route('/([^/]+)', [ 'uses' => 'App\Controllers\HomeController@page']);

/* filters */
App::filter('auth.admin',function(){
	if( ! session('user_id') || session('group') !== 'admin'){
		return redirect('/login');
	}
});