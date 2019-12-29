<?php
if (! function_exists('get_primary_category')) :

function get_primary_category() {
  // SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
  $category = get_the_category();
  $useCatLink = true;
  $html = '';
  // If post has a category assigned.
  if ($category) {
      $category_display = '';
      $category_link = '';
      $html = '';

      if (class_exists('WPSEO_Primary_Term')) {
          // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
          $wpseo_primary_term = new WPSEO_Primary_Term('category', get_the_id());
          $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
          $term = get_term($wpseo_primary_term);
          if (is_wp_error($term)) {
              // Default to first category (not Yoast) if an error is returned
              $obj = $category[0];
          } else {
              $obj = $term;
          }
      } else {
          // Default, display the first category in WP's list of assigned categories
          $obj = $category[0];
      }

      $category_display = $obj->name;
      $category_link = get_category_link($obj->term_id);
      $category_slug = $obj->slug;

      $color = get_acf_color($obj);

      $style_values = '';
			$style_values .= $color ? 'background-color:' . $color : '';
			$style_values = $style_values ? ' style="' . esc_attr( $style_values ) . '"' : '';

      // Display category
      if (!empty($category_display)) {
          if ($useCatLink == true && !empty($category_link)) {
              $html .= '<span class="post-category">';
              $html .= '<a class="badge badge-'.$category_slug.'" '.$style_values.' href="'.$category_link.'">'.htmlspecialchars($category_display).'</a>';
              $html .= '</span>';
          } else {
              $html .= '<span class="badge badge-'.$category_slug.' post-category">'.htmlspecialchars($category_display).'</span>';
          }
      }
  }
  echo $html;
}
endif;
