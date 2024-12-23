<?php

/*
 * Plugin Name:  Lwn Filter Content
 *
 * */

add_filter('the_content', 'lwn_filter_content_callback');
function lwn_filter_content_callback($content)
{
  return 'hi from filter ' . $content;
}

add_filter('the_content', 'lwn_filter_content_callback2');
function lwn_filter_content_callback2($content)
{
  return '<div style="background:red; color: white;"> ' . $content . '</div>';
}

add_filter('the_content', 'lwn_filter_content_callback3');
function lwn_filter_content_callback3($content)
{
  $output = '<div>ad</div>';
  $output .= $content;
  return $output;
}
add_filter('the_content', 'lwn_filter_content_callback4');
function lwn_filter_content_callback4($content)
{
  $output = $content;
  $output .= '<div>ad</div>';
  return $output;
}
