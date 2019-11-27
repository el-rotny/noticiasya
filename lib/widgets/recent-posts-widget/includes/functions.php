<?php
/**
 * Various functions used by the plugin.
 *
 * @package    Recent_Posts_Widget_Extended
 * @since      0.9.4
 * @author     Satrya
 * @copyright  Copyright (c) 2014, Satrya
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Sets up the default arguments.
 *
 * @since  0.9.4
 */
function rpwe_get_default_args() {

	$css_defaults = "";

	$defaults = array(
		'title'             => esc_attr__( 'Recent Posts', 'rpwe' ),
		'title_url'         => '',

		'limit'            => 6,
		'offset'           => 0,
		'order'            => 'DESC',
		'orderby'          => 'date',
		'cat'              => array(),
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
	);

	// Allow plugins/themes developer to filter the default arguments.
	return apply_filters( 'rpwe_default_args', $defaults );

}

/**
 * Outputs the recent posts.
 *
 * @since  0.9.4
 */
function rpwe_recent_posts( $args = array() ) {
	echo rpwe_get_recent_posts( $args );
}

/**
 * Generates the posts markup.
 *
 * @since  0.9.4
 * @param  array  $args
 * @return string|array The HTML for the random posts.
 */
function rpwe_get_recent_posts( $args = array() ) {

	// Set up a default, empty variable.
	$html = '';

	// Merge the input arguments and the defaults.
	$args = wp_parse_args( $args, rpwe_get_default_args() );

	// Extract the array to allow easy use of variables.
	extract( $args );

	// Allow devs to hook in stuff before the loop.
	echo do_action( 'rpwe_before_loop' );

	// Get the posts query.
	$posts = rpwe_get_posts( $args );


	if ( $posts->have_posts() ) :

		// Recent posts wrapper

		/*
		 * Include the Post-Type-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
		 */
		$html .= load_template_part('template-parts/loop', $args['format'], $posts);

	endif;

	;

	// Restore original Post Data.
	wp_reset_postdata();

	// Allow devs to hook in stuff after the loop.
	echo do_action( 'rpwe_after_loop' );

	// Return the  posts markup.
	return wp_kses_post( $args['before'] ) . apply_filters( 'rpwe_markup', $html ) . wp_kses_post( $args['after'] );

}

/**
 * The posts query.
 *
 * @since  0.0.1
 * @param  array  $args
 * @return array
 */
function rpwe_get_posts( $args = array() ) {

	// Query arguments.
	$query = array(
		'offset'              => $args['offset'],
		'posts_per_page'      => $args['limit'],
		'orderby'             => $args['orderby'],
		'order'               => $args['order'],
		'post_type'           => $args['post_type'],
		'post_status'         => $args['post_status'],
		'ignore_sticky_posts' => $args['ignore_sticky'],
	);

	// Exclude current post
	if ( $args['exclude_current'] ) {
		$query['post__not_in'] = array( get_the_ID() );
	}


	// Limit posts based on category.
	if ( ! empty( $args['cat'] ) ) {
		$query['category__in'] = $args['cat'];
	}

	// Limit posts based on post tag.
	if ( ! empty( $args['tag'] ) ) {
		$query['tag__in'] = $args['tag'];
	}

	/**
	 * Taxonomy query.
	 * Prop Miniloop plugin by Kailey Lampert.
	 */
	if ( ! empty( $args['taxonomy'] ) ) {

		parse_str( $args['taxonomy'], $taxes );

		$operator  = 'IN';
		$tax_query = array();
		foreach( array_keys( $taxes ) as $k => $slug ) {
			$ids = explode( ',', $taxes[$slug] );
			if ( count( $ids ) == 1 && $ids['0'] < 0 ) {
				// If there is only one id given, and it's negative
				// Let's treat it as 'posts not in'
				$ids['0'] = $ids['0'] * -1;
				$operator = 'NOT IN';
			}
			$tax_query[] = array(
				'taxonomy' => $slug,
				'field'    => 'id',
				'terms'    => $ids,
				'operator' => $operator
			);
		}

		$query['tax_query'] = $tax_query;

	}



	// Allow plugins/themes developer to filter the default query.
	$query = apply_filters( 'rpwe_default_query_arguments', $query );

	// Perform the query.
	$posts = new WP_Query( $query );

	// Apply to exclusion list
	apply_filters( 'rpwe_add_to_exluded_posts', $posts->posts );


	return $posts;

}

function load_template_part($template_name, $part_name=null, $data) {
		$templates = new NoticiasYa_Template_Loader;
		$templates->set_template_data($data, 'data');
    ob_start();
    $templates->get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}

/**
 * Custom Styles.
 *
 * @since  0.8
 */
function rpwe_custom_styles() {
	?>
<style>
.rpwe-block ul{list-style:none!important;margin-left:0!important;padding-left:0!important;}.rpwe-block li{border-bottom:1px solid #eee;margin-bottom:10px;padding-bottom:10px;list-style-type: none;}.rpwe-block a{display:inline!important;text-decoration:none;}.rpwe-block h3{background:none!important;clear:none;margin-bottom:0!important;margin-top:0!important;font-weight:400;font-size:12px!important;line-height:1.5em;}.rpwe-thumb{border:1px solid #EEE!important;box-shadow:none!important;margin:2px 10px 2px 0;padding:3px!important;}.rpwe-summary{font-size:12px;}.rpwe-time{color:#bbb;font-size:11px;}.rpwe-comment{color:#bbb;font-size:11px;padding-left:5px;}.rpwe-alignleft{display:inline;float:left;}.rpwe-alignright{display:inline;float:right;}.rpwe-aligncenter{display:block;margin-left: auto;margin-right: auto;}.rpwe-clearfix:before,.rpwe-clearfix:after{content:"";display:table !important;}.rpwe-clearfix:after{clear:both;}.rpwe-clearfix{zoom:1;}
</style>
	<?php
}

/**
 * Exclude displayed posts
 */
function rpwe_exclude_displayed_posts( $args ) {
  global $globally_excluded_posts;
	if(!is_array($globally_excluded_posts)){
		return $args;
	}
  $args['post__not_in'] = !empty( $args['post__not_in'] ) ? array_merge( $args['post__not_in'], $globally_excluded_posts ) : $globally_excluded_posts;
  return $args;
}
add_filter( 'rpwe_default_query_arguments', 'rpwe_exclude_displayed_posts' );

/**
 * Add  posts to exclusion list
 */
function rpwe_add_posts_to_exclusion_list( $posts ) {
  global $globally_excluded_posts;
	$exluded =  is_array($globally_excluded_posts) ? $globally_excluded_posts : array();
	$post_ids = wp_list_pluck( $posts, 'ID' );
	$globally_excluded_posts = array_merge($exluded, $post_ids);
}
add_filter( 'rpwe_add_to_exluded_posts', 'rpwe_add_posts_to_exclusion_list' );
