<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package mindegave
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function custom_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    return $classes;
}

add_filter('body_class', 'custom_body_classes');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function custom_pingback_header()
{
    if( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}

add_action('wp_head', 'custom_pingback_header');

//Remove Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//Disallow edit from backend 
define('DISALLOW_FILE_EDIT', true);


// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach($post_types as $post_type) {
        if( post_type_supports($post_type, 'comments') ) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}

add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status()
{
    return false;
}

add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments)
{
    $comments = array();
    return $comments;
}

add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu()
{
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect()
{
    global $pagenow;
    if( $pagenow === 'edit-comments.php' ) {
        wp_redirect(admin_url());
        exit;
    }
}

add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard()
{
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}

add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar()
{
    if( is_admin_bar_showing() ) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}

add_action('init', 'df_disable_comments_admin_bar');

/*Admin*/
function login_logo()
{
    echo $theme_color;
    ?>
    <style type="text/css">
        body.login {
            background: #ffecec;
        }
        body.login div#login h1 a {
            background-image: url(<?php echo get_template_directory_uri() . '/screenshot.png'; ?>);
            background-size: 100%;
            width: 320px;
            height: 240px;
        }

        body.login form {
            background: transparent;
            border: none;
            box-shadow: none;
            padding: 0px;
            color: #333;
        }

        body.login label {
            font-weight: 600;
            font-size: 12px;
        }

        body.login .button-primary {
            background: #ff2d66;
            color: #fff;
            border-color: #ff2d66;
        }

        body.login .button-primary:hover {
            background: #d01e61;
            border-color: #d01e61;
        }

        body.login #nav, body.login #backtoblog {
            padding: 0px;
            color: #333;
        }

        body.login #backtoblog a, body.login #nav a {
            color: #333;
        }

        body.login #backtoblog a:hover, body.login #nav a:hover {
            color: #ff2d66;
        }

        body.login input:focus {
            outline: none;
            box-shadow: none;
            border-color: #333;
        }

        body.login #login_error, body.login .message, body.login .success {
            border-color: #ff2d66;
        }

        body.login input[type=checkbox]:focus {
            box-shadow: none;
        }

        body.login .button.wp-hide-pw .dashicons {
            color: #ff2d66;
        }

        body.login input[type=checkbox]:checked {
            outline: none;
            box-shadow: none;
            border-color: #ff2d66;
        }

        body.login input[type=checkbox]:checked::before {
            content: '';
            background: #ff2d66;
            width: 10px;
            height: 10px;
            /* position: absolute; */
            margin-left: 2px;
            margin-top: 2px;
            border-radius: 3px;
        }
    </style>
    <?php
}

add_action('login_enqueue_scripts', 'login_logo');

add_filter( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url($url) {
    return get_home_url();
}

// Google analytics function
function display_google_analytics()
{
    if( class_exists('acf') ) {
        $google_analytics = get_field('google_analytics_code', 'options');
        echo $google_analytics;
    }
}

function limit_text($x, $length)
{
    if( strlen($x) <= $length ) {
        return $x;
    } else {
        $y = substr($x, 0, $length);
        return $y;
    }
}

function get_theme_address()
{
    if( class_exists('acf') ) {
        $company_info = get_field('company_info', 'options');
        $address = $company_info['addresse'];
        return $address;
    } else {
        return null;
    }
}

function get_theme_company_name()
{
    if( class_exists('acf') ) {
        $company_info = get_field('company_info', 'options');
        $company_name = $company_info['company_name'];
        return $company_name;
    } else {
        return null;
    }
}

function get_theme_postalnumber()
{
    if( class_exists('acf') ) {
        $company_info = get_field('company_info', 'options');
        $postalnumber = $company_info['postalnumber'];
        return $postalnumber;
    } else {
        return null;
    }
}

function get_theme_city()
{
    if( class_exists('acf') ) {
        $company_info = get_field('company_info', 'options');
        $city = $company_info['city'];
        return $city;
    } else {
        return null;
    }
}

function get_theme_company_phone()
{
    if( class_exists('acf') ) {
        $company_info = get_field('company_info', 'options');
        $company_phone = $company_info['company_phone'];
        return $company_phone;
    } else {
        return null;
    }
}

function get_theme_company_email()
{
    if( class_exists('acf') ) {
        $company_info = get_field('company_info', 'options');
        $company_email = $company_info['company_email'];
        return $company_email;
    } else {
        return null;
    }
}

function get_social_media()
{
    if( class_exists('acf') ) {
        if( have_rows('social_media_channels', 'options') ):
            $social_media = array();
            while(have_rows('social_media_channels', 'options')) : the_row();
                $link = get_sub_field('link');
                $icon = get_sub_field('font_awesome_icon');

                $social_media[] = array(
                    'link' => $link,
                    'icon' => $icon);
            endwhile;
            return $social_media;
        endif;
    } else {
        return null;
    }
}

/************************
 * Removing default favicon and adding custom favicon
 ************************/
remove_action('wp_head', 'wp_site_icon', 99);
add_action('wp_head', 'custom_favicon', 99);

function custom_favicon()
{   
    if (file_exists(locate_template('favicon/'))) {
        include(locate_template('inc/favicon.php'));
    }
}

/************************
 * Removing customizing & comments from admin-panel
 ************************/
add_action('admin_bar_menu', 'remove_customize', 999);
function remove_customize($wp_admin_bar)
{
    $wp_admin_bar->remove_menu('customize');
    $wp_admin_bar->remove_menu('comments');
}

/***************************************
 * Styling admin bar
 ***************************************/
add_action('admin_head', 'admin_dashboard_styling', 100);

function admin_dashboard_styling()
{

    if( ! class_exists('acf') ) {
        return;
    }

    $theme_color = get_field('admin_dashboard_bg', 'options');

    if( $theme_color ):
        echo '<style>
    #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
      color: ' . $theme_color . '!important;
    } 
    
    #wpadminbar .quicklinks .menupop ul li .ab-item:hover, #wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus{
    color: ' . $theme_color . '!important;
    }
    
    .wp-core-ui .button-primary{
    background: ' . $theme_color . ' !important;
    border: transparent !important;
    box-shadow: none !important;
    text-shadow: none !important;
    }
    
    #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu{
        background: ' . $theme_color . ' ! important;
    }
    
    #adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before, #collapse-menu *:hover, .wp-submenu *:hover{
        color: ' . $theme_color . ' ! important;
    }
    
    #adminmenu li .wp-menu-name:hover{
        color: ' . $theme_color . ' ! important;   
    }
    </style > ';
    endif;
}


