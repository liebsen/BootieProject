<?php 

use \Bootie\App as App;

/* public */
App::route('/',			['uses' => 'Controller\HomeController@index']);
App::route('/blog',		['uses' => 'Controller\BlogController@index']);
App::route('/blog/([^/]+)', [ 'uses' => 'Controller\BlogController@show']);
App::route('/blog/files/(\d+)', [ 'uses' => 'Controller\BlogController@files']);
App::route('/blog/tag/([^/]+)', [ 'uses' => 'Controller\BlogController@tag']);
App::route('/login', 	[ 'uses' => 'Controller\AuthController@login','method' => 'post']);
App::route('/logout', 	[ 'uses' => 'Controller\AuthController@logout']);

/* private */
App::route('/admin', 	[ 'uses' => 'Controller\AdminController@index','before' => 'auth.admin']);
App::route('/admin/posts', [ 'uses' => 'Controller\PostController@index','before' => 'auth.admin']);
App::route('/admin/posts/(\d+)', [ 'uses' => 'Controller\PostController@edit','before' => 'auth.admin']);
App::route('/admin/posts/create', [ 'uses' => 'Controller\PostController@create','before' => 'auth.admin']);
App::route('/admin/posts/update/(\d+)', [ 'uses' => 'Controller\PostController@update','method' => 'post','before' => 'auth.admin']);
App::route('/admin/posts/delete/(\d+)', [ 'uses' => 'Controller\PostController@delete','method' => 'post','before' => 'auth.admin']);
App::route('/admin/tags/relation/remove/(\d+)', [ 'uses' => 'Controller\TagController@remove_relation','method' => 'post','before' => 'auth.admin']);
App::route('/admin/tags/relation/add/(\d+)', [ 'uses' => 'Controller\TagController@add_relation','before' => 'auth.admin','method' => 'post']);
App::route('/admin/tags/post/(\d+)', [ 'uses' => 'Controller\TagController@tags','before' => 'auth.admin']);
App::route('/admin/files/resize', [ 'uses' => 'Controller\FileController@resize','method' => 'post','before' => 'auth.admin']);
App::route('/admin/files/upload', [ 'uses' => 'Controller\FileController@upload','before' => 'auth.admin']);
App::route('/admin/files/order', [ 'uses' => 'Controller\FileController@order','method' => 'post','before' => 'auth.admin']);
App::route('/admin/files/remove', [ 'uses' => 'Controller\FileController@destroy','method' => 'post','before' => 'auth.admin']);

/* public pages */
App::route('/(.*)', [ 'uses' => 'Controller\HomeController@page']);

/* filters */
App::filter('auth.admin',function(){
	if( ! session('user_id') || session('group') !== 'admin'){
		return redirect('/login','Your session has expired');
	}
});