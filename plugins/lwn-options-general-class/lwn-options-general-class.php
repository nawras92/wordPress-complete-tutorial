<?php

/*
 * Plugin Name: Lwn Options General Class
 *
 * */

if (!defined('ABSPATH')) {
  exit();
}

class LWN_Options_General_Manager
{
  public function __construct()
  {
    //
    add_action('admin_menu', [$this, 'register_menu']);
  }
  // Add menu
  public function register_menu()
  {
    add_menu_page(
      __('Options Manager', 'text-domain'),
      __('Options Manager', 'text-domain'),
      'manage_options',
      'lwn-options-general',
      [$this, 'general_menu_page_ck'],
      'dashicons-admin-generic',
    );
  }
  // Render Menu Page
  public function general_menu_page_ck()
  {
    if (!current_user_can('manage_options')) {
      return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->process_options_callback();
    }

    $this->render_form_ck();
  }

  private function process_options_callback()
  {
    $nonce_value = sanitize_text_field(
      $_POST['lwn_options_manager_nonce'] ?? '',
    );
    if (!wp_verify_nonce($nonce_value, 'lwn_options_manager_nonce')) {
      wp_die('Invalid nonce provided', 'Error', ['response' => 403]);
    }
    // Check Nonce
    if (
      !check_admin_referer(
        'lwn_options_manager_nonce',
        'lwn_options_manager_nonce',
      )
    ) {
      wp_die('Invalid nonce provided', 'Error', ['response' => 403]);
    }
    // Process Form
    /* $option_name = isset($_POST['lwn_option_name']) */
    /*   ? $_POST['lwn_option_name'] */
    /*   : ''; */
    // Get values
    $option_name = sanitize_text_field($_POST['lwn_option_name'] ?? '');
    $option_value = sanitize_text_field($_POST['lwn_option_value'] ?? '');
    $action = sanitize_text_field($_POST['action'] ?? '');

    // Process Actions
    if ($action === 'add' || $action === 'update') {
      if (empty($option_name) || empty($option_value)) {
        $output = "<div class='error'><p>";
        $output .= __(
          'Option Name and option value are required',
          'text-domain',
        );
        $output .= '</p></div>';
        echo $output;
      } else {
        update_option($option_name, $option_value);
        $output = "<div class='updated'>";
        $output .= __('Option saved successfully', 'text-domain');
        $output .= '</div>';
        echo $output;
      }
    } elseif ($action === 'delete') {
      if (empty($option_name)) {
        $output = "<div class='error'><p>";
        $output .= __('Option Name is required', 'text-domain');
        $output .= '</p></div>';
        echo $output;
      } else {
        delete_option($option_name);
        $output = "<div class='updated'>";
        $output .= __('Option deleted successfully', 'text-domain');
        $output .= '</div>';
        echo $output;
      }
    } else {
      $output = "<div class='error'>";
      $output .= __('Invalid action', 'text-domain');
      $output .= '</div>';
      echo $output;
    }
  }
  private function render_form_ck()
  {
    $option_name = isset($_POST['lwn_option_name'])
      ? $_POST['lwn_option_name']
      : '';
    $option_value = isset($_POST['lwn_option_value'])
      ? $_POST['lwn_option_value']
      : '';
    ?>
			<div class="wrap">
				<h1><?php echo __('Options Manager', 'text-domain'); ?></h1>
				<form method="post">
            <?php wp_nonce_field(
              'lwn_options_manager_nonce',
              'lwn_options_manager_nonce',
            ); ?>
						<table class="form-table">
                <tr>
										<th class="row">
											<label for="lwn_option_name">
												 <?php echo __('Option Name', 'text-domain'); ?>
											</label>
                     </th>
										 <td>
                     <input type="text" value="<?php echo esc_attr(
                       $option_name,
                     ); ?>" id="lwn_option_name" name="lwn_option_name" class="regular-text" >
                     </td>
								</tr>
                <tr>
										<th class="row">
											<label for="lwn_option_value">
												 <?php echo __('Option Value', 'text-domain'); ?>
											</label>
                     </th>
										 <td>
                     <input value="<?php echo esc_attr(
                       $option_value,
                     ); ?>" type="text" id="lwn_option_value" name="lwn_option_value" class="regular-text" >
                     </td>
								</tr>
                <tr>
										<th class="row">Actions</th>
										 <td>
												 <fieldset>
														 <label>
                                  <input type="radio" name="action" value="add" checked>
                                  <?php echo __(
                                    'Add/Update Option',
                                    'text-domain',
                                  ); ?>
                             </label>
                               <br />
														 <label>
                                  <input type="radio" name="action" value="delete">
                                  <?php echo __(
                                    'Delete Option',
                                    'text-domain',
                                  ); ?>
                             </label>
                        </fieldset>
                     </td>
								</tr>

           </table>
                 <?php submit_button(__('Submit Option', 'text-domain')); ?>
        </form>

      </div>
<?php
  }
}

new LWN_Options_General_Manager();
