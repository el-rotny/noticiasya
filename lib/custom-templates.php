<?php

add_filter( 'template_include', 'noticiasya_templates', 99 );
function noticiasya_templates( $template ) {

    if(is_front_page()) {
      return NOTICIASYA_TEMPLATE_DIR . 'index.php';
    }

	  $our_post_types = array( 'event', 'alert' );

	  // Provided Template $template: /Users/you/Sites/your_site/wp-content/themes/your_theme/archive.php
	  $provided_template_array = explode( '/', $template );

	  /* Provided Template Array:
	  *  Array (
	      [0] =>
	      [1] => Users
	      [2] => you
	      [3] => Sites
	      [4] => your_site
	      [5] => wp-content
	      [6] => themes
	      [7] => your_theme
	      [8] => archive.php )
	  **/
	  // This will give us archive.php
	  $template_name = end( $provided_template_array );

	  // Getting the post type slug for folder name
  	$cpt_name = get_post_type();

 	  $plugin_template = NOTICIASYA_TEMPLATE_DIR . $cpt_name . '-' . $template_name;
    $fallback_template = NOTICIASYA_TEMPLATE_DIR . $template_name;

  	if( file_exists( $plugin_template ) ) {
  	  return $plugin_template;
  	}

    if ( file_exists( $fallback_template) ){
      return $fallback_template;
    }

	  return $template;
}
