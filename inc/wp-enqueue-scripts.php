<?php 
function custom_scripts()
{
    // Styles
    wp_enqueue_style('custom-style', get_template_directory_uri().'/dist/assets/css/style.css');

    // theme scripts
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/dist/assets/js/app.js', array('jquery'), '20151215', true);
    wp_enqueue_script('validate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js', array('jquery'), '1.19.2', true);

    wp_localize_script('custom-scripts', 'site_vars', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'home_url' => get_home_url(),
            'theme_url' => get_template_directory_uri(),
            'upload_dir' => wp_upload_dir(),
            'rest_url' => get_rest_url(null, 'wp/v2')
        )
    );

    if( is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'custom_scripts');