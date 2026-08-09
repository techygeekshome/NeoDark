<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function neodark_get_categories() {

    $categories = get_terms(
        array(
            'taxonomy'   => 'category',
            'hide_empty' => false,
        )
    );

    if ( is_wp_error( $categories ) || empty( $categories ) ) {
        return array( '' => '-- Select Category --' );
    }

    $options = array( '' => '-- Select Category --' );

    foreach ( $categories as $category ) {
        $options[ $category->term_id ] = $category->name;
    }

    return $options;
}


/**
 * Curated icon choices for Category Cards. A small fixed set of emoji —
 * no icon font or external library — so the section stays presentational
 * and dependency-free. Shared by the Customizer controls and the
 * category-cards template part.
 */
function neodark_category_card_icon_choices() {
    return array(
        'folder'    => array( '📁', __( 'Folder (default)', 'neodark' ) ),
        'desktop'   => array( '🖥️', __( 'Desktop / Software', 'neodark' ) ),
        'windows'   => array( '🪟', __( 'Windows', 'neodark' ) ),
        'apple'     => array( '🍎', __( 'Apple / Mac', 'neodark' ) ),
        'linux'     => array( '🐧', __( 'Linux', 'neodark' ) ),
        'tools'     => array( '🔧', __( 'Tools / Fixes', 'neodark' ) ),
        'network'   => array( '🌐', __( 'Network / Web', 'neodark' ) ),
        'security'  => array( '🔒', __( 'Security', 'neodark' ) ),
        'cloud'     => array( '☁️', __( 'Cloud / Server', 'neodark' ) ),
        'mobile'    => array( '📱', __( 'Mobile', 'neodark' ) ),
        'gaming'    => array( '🎮', __( 'Gaming', 'neodark' ) ),
        'reviews'   => array( '⭐', __( 'Reviews', 'neodark' ) ),
        'guides'    => array( '📚', __( 'Guides / How-To', 'neodark' ) ),
        'downloads' => array( '💾', __( 'Downloads / Software', 'neodark' ) ),
        'ai'        => array( '🤖', __( 'AI', 'neodark' ) ),
        'deals'     => array( '🛒', __( 'Deals', 'neodark' ) ),
        'news'      => array( '📰', __( 'News', 'neodark' ) ),
        'settings'  => array( '⚙️', __( 'General', 'neodark' ) ),
    );
}

/**
 * Sanitize an icon choice against the curated list above.
 */
function neodark_sanitize_card_icon( $value ) {
    $choices = neodark_category_card_icon_choices();
    return array_key_exists( $value, $choices ) ? $value : 'folder';
}

function neodark_customize_register( $wp_customize ) {

    // Hero Section (homepage)
    $wp_customize->add_section(
        'neodark_hero',
        array(
            'title'    => __( 'NeoDark Hero Section', 'neodark' ),
            'priority' => 29,
        )
    );

    $wp_customize->add_setting(
        'neodark_hero_badge',
        array(
            'default'           => 'Tech Made Simple',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'neodark_hero_badge',
        array(
            'label'   => __( 'Badge Text', 'neodark' ),
            'section' => 'neodark_hero',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'neodark_hero_heading',
        array(
            'default'           => 'Modern guides, reviews & tutorials',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'neodark_hero_heading',
        array(
            'label'   => __( 'Heading', 'neodark' ),
            'section' => 'neodark_hero',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'neodark_hero_description',
        array(
            'default'           => 'Practical, clear and reliable tech help for IT pros, enthusiasts and everyday users.',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'neodark_hero_description',
        array(
            'label'   => __( 'Description', 'neodark' ),
            'section' => 'neodark_hero',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'neodark_hero_cta_text',
        array(
            'default'           => 'Explore Guides',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'neodark_hero_cta_text',
        array(
            'label'   => __( 'Primary Button Text', 'neodark' ),
            'section' => 'neodark_hero',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'neodark_hero_cta_link',
        array(
            'default'           => home_url( '/guides' ),
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'neodark_hero_cta_link',
        array(
            'label'   => __( 'Primary Button Link', 'neodark' ),
            'section' => 'neodark_hero',
            'type'    => 'url',
        )
    );

    $wp_customize->add_section(
        'neodark_homepage',
        array(
            'title'    => 'NeoDark Homepage',
            'priority' => 30,
        )
    );

    // "Browse by Category" cards — up to 6, each with its own icon.
    $wp_customize->add_section(
        'neodark_category_cards',
        array(
            'title'       => __( 'NeoDark Category Cards', 'neodark' ),
            'priority'    => 31,
            'description' => __( 'Choose up to 6 categories to feature as cards in the "Browse by Category" section on the homepage, and pick an icon for each. Leave a slot on "-- Select Category --" to hide it. If none are set, the 6 categories with the most posts are shown automatically with a generic icon.', 'neodark' ),
        )
    );

    $icon_select_choices = array();
    foreach ( neodark_category_card_icon_choices() as $key => $data ) {
        $icon_select_choices[ $key ] = $data[0] . ' ' . $data[1];
    }

    for ( $i = 1; $i <= 6; $i++ ) {

        $wp_customize->add_setting(
            'nd_card_category_' . $i,
            array(
                'default'           => '',
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'nd_card_category_' . $i,
            array(
                /* translators: %d: card position, 1-6 */
                'label'   => sprintf( __( 'Card %d — Category', 'neodark' ), $i ),
                'section' => 'neodark_category_cards',
                'type'    => 'select',
                'choices' => neodark_get_categories(),
            )
        );

        $wp_customize->add_setting(
            'nd_card_icon_' . $i,
            array(
                'default'           => 'folder',
                'sanitize_callback' => 'neodark_sanitize_card_icon',
            )
        );

        $wp_customize->add_control(
            'nd_card_icon_' . $i,
            array(
                /* translators: %d: card position, 1-6 */
                'label'   => sprintf( __( 'Card %d — Icon', 'neodark' ), $i ),
                'section' => 'neodark_category_cards',
                'type'    => 'select',
                'choices' => $icon_select_choices,
            )
        );
    }

    // 6 homepage category sections
    for ( $i = 1; $i <= 6; $i++ ) {

        $wp_customize->add_setting(
            'nd_category_' . $i,
            array(
                'default'           => '',
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'nd_category_' . $i,
            array(
                'label'   => 'Homepage Category ' . $i,
                'section' => 'neodark_homepage',
                'type'    => 'select',
                'choices' => neodark_get_categories(),
            )
        );
    }

    // Related posts layout
    $wp_customize->add_setting(
        'nd_related_posts_layout',
        array(
            'default'           => 'grid',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'nd_related_posts_layout',
        array(
            'label'   => 'Related Posts Layout',
            'section' => 'neodark_homepage',
            'type'    => 'select',
            'choices' => array(
                'grid' => '3 Column Grid',
                'list' => 'Vertical List',
            ),
        )
    );
}

add_action( 'customize_register', 'neodark_customize_register' );