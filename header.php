<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mindegave
 */ ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
    do_action('theme_body_scripts');
?>
    <div id="page" class="site">
        <header id="masthead" class="site-header">
            <div class="grid-container">
                <div class="grid-x grid-margin-x align-middle">
                    <div class="cell small-8 large-4">
                        <div class="site-branding">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php include(locate_template( 'assets/img/logo.svg' )); ?>
                                <div class="logo-text">
                                    <h1>Mindegave</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="cell small-4 large-8 grid-x align-right">
                        <div class="burger"> 
                            <span></span>
                        </div>
                        <nav id="burger-menu" class="main-navigation">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'menu-1',
                                'menu_id' => 'primary-menu',
                                'menu_class' => 'menu align-left'
                            )); ?>
                        </nav>
                        <div class="burger-menu-overlay">

                        </div>
                        <nav id="site-navigation" class="main-navigation">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'menu-1',
                                'menu_id' => 'primary-menu',
                                'menu_class' => 'menu align-right'
                            )); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header><!-- #masthead -->
        <div id="content" class="site-content">