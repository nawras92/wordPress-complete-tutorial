<?php

/*
 *  Title: Three Columns & Random Image 
 *  Slug:  lwn-news/three-columns-and-random-image
 * */

?>

<!-- wp:group {"metadata":{"name":"Three Column Post \u0026 Random Image"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":"is-style-custom-heading","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} -->
<h2 class="wp-block-heading is-style-custom-heading has-contrast-color has-text-color has-link-color"><a href="#">من المجتمع</a></h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"65%"} -->
<div class="wp-block-column" style="flex-basis:65%"><!-- wp:query {"queryId":9,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"right":"8px","left":"8px","bottom":"8px"}},"border":{"radius":"4px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:4px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"border":{"radius":"4px"}}} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|accent-1"}}}}},"fontSize":"small"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:query {"queryId":6,"query":{"perPage":1,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"metadata":{"name":"Latest 2 Posts Card"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":1}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"8px","right":"8px"}},"border":{"radius":"4px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-color has-base-background-color has-text-color has-background has-link-color" style="border-radius:4px;padding-top:8px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:post-title {"isLink":true,"fontSize":"large"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:cover {"url":"http://localhost:8000/wordpress-complete-tutorial/wp-content/uploads/2025/02/393735-1933248991-1024x640.jpg","id":140,"dimRatio":50,"focalPoint":{"x":0.48,"y":0.56},"style":{"color":{}}} -->
<div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-140" alt="" src="http://localhost:8000/wordpress-complete-tutorial/wp-content/uploads/2025/02/393735-1933248991-1024x640.jpg" style="object-position:48% 56%" data-object-fit="cover" data-object-position="48% 56%"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"base","width":100,"className":"is-style-outline","style":{"border":{"radius":"4px"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link has-base-color has-text-color has-link-color wp-element-button" style="border-radius:4px">اقرأ المزيد</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
