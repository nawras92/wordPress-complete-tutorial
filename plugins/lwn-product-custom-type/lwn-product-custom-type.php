<?php

/*
 * Plugin Name: Lwn Custom Type Product
 * */

if (!defined('ABSPATH')) {
  exit();
}

// shortcode
add_shortcode('lwn-wp-query', 'lwn_ctp_render_shortcode');
function lwn_ctp_render_shortcode()
{
  // ---- Get posts - type = lwn-product: Start
  $output = '';
  $args = [
    'post_type' => 'lwn-product',
  ];
  $query = new WP_Query($args);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $output .= get_the_title();
      $output .= '<br>';
    }
    wp_reset_postdata();
  }
  return $output;

  // ---- Get posts - type = lwn-product : End
  // ---- Get terms - product-category: start
  /* $args = [ */
  /*   'taxonomy' => 'product-category', // taxonomy name */
  /*   'hide_empty' => false, */
  /* ]; */
  /* $output = ''; */
  /* $terms = get_terms($args); */
  /* if (!is_wp_error($terms)) { */
  /*   foreach ($terms as $term) { */
  /*     /1* print_r($term); *1/ */
  /*     $output .= $term->name . ':  ' . $term->term_id; */
  /*     $output .= '<br>'; */
  /*   } */
  /* } */
  /* return $output; */
  // ---- Get terms - product-category: end
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
    /* 'taxonomies' => ['category', 'post_tag'], */
    'taxonomies' => ['product-category'],
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

  $tax_labels = [
    'name' => 'Product Categories',
    'singular_name' => 'Product Category',
  ];
  $tax_args = [
    'labels' => $tax_labels,
    'public' => true,
    'show_in_rest' => true,
  ];
  register_taxonomy('product-category', 'lwn-product', $tax_args);
}

// register product Taxonomy
/* add_action('init', 'lwn_ctp_register_product_taxonomy'); */
/* function lwn_ctp_register_product_taxonomy() */
/* { */
/*   $labels = [ */
/*     'name' => 'Product Categories', */
/*     'singular_name' => 'Product Category', */
/*   ]; */
/*   $args = [ */
/*     'labels' => $labels, */
/*     'public' => true, */
/*   ]; */
/*   register_taxonomy('product-category', 'lwn-product', $args); */
/* } */
