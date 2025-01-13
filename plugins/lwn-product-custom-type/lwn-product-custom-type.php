<?php

/*
 * Plugin Name: Lwn Custom Type Product
 * */

if (!defined('ABSPATH')) {
  exit();
}

// register product post
add_action('init', 'lwn_ctp_register_product');
function lwn_ctp_register_product()
{
  $labels = [
    'name' => 'Products',
    'singular_name' => 'Product',
    'menu_name' => 'LWN Products',
    'add_new' => 'Add new',
    'add_new_item' => 'Add new product',
    'new_item' => 'New Product',
    'edit_item' => 'Edit Product',
    'view_item' => 'View Product',
    'all_items' => 'Products',
    'search_items' => 'Search Products',
    'not_found' => 'No product found',
    'not_found_in_trash' => 'No product found in trash',
  ];
  $args = [
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'rewrite' => ['slug' => 'lwn-product'],
    'capability_type' => 'post',
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-cart',
    'menu_position' => 500,
  ];
  register_post_type('lwn-product', $args);
}
