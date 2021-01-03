<?php
define('TPL_DIR_URI', get_template_directory_uri());

# load css
function svh_enqueue_styles(){
	wp_enqueue_style('bootstrap', TPL_DIR_URI . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('material', TPL_DIR_URI . '/assets/css/material-design-iconic-font.min.css');
	wp_enqueue_style('font-awe', TPL_DIR_URI . '/assets/css/font-awesome.min.css');
	wp_enqueue_style('font-star', TPL_DIR_URI . '/assets/css/fontawesome-stars.css');
	wp_enqueue_style('meanmenu', TPL_DIR_URI . '/assets/css/meanmenu.css');
	wp_enqueue_style('carousel', TPL_DIR_URI . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style('slick', TPL_DIR_URI . '/assets/css/slick.css');
	wp_enqueue_style('animate', TPL_DIR_URI . '/assets/css/animate.css');
	wp_enqueue_style('jquery', TPL_DIR_URI . '/assets/css/jquery-ui.min.css');
	wp_enqueue_style('style_theme', TPL_DIR_URI . '/assets/style.css');
	wp_enqueue_style('responsive', TPL_DIR_URI . '/assets/css/responsive.css');
	wp_enqueue_style('style', TPL_DIR_URI . '/style.css');
}
add_action('wp_enqueue_scripts', 'svh_enqueue_styles');

#load js
function svh_enqueue_scripts(){
	wp_enqueue_script('popper', TPL_DIR_URI . '/assets/vendor/popper/popper.min.js', ['jquery']);
	wp_enqueue_script('bootstrap', TPL_DIR_URI . '/assets/vendor/bootstrap/js/bootstrap.min.js', ['jquery']);
	
}
add_action('wp_enqueue_scripts', 'svh_enqueue_scripts');

# khai bao menu
function register_svh_menus() {
    register_nav_menus([
		'main-menu' => __( 'Main Menu' )
    ]);
}
add_action('init', 'register_svh_menus');

function selected_class($classes, $item){
	if(in_array('current-menu-item', $classes)){
		$classes[] = 'selected';
	}
	return $classes;
}
add_filter('nav_menu_css_class','selected_class', 10,2);

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );

# Yêu cầu load file class-wp-bootstrap-navwalker.php
function register_navwalker(){
	require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

# theme woocommerce hỗ trợ theme
add_theme_support('woocommerce');


