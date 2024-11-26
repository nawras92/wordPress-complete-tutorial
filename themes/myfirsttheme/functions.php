<?php

// add styles
add_action('wp_enqueue_scripts', 'myfirsttheme_add_stylesheets');
function myfirsttheme_add_stylesheets()
{
  wp_enqueue_style(
    'my-first-theme-main-stylesheet',
    get_stylesheet_uri(),
    [],
    '1.0.0',
    'all',
  );
}

// add sth to head
add_action('wp_head', 'myfirsttheme_add_this_to_head');
function myfirsttheme_add_this_to_head()
{
  echo "<meta name='author' content='Nawras' />";
}

// add sth to footer
add_action('wp_footer', 'myfirsttheme_add_this_to_footer');
function myfirsttheme_add_this_to_footer()
{
  echo "<script>console.log('hiiiii')</script>";
}
