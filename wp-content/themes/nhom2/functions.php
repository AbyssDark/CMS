<?php
define('TPL_DIR_URI', get_template_directory_uri());
# đưa trình soạn thảo về phiên bản cũ
add_filter('use_block_editor_for_post', '__return_false');
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
# đăng kí sidebar

if (function_exists('register_sidebar')){
    register_sidebar(array(
    'name'=> 'Cột bên',
    'id' => 'sidebar',
));
}


# Yêu cầu load file class-wp-bootstrap-navwalker.php
function register_navwalker(){
	require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

# theme woocommerce hỗ trợ theme
add_theme_support('woocommerce');

// hiện thị số lượng sản phẩm 1 hàng
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns($num) {
        return 4; // 3 products per row
    }
}

// Custom Cart Message
add_filter( 'woocommerce_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message ($message) {
    global $woocommerce;
    // Output success messages
        $custom_message    = sprintf('%s %s', __('Product successfully added to your ', 'woocommerce'), get_permalink(woocommerce_get_page_id('cart')), __('Briefcase', 'woocommerce'));
    global $is_cart_added;
    $is_cart_added = 1;
    return $custom_message;
}
function support(){
# tinh view
	function setpostview($postID){
		$count_key ='views';
		$count = get_post_meta($postID, $count_key, true);
		if($count == ''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		} else {
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	function getpostviews($postID){
		$count_key ='views';
		$count = get_post_meta($postID, $count_key, true);
		if($count == ''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0";
		}
		return $count;
	}
}
add_action( 'init', 'support' );
# sidebar
function custom_slider(){

    $label = array(
        'name' => 'slider', //Tên post type dạng số nhiều
        'singular_name' => 'slider' //Tên post type dạng số ít
    );

    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type đăng sản phẩm', //Mô tả của post type
        'supports' => array(
            'title',
            'thumbnail'
        ), 
        'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-welcome-learn-more', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );
 
    register_post_type('slider', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
 
}
add_action('init', 'custom_slider');