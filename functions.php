<?php
/**
 * @package mindegave
 */

if( ! function_exists('custom_setup') ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function custom_setup()
    {
       
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        require get_template_directory() . '/inc/menus.php';

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }
endif;
add_action('after_setup_theme', 'custom_setup');

/**
* Enqueue scripts and styles.
*/
require get_template_directory() . '/inc/wp-enqueue-scripts.php';

/**
 * Custom post types
 */
require get_template_directory() . '/inc/register-custom-post-type.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Image sizes
 */
require get_template_directory() . '/inc/image-sizes.php';

/**
 * Theme Settings page
 */
require get_template_directory() . '/inc/theme-settings.php';
