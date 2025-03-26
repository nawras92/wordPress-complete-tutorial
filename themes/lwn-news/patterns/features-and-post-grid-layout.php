<?php

/*
 * Title: Featured & Post Grid Layout
 * Slug: lwn-news/featured-and-post-grid-layout
 * */


?>
<!-- wp:group {"metadata":{"name":"Featured and Grid Post"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:query {"queryId":3,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"metadata":{"name":"Latest Featured Post"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"padding":{"right":"8px","left":"8px","bottom":"8px"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|accent-1"}},"color":{"text":"var:preset|color|contrast"}}},"border":{"radius":"4px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background has-link-color" style="border-radius:4px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:post-featured-image /-->

<!-- wp:post-title {"isLink":true} /-->

<!-- wp:post-terms {"term":"category","separator":"","className":"is-style-custom-pill-term","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:query {"queryId":6,"query":{"perPage":2,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"metadata":{"name":"Latest 2 Posts Card"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"8px","right":"8px"}},"border":{"radius":"4px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-color has-base-background-color has-text-color has-background has-link-color" style="border-radius:4px;padding-top:8px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:post-title {"isLink":true,"fontSize":"small"} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"category","className":"is-style-custom-pill-term","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} /-->

<!-- wp:post-date {"style":{"color":{"text":"#0000005e"},"elements":{"link":{"color":{"text":"#0000005e"}}}},"fontSize":"extra-small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:query {"queryId":7,"query":{"perPage":4,"pages":0,"offset":"3","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"metadata":{"name":"Post Grid"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"right":"8px","left":"8px","bottom":"8px"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|accent-1"}},"color":{"text":"var:preset|color|contrast"}}},"border":{"radius":"4px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background has-link-color" style="border-radius:4px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:post-featured-image /-->

<!-- wp:post-terms {"term":"category","separator":"","className":"is-style-custom-pill-term","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"var:preset|color|base"}}}}}} /-->

<!-- wp:post-title {"isLink":true,"fontSize":"regular"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
