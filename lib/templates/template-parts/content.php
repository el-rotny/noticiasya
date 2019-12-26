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

	<?php if ( !is_singular() ) : ?>
		<div class="<?php echo $prefix_class . '__thumb-wrap' ?> entry-header-thumb post__thumbnail-wrap">
		 <?php if( $display_thumb ){ get_post_thumbnail(); }?>
	 </div>
	<?php endif; ?>

	<header class="entry-header <?php echo $prefix_class . '__title' ?>">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="h6 post-single__heading entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="h6 post-card__heading entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() && ($display_date || $display_byline) ) :
			?>
			<div class="entry-meta <?php echo $prefix_class . '__meta' ?>">

				<?php if( $display_date ){ get_posted_on(); }?>
				<?php if( $display_byline ){ get_posted_by(); }?>

			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

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
