<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */


/* Define Templates */
$templates = new NoticiasYa_Template_Loader;

$prefix_class = is_singular() ? 'post-single' : 'post-card';
$display_thumb = isset($data->display_thumb) ? $data->display_thumb : true;
$display_byline = isset($data->display_byline) ? $data->display_byline : true;
$display_excerpt = isset($data->display_excerpt) ? $data->display_excerpt : true;
$display_date = isset($data->display_date) ? $data->display_date : true;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $prefix_class ); ?>>
	<div class="<?php echo $prefix_class . '__tags' ?> entry-tags">
		<?php get_primary_category(); ?>
		<?php get_entry_tags() ?>
	</div>

	<header class="entry-header <?php echo $prefix_class . '__title' ?>">

	</header><!-- .entry-header -->

	<?php if( $display_excerpt ): ?>
	<div class="entry-content <?php echo $prefix_class . '__body' ?>">

		<?php

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'NoticiasYa' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer <?php echo $prefix_class . '__footer' ?>">
		<?php get_entry_footer(); ?>
	</footer><!-- .entry-footer -->


</article><!-- #post-<?php the_ID(); ?> -->
