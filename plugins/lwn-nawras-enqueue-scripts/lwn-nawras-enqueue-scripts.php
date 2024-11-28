<?php

/*
 *
 * Plugin Name:  LWN Nawras Enqueue Scripts
 *
 */

// test
/* add_action('init', 'test_function_here'); */
/* function test_function_here() */
/* { */
/*   echo plugins_url('public/css/custom-style.css', __FILE__); */
/* } */

add_action('wp_enqueue_scripts', 'lwn_nawras_enqueue_scripts_add_scripts');
function lwn_nawras_enqueue_scripts_add_scripts()
{
  wp_enqueue_style(
    'my-custom-plugin-style',
    plugins_url('public/css/custom-style.css', __FILE__),
    [],
    '1.0.0',
    'all',
  );
  wp_enqueue_script(
    'my-custom-plugin-script',
    plugins_url('public/js/custom-script.js', __FILE__),
    [],
    '1.0.0',
    [
      /* 'strategy'=> 'defer', */
      'in_footer' => false,
    ],
  );
}
