<?php

/*
 * Plugin Name: Lwn Nawras Manage Roles
 * Author: Nawras Ali
 * Text Domain: lwn-lnmr
 * */

// add menu
add_action('admin_menu', 'lwn_lnmr_register_menus');
function lwn_lnmr_register_menus()
{
  add_menu_page(
    'Roles and Permissions',
    'Roles and Permissions',
    'manage_options',
    'lwn-lnmr-plugin',
    'lwn_lnmr_register_menu_callback',
    'dashicons-admin-users',
    30,
  );
}

// Register menu callback
function lwn_lnmr_register_menu_callback()
{
  $admin_url = admin_url('admin.php');
  $add_role_args = [
    'page' => 'lwn-lnmr-plugin',
    'action' => 'get_role',
  ];
  $add_role_url = add_query_arg($add_role_args, $admin_url);
  $add_cap_args = [
    'page' => 'lwn-lnmr-plugin',
    'action' => 'add_cap',
  ];
  $add_cap_url = add_query_arg($add_cap_args, $admin_url);
  ?>
     <div class="wrap">
       <h1> <?php echo __('Roles & Permissions Plugin', 'lwn-lnmr'); ?></h1>
       <p> <?php echo __('Description of plugin', 'lwn-lnmr'); ?></p>
       <h2> <?php echo __('Actions', 'lwn-lnmr'); ?></h2>
        <ul>
          <li>
          <a href="<?php echo esc_url($add_role_url); ?>">
                  <?php echo __('Get Role Information', 'lwn-lnmr'); ?>
              </a>
          </li>
          <li>
            <a href="<?php echo esc_url($add_cap_url); ?>">
                  <?php echo __('Add cap to teacher', 'lwn-lnmr'); ?>
              </a>
          </li>
        </ul>


       <?php lwn_lnmr_handle_actions(); ?>
 
  
     </div>

<?php
}

/// Function to handle actions
function lwn_lnmr_handle_actions()
{
  if (!isset($_GET['action'])) {
    return;
  }

  switch ($_GET['action']) {
    case 'get_role':
      $role = get_role('teacher');
      if ($role) {
        echo '<h3>Role: Teacher</h3>';
        echo '<pre>' . print_r($role, true) . '</pre>';
      } else {
        echo '<p>Role not found</p>';
      }

      break;
    case 'add_cap':
      $role = get_role('teacher');
      if ($role) {
        $role->add_cap('edit_others_posts');
        echo '<p>Teacher can edit others posts</p>';
        echo '<pre>' . print_r($role, true) . '</pre>';
      } else {
        echo '<p>Role not found</p>';
      }
      break;
    default:
      echo 'Action is Invalid';
  }
}
// Register activation hook
register_activation_hook(__FILE__, 'lwn_lnmr_register_plugin');
function lwn_lnmr_register_plugin()
{
  // Apply the things that I want them to apply upon plugin activation
  add_role('teacher', 'Lwn Teacher', [
    'read' => true,
    'edit_posts' => true,
    'delete_posts' => true,
    'publish_posts' => true,
    'manage_categories' => true,
  ]);
}

// Register deactivation hook
register_deactivation_hook(__FILE__, 'lwn_lnmr_unregister_plugin');
function lwn_lnmr_unregister_plugin()
{
  // Apply the things that I want them to apply upon plugin deactivation
  remove_role('teacher');
}
