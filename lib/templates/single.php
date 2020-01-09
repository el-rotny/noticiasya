<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header_template();

/* Define Templates */
$templates = new NoticiasYa_Template_Loader;
?>
	<div class="container">
		<div class="grid ">
			<div id="primary" class="content-area grid__item small--full large-up--three-quarters">
				<main id="main" class="site-main">

				<?php

				while ( have_posts() ) :
					the_post();

					$templates->set_template_data(array(
				    'is_loop' => false
					));
					$templates->get_template_part(
						'template-parts/content',
						get_post_type(),
						get_post_format()
					);

					// the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.


					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;


				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
				<div class="post-single__after-content">
					<?php dynamic_sidebar( 'single-post__after-content' ); ?>
				</div>
			</div><!-- #primary -->

			<div class="grid__item small--full large-up--one-quarter">
				<?php get_sidebar_template(); ?>
			</div><!-- #aside -->
		</div>

		<?php #do_action( 'pageviews' ); ?>
		<div class="post-single__widgets">
			<div class="grid">
				<div class="grid__item small--full large-up--three-quarters">

					<div class="post-single__read-more--left">
						<?php #dynamic_sidebar( 'single-post__read-more-left' ); ?>

						<?php
						$post = $wp_query->post;
						$cats = wp_get_post_categories( $post->ID );

						the_widget('Recent_Posts_Widget_Extended', $instace = array(

							'title'             => esc_attr__( 'Recent Posts', 'rpwe' ),
							'title_url'         => '',

							'limit'            => 6,
							'offset'           => 0,
							'order'            => 'DESC',
							'orderby'          => 'date',
							'cat'              => array($cats[0]),
							'tag'              => array(),
							'taxonomy'         => '',
							'post_type'        => array( 'post' ),
							'format'					 => 'three-columns',
							'post_status'      => 'publish',
							'ignore_sticky'    => 1,
							'exclude_current'  => 1,
							'excerpt'          => false,
							'length'           => 10,
							'date'             => true,
							'date_relative'    => false,
							'date_modified'    => false,
							'readmore'         => false,
							'readmore_text'    => __( 'Read More &raquo;', 'recent-posts-widget-extended' ),
							'comment_count'    => false,
							'styles_default'   => false,
							'before'           => '',
							'after'            => ''
));
						?>
					</div>

				</div>
				<div class="grid__item small--full large-up--one-quarter">

					<?php dynamic_sidebar( 'single-post__read-more--right' ); ?>

					<?php
					the_widget( 'Popular_Post_Widget',
						$instance = array(
							'title' => 'Las Más Leídas',
							'limit' => 5,
						),
						$args = array(
							'before_widget' => '',
							'after_widget' => '',
							'before_title' => '<h4>',
							'after_title' => '</h4>',
							'widget_id' => '',
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>


<?php

get_footer_template();
