<?php namespace App\Models;
 
class File extends \App\ORM { 
    public static $table = 'files';
    public static $foreign_key = 'file_id';
    public static $order_by = ['position' => "ASC"];

    public static $belongs_to = array(
        'post' => '\App\Models\Post',
    );
}