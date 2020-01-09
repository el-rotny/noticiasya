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
$display_by_line = isset($data->display_by_line) ? $data->display_byline : true;
$display_excerpt = isset($data->display_excerpt) ? $data->display_excerpt : true;
$display_date = isset($data->display_date) ? $data->display_date : true;
$display_author = isset($data->display_author) ? $data->display_author : true;
?>

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

<article id="post-<?php the_ID(); ?>" <?php post_class( $prefix_class .' '. $prefix_class.'--video' ); ?>>
	<div class="<?php echo $prefix_class . '__tags' ?> entry-tags">
		<?php get_primary_category(); ?>
		<?php get_entry_tags() ?>
	</div>

	<?php if ( !is_singular() ) : ?>
		<div class="<?php echo $prefix_class . '__thumb-wrap' ?> entry-header-thumb post__thumbnail-wrap">
		 <?php if( $display_thumb ){ get_post_thumbnail(); }?>
	 </div>
	<?php endif; ?>

	<?php get_content_header($prefix_class); ?>

	<?php get_byline($display_date, $display_by_line, $display_author, $prefix_class); ?>

	<?php if( $display_excerpt ): ?>
	<div class="entry-content <?php echo $prefix_class . '__body' ?>">

		<?php if ( is_singular() ) : ?>
			<div class="<?php echo $prefix_class . '__thumb-wrap' ?> entry-header-thumb">
			 <?php if( $display_thumb ){ get_post_thumbnail(); }?>
		 </div>
		<?php endif; ?>

		<?php
		if ( is_front_page() || is_category() || is_archive() ) {
				the_excerpt();
		} else {
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'NoticiasYa' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		}

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
