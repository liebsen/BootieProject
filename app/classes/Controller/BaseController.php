<?php namespace Controller;

class BaseController {
	
	public function __construct(){
		\Bootie\App::load_database();
	}
}