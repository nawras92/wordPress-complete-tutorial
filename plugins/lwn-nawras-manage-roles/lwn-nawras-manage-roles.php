<?php

/*
 * Plugin Name: Lwn Nawras Manage Roles
 * Author: Nawras Ali
 * */

// Register activation hook
register_activation_hook(__FILE__, 'lwn_lnmr_register_plugin');
function lwn_lnmr_register_plugin()
{
  // Apply the things that I want them to apply upon plugin activation
  add_role('teacher', 'Lwn Teacher', [
    'read' => true,
    'edit_posts' => true,
    'delete_posts' => true,
    'publish_posts' => true,
    'manage_categories' => true,
  ]);
}

// Register deactivation hook
register_deactivation_hook(__FILE__, 'lwn_lnmr_unregister_plugin');
function lwn_lnmr_unregister_plugin()
{
  // Apply the things that I want them to apply upon plugin deactivation
  remove_role('teacher');
}
