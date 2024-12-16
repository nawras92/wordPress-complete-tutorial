<?php

/*
 * Plugin Name: Lwn Nawras User Meta Users
 * Text Domain: lwn-lnum
 *
 * */

// Display user meta shortcode
add_shortcode('lwn_user_meta', 'lwn_nawras_user_meta_render');
function lwn_nawras_user_meta_render()
{
  // get current user id
  $user_id = get_current_user_id();
  if ($user_id === 0) {
    return __('Please log in', 'lwn-lnum');
  }

  // Process the form
  if (isset($_POST['fav_color'])) {
    $new_color = sanitize_text_field($_POST['fav_color']);
    update_user_meta($user_id, 'lwn_fav_color', $new_color);
  }
  if (isset($_POST['phone_number'])) {
    $new_phone_number = sanitize_text_field($_POST['phone_number']);
    update_user_meta($user_id, 'lwn_phone_number', $new_phone_number);
  }
  if (isset($_POST['tax_number'])) {
    $new_tax_number = sanitize_text_field($_POST['tax_number']);
    update_user_meta($user_id, 'lwn_tax_number', $new_tax_number);
  }
  // Form to change the meta
  $color = get_user_meta($user_id, 'lwn_fav_color', true);
  $phone_number = get_user_meta($user_id, 'lwn_phone_number', true);
  $tax_number = get_user_meta($user_id, 'lwn_tax_number', true);
  ob_start();
  ?>
    <form method="POST">
      <div>
        <label for="fav_color"><?php echo __('Fav Color'); ?></label>
        <input type="color" name="fav_color" id="fav_color" value="<?php echo esc_attr(
          $color,
        ); ?>">
      </div>
      <div>
        <label for="phone_number"><?php echo __('Phone Number'); ?></label>
        <input type="tel" name="phone_number" id="phone_number" value="<?php echo esc_attr(
          $phone_number,
        ); ?>">
      </div>
      <div>
        <label for="tax_number"><?php echo __('Tax File Number'); ?></label>
        <input type="text" name="tax_number" id="tax_number" value="<?php echo esc_attr(
          $tax_number,
        ); ?>">
      </div>
      <input type="submit" value="<?php echo __('Update', 'text-domain'); ?>" />
    </form>

<?php return ob_get_clean();
}

/// Add user meta to the profile
add_action('show_user_profile', 'lwn_nawras_user_meta_in_profile');
add_action('edit_user_profile', 'lwn_nawras_user_meta_in_profile');

function lwn_nawras_user_meta_in_profile($user)
{
  $user_id = $user->ID;
  $color = get_user_meta($user_id, 'lwn_fav_color', true);
  $phone_number = get_user_meta($user_id, 'lwn_phone_number', true);
  $tax_number = get_user_meta($user_id, 'lwn_tax_number', true);
  ?>

  <h3><?php echo __('Extra Profile Information', 'text-domain'); ?></h3>
   <table class="form-table">
     <tr>
     <th><label for="fav_color"><?php echo __(
       'Fav Color',
       'text-domain',
     ); ?></label></th>
       <td>
       <input type="color" name="fav_color" id="fav_color" value="<?php echo esc_attr(
         $color,
       ); ?>">

      </td>
     </tr>
     <tr>
     <th><label for="phone_number"><?php echo __(
       'Phone Number',
       'text-domain',
     ); ?></label></th>
       <td>
       <input type="text" name="phone_number" id="phone_number" value="<?php echo esc_attr(
         $phone_number,
       ); ?>">

      </td>
     </tr>
     <tr>
     <th><label for="tax_number"><?php echo __(
       'Tax Number',
       'text-domain',
     ); ?></label></th>
       <td>
       <input type="text" name="tax_number" id="tax_number" value="<?php echo esc_attr(
         $tax_number,
       ); ?>">

      </td>
     </tr>
   </table>
      
<?php
}

// Save Profile Settings
add_action('personal_options_update', 'lwn_nawras_user_meta_save_profile');
add_action('edit_user_profile_update', 'lwn_nawras_user_meta_save_profile');
function lwn_nawras_user_meta_save_profile($user_id)
{
  if (isset($_POST['fav_color'])) {
    update_user_meta(
      $user_id,
      'lwn_fav_color',
      sanitize_text_field($_POST['fav_color']),
    );
  }
  if (isset($_POST['tax_number'])) {
    update_user_meta(
      $user_id,
      'lwn_tax_number',
      sanitize_text_field($_POST['tax_number']),
    );
  }
  if (isset($_POST['phone_number'])) {
    update_user_meta(
      $user_id,
      'lwn_phone_number',
      sanitize_text_field($_POST['phone_number']),
    );
  }
}
