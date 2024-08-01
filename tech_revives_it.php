<?php
/**
 * Plugin Name: Tech Revives It
 * Description: This custom theme for Rech Revives IT
 * Plugin URI: https://github.com/devfardin
 * Author: Fardin Ahmed
 * Version: 1.1.0
 * Author URI: https://github.com/devfardin
 * Text Domain: tri
 */
if (!defined('ABSPATH')) {
    die('Please do not access directly!');
} // Exit if accessed directly


// Shortcode register
require_once( __DIR__ . '/includes/shortcodes/post_view_counter.php' );

define ( 'TRI_ASSETS_URI', plugin_dir_url( __FILE__ ) . 'assets' );
define ( 'TRI_VERSION', '1.1.0' );

function cf_elementor_addon( $widgets_manager ) {
	require_once( __DIR__ . '/includes/widgets/site-logo.php' );
	require_once( __DIR__ . '/includes/widgets/posts.php' );
	require_once( __DIR__ . '/includes/widgets/search_box.php' );
	require_once( __DIR__ . '/includes/widgets/most_popular_posts.php' );
	require_once( __DIR__ . '/includes/widgets/all_categories.php' );
	require_once( __DIR__ . '/includes/widgets/all_post_tags.php' );
	require_once( __DIR__ . '/includes/widgets/recent_works.php' );
	require_once( __DIR__ . '/includes/widgets/single_post.php' );
	$widgets_manager->register( new \Elementor_website_logo());
	$widgets_manager->register( new \Elementor_posts());
	$widgets_manager->register( new \Elementor_search_box());
	$widgets_manager->register( new \Elementor_most_popular_post);
	$widgets_manager->register( new \Elementor_all_categories);
	$widgets_manager->register( new \Elementor_our_portfolio);
	$widgets_manager->register( new \Elementor_all_post_tags);
	$widgets_manager->register( new \Elementor_single_post);
}
add_action( 'elementor/widgets/register', 'cf_elementor_addon' );

function searchFilter($query) {
    if ($query->is_search) {
        if ( !isset($query->query_vars['post_type']) ) {
            $query->set('post_type', 'post');
        }
    }
    return $query;
}
add_filter('pre_get_posts','searchFilter');

function our_portfolio_script() {
	wp_register_script( 'our_portfolio_script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), false );
	}
	add_action( 'wp_enqueue_scripts', 'our_portfolio_script' );
function our_portfolio_style() {
	wp_enqueue_style( 'our_portfolio_style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', false );
	}
	add_action( 'wp_enqueue_scripts', 'our_portfolio_style' );