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

//custom product post type function
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

//add product taxonomy
function taxonomies_product()
{
    $labels = array(
        'name' => _x('Product Types', 'taxonomy general name'),
        'singular_name' => _x('Product Type', 'taxonomy singular name'),
        'search_items' => __('Search Product Types'),
        'all_items' => __('All Product Types'),
        'parent_item' => __('Parent Product Type'),
        'parent_item_colon' => __('Parent Product Type:'),
        'edit_item' => __('Edit Product Type'),
        'update_item' => __('Update Product Type'),
        'add_new_item' => __('Add New Product Type'),
        'new_item_name' => __('New Product Type'),
        'menu_name' => __(' Product Types'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('product_category', 'products', $args);
}

add_action('init', 'taxonomies_product', 0);


//custom career post type function
function create_posttype_careersjobs()
{

    register_post_type('careersjobs',
        array(
            'labels' => array(
                'name' => __('Careers'),
                'singular_name' => __('Career')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'careersjobs'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'tags')
        )

    );

}

add_action('init', 'create_posttype_careersjobs');

//add career taxonomy
function taxonomies_career()
{
    $labels = array(
        'name' => _x('Departments', 'taxonomy general name'),
        'singular_name' => _x('Department Type', 'taxonomy singular name'),
        'search_items' => __('Search Departments'),
        'all_items' => __('All Departments'),
        'parent_item' => __('Parent Department'),
        'parent_item_colon' => __('Parent Department:'),
        'edit_item' => __('Edit Department'),
        'update_item' => __('Update Department'),
        'add_new_item' => __('Add New Department'),
        'new_item_name' => __('New Department'),
        'menu_name' => __(' Departments'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('career_category', 'careersjobs', $args);
}

add_action('init', 'taxonomies_career', 0);


/* check if user is administrator - only show downloads menu if is admin */

add_action('admin_init', 'remove_menu');
function remove_menu()
{
    $user = wp_get_current_user();

    if (in_array('editor', (array)$user->roles) || in_array('brands_editor', (array)$user->roles) || in_array('careers_editor', (array)$user->roles)) {
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');
    }

}
