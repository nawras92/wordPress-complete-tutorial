<?php

/*
 * Plugin Name: Lwn Settings Api 3
 * */

if (!defined('ABSPATH')) {
  exit();
}

// Step 1: add Options Menu Page
add_action('admin_menu', 'lwn_sa3_register_menu');
function lwn_sa3_register_menu()
{
  add_options_page(
    __('Settings Api 3', 'text-domain'), // page Title
    __('Settings Api', 'text-domain'), // Menu Title
    'manage_options', // Cap
    'settings-api-3', // page/menu slug
    'lwn_sa3_menu_page_callback', // callback to render page  content
  );
}

// Page Callback
function lwn_sa3_menu_page_callback()
{
  ob_start(); ?>
		 <div class="wrap">
       <h1>my settings api 3</h1>
			<form action="options.php" method="post">
		<?php
  settings_fields('custom_settings_group'); // group options
  do_settings_sections('settings-api-3'); // page slug
  submit_button();
  ?>
    </form>
    </div>
<?php echo ob_get_clean();
}

add_action('admin_init', 'lwn_sa3_register_settings');
function lwn_sa3_register_settings()
{
  // Register setting
  register_setting(
    'custom_settings_group', // Option group name
    'custom_settings', // Option  name
  );
  // section
  add_settings_section(
    'custom_settings_section', // section id
    'Custom Settings Section', // section title
    'lwn_sa3_render_section_cb', // section Render Callback - Description
    'settings-api-3', // page slug
  );

  // settings fields
  //
  add_settings_field(
    'setting_one', // Field Id
    'Setting one', // Field label
    'lwn_sa3_setting_one_cb', // callback
    'settings-api-3', // Page slug
    'custom_settings_section', // section id
  );
  add_settings_field(
    'setting_two', // Field Id
    'Setting two', // Field label
    'lwn_sa3_setting_two_cb', // callback
    'settings-api-3', // Page slug
    'custom_settings_section', // section id
  );
  add_settings_field(
    'setting_three', // Field Id
    'Setting three', // Field label
    'lwn_sa3_setting_three_cb', // callback
    'settings-api-3', // Page slug
    'custom_settings_section', // section id
  );
}

// render section callback
function lwn_sa3_render_section_cb()
{
  echo '<p> Customize your api below: </p>';
}
// Setting one callback
function lwn_sa3_setting_one_cb()
{
  $options = get_option('custom_settings');
  $value = isset($options['setting_one']) ? $options['setting_one'] : '';
  ob_start();
  ?>
	<input type="text" name="custom_settings[setting_one]" value="<?php echo esc_attr(
   $value,
 ); ?>" placeholder="enter setting 1">
<?php echo ob_get_clean();
}
// Setting two callback
function lwn_sa3_setting_two_cb()
{
  $options = get_option('custom_settings');
  $value = isset($options['setting_two']) ? $options['setting_two'] : '';
  ob_start();
  ?>
		 <input type="text" name="custom_settings[setting_two]"
			 value="<?php echo esc_attr($value); ?>" placeholder="enter setting 2">
<?php echo ob_get_clean();
}
// Setting three callback
function lwn_sa3_setting_three_cb()
{
  $options = get_option('custom_settings');
  $value = isset($options['setting_three']) ? $options['setting_three'] : '';
  ob_start();
  ?>
		 <input type="text" name="custom_settings[setting_three]"
			 value="<?php echo esc_attr($value); ?>" placeholder="enter setting 3">
<?php echo ob_get_clean();
}
// Register Settings
// Register section
// register settings fields
