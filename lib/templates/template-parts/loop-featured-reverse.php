<?php

global $wp_query;


?>


<?php
/**
 * Pass in custom data before calling this template.
 * @example:
 *    $templates = new NoticiasYa_Template_Loader;
 *    $templates->set_template_data($posts, 'data');
 *    $templates->get_template_part( 'template-parts/loop', 'featured');
 */

/* Define Templates */
$templates = new NoticiasYa_Template_Loader;

$display_thumb = '';

$featured = '';
$sub_featured = '';
$rest = '';

while ( $data->have_posts() ) : $data->the_post();
  $is_first = $data->current_post == 0;
  $is_last = $data->current_post == $data->post_count - 1;
  $std_grid_class = 'grid__item small--full large-up--';
  $featured_class = $std_grid_class . 'two-thirds' . ' posts-featured--large';
  $reg_class = $std_grid_class . 'one-third' . ' posts-featured--small';

  /*
   * Include the Post-Type-specific template for the content.
   * If you want to override this in a child theme, then include a file
   * called content-___.php (where ___ is the Post Type name) and that will be used instead.
   */

  $templates->set_template_data(array(
    'display_thumb' => $data->current_post > 4 && $data->current_post < 7 ? false : true,
    'display_by_line' => $data->current_post > 0 ? false : true,
    'display_excerpt' => false,
    'display_date' => false,
    'display_author' => false,
    'display_byline' => $data->current_post > 1 ? false : true,
  ));

  if($data->current_post < 3 ){
    ob_start(); ?>
    <div class="grid__item small--full large-up--one-third">
    <?php
    $templates->get_template_part( 'template-parts/content', get_post_type() );
    ?>
    </div><!--Small Grid Item -->
    <?php
    $first .= ob_get_contents();
    ob_end_clean();
  }

  if($data->current_post === 3 ){
    ob_start();
    $templates->get_template_part( 'template-parts/content', get_post_type() );
    $featured .= ob_get_contents();
    ob_end_clean();
  }

  if($data->current_post > 3 && $data->current_post < 7 ){
    ob_start();
    $templates->get_template_part( 'template-parts/content', get_post_type() );
    $sub_featured .= ob_get_contents();
    ob_end_clean();
  }

  if($data->current_post >= 7 ){
    ob_start(); ?>
    <div class="grid__item small--full large-up--one-third">
    <?php
    $templates->get_template_part( 'template-parts/content', get_post_type() );
    ?>
    </div><!--Small Grid Item -->
    <?php
    $rest .= ob_get_contents();
    ob_end_clean();
  }

endwhile;
?>

<div class="post-list post-grid grid">
  <?php echo $first; ?>
</div>
<div class="posts-featured post-grid grid ">
  <div class="grid__item small--full large-up--two-thirds posts-featured--large">
    <?php echo $featured; ?>
  </div>
  <div class="grid__item small--full large-up--one-third posts-featured--small">
    <?php echo $sub_featured; ?>
  </div>
</div>
<div class="post-list post-grid grid">
  <?php echo $rest; ?>
</div>