function custom_get_menu_item($name = null)
{
    $menu_name = $name;
    $locations = get_nav_menu_locations();
    $menu_id = $locations[$menu_name];
    $footer_menu = wp_get_nav_menu_object($menu_id);
    return $footer_menu;
}

/* ---------------------------------------------------------------------------
 * ADMIN PAGE: REGISTER CSS & JS FOR VISUALIZATION OF FLEXIBLE CONTENT
 * --------------------------------------------------------------------------- */
//add_action('admin_enqueue_scripts', 'acf_flexible_content_thumbnail');
function acf_flexible_content_thumbnail()
{
    // REGISTER ADMIN.CSS
    wp_enqueue_style('css-theme-admin', get_template_directory_uri() . '/css/admin.css', false, 1.0);

    // REGISTER ADMIN.JS
    wp_register_script('js-theme-admin', get_template_directory_uri() . '/js/admin.js', array('jquery'), 1.0, true);
    wp_localize_script('js-theme-admin', 'theme_var',
        array(
            'upload' => get_template_directory_uri() . '/img/acf/',
        )
    );
    wp_enqueue_script('js-theme-admin');
}

/* ---------------------------------------------------------------------------
 * Remove menus if not user: cmadmin
 * --------------------------------------------------------------------------- */
add_action('admin_menu', 'remove_menu_items', 999);
function remove_menu_items()
{
    //If user is not cmadmin
    if( get_current_user_id() !== 1 ):
        remove_menu_page('edit.php?post_type=acf-field-group');
    endif;
    //remove_menu_page('index.php');
    //remove_submenu_page( 'themes.php', 'widgets.php' );
}

/* ---------------------------------------------------------------------------
 * Set hreflang="x-default" according to Google content guidelines with WPML
 * --------------------------------------------------------------------------- */
add_filter('wpml_alternate_hreflang', 'wps_head_hreflang_xdefault', 10, 2);
function wps_head_hreflang_xdefault($url, $lang_code)
{
    if( $lang_code == apply_filters('wpml_default_language', NULL) ):
        echo '<link rel="alternate" href="' . $url . '" hreflang="x-default" />';
    endif;

    return $url;
}

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{
    return 14;
}

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more($more)
{
    return '...';
}

add_filter('excerpt_more', 'wpdocs_excerpt_more');

/*Open head scriots for Google Tag Manager*/
function theme_head_scripts() {
    if (class_exists('ACF') && get_field('theme_head_scripts', 'options')) {
        the_field('theme_head_scripts', 'options');
    }
}
add_action('wp_head', 'theme_head_scripts', 1);

/*Open body scriots for Google Tag Manager*/
function theme_body_scripts() {
    if (class_exists('ACF') && get_field('theme_body_scripts', 'options')) {
        the_field('theme_body_scripts', 'options');
    }
}

add_action('theme_body_scripts', 'theme_body_scripts');