<?php

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div id="content" class="grid_9">';
}
 
function my_theme_wrapper_end() {
  echo '</div><!-- #content-->';
}


/* Change number or products per page *****************************************/
add_filter('loop_shop_per_page', create_function('$cols', 'return 12;'));



?>