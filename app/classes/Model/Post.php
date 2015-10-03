<?php namespace Model;

class Post extends \Bootie\ORM
{
    public static $table = 'posts';
	public static $foreign_key = 'post_id';
	public static $perpage = 5;

	public static $validator = [
		'title'	=> 'required'
	];

	public static $has = array(
		'files' => '\Model\File',
		'post_tags'	=> '\Model\PostTag'
	);

	public static $has_many_through = array(
		'tags' => array(
			'post_id' => '\Model\PostTag',
			'tag_id' => '\Model\Tag',
		)
	);
}