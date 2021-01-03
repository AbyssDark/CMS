<?php
if(!function_exists('glw_theme_setup')){
    function glw_theme_setup(){
        // text domain - translate
        $lang_folder = get_theme_file_path( '/languages' );
        load_theme_textdomain( 'glw', $lang_folder );
        // title tag
        add_theme_support( 'title-tag' );
        add_theme_support(
            'html5',
            array('comment-list','comment-form','search-form','gallery','caption')
        );

    }
}
?>