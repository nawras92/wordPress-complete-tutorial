<?php

/*
 * Plugin Name:  Lwn Options Coupon Transient
 * */

add_shortcode('lwn_generate_coupon', 'lwn_generate_coupon_render_shortcode');
function lwn_generate_coupon_render_shortcode()
{
  // Get the current user ID
  $user_id = get_current_user_id();
  if (!$user_id) {
    return 'Please Log in to get your coupon';
  }
  $transient_key = 'lwn_user_coupon_' . $user_id;

  // Get coupon from db
  $coupon_code = get_transient($transient_key);

  if ($coupon_code === false) {
    $coupon_code = 'lwn' . wp_generate_password(3, false);
    set_transient($transient_key, $coupon_code, 5);
  }

  return 'Your coupon is: ' . $coupon_code;
}
