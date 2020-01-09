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

$prefix_class = 'post-card';
$display_thumb = isset($data->display_thumb) ? $data->display_thumb : true;
$display_byline = isset($data->display_byline) ? $data->display_byline : true;
$display_excerpt = isset($data->display_excerpt) ? $data->display_excerpt : true;
$display_date = isset($data->display_date) ? $data->display_date : true;
$is_loop = isset($data->is_loop) ? $data->is_loop : true;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($prefix_class . ' ' . $prefix_class . '--popular-posts' ); ?>>

	<div class="post-card__grid grid">
		<div class="<?php echo $prefix_class . '__thumb-wrap' ?> entry-header-thumb post__thumbnail-wrap grid__item small--full medium-up--one-third">
			 <?php if( $display_thumb ){ get_post_thumbnail($is_loop = true); }?>
		</div>

		<?php if( $display_excerpt ): ?>
		<div class="entry-content <?php echo $prefix_class . '__body' ?> grid__item small--full medium-up--two-thirds">

			<header class="entry-header <?php echo $prefix_class . '__title' ?>">
				<?php

					the_title( '<h2 class="h6 post-card__heading entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				?>
			</header><!-- .entry-header -->
			<?php
			// the_excerpt();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'NoticiasYa' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
