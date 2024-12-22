<?php

/*
 * Plugin name: Lwn Custom Register
 * Text Domain : lwn-cr
 * */

add_shortcode('lwn_custom_register', 'lwn_custom_register_shorcode_render');
function lwn_custom_register_shorcode_render($atts)
{
  $final_atts = shortcode_atts(
    [
      'redirect' => wp_login_url(),
    ],
    $atts,
    'lwn_custom_register',
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

  $errors = [];
  $success_message = '';
  $wp_error = '';
  if (isset($_POST['custom_register_submit'])) {
    $result = apply_filters('lwn_nawras_custom_register_process', $_POST);
    if (is_wp_error($result)) {
      $wp_error = $result->get_error_message();
    } elseif (isset($result['success_message'])) {
      $success_message = $result['success_message'];
      // redirect
      if (isset($result['redirect_url'])) {
        wp_redirect($result['redirect_url']);
        exit();
      }
    } elseif (!empty($result['errors'])) {
      $errors = $result['errors'];
    }
    /* Start - do-action*/
    /*
    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);
    $confirmPassword = sanitize_text_field($_POST['confirm-password']);
    $email = sanitize_email($_POST['email']);
    $redirect_url = esc_url($_POST['redirect_url']);
    // Check Password:  length / strength
    if ($password !== $confirmPassword) {
      $errors[] = __('Password not match', 'lwn-cr');
    }
    // check username
    if (username_exists($username)) {
      $errors[] = __('Username exists', 'lwn-cr');
    }
    // check email
    if (email_exists($email)) {
      $errors[] = __('email exists', 'lwn-cr');
    }
    if (empty($errors)) {
      $user_id = wp_create_user($username, $password, $email);
      if (is_wp_error($user_id)) {
        $wp_error = $user_id->get_error_message();
      } else {
        $success_message =
          'The user has been created successfully! User Id is:  ' . $user_id;

        /// redirect
        wp_redirect($redirect_url);
        exit();
      }
    }
   */
  }

  ob_start();
  ?>
    <form action="" method="post">
        <?php if (!empty($errors)): ?>
             <?php foreach ($errors as $error): ?>
                 <p class="my-error">
                  <?php echo esc_html($error); ?>
                  </p>
             <?php endforeach; ?>
         <?php endif; ?>
          <?php echo $wp_error; ?>
  <p class="success-message"><?php echo $success_message; ?></p>
			<div>
				<label for="username"> <?php echo __('Username', 'lwn-cr'); ?></label>
        <input type="text" name="username" id="username" required value="<?php echo esc_attr(
          $_POST['username'],
        ); ?>">
      </div>
			<div>
				<label for="email"> <?php echo __('Email', 'lwn-cr'); ?></label>
        <input type="email" name="email" id="email" required value="<?php echo esc_attr(
          $_POST['email'],
        ); ?>">
      </div>
			<div>
				<label for="password"> <?php echo __('Password', 'lwn-cr'); ?></label>
				<input type="password" name="password" id="password" required>
      </div>
			<div>
				<label for="confirm-password"> <?php echo __(
      'Confirm Password',
      'lwn-cr',
    ); ?></label>
				<input type="password" name="confirm-password" id="confirm-password" required>
      </div>

      <input type="hidden" name="redirect_url" value="<?php echo esc_url(
        $final_atts['redirect'],
      ); ?>">

		 <input type="submit" name="custom_register_submit" value="<?php echo __(
     'Register to website',
     'lwn-cr',
   ); ?>">

    </form>


<?php return ob_get_clean();
}

// Process Registration
add_filter(
  'lwn_nawras_custom_register_process',
  'lwn_nawras_custom_register_process_callback',
);
function lwn_nawras_custom_register_process_callback($data)
{
  $errors = [];
  $result = [];
  $username = sanitize_text_field($data['username']);
  $password = sanitize_text_field($data['password']);
  $confirmPassword = sanitize_text_field($data['confirm-password']);
  $email = sanitize_email($data['email']);
  $redirect_url = esc_url($data['redirect_url']);

  // Check Password:  length / strength
  if ($password !== $confirmPassword) {
    $errors[] = __('Password not match', 'lwn-cr');
  }
  // check username
  if (username_exists($username)) {
    $errors[] = __('Username exists', 'lwn-cr');
  }
  // check email
  if (email_exists($email)) {
    $errors[] = __('email exists', 'lwn-cr');
  }
  if (empty($errors)) {
    $user_id = wp_create_user($username, $password, $email);
    if (is_wp_error($user_id)) {
      return $user_id;
    } else {
      $result['success_message'] =
        'The user has been created successfully! User Id is:  ' . $user_id;
      $result['redirect_url'] = $redirect_url;
      return $result;
    }
  } else {
    $result['errors'] = $errors;
    return $result;
  }
}
