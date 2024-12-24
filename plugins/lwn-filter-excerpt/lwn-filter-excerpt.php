<?php

/*
 * Plugin name: Lwn  filter Excerpt
 *
 * */

add_filter('excerpt_length', 'lwn_filter_excerpt_callback');
function lwn_filter_excerpt_callback($length)
{
  return 2;
}
