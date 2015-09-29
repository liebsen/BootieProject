<?php namespace Controller;

class HomeController {
	
	public function index(){

		$posts = \Model\Post::fetch();

		return \Bootie\App::view('index',[
			'posts'	=> $posts
		]);
	}

	public function page($page){
		return \Bootie\App::view($page);
	}
}