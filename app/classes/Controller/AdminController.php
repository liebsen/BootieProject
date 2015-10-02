<?php namespace Controller;

class AdminController extends \Controller\BaseController {
	
	static $layout = "admin";

	public function index(){
		return \Bootie\App::view('admin.dash',[
			'posts_count'	=> \Model\Post::count()
		]);
	}

}