<?php
/*
function register_custom_post_type()
{
    register_post_type('news',
        array(
            'labels' => array(
                'name' => __('News', 'checkmate'),
                'singular_name' => __('News', 'checkmate')
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon' => 'dashicons-media-text',
            'rewrite' => array(
                'slug' => __('nyheder', 'slugs'),
                'with_front' => false
            ),
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'revisions'),
            'taxonomies' => array('category'),
        )
    );
}

add_action('acf/init', 'register_custom_post_type');*/