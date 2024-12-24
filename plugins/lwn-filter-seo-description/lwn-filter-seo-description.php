<?php

/*
 * Plugin Name: SEO Description
 * */

add_action('wp_head', 'lwn_filter_seo_description');
function lwn_filter_seo_description()
{
  /* $new_description = 'filtered description'; */
  $default_description = 'this is default description';
  $new_description = apply_filters(
    'lwn_meta_description_filter',
    $default_description,
  );
  echo "<meta name='description' content='" . esc_attr($new_description) . "'>";
}

add_filter(
  'lwn_meta_description_filter',
  'lwn_meta_description_filter_callback',
);
function lwn_meta_description_filter_callback($desc)
{
  $improved_desc = $desc . '  this is to improve desc';
  return $improved_desc;
}
