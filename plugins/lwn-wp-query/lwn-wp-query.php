<?php

/*
 * Plugin Name: Lwn Wp Query Shortcode
 * Description:  Demonstrates different types of WP_Query and display results via shortcode
 * Version: 1.0.0
 * Author:  Nawras Ali
 * Text Domain:  lwn-wq
 * */

if (!defined('ABSPATH')) {
  exit();
}

//  Display posts of search term
add_shortcode('lwn_search_posts', 'lwn_wq_search_posts');
function lwn_wq_search_posts($atts)
{
  $atts = shortcode_atts(['s' => ''], $atts);
  $args = [
    'posts_per_page' => 3,
    's' => $atts['s'],
  ];
  $query = new WP_Query($args);
  return lwn_wq_render_posts($query);
}

//  Display posts of specific author
add_shortcode('lwn_author_posts', 'lwn_wq_author_posts');
function lwn_wq_author_posts($atts)
{
  $atts = shortcode_atts(['author' => ''], $atts);
  $args = [
    'posts_per_page' => 3,
    'author_name' => $atts['author'],
  ];
  $query = new WP_Query($args);
  return lwn_wq_render_posts($query);
}

//  Display post of specific tag
add_shortcode('lwn_tag_posts', 'lwn_wq_tag_posts');
function lwn_wq_tag_posts($atts)
{
  $atts = shortcode_atts(['tag' => ''], $atts);
  $args = [
    'posts_per_page' => 3,
    'tag' => $atts['tag'],
  ];
  $query = new WP_Query($args);
  return lwn_wq_render_posts($query);
}

//  Display Custom post type
add_shortcode('lwn_custom_post_type', 'lwn_wq_custom_post_type');
function lwn_wq_custom_post_type($atts)
{
  $atts = shortcode_atts(['type' => 'post'], $atts);
  $args = [
    'posts_per_page' => 3,
    'post_type' => $atts['type'],
  ];
  $query = new WP_Query($args);
  return lwn_wq_render_posts($query);
}

//  Display posts from specific category
add_shortcode('lwn_category_posts', 'lwn_wq_category_posts');
function lwn_wq_category_posts($atts)
{
  $atts = shortcode_atts(['category' => ''], $atts);
  $args = [
    'posts_per_page' => 2,
    'category_name' => $atts['category'],
  ];
  $query = new WP_Query($args);
  return lwn_wq_render_posts($query);
}

// Latest Posts Shortcode
add_shortcode('lwn_latest_posts', 'lwn_wq_latest_posts');
function lwn_wq_latest_posts()
{
  $args = [
    'posts_per_page' => 2,
    /* 'orderby' => 'date', */
    /* 'order' => 'DESC', */
  ];
  $query = new WP_Query($args);
  return lwn_wq_render_posts($query);
}
// Render posts
function lwn_wq_render_posts($query)
{
  if (!$query->have_posts()) {
    return '<p>' . __('No Result Found', 'lwn-wq') . '</p>';
  }
  $output = '<ul>';
  while ($query->have_posts()) {
    $query->the_post();
    $output .=
      "<li><a href='" . get_permalink() . "'>" . get_the_title() . '</a></li>';
  }
  $output .= '<ul>';
  wp_reset_postdata();
  return $output;
}

// Add settings page
add_action('admin_menu', 'lwn_wq_add_admin_menu');
function lwn_wq_add_admin_menu()
{
  add_options_page(
    'LWN Shortcodes',
    'LWN Shortcodes',
    'manage_options',
    'lwn-shortcodes',
    'lwn_wq_settings_page',
  );
}
function lwn_wq_settings_page()
{
  ?>
    <div class="wrap">
        <h1>LWN Shortcodes</h1>
        <p>Use the following shortcodes in your posts or pages:</p>
        <ul>
            <li><code>[lwn_latest_posts]</code> - Displays latest 5 posts</li>
            <li><code>[lwn_category_posts category="your-category-slug"]</code> - Displays posts from a category</li>
            <li><code>[lwn_custom_post_type type="your-post-type"]</code> - Displays custom post type posts</li>
            <li><code>[lwn_tag_posts tag="your-tag"]</code> - Displays posts with a specific tag</li>
            <li><code>[lwn_author_posts author="author-slug"]</code> - Displays posts by an author</li>
            <li><code>[lwn_ordered_posts orderby="title" order="ASC"]</code> - Displays ordered posts</li>
            <li><code>[lwn_search_posts s="keyword"]</code> - Displays search results</li>
        </ul>
    </div>
    <?php
}
