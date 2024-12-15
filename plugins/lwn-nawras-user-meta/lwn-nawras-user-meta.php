<?php

/*
 * Plugin Name: Lwn Nawras User Meta Users
 *
 * */

function lwn_nawras_user_meta_add_meta($user_id)
{
  update_user_meta($user_id, 'new_user_welcomed', 'hii, hello');
}
add_action('user_register', 'lwn_nawras_user_meta_add_meta');

// Display user meta shortcode
add_shortcode('lwn_user_meta', 'lwn_nawras_user_meta_render');
function lwn_nawras_user_meta_render()
{
  // get current user id
  $user_id = get_current_user_id();
  if ($user_id === 0) {
    return 'please log in';
  }

  /// Meta
  $welcome = get_user_meta($user_id, 'new_user_welcomed', true);
  if ($welcome) {
    return $welcome;
  } else {
    return 'No Greetings for you';
  }
}

/* function lwn_nawras_user_meta_init() */
/* { */
/*   $user_id = 1; */
/*   /1* $user_first_name = get_user_meta($user_id, 'first_name', true); *1/ */
/*   /1* update_user_meta($user_id, 'fav_color', 'red'); *1/ */
/*   /1* $fav_color = get_user_meta($user_id, 'fav_color', true); *1/ */
/*   /1* echo $fav_color; *1/ */
/*   $result = update_user_meta($user_id, 'fav_book', 'xyz1'); */
/*   echo $result; */

/*   /1* var_dump($user_first_name); *1/ */
/* } */
/* add_action('init', 'lwn_nawras_user_meta_init'); */
