<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _s
 */

if ( ! function_exists( 'get_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function get_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
			// $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'DATE_W3C' ) ),
			esc_html( get_the_date('F j, Y g:i a') )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'NoticiasYa' ), $time_string
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;



if ( ! function_exists( 'get_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function get_entry_footer() {

		if ( is_single() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment <span class="screen-reader-text">on %s</span>', 'NoticiasYa' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
endif;


if ( ! function_exists( 'get_entry_cats' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function get_entry_cats() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
      $categories = get_the_category();
      if ($categories) {
          foreach($categories as $tag) {
              echo '<a class="post-cats" href="' . get_category_link($tag->term_id) . '">' . $tag->name . '</a> ';
          }
      }

		}
	}
endif;

if ( ! function_exists( 'get_entry_tags' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function get_entry_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
      $posttags = get_the_tags();
      if ($posttags) {
					$counter = 1;
          foreach($posttags as $tag) {
							if($counter < 2):
	              echo '<a class="post-tags" href="' . get_tag_link($tag->term_id) . '">#' . $tag->name . '</a> ';
							endif;
							$counter++;
          }
      }
		}
	}
endif;


if ( ! function_exists( 'get_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function get_post_thumbnail($is_loop = false) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() && !$is_loop ) :
			?>

			<div class="post-single__image post-thumbnail img-responsive">
				<?php the_post_thumbnail('post-thumbnail img-responsive', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>


		<a class="post-card__image post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php


				// Must be inside a loop.


				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'post-thumbnail img-responsive', array(
						'alt' => the_title_attribute( array(
							'echo' => false,
						) ),
					) );
				}

			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

/**
 * Modifies the tag anchor
 */
add_filter( "term_links-post_tag", 'add_tag_class');
function add_tag_class($links) {
  return str_replace('<a href="', '<a class="badge" href="', $links);
}

/**
 * Modifies the category anchor
 */
add_filter( "term_links-post_category", 'add_cat_class');
function add_cat_class($links) {
  return str_replace('<a href="', '<a class="badge" href="', $links);
}

/**
 * Page Pagination
 */
if (!function_exists('page_pagination')):
  function page_pagination($pages = '', $range = 4, $paged = 1){
  	global $qode_options_proya;
      $showitems = $range+1;
      if($pages == ''){
          global $wp_query;
          $pages = $wp_query->max_num_pages;
          if(!$pages){
              $pages = 1;
          }
      }
      $total    = (int) $pages;
      $current  = (int) $paged;
      $end_size = (int) 1; // Out of bounds?  Make it the default.
      if ( $end_size < 1 ) {
              $end_size = 1;
      }
      $mid_size = (int) $range/2;
      if ( $paged == 1){
              $mid_size = $range;
      }
      if ( $paged == $total){
              $mid_size = $range;
      }
      if ( $mid_size < 0 ) {
              $mid_size = 2;
      }
      if(1 != $pages){
          echo "<div class='pagination'><ul>";
          if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='first'><a itemprop='url' href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left'></i></a></li>";
  		echo "<li class='prev";
  		if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
  			echo " prev_first";
  		}
  		echo "'><a itemprop='url' href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-left'></i></a></li>";
          for ( $i = 1; $i <= $total; $i++ ){
              if (1 != $pages && (  $i <= $end_size || ( $current && $i >= $current - $mid_size && $i <= $current + $mid_size ) )  ){
                  echo ($i == $current)? "<li class='active'><span>".$i."</span></li>":"<li><a itemprop='url' href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
              }
          }
          echo "<li class='next";
  		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
  			echo " next_last";
  		}
  		echo "'><a href=\"";
  		if($pages > $paged){
  			echo get_pagenum_link($paged + 1);
  		} else {
  			echo get_pagenum_link($paged);
  		}
  		echo "\"><i class='fa fa-angle-right'></i></a></li>";
          if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='last'><a itemprop='url' href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right'></i></a></li>";
          echo "</ul></div>\n";
      }
  }
endif;

if ( ! function_exists( 'element_class' ) ) :
function element_class($prefix) {
    global $wp_query;

		$pre = $prefix ? $prefix . '-' : '';

    $classes = array();

    if ( is_front_page() ) {
        $classes[] = $pre . 'home';
    }
    if ( is_home() ) {
        $classes[] = $pre . 'blog';
    }
    if ( is_privacy_policy() ) {
        $classes[] = $pre . 'privacy-policy';
    }
    if ( is_archive() ) {
        $classes[] = $pre . 'archive';
    }
    if ( is_date() ) {
        $classes[] = $pre . 'date';
    }
    if ( is_search() ) {
        $classes[] = $pre . 'search';
        $classes[] = $pre . $wp_query->posts ? 'search-results' : 'search-no-results';
    }
    if ( is_paged() ) {
        $classes[] = $pre . 'paged';
    }
    if ( is_attachment() ) {
        $classes[] = $pre . 'attachment';
    }
    if ( is_404() ) {
        $classes[] = $pre . 'error404';
    }

    if ( is_singular() ) {
        if ( is_single() ) {
          $classes[] = $pre . 'single';
        }

        if ( is_attachment() ) {
            $classes[]   = 'single-attachment';

        } elseif ( is_page() ) {
            $classes[] = $pre . 'page';
        }
    } elseif ( is_archive() ) {
        if ( is_post_type_archive() ) {
            $classes[] = $pre . 'post-archive';
        } elseif ( is_author() ) {
            $classes[] = $pre . 'author';
        } elseif ( is_category() ) {
            $classes[] = $pre . 'category';
        } elseif ( is_tag() ) {
            $classes[] = $pre . 'tag';
        } elseif ( is_tax() ) {
            $term = $wp_query->get_queried_object();
            if ( isset( $term->term_id ) ) {
                $term_class = sanitize_html_class( $term->slug, $term->term_id );
                if ( is_numeric( $term_class ) || ! trim( $term_class, '-' ) ) {
                    $term_class = $term->term_id;
                }
                $classes[] = $pre . 'tax-' . sanitize_html_class( $term->taxonomy );
                $classes[] = $pre . 'term-' . $term_class;
                $classes[] = $pre . 'term-' . $term->term_id;
            }
        }
    }

    $page = $wp_query->get( 'page' );

		if ( ! $page || $page < 2 ) {
				$page = $wp_query->get( 'paged' );
		}

		if ( $page && $page > 1 && ! is_404() ) {
				$classes[] = $pre . 'paged-' . $page;
				if ( is_single() ) {
						$classes[] = $pre . 'single-paged-' . $page;
				} elseif ( is_page() ) {
						$classes[] = $pre . 'page-paged-' . $page;
				} elseif ( is_category() ) {
						$classes[] = $pre . 'category-paged-' . $page;
				} elseif ( is_tag() ) {
						$classes[] = $pre . 'tag-paged-' . $page;
				} elseif ( is_date() ) {
						$classes[] = $pre . 'date-paged-' . $page;
				} elseif ( is_author() ) {
						$classes[] = $pre . 'author-paged-' . $page;
				} elseif ( is_search() ) {
						$classes[] = $pre . 'search-paged-' . $page;
				} elseif ( is_post_type_archive() ) {
						$classes[] = $pre . 'post-type-paged-' . $page;
				}
		}

    $classes = array_map( 'esc_attr', $classes );
		$classes = array_unique( $classes );
		$classes = implode(" ", $classes);
    return $classes;
}
endif;


if ( ! function_exists( 'get_content_header' ) ) :
	/**
	 * Get Content Header
	 */
	function get_content_header($prefix_class) {
		?>
		<header class="entry-header <?php echo $prefix_class . '__title' ?>">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="post-single__heading entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="h6 post-card__heading entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header><!-- .entry-header -->
		<?php
	}
endif;

if ( ! function_exists('get_byline') ) :
	/**
	 * Get meta information for the author
	 */
	function get_byline($display_date, $display_byline, $display_author = true, $prefix_class){

		$is_post = 'post' === get_post_type();
		$display_meta = $display_date || $display_byline || $display_author;

		if ( $display_meta && is_singular() ) :
			?>
			<div class="entry-meta <?php echo $prefix_class . '__meta' ?>">
				<?php
					$prefix = sprintf(
					 /* translators: %s: post date. */
					 esc_html_x( '%s', 'Byline Prefix', 'NoticiasYa' ),
					 "Por"
				 );
				 echo '<span class="'. $prefix_class . '__meta__prefix'.'" >' . $prefix . '</span>';
				?>
				<?php if( $display_byline ){ echo get_posted_by() . ' | '; }?>
				<?php if( $display_author ){ echo get_posted_by_username() . ' | '; } ?>
				<?php if( $display_date ){ get_posted_on(); }?>

			</div><!-- .entry-meta -->
		<?php endif;

		if ( $display_meta && !is_singular() ) :
			?>

			<div class="entry-meta <?php echo $prefix_class . '__meta' ?>">
				<?php if( $display_byline ){ get_posted_by(); } ?>
			</div><!-- .entry-meta -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'get_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function get_posted_by() {
		$author = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'NoticiasYa' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<span class="byline"> ' . $author . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'get_posted_by_username' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */

	function get_posted_by_username() {
		$username = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author username', 'NoticiasYa' ),
			'<span class="author--username"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">@' . esc_html( get_the_author_meta('nicename') ) . '</a></span>'
		);
		echo '<span class="username"> ' . $username . '</span>'; // WPCS: XSS OK.

	}
endif;
