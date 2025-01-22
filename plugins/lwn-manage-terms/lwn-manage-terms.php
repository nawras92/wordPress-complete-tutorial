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

  // get terms
  $terms = get_terms([
    'taxonomy' => $taxonomy,
    'hide_empty' => false,
  ]);

  // Process form
  if (isset($_POST['action'])) {
    switch ($_POST['action']) {
      case 'insert_term':
        lwn_mt_insert_term();
        break;
      case 'update_term':
        lwn_mt_update_term();
        break;
      case 'delete_term':
        lwn_mt_delete_term();
        break;
    }
  }

  ob_start();
  ?>
		<div class="wrap">
        <h1 class="wp-heading-inline">Terms Manager</h1>
         <!-- List terms -->
          <?php if (!empty($terms) && !is_wp_error($terms)): ?>
             <h2>List Terms</h2>
             <ul>
              <?php foreach ($terms as $term): ?>
              <li><?php echo esc_html($term->name) .
                ' (' .
                esc_html($term->term_id) .
                ' - ' .
                esc_html($term->count) .
                ')'; ?>   </li>
              <?php endforeach; ?>
             </ul>
          <?php else: ?>
              <p>No terms found </p>
          <?php endif; ?>
        
         <!-- Insert Term -->
         <h2>Insert New Term</h2>
					<form method="POST">
              <input type="text" name="term_name" required placeholder="enter term name">
               <input type="hidden" name="action" value="insert_term" />
               <input type="submit" value="Insert Term" />
          </form>
         <!-- Update Term -->
         <h2>Update Term</h2>
					<form method="POST">
              <input type="text" name="term_id" required placeholder="enter term id">
              <input type="text" name="new_term_name" required placeholder="enter new term name">
               <input type="hidden" name="action" value="update_term" />
               <input type="submit" value="Update Term" />
          </form>
         <!-- Delete  Term -->
         <h2>Delete Term</h2>
					<form method="POST">
              <input type="text" name="term_id" required placeholder="enter term id">
               <input type="hidden" name="action" value="delete_term" />
               <input type="submit" value="Delete Term" />
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

// Update Handler
function lwn_mt_update_term()
{
  if (isset($_POST['new_term_name']) && isset($_POST['term_id'])) {
    $term_id = intval($_POST['term_id']);
    $new_term_name = sanitize_text_field($_POST['new_term_name']);
    $taxonomy = 'post_tag';

    // Update Term
    $term = wp_update_term($term_id, $taxonomy, ['name' => $new_term_name]);

    if (is_wp_error($term)) {
      echo '<div class="error"><p>Error Updating term: ' .
        $term->get_error_message() .
        '</p></div>';
    } else {
      echo '<div class="updated"><p>Term updated successfully: ' .
        esc_html($new_term_name) .
        '</p></div>';
    }
  }
}
function lwn_mt_delete_term()
{
  if (isset($_POST['term_id'])) {
    $term_id = intval($_POST['term_id']);
    $taxonomy = 'post_tag';

    // Delete Term
    $term = wp_delete_term($term_id, $taxonomy);

    if (is_wp_error($term)) {
      echo '<div class="error"><p>Error deleting term: ' .
        $term->get_error_message() .
        '</p></div>';
    } else {
      echo '<div class="updated"><p>Term deleted successfully: ' .
        intval($term_id) .
        '</p></div>';
    }
  }
}
