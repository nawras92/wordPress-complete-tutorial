<?php

/*
 * Plugin Name: LWN Settings API 4
 * Text Domain:  lwn-sa4
 * */

if (!defined('ABSPATH')) {
  exit();
}

// add shortcode
add_shortcode('lwn_settings_api', 'lwn_sa4_render_shortcode');
function lwn_sa4_render_shortcode()
{
  $colors = get_option('lwn_colors_option_name');
  $heading_color = isset($colors['heading_color'])
    ? $colors['heading_color']
    : '#ffffff';
  $heading_bg = isset($colors['heading_bg'])
    ? $colors['heading_bg']
    : '#ffffff';

  $style = 'color: ' . $heading_color . ';  background: ' . $heading_bg . ';';

  $output = "<p style='" . $style . "'>";
  $output .= 'Hi world';
  $output .= '</p>';
  return $output;
}

// add menu
add_action('admin_menu', 'lwn_sa4_register_menu');
function lwn_sa4_register_menu()
{
  add_options_page(
    __('Settings API 4', 'lwn-sa4'), // Page Title
    __('Settings API', 'lwn-sa4'), // Menu title
    'manage_options', // Cap
    'settings-api-4', // page slug
    'lwn_sa4_menu_page_cb', // callback
  );
}

// Render callback
function lwn_sa4_menu_page_cb()
{
  ob_start(); ?>
		 <div class="wrap">
		 <h1> <?php _e('Settings API 4', 'lwn-sa4'); ?> </h1>
		 <form action="options.php" method="post">
             <?php settings_fields('lwn_colors_group_settings'); ?>
             <?php do_settings_sections('settings-api-4'); ?>
             <?php submit_button(); ?>
     </form>
     </div>

<?php echo ob_get_clean();
}

// Add sections
add_action('admin_init', 'lwn_sa4_register_colors_section');
function lwn_sa4_register_colors_section()
{
  // register setting- add sanitizer - todo
  register_setting(
    'lwn_colors_group_settings',
    'lwn_colors_option_name',
    'lwn_sa4_sanitize_colors',
  );

  // section
  add_settings_section(
    'lwn_colors_section_id', //section id
    __('LWN Colors', 'lwn-sa4'), // Title
    'lwn_sa4_render_colors_section_cb', // callback for section description
    'settings-api-4', // page slug
  );

  // Setting field- heading color
  add_settings_field(
    'heading_color', // Field Id
    __('Heading Text Color', 'lwn-sa4'), // Field label
    'lwn_sa4_render_heading_color_field', //callback
    'settings-api-4', // Page Slug
    'lwn_colors_section_id', // Section Id
  );
  // Setting field- heading background
  add_settings_field(
    'heading_bg', // Field Id
    __('Heading Background Color', 'lwn-sa4'), // Field label
    'lwn_sa4_render_heading_bg_field', //callback
    'settings-api-4', // Page Slug
    'lwn_colors_section_id', // Section Id
  );
}
function lwn_sa4_render_colors_section_cb()
{
  echo '<p>' . __('Customize your colors smoothly', 'lwn-sa4') . '</p>';
}

// Heading color callback
function lwn_sa4_render_heading_color_field()
{
  $colors = get_option('lwn_colors_option_name');
  $value = isset($colors['heading_color'])
    ? $colors['heading_color']
    : '#000000';
  ob_start();
  ?>
			<input
						type="color"
						name="lwn_colors_option_name[heading_color]"
						value="<?php echo esc_attr($value); ?>"
        >

<?php echo ob_get_clean();
}

// Heading background callback
function lwn_sa4_render_heading_bg_field()
{
  $colors = get_option('lwn_colors_option_name');
  $value = isset($colors['heading_bg']) ? $colors['heading_bg'] : '#ffffff';
  ob_start();
  ?>
			<input
						type="color"
						name="lwn_colors_option_name[heading_bg]"
						value="<?php echo esc_attr($value); ?>"
        >

<?php echo ob_get_clean();
}

// Sanitize colors
function lwn_sa4_sanitize_colors($input)
{
  $clean_data = [];

  if (isset($input['heading_color'])) {
    $clean_data['heading_color'] = sanitize_hex_color($input['heading_color']);
  }
  if (isset($input['heading_bg'])) {
    $clean_data['heading_bg'] = sanitize_hex_color($input['heading_bg']);
  }

  return $clean_data;
}

// Add sections
add_action('admin_init', 'lwn_sa4_register_extra_settings_section');
function lwn_sa4_register_extra_settings_section()
{
  // register setting- add sanitizer - todo
  register_setting(
    'lwn_colors_group_settings', // group name
    'lwn_extra_settings_option_name', // option name
    'lwn_sa4_sanitize_extra_settings',
  );

  // section
  add_settings_section(
    'lwn_extra_settings_section_id', //section id
    __('Extra Options', 'lwn-sa4'), // Title
    'lwn_sa4_render_extra_settings_section_cb', // callback for section description
    'settings-api-4', // page slug
  );

  // Setting field- radio field
  add_settings_field(
    'enable_feature', // Field Id
    __('Enable Feature', 'lwn-sa4'), // Field label
    'lwn_sa4_render_enable_feature_field', //callback
    'settings-api-4', // Page Slug
    'lwn_extra_settings_section_id', // Section Id
  );
  // Setting field- Checkbox
  add_settings_field(
    'show_extra_option', // Field Id
    __('Show Extra Option', 'lwn-sa4'), // Field label
    'lwn_sa4_render_extra_option_field', //callback
    'settings-api-4', // Page Slug
    'lwn_extra_settings_section_id', // Section Id
  );
}
// render callback
function lwn_sa4_render_extra_settings_section_cb()
{
  echo '<p>' . __('Customize Extra options', 'lwn-sa4') . '</p>';
}

// enable feature field
function lwn_sa4_render_enable_feature_field()
{
  $options = get_option('lwn_extra_settings_option_name');
  $value = isset($options['enable_feature'])
    ? $options['enable_feature']
    : 'no';
  ob_start();
  ?>
    <label>
    <input type="radio" name="lwn_extra_settings_option_name[enable_feature]" value="yes" <?php checked(
      $value,
      'yes',
    ); ?>  / >
       <?php echo __('Yes'); ?>
    </label>
    <label>
    <input type="radio" name="lwn_extra_settings_option_name[enable_feature]" value="no" <?php checked(
      $value,
      'no',
    ); ?> / >
       <?php echo __('No'); ?>
    </label>
<?php echo ob_get_clean();
}
// enable feature field
function lwn_sa4_render_extra_option_field()
{
  $options = get_option('lwn_extra_settings_option_name');
  $value = isset($options['show_extra_option'])
    ? $options['show_extra_option']
    : '';
  ob_start();
  ?>
    <label>
    <input type="checkbox" name="lwn_extra_settings_option_name[show_extra_option]" value="1" <?php checked(
      $value,
      '1',
    ); ?>  / >
       <?php echo __('Check this option'); ?>
    </label>
<?php echo ob_get_clean();
}

// sanitize extra options
function lwn_sa4_sanitize_extra_settings($input)
{
  $clean_data = [];
  // sanitize the radio button
  if (isset($input['enable_feature'])) {
    $clean_data['enable_feature'] =
      $input['enable_feature'] === 'yes' ? 'yes' : 'no';
  }
  /* sanitize the checkbox */
  $clean_data['show_extra_option'] = isset($input['show_extra_option'])
    ? '1'
    : '0';

  return $clean_data;
}
