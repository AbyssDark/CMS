<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head(); ?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="header-top-left">
                            <ul class="phone-wrap">
                                <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="header-top-right">
                            <ul class="ht-menu">
                                <li>
                                    <div class="ht-setting-trigger"><span>Setting</span></div>
                                    <div class="setting ht-setting">
                                        <ul class="ht-setting-list">
                                            <li><a href="/nhom2/my-account/">My Account</a></li>
                                            <li><a href="/nhom2/cart/">Checkout</a></li>
                                            <li><a href="nhom2/my-account/">Sign In</a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <span class="language-selector-wrapper">Language :</span>
                                    <div class="ht-language-trigger"><span>English</span></div>
                                    <div class="language ht-language">
                                        <ul class="ht-setting-list">
                                            <li class="active"><a href="#"><img
                                                        src="<?= get_template_directory_uri() ?>/assets/images/menu/flag-icon/1.jpg"
                                                        alt="">English</a></li>
                                            <li><a href="#"><img
                                                        src="<?= get_template_directory_uri() ?>/assets/images/menu/flag-icon/2.jpg"
                                                        alt="">Français</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo pb-sm-30 pb-xs-30">
                            <a href="/nhom2">
                                <img src="<?= get_template_directory_uri() ?>/assets/images/logo.png" alt="" style="width:90%;
                                    height:63px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                        <form action="#" class="hm-searchbox">
                            <form action="<?php bloginfo('url'); ?>/" method="GET" role="form">
                                <div class="form-group">
                                    <?php $args = array(
                                    'show_option_all'    => '',
                                    'show_option_none' 	 => __( '' ),
                                    'option_none_value'  => '',
                                    'orderby'            => 'ID',
                                    'order'              => 'ASC',
                                    'show_count'         => 0,
                                    'hide_empty'         => 0,
                                    'child_of'           => 0,
                                    'include'            => '',
                                    'echo'               => 1,
                                    'selected'           => 0,
                                    'hierarchical'       => 1,
                                    'name'               => 'product_cat',
                                    'id'                 => 'product_cat',
                                    'class'              => 'form-search',
                                    'depth'              => 0,
                                    'tab_index'          => 0,
                                    'taxonomy'           => 'product_cat',
                                    'hide_if_empty'      => false,
                                    'value_field'	     => 'slug',
                                ); ?>
                                    <?php wp_dropdown_categories( $args ); ?>
                                </div>

                                <input type="text" name="s" id="s" class="form-control" placeholder="Từ khóa">

                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </form>
                        </form>
                        <div class="header-middle-right">
                            <div class="hm-menu">
                                <div class="hm-wishlist">
                                    <a href="/nhom2/cart/">
                                        <span class="cart-item-count wishlist-item-count">CART</span>
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                    wp_nav_menu( array(
                        'menu' => 'main-menu',
                        'theme_location'    => 'main-menu',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'header-main',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </header>
   <?php get_template_part('template/slide'); ?>
    <br> <br>
    <style>
    #header-main {
        padding: 10px 0;
        display: flex;
    }

    .nav-link {
        text-transform: uppercase !important;
        height: 53px !important;
        font-size: 15px !important;
        color: #7e7e7e !important;
        padding: 16px 30px !important;
    }

    .nav li .nav-link:hover {
        color: #ffffff !important;
        background-color: rgba(254, 215, 0, .8);
    }

    .form-search {
        display: block;
        width: 150px;
        height: 44px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    </style>