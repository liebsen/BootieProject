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
		'title' => ['type' => 'integer', 'length' => 4],
		'email' => ['type' => 'integer', 'length' => 10],
		'status' => ['type' => 'integer', 'length' => 6],
		'lastlogin' => ['type' => 'integer', 'length' => 14],
		'created' => ['type' => 'integer', 'length' => 14],
		'updated' => ['type' => 'integer', 'length' => 14],
	],
	'groups' => [
		'id' => ['type' => 'primary'],
		'title' => ['type' => 'integer', 'length' => 4],
		'created' => ['type' => 'integer', 'length' => 14],
		'updated' => ['type' => 'integer', 'length' => 14],
	],	
	'users_groups' => [
		'id' => ['type' => 'primary'],
		'user_id' => ['type' => 'integer', 'length' => 11],
		'group_id' => ['type' => 'integer', 'length' => 11],
		'created' => ['type' => 'integer', 'length' => 14],
		'updated' => ['type' => 'integer', 'length' => 14],		
	],
	'posts' => [
		'id' => ['type' => 'primary'],
		'user_id' => ['type' => 'integer', 'length' => 11],
		'privacy_id' => ['type' => 'integer', 'length' => 1],
		'title' => ['type' => 'string', 'length' => 255],
		'slug' => ['type' => 'string', 'length' => 255],
		'position' => ['type' => 'integer', 'length' => 1],
		'type' => ['type' => 'string', 'length' => 10],
		'lang' => ['type' => 'string', 'length' => 2],
		'caption' => ['type' => 'string', 'length' => 510],
		'comments' => ['type' => 'integer', 'length' => 1],
		'content' => ['type' => 'string', 'length' => 65535],
		'created' => ['type' => 'integer', 'length' => 14],
		'updated' => ['type' => 'integer', 'length' => 14],		
	],
	'tags' => [
		'id' => ['type' => 'primary'],
		'user_id' => ['type' => 'integer', 'length' => 11],
		'tag' => ['type' => 'string', 'length' => 255],
		'type' => ['type' => 'string', 'length' => 10],
		'created' => ['type' => 'integer', 'length' => 14],
		'updated' => ['type' => 'integer', 'length' => 14],		
	],
	'posts_tags' => [
		'id' => ['type' => 'primary'],
		'post_id' => ['type' => 'integer', 'length' => 11],
		'tag_id' => ['type' => 'integer', 'length' => 11],
		'created' => ['type' => 'integer', 'length' => 14],
		'updated' => ['type' => 'integer', 'length' => 14],		
	],
	'files' => [
		'id' => ['type' => 'primary'],
		'post_id' => ['type' => 'smallint', 'length' => 6],
		'title' => ['type' => 'string', 'length' => 255],
		'content' => ['type' => 'text'],
		'name' => ['type' => 'string', 'length' => 255],
		'status' => ['type' => 'tinyint', 'length' => 1],
		'file_size' => ['type' => 'string', 'length' => 50],
		'position' => ['type' => 'smallint', 'length' => 6],
		'created' => ['type' => 'int', 'length' => 14],
		'updated' => ['type' => 'int', 'length' => 14],
	]	
];