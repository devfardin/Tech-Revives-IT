<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
function tri_view_counter(){
    $countKey = 'post_views_count';
    $count = get_post_meta(get_the_ID(), $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta(get_the_ID(), $countKey);
        add_post_meta(get_the_ID(), $countKey, '0');
    }else{
        $count++;
        update_post_meta(get_the_ID(), $countKey, $count);
    };
   return '';
}
add_shortcode( 'view_counter', 'tri_view_counter' );