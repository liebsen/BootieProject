<?php namespace Controller;

class HomeController extends \Controller\BaseController {
	
	static $layout = "default";
	
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