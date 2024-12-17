<?php

/*
 * Plugin Name:  Lwn Nawras Custom Login
 * Text Domain:  lwn-cl
 * */

add_shortcode('lwn_custom_login', 'lwn_cl_login_form');
function lwn_cl_login_form($atts)
{
  $final_atts = shortcode_atts(
    [
      'redirect' => home_url(),
    ],
    $atts,
    'lwn_custom_login',
  );
  if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
    $output = 'Hello, ';
    $output .= $current_user->display_name;
    $output .= ' ';
    $output .= "<a href='" . wp_logout_url() . "'>";
    $output .= 'Logout';
    $output .= '</a>';
    return $output;
  }

  $error_message = '';
  if (isset($_POST['custom_login_submit'])) {
    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);
    $redirect_url = esc_url($final_atts['redirect']);

    $creds = [
      'user_login' => $username,
      'user_password' => $password,
      'remember' => true,
    ];

    $user = wp_signon($creds, false);
    if (is_wp_error($user)) {
      $error_message = $user->get_error_message();
    } else {
      wp_redirect($redirect_url);
      exit();
    }
  }

  ob_start();
  ?>
		 <form method="post" action="">
		 <?php echo $error_message; ?>
			<div>
				<label for="username"> <?php echo __('Username', 'lwn-cl'); ?></label>
				<input type="text" name="username" id="username" required>
      </div>
			<div>
				<label for="password"> <?php echo __('Password', 'lwn-cl'); ?></label>
				<input type="password" name="password" id="password" required>
      </div>

		 <input type="submit" name="custom_login_submit" value="<?php echo __(
     'Login to website',
     'lwn-cl',
   ); ?>">
     </form>

<?php return ob_get_clean();
}
