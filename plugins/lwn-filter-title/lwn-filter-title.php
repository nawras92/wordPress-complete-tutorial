<?php

/*
 * Plugin Name: Lwn Filter Title
 *  Description: Edits post title
 *  Version: 1.0.0
 *  Author:Nawras Ali
 * */

add_filter('the_title', 'lwn_filter_title_callback');
function lwn_filter_title_callback($title)
{
  return '*****:  ' . $title;
}
add_filter('the_title', 'lwn_filter_title_callback2');
function lwn_filter_title_callback2($title)
{
  return $title . ' *****';
}
