<?php

/*
 * Plugin Name: Basic Settings API
 *
 * */

// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit();
}

// Add menu
add_action('admin_menu', 'lwn_basic_settings_add_menu');
function lwn_basic_settings_add_menu()
{
  add_options_page(
    'My Plugin Settings', // Page Title
    'My PLugin', // Menu Title
    'manage_options',
    'lwn-my-plugin-api', // Slug
    'lwn_basic_settings_render_option_page', // Render callback
  );
}

// Render page
function lwn_basic_settings_render_option_page()
{
  ob_start(); ?>
     <div class="wrap">
        <h1>My plugin Settings</h1>
				<form action="options.php" method="post">
					 <?php settings_fields('my_plugin_settings'); ?>
					 <?php do_settings_sections('my_plugin_settings'); ?>
					 <?php submit_button(); ?>

				 </form>
     </div>

<?php echo ob_get_clean();
}

// Step 1: Register Settings
add_action('admin_init', 'lwn_basic_settings_register_settings');
function lwn_basic_settings_register_settings()
{
  register_setting('my_plugin_settings', 'my_plugin_option'); // group name, option name
}

// Step 2 add section
add_action('admin_init', 'lwn_basic_settings_add_sections');
function lwn_basic_settings_add_sections()
{
  add_settings_section(
    'lwn_section_configuration', // Section Id
    'Section Configuration', // Section Title
    'lwn_basic_settings_render_section', // Callback
    'my_plugin_settings', // group name
  );
}

// Render Section
function lwn_basic_settings_render_section()
{
  echo 'Configure your plugin here';
}

// step 3: add settings fields
add_action('admin_init', 'lwn_basic_settings_plugin_fields');
function lwn_basic_settings_plugin_fields()
{
  add_settings_field(
    'my-plugin-option-1-field', // field Id
    'Field 1 Label', // field label
    'lwn_basic_settings_render_field_1', // render callback
    'my_plugin_settings', // Group name
    'lwn_section_configuration', // section Id
  );
}

// render field 1
function lwn_basic_settings_render_field_1()
{
  $option = get_option('my_plugin_option');
  echo "<input type='text' name='my_plugin_option' value='" .
    esc_attr($option) .
    "' class='regular-text' />";
}
