<?php

/*
 * Plugin Name: Manage Terms
 * Author:  Nawras ALi
 * */

add_action('admin_menu', 'lwn_mt_register_menu');
function lwn_mt_register_menu()
{
  add_menu_page(
    'Terms Manager', // page title
    'Terms Manager', // menu title
    'manage_options', // caps
    'terms-manager', // slug
    'lwn_mt_page_cb', // callback
    'dashicons-admin-site', // icon
    800, // position
  );
}

function lwn_mt_page_cb()
{
  if (!current_user_can('manage_options')) {
    return;
  }

  // Pick a taxonomy: category, post_tag
  $taxonomy = 'post_tag';

  // Process form
  if (isset($_POST['action'])) {
    switch ($_POST['action']) {
      case 'insert_term':
        lwn_mt_insert_term();
        break;
    }
  }

  ob_start();
  ?>
		<div class="wrap">
        <h1 class="wp-heading-inline">Terms Manager</h1>
         <h2>Insert New Term</h2>
					<form method="POST">
              <input type="text" name="term_name" required placeholder="enter term name">
               <input type="hidden" name="action" value="insert_term" />
               <input type="submit" value="Insert Term" />
          </form>

     </div>

<?php echo ob_get_clean();
}

// Insert Term function
function lwn_mt_insert_term()
{
  if (isset($_POST['term_name'])) {
    $term_name = sanitize_text_field($_POST['term_name']);
    $taxonomy = 'post_tag';

    $term = wp_insert_term($term_name, $taxonomy);

    if (is_wp_error($term)) {
      echo '<div class="error"><p>Error inserting term: ' .
        $term->get_error_message() .
        '</p></div>';
    } else {
      echo '<div class="updated"><p>Term inserted successfully: ' .
        esc_html($term_name) .
        '</p></div>';
    }
  }
}
