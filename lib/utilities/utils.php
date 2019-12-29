<?php

/**
 * Get Color value for item
 * @param  obj $item
 * @return string
 */
function get_acf_color($item){
  /* Styles w/ Colors */
  $is_taxon = $item->type == 'taxonomy';
  $current_obj = $is_taxon ? 'category_' . $item->object_id : $item;
  $color = get_field('color', $current_obj);
  return $color ? $color : '';
}
