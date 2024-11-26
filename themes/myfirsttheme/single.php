<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
      <meta charset="UTF-8" /> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<title><?php bloginfo('name'); ?></title>
     <?php wp_head(); ?>
  </head>
	<body>
    <h1>
      <a href="<?php echo home_url(); ?>">
      <?php bloginfo('name'); ?>
      </a>
    </h1>
    <p><?php bloginfo('description'); ?></p>
    
    <main class="container">
      <?php if (have_posts()): ?>
           <?php while (have_posts()):
             the_post(); ?>
                  <div class="post">
                        <h1>
                         <?php the_title(); ?>
                        </h1>
                      <p>
                          <?php the_content(); ?>
                      </p>
                  </div>
            <?php
           endwhile; ?>
       <?php endif; ?>

    </main>
     
  <?php wp_footer(); ?>
</body>
</html>

