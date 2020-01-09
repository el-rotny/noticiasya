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

					// Popular Posts counter
					wpb_set_post_views(get_the_ID());

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
					some content
				</div>
				<div class="grid__item small--full large-up--one-quarter">
					<?php
					the_widget( 'Pageviews_Widget',
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
