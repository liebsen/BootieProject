<?php

/* Example Column Options:
$column = [
	'type' => 'primary|string|integer|boolean|decimal|datetime',
	'length' => NULL,
	'index' => FALSE,
	'null' => TRUE,
	'default' => NULL,
	'unique' => FALSE,
	'precision' => 0, // (optional, default 0) The precision for a decimal (exact numeric) column. (Applies only if a decimal column is used.)
	'scale' => 0, // (optional, default 0) The scale for a decimal (exact numeric) column. (Applies only if a decimal column is used.)
);
*/

$config = [
	'users' => [
		'id' => ['type' => 'primary'],
		'lang' => ['type' => 'string', 'length' => 100],
		'username' => ['type' => 'string', 'length' => 100],
		'pass' => ['type' => 'string', 'length' => 255],
		'title' => ['type' => 'string', 'length' => 255],
		'email' => ['type' => 'string', 'length' => 255],
		'status' => ['type' => 'integer', 'length' => 6],
		'lastlogin' => ['type' => 'integer'],
		'created' => ['type' => 'integer'],
		'updated' => ['type' => 'integer'],
	],
	'groups' => [
		'id' => ['type' => 'primary'],
		'title' => ['type' => 'string', 'length' => 20],
		'created' => ['type' => 'integer'],
		'updated' => ['type' => 'integer'],
	],	
	'users_groups' => [
		'id' => ['type' => 'primary'],
		'user_id' => ['type' => 'integer'],
		'group_id' => ['type' => 'integer'],
		'created' => ['type' => 'integer'],
		'updated' => ['type' => 'integer'],		
	],
	'posts' => [
		'id' => ['type' => 'primary'],
		'user_id' => ['type' => 'integer'],
		'privacy_id' => ['type' => 'integer', 'length' => 1],
		'title' => ['type' => 'string', 'length' => 255],
		'slug' => ['type' => 'string', 'length' => 255],
		'position' => ['type' => 'integer', 'length' => 1],
		'type' => ['type' => 'string', 'length' => 10],
		'lang' => ['type' => 'string', 'length' => 2],
		'caption' => ['type' => 'string', 'length' => 510],
		'comments' => ['type' => 'integer', 'length' => 1],
		'content' => ['type' => 'string'],
		'created' => ['type' => 'integer'],
		'updated' => ['type' => 'integer'],		
	],
	'tags' => [
		'id' => ['type' => 'primary'],
		'user_id' => ['type' => 'integer'],
		'tag' => ['type' => 'string', 'length' => 255],
		'type' => ['type' => 'string', 'length' => 10],
		'created' => ['type' => 'integer'],
		'updated' => ['type' => 'integer'],		
	],
	'posts_tags' => [
		'id' => ['type' => 'primary'],
		'post_id' => ['type' => 'integer'],
		'tag_id' => ['type' => 'integer'],
		'created' => ['type' => 'integer'],
		'updated' => ['type' => 'integer'],		
	],
	'files' => [
		'id' => ['type' => 'primary'],
		'post_id' => ['type' => 'integer'],
		'title' => ['type' => 'string', 'length' => 255],
		'content' => ['type' => 'text'],
		'name' => ['type' => 'string', 'length' => 255],
		'status' => ['type' => 'tinyint', 'length' => 1],
		'file_size' => ['type' => 'integer'],
		'position' => ['type' => 'smallint', 'length' => 6],
		'created' => ['type' => 'int'],
		'updated' => ['type' => 'int'],
	]	
];