<?php
/**
 * Social Links — NeoDark (Free)
 *
 * Purely presentational: reads whatever the site owner places in the
 * "Social Menu" location (Appearance > Menus) and auto-detects an icon
 * from each link's domain. No custom data storage, no custom user
 * contact methods — keeps this out of "plugin territory" for the
 * WordPress.org submission.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Map a URL's domain to a NeoDark icon slug + fallback label.
 * Filterable so a site owner can add e.g. a self-hosted Mastodon
 * instance without touching theme files.
 */
function neodark_social_icon_for_url( $url ) {

    $host = wp_parse_url( $url, PHP_URL_HOST );
    $host = $host ? strtolower( preg_replace( '/^www\./', '', $host ) ) : '';

    $map = apply_filters( 'neodark_social_icon_map', array(
        'twitter.com'      => array( 'twitter',   __( 'Twitter', 'neodark' ) ),
        'x.com'            => array( 'twitter',   __( 'Twitter', 'neodark' ) ),
        'facebook.com'     => array( 'facebook',  __( 'Facebook', 'neodark' ) ),
        'instagram.com'    => array( 'instagram', __( 'Instagram', 'neodark' ) ),
        'linkedin.com'     => array( 'linkedin',  __( 'LinkedIn', 'neodark' ) ),
        'github.com'       => array( 'github',    __( 'GitHub', 'neodark' ) ),
        'youtube.com'      => array( 'youtube',   __( 'YouTube', 'neodark' ) ),
        'youtu.be'         => array( 'youtube',   __( 'YouTube', 'neodark' ) ),
        'tiktok.com'       => array( 'tiktok',    __( 'TikTok', 'neodark' ) ),
        'pinterest.com'    => array( 'pinterest', __( 'Pinterest', 'neodark' ) ),
        'vk.com'           => array( 'vk',        __( 'VK', 'neodark' ) ),
        'mastodon.social'  => array( 'mastodon',  __( 'Mastodon', 'neodark' ) ),
        'bsky.app'         => array( 'bsky',      __( 'Bluesky', 'neodark' ) ),
    ) );

    if ( isset( $map[ $host ] ) ) {
        return $map[ $host ];
    }

    return array( 'website', __( 'Website', 'neodark' ) );
}

/**
 * Render the "Social Menu" location as a row of icon links.
 * Outputs nothing if no menu is assigned to that location.
 */
function neodark_social_links( $container_class = 'nd-author-social', $link_class = 'nd-author-social-link' ) {

    $locations = get_nav_menu_locations();

    if ( empty( $locations['social'] ) ) {
        return;
    }

    $menu_items = wp_get_nav_menu_items( $locations['social'] );

    if ( empty( $menu_items ) ) {
        return;
    }

    echo '<div class="' . esc_attr( $container_class ) . '">';

    foreach ( $menu_items as $item ) {
        list( $icon, $fallback_label ) = neodark_social_icon_for_url( $item->url );
        $label = $item->title ? $item->title : $fallback_label;
        ?>
        <a class="<?php echo esc_attr( $link_class ); ?>" href="<?php echo esc_url( $item->url ); ?>" target="_blank" rel="noopener noreferrer">
            <span class="nd-author-social-icon nd-icon-<?php echo esc_attr( $icon ); ?>" aria-hidden="true"></span>
            <?php echo esc_html( $label ); ?>
            <span class="screen-reader-text"> <?php esc_html_e( '(opens in a new tab)', 'neodark' ); ?></span>
        </a>
        <?php
    }

    echo '</div>';
}
