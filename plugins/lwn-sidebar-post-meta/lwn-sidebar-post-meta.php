<?php

/*
 * Plugin Name: LWN Sidebar Post Meta
 * */

add_action('add_meta_boxes', 'lwn_spm_add_meta_box');
function lwn_spm_add_meta_box()
{
  add_meta_box(
    'lwn-spm-meta-box', // Meta Box ID
    'LWN SPM BOX', // Title
    'lwn_spm_meta_box_cb', // cb
    'post', // screen: post
    'side', // context: side
    'high', // priority
  );
}

// Render Box
function lwn_spm_meta_box_cb($post)
{
  $meta_value = get_post_meta($post->ID, '_lwn_spm_post_bg', true);
  ob_start();
  ?>
     <label for="lwn_post_bg_color">Post BG</label>
		 <input type="color" id ="lwn_post_bg_color" name="lwn_post_bg_color"
		 value="<?php echo esc_attr($meta_value); ?>">

<?php echo ob_get_clean();
}

// When the post is saved, save the meta
add_action('save_post', 'lwn_spm_save_meta_box_data');
function lwn_spm_save_meta_box_data($post_id)
{
  if (isset($_POST['lwn_post_bg_color'])) {
    $value = sanitize_text_field($_POST['lwn_post_bg_color']);
    update_post_meta($post_id, '_lwn_spm_post_bg', $value);
  }
}
