<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function neodark_setup() {

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );

    add_editor_style( 'editor-style.css' );

    add_theme_support(
        'custom-logo',
        array(
            'height'      => 60,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'neodark' ),
            'footer'  => __( 'Footer Menu', 'neodark' ),
            'social'  => __( 'Social Menu', 'neodark' ),
        )
    );
}

add_action( 'after_setup_theme', 'neodark_setup' );

/**
 * Footer widget areas.
 */
function neodark_widgets_init() {

    $sidebar_args = array(
        'before_widget' => '<div class="nd-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="nd-widget-title">',
        'after_title'   => '</h3>',
    );

    register_sidebar( array_merge( $sidebar_args, array(
        'name' => __( 'Footer Column 1', 'neodark' ),
        'id'   => 'footer-1',
    ) ) );

    register_sidebar( array_merge( $sidebar_args, array(
        'name' => __( 'Footer Column 2', 'neodark' ),
        'id'   => 'footer-2',
    ) ) );

    register_sidebar( array_merge( $sidebar_args, array(
        'name' => __( 'Footer Column 3', 'neodark' ),
        'id'   => 'footer-3',
    ) ) );
}
add_action( 'widgets_init', 'neodark_widgets_init' );
