<?php

/*
 * Plugin Name: LWN Nawras First Plugin
 * Description: My first plugin
 * Version:  1.0.0
 * Requires at least: 6.7
 * Requires PHP: 8.0
 * Author: Nawras Ali
 * License: GPLv2 or later
 * Text Domain: lwn-nawras
 */

/* admin_notices */

add_action('admin_notices', 'lwn_nawras_my_first_message');
function lwn_nawras_my_first_message()
{
  $output = "<div class='notice notice-success'>";
  $output .= '<p>';
  $output .= __('Welcome to your first plugin', 'lwn-nawras');
  $output .= '</p>';
  $output .= '</div>';
  echo $output;
}

/* my_first_message(); */
