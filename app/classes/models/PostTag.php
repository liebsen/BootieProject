<?php namespace App\Models;
 
class PostTag extends \App\ORM
{
    public static $table = 'posts_tags';
    public static $foreign_key = 'id';

    public static $has = array(
        'post' => '\App\Models\Post',
        'tag' => '\App\Models\Tag',
    );
}