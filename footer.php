<?php
/**
 * Footer — NeoDark
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<footer class="nd-footer">
    <div class="nd-container nd-footer-widgets">

        <div class="nd-footer-column">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <?php dynamic_sidebar( 'footer-1' ); ?>
            <?php endif; ?>
        </div>

        <div class="nd-footer-column">
            <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <?php dynamic_sidebar( 'footer-2' ); ?>
            <?php endif; ?>
        </div>

        <div class="nd-footer-column">
            <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <?php dynamic_sidebar( 'footer-3' ); ?>
            <?php endif; ?>
        </div>

    </div>

    <div class="nd-container nd-footer-bottom">

        <nav class="nd-footer-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'nd-footer-menu',
                'fallback_cb'    => false,
            ]);
            ?>
        </nav>

        <?php neodark_social_links( 'nd-footer-social', 'nd-footer-social-link' ); ?>

        <div class="nd-footer-copy">
            <?php
            printf(
                /* translators: 1: copyright year, 2: site name (linked to homepage), 3: theme name (linked to its listing page) */
                esc_html__( '© %1$s %2$s. All rights reserved. Powered by %3$s.', 'neodark' ),
                esc_html( gmdate( 'Y' ) ),
                '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>',
                '<a href="https://techygeekshome.info/neodark-free/">NeoDark</a>'
            );
            ?>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
