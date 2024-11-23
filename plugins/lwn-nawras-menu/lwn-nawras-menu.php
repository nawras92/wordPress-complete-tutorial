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
