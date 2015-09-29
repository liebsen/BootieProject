<?php namespace App\Controllers;

require SP . 'app/models/Post.php';
require SP . 'app/models/File.php';

class HomeController {
	
	public function index(){

		$posts = \App\Models\Post::fetch();

		return \App::view('index',[
			'posts'	=> $posts
		]);
	}

	public function page($page){
		return \App::view($page);
	}
}