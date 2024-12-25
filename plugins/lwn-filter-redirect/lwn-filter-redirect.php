<?php

/*
 * Plugin Name: Lwn Filter Redirect
 *
 * */
// Register
function lwn_filter_redirect_register_callback()
{
  return home_url('/thank-you');
}
add_filter('registration_redirect', 'lwn_filter_redirect_register_callback');

// Login
function lwn_filter_redirect_login_callback($redirect_to, $request, $user)
{
  $roles = (array) $user->roles;
  if (in_array('administrator', $roles)) {
    return home_url('/admin');
  } else {
    return home_url();
  }
}
add_filter('login_redirect', 'lwn_filter_redirect_login_callback', 10, 3);
