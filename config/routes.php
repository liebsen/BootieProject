<?php 

/* public */
\App::route('/',			['uses' => 'App\Controllers\HomeController@index']);
\App::route('/blog',		['uses' => 'App\Controllers\BlogController@index']);
\App::route('/blog/([^/]+)', [ 'uses' => 'App\Controllers\BlogController@show']);
\App::route('/blog/files/(\d+)', [ 'uses' => 'App\Controllers\BlogController@files']);
\App::route('/blog/tag/([^/]+)', [ 'uses' => 'App\Controllers\BlogController@tag']);
\App::route('/login', 	[ 'uses' => 'App\Controllers\AuthController@login','method' => 'post']);
\App::route('/logout', 	[ 'uses' => 'App\Controllers\AuthController@logout']);


/* private */
\App::route('/admin', 	[ 'uses' => 'App\Controllers\AdminController@index','before' => 'auth.admin']);
\App::route('/admin/posts', [ 'uses' => 'App\Controllers\PostController@index','before' => 'auth.admin']);
\App::route('/admin/posts/update', [ 'uses' => 'App\Controllers\PostController@update','method' => 'post','before' => 'auth.admin']);
\App::route('/admin/posts/(\d+)', [ 'uses' => 'App\Controllers\PostController@edit','before' => 'auth.admin']);
\App::route('/admin/tags/relation/remove/(\d+)', [ 'uses' => 'App\Controllers\TagController@remove_relation','method' => 'post','before' => 'auth.admin']);
\App::route('/admin/tags/relation/add/(\d+)', [ 'uses' => 'App\Controllers\TagController@add_relation','before' => 'auth.admin','method' => 'post']);
\App::route('/admin/tags/post/(\d+)', [ 'uses' => 'App\Controllers\TagController@tags','before' => 'auth.admin']);
\App::route('/admin/files/resize', [ 'uses' => 'App\Controllers\FileController@resize','method' => 'post','before' => 'auth.admin']);
\App::route('/admin/files/upload', [ 'uses' => 'App\Controllers\FileController@upload','before' => 'auth.admin']);
\App::route('/admin/files/order', [ 'uses' => 'App\Controllers\FileController@order','method' => 'post','before' => 'auth.admin']);
\App::route('/admin/files/remove', [ 'uses' => 'App\Controllers\FileController@destroy','method' => 'post','before' => 'auth.admin']);

/* public pages */
\App::route('/([^/]+)', [ 'uses' => 'App\Controllers\HomeController@page']);

/* filters */
\App::filter('auth.admin',function(){
	if( ! session('user_id') || session('group') !== 'admin'){
		return redirect('/login','Your session has expired');
	}
});