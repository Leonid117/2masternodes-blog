<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage
 * @since  Theme 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<header id="main-header">
    <div class="container">

        <nav class="navbar navbar-expand-lg">
            <div class="logo">
                <a class="navbar-brand" href="#">
                    <span class="text-blue">2</span><span class="text-orange">Master</span>Nodes<span class="text-gray-2">.com</span>
                </a>
            </div>

                        <button class="navbar-toggler hamburger hamburger--squeeze collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            						<span class="hamburger-box">
            							<span class="hamburger-inner"></span>
            						</span>
                        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-lg-center">
                    <li class="nav-item">
                        <form class="form-inline my-lg-0 search-form" method="get" name="searchform" id="searchform" action="<?php bloginfo('siteurl')?>">
                            <input placeholder="Wallet address" type="text" class="form-control mr-sm-2" name="s" id="s" value="<?php echo wp_specialchars($s, 1); ?>"/>
                            <button id="btnSearch" type="submit" name="submit"><span class="icon-search"></span></button>
                        </form>
                    </li>
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <nav id="site-navigation" class="main-navigation " role="navigation">
                            <?php
                            // Primary navigation menu.
                            wp_nav_menu( array(
                                'menu_class'     => 'nav-menu nav-link',
                                'theme_location' => 'primary',
                            ) );
                            ?>
                        </nav><!-- .main-navigation -->
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

    </div><!-- contrainer -->
</header>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site container">

	<div id="content" class="site-content">
