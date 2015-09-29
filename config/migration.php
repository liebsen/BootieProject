<?php

/* Example Column Options:
$column = array(
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

$config = array(

	'files' => array(
		'id' => array('type' => 'primary'),
		'post_id' => array('type' => 'smallint', 'length' => 6),
		'title' => array('type' => 'varchar', 'length' => 255),
		'content' => array('type' => 'text'),
		'name' => array('type' => 'varchar', 'length' => 255),
		'status' => array('type' => 'tinyint', 'length' => 1),
		'file_size' => array('type' => 'varchar', 'length' => 50),
		'position' => array('type' => 'smallint', 'length' => 6),
		'created' => array('type' => 'int', 'length' => 14),
		'updated' => array('type' => 'int', 'length' => 14),
	),
	'users' => array(
		'id' => array('type' => 'primary'),
		'role_id' => array('type' => 'smallint', 'length' => 6),
		'lang' => array('type' => 'varchar', 'length' => 100)
		'username' => array('type' => 'varchar', 'length' => 100)
		'name' => array('type' => 'varchar', 'length' => 100)
		'name' => array('type' => 'varchar', 'length' => 100)
		'name' => array('type' => 'varchar', 'length' => 100)
		'name' => array('type' => 'varchar', 'length' => 100)
		'name' => array('type' => 'varchar', 'length' => 100)
		'name' => array('type' => 'varchar', 'length' => 100)
		'name' => array('type' => 'varchar', 'length' => 100)
		'name' => array('type' => 'varchar', 'length' => 100)
		'name' => array('type' => 'varchar', 'length' => 100)
	),
	'users' => array(
		'id' => array('type' => 'primary'),
		'dorm_id' => array('type' => 'smallint', 'length' => 6),
		'name' => array('type' => 'varchar', 'length' => 100)
	),

);