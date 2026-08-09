<?php
/**
 * Breadcrumbs — NeoDark
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function neodark_breadcrumbs() {

    if ( is_front_page() ) {
        return;
    }

    echo '<nav class="nd-breadcrumbs" aria-label="Breadcrumb">';
    echo '<ol class="nd-breadcrumbs-list">';

    echo '<li class="nd-breadcrumb-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'neodark' ) . '</a></li>';

    if ( is_single() ) {

        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $cat = $categories[0];
            echo '<li class="nd-breadcrumb-item"><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></li>';
        }

        echo '<li class="nd-breadcrumb-item nd-breadcrumb-current">' . esc_html( get_the_title() ) . '</li>';

    } elseif ( is_page() ) {

        echo '<li class="nd-breadcrumb-item nd-breadcrumb-current">' . esc_html( get_the_title() ) . '</li>';

    } elseif ( is_category() ) {

        $cat = get_queried_object();
        echo '<li class="nd-breadcrumb-item nd-breadcrumb-current">' . esc_html( $cat->name ) . '</li>';

    } elseif ( is_tag() ) {

        $tag = get_queried_object();
        echo '<li class="nd-breadcrumb-item nd-breadcrumb-current">' . esc_html( $tag->name ) . '</li>';

    } elseif ( is_author() ) {

        echo '<li class="nd-breadcrumb-item nd-breadcrumb-current">' . esc_html( get_the_author() ) . '</li>';

    } elseif ( is_search() ) {

        echo '<li class="nd-breadcrumb-item nd-breadcrumb-current">' . esc_html( sprintf( __( 'Search: %s', 'neodark' ), get_search_query() ) ) . '</li>';

    } elseif ( is_404() ) {

        echo '<li class="nd-breadcrumb-item nd-breadcrumb-current">' . esc_html__( 'Not Found', 'neodark' ) . '</li>';

    } elseif ( is_archive() ) {

        echo '<li class="nd-breadcrumb-item nd-breadcrumb-current">' . esc_html( get_the_archive_title() ) . '</li>';

    }

    echo '</ol>';
    echo '</nav>';
}
