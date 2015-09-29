<?php namespace App\Models;

class Post extends \App\ORM
{
    public static $table = 'posts';
	public static $foreign_key = 'post_id';

	public static $validator = [
		'title'	=> 'required'
	];

	public static $has = array(
		'files' => '\App\Models\File'
	);

	public static $has_many_through = array(
		'tags' => array(
			'post_id' => '\App\Models\PostTag',
			'tag_id' => '\App\Models\Tag',
		),
	);
}