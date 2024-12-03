<?php

/*
 * Plugin Name: Lwn Nawras Manage Users
 *
 * */

add_action('admin_menu', 'lwn_nawras_manage_users_register_menu');
function lwn_nawras_manage_users_register_menu()
{
  add_menu_page(
    'Lwn Manage Users',
    'Lwn Manage Users',
    'manage_options',
    'lwn-manage-users',
    'lwn_nawras_manage_users_menu_settings_callback',
    'dashicons-cover-image',
    240,
  );
}

// page content callback
function lwn_nawras_manage_users_menu_settings_callback()
{
  /// Current User
  $current_user = wp_get_current_user();

  echo 'Current User email is: ' . $current_user->user_email;
  echo '<br>';
  echo 'Current User username is: ' . $current_user->user_login;
  echo '<br>';
  echo 'Current User status is: ' . $current_user->user_status;
  echo '<br>';
  echo 'Current User id is: ' . $current_user->ID;

  echo '<br>';
  echo '..........................';
  echo '<br>';
  $user_id_2 = get_user_by('ID', 2);
  if ($user_id_2) {
    echo 'Get user by id 2: ' . $user_id_2->user_login;
    echo '<br>';
    echo 'first name: ' . $user_id_2->first_name;
    echo '<br>';
    echo 'last name: ' . $user_id_2->last_name;
  } else {
    echo ' User Not Found';
  }
  $user_id_3 = get_user_by('ID', 3);
  if ($user_id_3) {
    echo 'user of id 3 does exist';
  } else {
    echo '<br>';
    echo ' User Not Found';
  }

  // search by login
  $find_test_user = get_user_by('login', 'newaccountTest');
  if ($find_test_user) {
    echo '<br>';
    echo 'the found user id is: ' . $find_test_user->ID;
  } else {
    echo '<br>';
    echo ' Test User Not Found';
  }
}
