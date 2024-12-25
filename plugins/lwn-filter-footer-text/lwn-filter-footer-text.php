<?php

/*
 * Plugin Name: Lwn Filter Footer Text
 * */

add_action('wp_footer', 'lwn_filter_footer_text_cbk');
function lwn_filter_footer_text_cbk()
{
  $text = apply_filters('lwn_custom_footer_text', 'default text here');
  echo '<p style="background: blue; color: white">';
  echo $text;
  echo '</p>';
}

add_filter('lwn_custom_footer_text', function ($text) {
  return 'Text powered by lwn: ' . $text;
});
