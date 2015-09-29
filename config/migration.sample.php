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

	'users' => array(
		'id' => array('type' => 'primary'),
		'dorm_id' => array('type' => 'smallint', 'length' => 6),
		'name' => array('type' => 'varchar', 'length' => 100)
	),

);