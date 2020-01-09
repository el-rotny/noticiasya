<?php


$grid_class="post-list post-grid grid";
?>

<div class="<?php echo $grid_class ?>">

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

while ( $data->have_posts() ) : $data->the_post();
  $is_first = $data->current_post == 0;
  $is_last = $data->current_post == $data->post_count - 1;
  $std_grid_class = 'grid__item small--full large-up--';
  $featured_class = $std_grid_class . 'one-third' . ' posts--three-columns';

  ?>


  <div class="<?php echo $featured_class ?>"><!-- Featured Grid Item-->

  <?php
  /*
   * Include the Post-Type-specific template for the content.
   * If you want to override this in a child theme, then include a file
   * called content-___.php (where ___ is the Post Type name) and that will be used instead.
   */

  $templates->set_template_data(array(
    'display_thumb' => true,
    'display_excerpt' => false,
    'display_date' => false,
    'display_byline' => true,
  ));

  $templates->get_template_part( 'template-parts/content', get_post_type() );


  ?>

  </div><!-- /Featured Grid Item-->

<?php
/*
 * Close the grid and start a new one if we are on the 3rd child
 */
if(($data->current_post+1)%3 === 0 && !$is_first && !$is_last): ?>
</div><!--/Grid-->
<div class="<?php echo $grid_class ?>">
<?php endif; ?>

<?php
/*
 * Close the grid if its the last child
 */
if($is_last): ?>
</div><!--/Grid-->
<?php endif; ?>

<?php endwhile; ?>
