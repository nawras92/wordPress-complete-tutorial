<?php

// Registers custom block styles.
if (!function_exists('lwn_news_block_styles')):
  function lwn_news_block_styles()
  {
    register_block_style('core/categories', [
      'name' => 'custom-list',
      'label' => __('Custom', 'lwn-news'),
      'inline_style' => '
				ul.is-style-custom-list {
					list-style: none;
          display: flex;
          gap: 14px;
          justify-content:center;
          flex-wrap: wrap;
				}
				ul.is-style-custom-list li a {
          font-weight: bold;
          text-decoration: none;
				}
				ul.is-style-custom-list li a:hover {
           opacity: 0.8;
				}
       ',
    ]);
    register_block_style('core/list', [
      'name' => 'custom-regular-list',
      'label' => __('Custom', 'lwn-news'),
      'inline_style' => '
				ul.is-style-custom-regular-list {
					list-style: none;
          padding-inline-start: 0;
          display: flex;
          flex-direction: column;
          gap: 4px;
				}
				ul.is-style-custom-regular-list li  {
          border-inline-start: 1px solid var(--wp--preset--color--accent-1);
          padding-inline-start:  8px;
				}
       ',
    ]);
    register_block_style('core/heading', [
      'name' => 'custom-heading',
      'label' => __('Custom', 'lwn-news'),
      'inline_style' => '
				.is-style-custom-heading  {
          border-inline-start: 2px solid var(--wp--preset--color--accent-1);
          padding-inline-start:  8px;
				}
				.is-style-custom-heading a {
           text-decoration:none ;
				}
       ',
    ]);
    register_block_style('core/query-pagination', [
      'name' => 'custom-query-pagination',
      'label' => __('Custom', 'lwn-news'),
      'inline_style' => '
				.is-style-custom-query-pagination .wp-block-query-pagination-next,  
				.is-style-custom-query-pagination .wp-block-query-pagination-previous  {
          background: var(--wp--preset--color--accent-1);
          color: white;
          text-decoration: none;
          padding: 4px 10px;
          border-radius: 4px;
          transition: all 300ms ease-in;
				}
				.is-style-custom-query-pagination .wp-block-query-pagination-next:hover,  
				.is-style-custom-query-pagination .wp-block-query-pagination-previous:hover  {
           opacity: 0.8;
				}
				.is-style-custom-query-pagination .page-numbers{
          background: var(--wp--preset--color--contrast);
          color: white;
          padding: 4px;
          border-radius: 2px;
          text-decoration: none;
          transition: all 300ms ease-in;
				}
				.is-style-custom-query-pagination .page-numbers:hover{
           opacity: 0.8;
				}
				.is-style-custom-query-pagination .page-numbers.current{
          background: var(--wp--preset--color--accent-1);
				}
       ',
    ]);
    register_block_style('core/post-terms', [
      'name' => 'custom-pill-term',
      'label' => __('Pill', 'lwn-news'),
      'inline_style' => '
        .is-style-custom-pill-term{
          display: flex;
          gap: 4px;
      }
        .is-style-custom-pill-term a{
          background: var(--wp--preset--color--accent-1);
          color: white;
          padding: 4px;
          border-radius: 2px;
          text-decoration: none;
          transition: all 300ms ease-in;
      }
        .is-style-custom-pill-term a:hover{
           opacity: 0.8;
				}
       ',
    ]);
    /* register_block_style('core/navigation', [ */
    /*   'name' => 'custom-navigation-list', */
    /*   'label' => __('Custom', 'lwn-news'), */
    /*   'inline_style' => ' */
    /* nav.is-style-custom-navigation-list a:hover span { */
    /*       color: var(--wp--preset--color--accent-1); */
    /* } */
    /*    ', */
    /* ]); */
  }
endif;
add_action('init', 'lwn_news_block_styles');
