<?php

/*
 * Title: Six Column Post
 * Slug:  lwn-news/six-column-post
 * */

?>

<!-- wp:group {"metadata":{"name":"Six Columns Post Layout"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":"is-style-custom-heading","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
<h2 class="wp-block-heading is-style-custom-heading has-contrast-color has-text-color has-link-color"><a href="#">أخبار العالم</a></h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":9,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":6}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"right":"8px","left":"8px","bottom":"8px"}},"border":{"radius":"4px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:4px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","style":{"border":{"radius":"4px"}}} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|accent-1"}}}}},"fontSize":"small"} /-->

<!-- wp:post-date {"style":{"color":{"text":"#110f0f94"},"elements":{"link":{"color":{"text":"#110f0f94"}}}},"fontSize":"extra-small"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
