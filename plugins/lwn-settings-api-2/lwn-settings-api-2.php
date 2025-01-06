<?php

/*
 * Plugin Name: Lwn Settings API 2
 * */

if (!defined('ABSPATH')) {
  exit();
}

// Global Names
$options_group = 'lwn_custom_api_group';
$option_url = 'lwn_custom_api_url';
$option_key = 'lwn_custom_api_key';

// Create Menu
add_action('admin_menu', 'lwn_settings_api_create_menu');
function lwn_settings_api_create_menu()
{
  add_options_page(
    'API Settings',
    'API Settings',
    'manage_options',
    'lwn_settings_api', // Page Slug
    'lwn_settings_api_render_page',
  );
}
// Render page
function lwn_settings_api_render_page()
{
  global $options_group;
  ob_start();
  ?>
		 <div class="wrap">
        <h1>LWN API Settings</h1>
				<form action="options.php" method="post">
						<?php settings_fields($options_group); ?>
						<?php do_settings_sections('lwn_settings_api'); ?>
	           <?php submit_button(); ?>
        </form>

     </div>
<?php echo ob_get_clean();
}

/// Add section
add_action('admin_init', 'lwn_settings_api_add_section');
function lwn_settings_api_add_section()
{
  add_settings_section(
    'lwn-api-settings-section', // Section ID
    'My Custom Section Title', // Title
    'lwn_api_settings_render_in_section', // Callback
    'lwn_settings_api', // Page Slug
  );
}
function lwn_api_settings_render_in_section()
{
  echo 'This is section description written in the section callback';
}

/// Add Setting
add_action('admin_init', 'lwn_settings_api_add_setting');
function lwn_settings_api_add_setting()
{
  global $options_group;
  global $option_key;
  global $option_url;

  register_setting(
    $options_group, // Option Group
    $option_key, //OPtion name
  );
  register_setting(
    $options_group, // Option Group
    $option_url, //OPtion name
  );
}
/// Add Setting Fields
add_action('admin_init', 'lwn_settings_api_add_setting_fields');
function lwn_settings_api_add_setting_fields()
{
  // key field
  add_settings_field(
    'lwn-api-key-field', // Field id
    'API KEY', // Field title
    'lwn_settings_api_render_key_field', //Callback
    'lwn_settings_api', //page slug
    'lwn-api-settings-section', //section id
  );
  // key field
  add_settings_field(
    'lwn-api-url-field', // Field id
    'API URL', // Field title
    'lwn_settings_api_render_url_field', //Callback
    'lwn_settings_api', //page slug
    'lwn-api-settings-section', //section id
  );
}

// render fields
function lwn_settings_api_render_key_field()
{
  global $option_key;
  $api_key = get_option($option_key);
  ob_start();
  ?>
    <input type="text" name="<?php echo $option_key; ?>" value="<?php echo esc_attr(
  $api_key,
); ?>" class="regular-text">

<?php echo ob_get_clean();
}
function lwn_settings_api_render_url_field()
{
  global $option_url;
  $api_url = get_option($option_url);
  ob_start();
  ?>
    <input type="text" name="<?php echo $option_url; ?>" value="<?php echo esc_attr(
  $api_url,
); ?>" class="regular-text">

<?php echo ob_get_clean();
}
