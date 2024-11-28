<?php

//init
/* add_action('init', 'quick_func'); */
/* function quick_func() */
/* { */
/*   /1* echo get_template_directory_uri(); *1/ */
/*   echo get_template_directory(); */
/* } */

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
  /* wp_enqueue_style( */
  /*   'home-css', */
  /*   get_template_directory_uri() . '/assets/css/home.css', */
  /*   [], */
  /*   '1.0.0', */
  /*   'all', */
  /* ); */
  /// add scripts
  wp_enqueue_script(
    'myfirsttheme-script',
    get_template_directory_uri() . '/assets/js/script.js',
    [],
    '1.0.0',
    [
      'strategy' => 'defer',
      'in_footer' => true,
    ],
  );
}

// add sth to head
add_action('wp_head', 'myfirsttheme_add_this_to_head');
function myfirsttheme_add_this_to_head()
{
  /* echo "<meta name='author' content='Nawras' />"; */
}

// add sth to footer
add_action('wp_footer', 'myfirsttheme_add_this_to_footer');
function myfirsttheme_add_this_to_footer()
{
  /* echo "<script>console.log('hiiiii')</script>"; */
}
