<?php namespace App\Models;
 
class Tag extends \App\ORM
{
    public static $table = 'tags';
    public static $foreign_key = 'tag_id';

    public static $belongs_to = array(
        'tag_id' => '\App\Models\PostTag'
    );

    public static $has_many_through = array(
        'tags' => array(
            'post_id' => '\App\Models\PostTag',
            'post_id' => '\App\Models\Post',
        ),
    );    
}