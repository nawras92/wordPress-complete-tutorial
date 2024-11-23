<?php

/*
 * Plugin Name: My First Shortcode
 *
 * */

add_action('init', 'lwn_nawras_shortcode_first_shortcode_register');
function lwn_nawras_shortcode_first_shortcode_register()
{
  add_shortcode(
    'lwn_first-shortcode',
    'lwn_nawras_shortcode_first_shortcode_content',
  );
}

function lwn_nawras_shortcode_first_shortcode_content()
{
  $output = 'Hello. how are you?';
  return $output;
}
