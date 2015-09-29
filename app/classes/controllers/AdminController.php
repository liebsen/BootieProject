<?php namespace App\Controllers;

require SP . 'app/models/Post.php';

class AdminController {
	
	static $layout = "admin";

	public function index(){

		$posts_count = \App\Models\Post::count([
			'lang' => "en"
		]);

		return \App::view('admin.dash',[
			'posts_count'	=> $posts_count
		]);
	}

}