<?php

/*
 * Plugin name: Lwn Options Footer Text
 * */

// Display Footer Text
add_action('wp_footer', 'lwn_options_footer_text_display_cbk');
function lwn_options_footer_text_display_cbk()
{
  $message = get_option('lwn_custom_footer_text', '');
  if (!empty($message)) {
    echo '<p>' . esc_html($message) . '</p>';
  }
}
add_action('admin_menu', 'lwn_options_footer_text_menu_cbk');
function lwn_options_footer_text_menu_cbk()
{
  add_menu_page(
    'Footer Text',
    'Lwn Footer Text',
    'manage_options',
    'lwn-footer-text',
    'lwn_options_footer_text_menu_page_cbk',
  );
}

// menu page callback
function lwn_options_footer_text_menu_page_cbk()
{
  $post_text = get_option('lwn_custom_footer_text', '');
  if (isset($_POST['lwn-footer-text-submit'])) {
    // Save this to db
    $text = $_POST['lwn-footer-text'];
    update_option('lwn_custom_footer_text', sanitize_text_field($text));
    $post_text = $_POST['lwn-footer-text'];
  }
  ?>

		 <div class="wrap">
       <h1>Customized Footer Text</h1>
			 <form action="" method="post">
          <label for="lwn-footer-text">Custom Footer Text:</label>
					<input type="text" id="lwn-footer-text" name="lwn-footer-text"
                  value="<?php echo esc_attr($post_text); ?>" >
          <input type="submit" name="lwn-footer-text-submit" value="Add Text" class="button-primary">

       </form>

     </div>

<?php
}
