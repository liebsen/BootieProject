<?php
/**
 * Groups configuration for default Minify implementation
 * @package Minify
 */

/** 
 * You may wish to use the Minify URI Builder app to suggest
 * changes. http://yourdomain/min/builder/
 *
 * See http://code.google.com/p/minify/wiki/CustomSource for other ideas
 **/

return array(
    'js.plain' => array(
        '//assets/js/jquery-2.1.4.min.js',
        '//assets/js/bootstrap.min.js'        
    ),
    'css.plain' => array(
        '//assets/css/bootstrap.min.css', 
        '//assets/css/ionicons.min.css', 
        '//assets/css/theme.css',
        '//assets/css/ltcircular.css',
        '//assets/css/circle-tiles.css'
    ),
    'js.default' => array(
        '//assets/js/jquery-2.1.4.min.js',
        '//assets/js/bootstrap.min.js',
        '//assets/js/slick.min.js',
        '//assets/js/app.js'
    ),
    'css.default' => array(
        '//assets/css/bootstrap.min.css', 
        '//assets/css/ionicons.min.css', 
        '//assets/css/slick.css',
        '//assets/css/theme.css',
        '//assets/css/circle-tiles.css'
    ),
    'js.admin' => array(
        '//assets/js/jquery-2.1.4.min.js',
        '//assets/js/jquery-ui-1.10.4.custom.min.js',
        '//assets/js/bootstrap.min.js',
        '//assets/js/summernote.min.js',
        '//assets/js/dropzone.js',
        '//assets/js/admin/app.js'
    ),
    'css.admin' => array(
        '//assets/css/bootstrap.min.css', 
        '//assets/css/font-awesome.min.css', 
        '//assets/css/ionicons.min.css', 
        '//assets/css/summernote.css', 
        '//assets/css/dropzone.css', 
        '//assets/css/theme.css'
    )
);
