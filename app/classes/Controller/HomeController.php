<?php namespace Controller;

class HomeController extends \Controller\BaseController {
	
	static $layout = "default";
	
	public function index(){
		return \Bootie\App::view('index',[
			'posts'	=> \Controller\BlogController::find_by_tag('start')
		]);
	}

	public function page($slug){
		return \Bootie\App::view("static.$slug");
	}
}