<?php namespace Controller;

class PostController extends \Controller\BaseController {
	
	static $layout = "admin";

	public function index(){

		$entries = \Model\Post::fetch();

		return \Bootie\App::view('admin.posts.index',[
			'entries'	=> $entries
		]);
	}

	public function edit($path,$id){

		if( ! $id ){
			$p = new \Model\Post();
			$p->title = 'New Post';
			$p->user_id = session('user_id');
			$p->save();
			$id = $p->id;
		} 

		$entry = \Model\Post::row([
			'id' => $id
		]);

		return \Bootie\App::view('admin.posts.edit',[
			'entry'	=> $entry
		]);
	}


	public function update(){

		extract($_POST);

		$entry = new \Model\Post();
		$entry->id = $id;
		$entry->title = $title;
		$entry->slug = \Bootie\Str::slugify($title);
		$entry->caption = $caption;
		$entry->content = $content;
		$result = $entry->save();

		return $result;
	}
}