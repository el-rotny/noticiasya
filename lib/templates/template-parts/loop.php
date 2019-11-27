<?php

// global $wp_query;

/* Define Templates */
$templates = new NoticiasYa_Template_Loader;

while ( have_posts() ) :
  the_post();

  // echo "CURRENT INDEX " . $wp_query->current_post;
  /*
   * Include the Post-Type-specific template for the content.
   * If you want to override this in a child theme, then include a file
   * called content-___.php (where ___ is the Post Type name) and that will be used instead.
   */
  $templates->get_template_part( 'template-parts/content', get_post_type() );

endwhile;
