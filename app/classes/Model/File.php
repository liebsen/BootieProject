<?php namespace Model;
 
class File extends \Bootie\ORM { 
    public static $table = 'files';
    public static $foreign_key = 'file_id';
    public static $order_by = ['position' => "ASC"];

    public static $belongs_to = array(
        'post' => '\Model\Post',
    );
}