<?php namespace Controller;

class AdminController {
	
	static $layout = "admin";

	public function index(){

		$posts_count = \Model\Post::count([
			'lang' => "en"
		]);

		return \Bootie\App::view('admin.dash',[
			'posts_count'	=> $posts_count
		]);
	}

}