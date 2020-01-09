<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'NoticiasYa' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content empty-page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'NoticiasYa' ); ?></p>

							<?php
							get_search_form();

							the_widget( 'WP_Widget_Recent_Posts' );
							?>

							<div class="widget widget_categories">
								<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'NoticiasYa' ); ?></h2>
								<ul>
									<?php
									wp_list_categories( array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									) );
									?>
								</ul>
							</div><!-- .widget -->


						</div><!-- .page-content -->
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div><!-- #primary -->

			<div class="grid__item small--full large-up--one-quarter">
				<?php get_sidebar_template(); ?>
			<div><!-- #aside -->
		</div>
	</div>


<?php

get_footer_template();
