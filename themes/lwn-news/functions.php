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
    register_block_style('core/navigation', [
      'name' => 'custom-navigation-list',
      'label' => __('Custom', 'lwn-news'),
      'inline_style' => '
				nav.is-style-custom-navigation-list a:hover span {
          color: var(--wp--preset--color--accent-1);
				}
       ',
    ]);
  }
endif;
add_action('init', 'lwn_news_block_styles');
