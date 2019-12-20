<?php
/**
 * Plugin Name:       Sage JGI Functionality
 * Plugin URI:        http://jgi-wp.pv/
 * Description:       Sage JGI custom Functionality
 * Version:           1.0.0
 * Author:            JGI
 * Author URI:        http://jgi-wp.pv/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sage-jgi-functionality
 * Domain Path:       /languages
 */

include 'customizer.php';
include 'functions.php';

//custom post type function
function create_posttype()
{

    register_post_type('products',
        array(
            'labels' => array(
                'name' => __('Products'),
                'singular_name' => __('Product')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'tags')
        )

    );

}

add_action('init', 'create_posttype');
