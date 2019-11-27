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

get_header_template();

/* Define Templates */
$templates = new NoticiasYa_Template_Loader;
?>

<?php


/*
 * Loop through Categories and Display Posts within
 */
$post_type = 'post';

// Get all the taxonomies for this post type
$taxonomies = get_object_taxonomies( $post_type );

foreach( $taxonomies as $taxonomy ) :
    // Gets every "category" (term) in this taxonomy to get the respective posts
    $terms = get_terms( array( 'taxonomy' => 'category', 'parent' => 0 ) );

    foreach( $terms as $term ) :
      $args = array(
            'post_type' => $post_type,
						'post_status' => 'publish',
            'posts_per_page' => 3,  //show all posts
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $term->slug,
                )
            )
          );

				// Custom query.
				$query = new WP_Query( $args );

				// Check that we have query results.
				if ( $query->have_posts() ) {
					  echo '<h2>' .$term->name . '</h2>';
				    // Start looping over the query results.
				    while ( $query->have_posts() ) {
				      $query->the_post();
				 			$templates->get_template_part( 'template-parts/content', get_post_type() );
				    }
				}
				// Restore original post data.
				wp_reset_postdata();
    endforeach;
endforeach;
