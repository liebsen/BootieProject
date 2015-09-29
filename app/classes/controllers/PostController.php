<?php namespace App\Controllers;

require SP . 'app/models/Post.php';
require SP . 'app/models/File.php';
require SP . 'app/models/PostTag.php';
require SP . 'app/models/Tag.php';
require SP . 'vendor/micro/Str.php';

class PostController {
	
	static $layout = "admin";

	public function index(){

		$entries = \App\Models\Post::fetch([
			'lang' => "en"
		]);

		return \App::view('admin.posts.index',[
			'entries'	=> $entries
		]);
	}

	public function edit($path,$id){

		$entry = \App\Models\Post::row([
			'id' => $id
		]);

		return \App::view('admin.posts.edit',[
			'entry'	=> $entry
		]);
	}


	public function update(){

		extract($_POST);

		$entry = new \App\Models\Post();
		$entry->id = $id;
		$entry->title = $title;
		$entry->slug = \App\Helpers\Str::slugify($title);
		$entry->caption = $caption;
		$entry->content = $content;
		$result = $entry->save();

		return $result;
	}
}