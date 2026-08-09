<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue NeoDark Theme Assets
 */
function neodark_enqueue_assets() {

    // Main stylesheet
    wp_enqueue_style(
        'neodark-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );

    // NOTE: Prism.js syntax-highlighting enqueues were removed here —
    // they pointed at /assets/css/prism*.css and /assets/js/prism*.js,
    // none of which exist in this build, so every page was firing four
    // 404 requests. Code blocks are currently styled by the plain
    // `pre`/`code` rules in style.css. If/when Prism is added back, drop
    // the vendored files into /assets/(css|js)/ and re-add the enqueues
    // here rather than loading from a CDN (no remote resources are
    // allowed in a WordPress.org theme, aside from Google Fonts).

    // Theme Scripts
    // NOTE: NeoDark's homepage hero is a single featured-post spotlight
    // (see front-page.php), not a carousel, so no slider library is
    // needed here. WordPress.org theme review does not allow runtime
    // JS/CSS pulled from an external CDN — keeping the hero dependency-free
    // avoids that entirely instead of vendoring a library just to check a box.
    wp_enqueue_script(
        'neodark-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );

    // Threaded comment reply script — only where it's actually needed.
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'neodark_enqueue_assets' );
