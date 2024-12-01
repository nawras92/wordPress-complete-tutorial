<?php

/*
 * Plugin Name: Lwn Nawras Admin Menu
 * */

add_action('admin_menu', 'lwn_nawras_menu_register_menu');
function lwn_nawras_menu_register_menu()
{
  add_menu_page(
    'My First Admin Page Settings ',
    'first menu',
    'manage_options',
    'simple-plugin',
    'lwn_nawras_menu_settings_callback',
    'dashicons-cover-image',
    240,
  );
}

// page content callback
function lwn_nawras_menu_settings_callback()
{
  echo 'first page';
}

// enqueue admin scripts
add_action('admin_enqueue_scripts', 'lwn_nawras_menu_enqueue_admin_scripts');
function lwn_nawras_menu_enqueue_admin_scripts($hook)
{
  if ($hook == 'toplevel_page_simple-plugin') {
    wp_enqueue_style(
      'menu-plugin-style',
      plugins_url('admin/assets/css/admin.css', __FILE__),
      [],
      '1.0.0',
      'all',
    );

    wp_enqueue_script(
      'menu-plugin-script',
      plugins_url('admin/assets/js/admin-script.js', __FILE__),
      [],
      '1.0.0',
      [
        'in_footer' => true,
      ],
    );
  }
}
