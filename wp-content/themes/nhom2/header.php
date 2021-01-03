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
                            <input type="text" onblur="if(this.value=='')this.value='Enter your search key ...'"
                                onfocus="if(this.value=='Enter your search key ...')this.value=''"
                                value="Enter your search key ...">
                            <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <div class="header-middle-right">
                            <div class="hm-menu">
                                <div class="hm-wishlist">
                                    <a href="/nhom2/checkout/">
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
    <div class="slider-with-banner">
        <div class="container">
            <div class="slider-area">
                <div class="slider-active owl-carousel">
                    <div class="single-slide align-center-left  animation-style-01 bg-1">
                        <div class="slider-progress"></div>
                        <div class="slider-content">
                            <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                            <h2>Chamcham Galaxy S9 | S9+</h2>
                            <h3>Starting at <span>$1209.00</span></h3>
                            <div class="default-btn slide-btn">
                                <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide align-center-left animation-style-02 bg-2">
                        <div class="slider-progress"></div>
                        <div class="slider-content">
                            <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                            <h2>Work Desk Surface Studio 2018</h2>
                            <h3>Starting at <span>$824.00</span></h3>
                            <div class="default-btn slide-btn">
                                <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide align-center-left animation-style-01 bg-3">
                        <div class="slider-progress"></div>
                        <div class="slider-content">
                            <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                            <h2>Phantom 4 Pro+ Obsidian</h2>
                            <h3>Starting at <span>$1849.00</span></h3>
                            <div class="default-btn slide-btn">
                                <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
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
    </style>