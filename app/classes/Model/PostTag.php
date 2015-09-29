<?php namespace Model;
 
class PostTag extends \Bootie\ORM
{
    public static $table = 'posts_tags';
    public static $foreign_key = 'id';

    public static $has = array(
        'post' => '\Model\Post',
        'tag' => '\Model\Tag',
    );
}