<?php

function register_custom_post_type()
{
    register_post_type('indsamlinger',
        array(
            'labels' => array(
                'name' => 'Indsamlinger',
                'singular_name' => 'Indsamling',
                'add_new' => 'Tilføj ny',
                'add_new_item' => 'Tilføj ny indsamling',
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-clipboard',
            'rewrite' => array( 'slug' => 'indsamling' ),
            'supports' => array(
                'title',
                'thumbnail',
                'revisions'),
        )
    );
}

add_action('acf/init', 'register_custom_post_type');