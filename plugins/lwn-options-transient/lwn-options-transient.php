<?php

/*
 * Plugin Name: Lwn Options Transient
 * */

add_shortcode('lwn-simple-transient', 'lwn_simple_transient_render_shortcode');
function lwn_simple_transient_render_shortcode()
{
  $cached_message = get_transient('lwn_cached_message');
  /* delete_transient('_transient_lwn_cached_message'); */
  if ($cached_message === false) {
    $value = 'This is cached data';
    set_transient('lwn_cached_message', $value, 3600); // Delete after 1 hour
  }

  return $cached_message;
}
