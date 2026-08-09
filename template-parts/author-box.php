<?php
/**
 * Author Box — NeoDark (Free)
 *
 * Social icons come from the site-wide "Social Menu" location
 * (Appearance > Menus), not per-author fields — see inc/social-links.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$author_id = get_post_field( 'post_author', get_the_ID() );
$bio       = get_the_author_meta( 'description', $author_id );
?>

<div class="nd-author-box">

    <div class="nd-author-avatar">
        <?php echo get_avatar( $author_id, 140 ); ?>
    </div>

    <div class="nd-author-content">

        <h3 class="nd-author-name">
            <?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?>
        </h3>

        <?php if ( ! empty( $bio ) ) : ?>
            <div class="nd-author-bio">
                <?php echo wpautop( esc_html( $bio ) ); ?>
            </div>
        <?php endif; ?>

        <?php neodark_social_links(); ?>

        <div class="nd-author-links">
            <a class="nd-author-link" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
                <?php esc_html_e( 'View all posts →', 'neodark' ); ?>
            </a>
        </div>

    </div>

</div>
