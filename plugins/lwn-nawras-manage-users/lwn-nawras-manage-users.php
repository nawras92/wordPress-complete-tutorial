<?php

/*
 * Plugin Name: Lwn Nawras Manage Users
 *
 * */
// Delete user here - wp_delete_user
add_action('admin_init', 'lwn_nawras_manage_users_delete_user');
function lwn_nawras_manage_users_delete_user()
{
  /// Delete User id 2
  $user_2 = get_user_by('id', 2);
  if ($user_2 == false) {
    return;
  }
  $is_deleted = wp_delete_user($user_2->ID, 1);
  if ($is_deleted == true) {
    echo 'the user has been deleted';
  } else {
    echo 'something went wrong';
  }

  /* $username = 'newInsertedUser'; */
  /* if (!username_exists($username)) { */
  /*   return; */
  /* } */

  /* $user = get_user_by('login', $username); */
  /* $user_id = $user->ID; */

  /* $is_deleted = wp_delete_user($user_id); */
  /* if ($is_deleted == true) { */
  /*   echo 'the user has been deleted'; */
  /* } else { */
  /*   echo 'something went wrong'; */
  /* } */
}

// Update user here - wp_update_user
/* add_action('init', 'lwn_nawras_manage_users_update_user'); */
/* function lwn_nawras_manage_users_update_user() */
/* { */
/*   $username = 'newInsertedUser'; */
/*   if (!username_exists($username)) { */
/*     return; */
/*   } */

/*   $user = get_user_by('login', $username); */
/*   $user_id = $user->ID; */

/*   $userData = [ */
/*     'ID' => $user_id, */
/*     'user_login' => 'newInsertedUser', */
/*     'user_pass' => '111', */
/*     'user_email' => 'newEmail11@gmail.com', */
/*     'first_name' => 'Sami', */
/*     'last_name' => 'Ola', */
/*   ]; */

/*   $updated_user_id = wp_update_user($userData); */

/*   if (is_wp_error($updated_user_id)) { */
/*     $error_message = $updated_user_id->get_error_message(); */
/*     echo 'There is error: ' . $error_message; */
/*   } else { */
/*     echo 'The user has been updated with id: ' . $updated_user_id; */
/*   } */
/* } */

// insert user here - wp_insert_user
/* add_action('init', 'lwn_nawras_manage_users_add_user'); */
/* function lwn_nawras_manage_users_add_user() */
/* { */
/*   if (username_exists('newInsertedUser')) { */
/*     return; */
/*   } */
/*   $userData = [ */
/*     'user_login' => 'newInsertedUser', */
/*     'user_pass' => '000', */
/*     'user_email' => 'newEmail@gmail.com', */
/*     'first_name' => 'Ahmad', */
/*     'last_name' => 'Ali', */
/*     'role' => 'subscriber', */
/*   ]; */

/*   $user_id = wp_insert_user($userData); */

/*   if (is_wp_error($user_id)) { */
/*     $error_message = $user_id->get_error_message(); */
/*     echo 'There is error: ' . $error_message; */
/*   } else { */
/*     echo 'The user has been created with id: ' . $user_id; */
/*   } */
/* } */

/* add_action('admin_menu', 'lwn_nawras_manage_users_register_menu'); */
/* function lwn_nawras_manage_users_register_menu() */
/* { */
/*   add_menu_page( */
/*     'Lwn Manage Users', */
/*     'Lwn Manage Users', */
/*     'manage_options', */
/*     'lwn-manage-users', */
/*     'lwn_nawras_manage_users_menu_settings_callback', */
/*     'dashicons-cover-image', */
/*     240, */
/*   ); */
/* } */

// page content callback
// Learn more about manage users
// Insert Users
function lwn_nawras_manage_users_menu_settings_callback()
{
  echo 'To Add users: use wp_insert_user()';
  echo '<br>';
}

// page content callback
//  Get users
/* function lwn_nawras_manage_users_menu_settings_callback() */
/* { */
/*   /// Current User */
/*   $current_user = wp_get_current_user(); */

/*   echo 'Current User email is: ' . $current_user->user_email; */
/*   echo '<br>'; */
/*   echo 'Current User username is: ' . $current_user->user_login; */
/*   echo '<br>'; */
/*   echo 'Current User status is: ' . $current_user->user_status; */
/*   echo '<br>'; */
/*   echo 'Current User id is: ' . $current_user->ID; */

/*   echo '<br>'; */
/*   echo '..........................'; */
/*   echo '<br>'; */
/*   $user_id_2 = get_user_by('ID', 2); */
/*   if ($user_id_2) { */
/*     echo 'Get user by id 2: ' . $user_id_2->user_login; */
/*     echo '<br>'; */
/*     echo 'first name: ' . $user_id_2->first_name; */
/*     echo '<br>'; */
/*     echo 'last name: ' . $user_id_2->last_name; */
/*   } else { */
/*     echo ' User Not Found'; */
/*   } */
/*   $user_id_3 = get_user_by('ID', 3); */
/*   if ($user_id_3) { */
/*     echo 'user of id 3 does exist'; */
/*   } else { */
/*     echo '<br>'; */
/*     echo ' User Not Found'; */
/*   } */

/*   // search by login */
/*   $find_test_user = get_user_by('login', 'newaccountTest'); */
/*   if ($find_test_user) { */
/*     echo '<br>'; */
/*     echo 'the found user id is: ' . $find_test_user->ID; */
/*   } else { */
/*     echo '<br>'; */
/*     echo ' Test User Not Found'; */
/*   } */
/* } */
