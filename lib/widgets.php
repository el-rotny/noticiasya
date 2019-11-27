<?php

require_once __DIR__ . '/widgets/navigation.php';
require_once __DIR__ . '/widgets/category-posts/cat-posts.php';
require_once __DIR__ . '/widgets/recent-posts-widget/rpwe.php';


// Add some text after the header
add_action( '__before_home_content' , 'add_promotional_text' );
function add_promotional_text() {
  // If we're not on the home page, do nothing
  if ( !is_front_page() || !is_home() )
    return;
  // Echo the html

  // if ( is_active_sidebar( 'body' ) ) {
    echo do_shortcode('[rpwe
    limit="1"
    offset=""
    order="DESC"
    orderby="date"
    post_type="post"
    cat="2"
    tag=""
    taxonomy=""
    format="featured"
    post_type="post"
    post_status="publish"
    ignore_sticky="0"
    taxonomy=""
    excerpt="false"
    length="10"
    thumb="true"
    thumb_default="http://placehold.it/45x45/f0f0f0/ccc"
    date="true"
    readmore="false"
    readmore_text="Read More &raquo;"
    styles_default="true"
    cssID=""
    before=""
    after=""
    ]');
  // }
}
