<?php
/**
 * Header — NeoDark
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'neodark' ); ?></a>

<header class="nd-header">
    <div class="nd-container nd-header-inner">

        <div class="nd-header-left">
            <div class="nd-logo">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="nd-header-center">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => 'nav',
                    'container_class'=> 'nd-main-nav',
                    'menu_class'     => 'nd-main-menu',
                    'fallback_cb'    => false,
                )
            );
            ?>
        </div>

        <div class="nd-header-right">
            <button class="nd-search-btn" aria-expanded="false" aria-controls="nd-search-overlay" aria-label="<?php esc_attr_e( 'Open search', 'neodark' ); ?>">
                🔍
            </button>

            <button class="nd-mobile-toggle" aria-expanded="false" aria-controls="nd-mobile-menu" aria-label="<?php esc_attr_e( 'Toggle menu', 'neodark' ); ?>">
                ☰
            </button>
        </div>

    </div>

    <div id="nd-mobile-menu" class="nd-mobile-menu" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Mobile menu', 'neodark' ); ?>" aria-hidden="true">
        <button type="button" class="nd-mobile-menu-close" aria-label="<?php esc_attr_e( 'Close menu', 'neodark' ); ?>">&#10005;</button>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'container'      => 'nav',
                'container_class'=> 'nd-mobile-nav',
                'menu_class'     => 'nd-mobile-menu-list',
                'fallback_cb'    => false,
            )
        );
        ?>
    </div>

    <div id="nd-search-overlay" class="nd-search-overlay" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Search', 'neodark' ); ?>" aria-hidden="true">
        <div class="nd-search-panel">
            <button type="button" class="nd-search-overlay-close" aria-label="<?php esc_attr_e( 'Close search', 'neodark' ); ?>">&#10005;</button>
            <?php get_search_form(); ?>
        </div>
    </div>
</header>
