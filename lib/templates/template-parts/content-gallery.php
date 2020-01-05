<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('custom-content-page'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php #get_post_thumbnail(); ?>
		<?php
		$images = get_field('image_gallery');
		if( $images ): ?>
				<div class="slideshow-wrapper">
			    <div id="slider" class="gallery-slider slideshow">
						<?php foreach( $images as $image ): ?>
								<div class="slideshow__slide">

											<div class="slideshow__image" style="background-image: url(<?php echo esc_url($image['url']); ?>)" alt="<?php echo esc_attr($image['alt']); ?>"></div>

										<p><?php echo esc_html($image['caption']); ?></p>
								</div>
						<?php endforeach; ?>
			    </div>
				</div>

		<?php endif; ?>


		<?php
		// the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
			'after'  => '</div>',
		) );
		?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', '_s' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
