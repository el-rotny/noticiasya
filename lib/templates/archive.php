<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

global $wp_query;

get_header_template();

/* Define Templates */
$templates = new NoticiasYa_Template_Loader;

?>

	<div class="container">
		<div class="grid grid--double-gutters">
			<div id="primary" class="content-area grid__item small--full large-up--three-quarters">
				<main id="main" class="site-main">

					<?php

					if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->

					<?php

						if ( is_active_sidebar( 'body' ) ) {
							dynamic_sidebar( 'body' );
						}

						/*
						 * Include the loop from temaplates
						 */
						echo "<div class='post-list-container'>";
						$templates->set_template_data($wp_query, 'data');
						$templates->get_template_part( 'template-parts/loop', 'three-columns');

						the_posts_navigation(array(
		            'prev_text'                  => __( 'Entradas Antiguas' ),
		            'next_text'                  => __( 'Entradas Siguientes' ),
		            'in_same_term'               => true,
		            'taxonomy'                   => __( 'post_tag' ),
		            'screen_reader_text' 				 => __( 'Continua Leyendo' ),
		        ));

						echo "</div>";

					else :

						$templates->get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<div class="grid__item small--full large-up--one-quarter">
			<?php get_sidebar_template(); ?>
		<div><!-- #aside -->
	</div>
</div>

<?php

get_footer_template();
