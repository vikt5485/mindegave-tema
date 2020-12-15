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
            background: #F7F7F6;
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
            background: #204022;
            color: #fff;
            border-color: #204022;
        }

        body.login .button-primary:hover {
            background: #204022;
            border-color: #204022;
        }

        body.login #nav, body.login #backtoblog {
            padding: 0px;
            color: #333;
        }

        body.login #backtoblog a, body.login #nav a {
            color: #333;
        }

        body.login #backtoblog a:hover, body.login #nav a:hover {
            color: #204022;
        }

        body.login input:focus {
            outline: none;
            box-shadow: none;
            border-color: #333;
        }

        body.login #login_error, body.login .message, body.login .success {
            border-color: #204022;
        }

        body.login input[type=checkbox]:focus {
            box-shadow: none;
        }

        body.login .button.wp-hide-pw .dashicons {
            color: #204022;
        }

        body.login input[type=checkbox]:checked {
            outline: none;
            box-shadow: none;
            border-color: #204022;
        }

        body.login input[type=checkbox]:checked::before {
            content: '';
            background: #204022;
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


function limit_text($x, $length)
{
    if( strlen($x) <= $length ) {
        return $x;
    } else {
        $y = substr($x, 0, $length);
        return $y;
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


function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');