<?php namespace Model;
 
class Tag extends \Bootie\ORM
{
    public static $table = 'tags';
    public static $foreign_key = 'tag_id';

    public static $belongs_to = array(
        'tag_id' => '\Model\PostTag'
    );

    public static $has_many_through = array(
        'tags' => array(
            'post_id' => '\Model\PostTag',
            'post_id' => '\Model\Post',
        ),
    );    
}