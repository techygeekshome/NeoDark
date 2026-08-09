<?php
/**
 * 404 Page — NeoDark
 *
 * Previously a bare "page not found" message. Rebuilt to give lost
 * visitors somewhere useful to go instead of a dead end: a real search
 * form (get_search_form(), same markup used site-wide), one-click links
 * to the site's most-used sections, the same category quick-nav grid
 * used on the homepage, and a handful of recent articles so the page
 * still feels alive even when it's the one page nobody meant to land on.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_header();
?>

<main id="primary" class="nd-single">
    <div class="nd-container">

        <?php neodark_breadcrumbs(); ?>

        <section class="nd-404-hero">

            <div class="nd-badge"><?php esc_html_e( '404 Error', 'neodark' ); ?></div>

            <h1 class="nd-article-title"><?php esc_html_e( 'This page has gone missing', 'neodark' ); ?></h1>

            <p class="nd-article-intro">
                <?php esc_html_e( 'The page you were looking for doesn’t exist, may have moved, or the link might be out of date. Try a search below, or jump straight to one of our most popular sections.', 'neodark' ); ?>
            </p>

            <div class="nd-404-search">
                <?php get_search_form(); ?>
            </div>

            <div class="nd-404-actions">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nd-btn nd-btn-primary">
                    <?php esc_html_e( 'Back to homepage', 'neodark' ); ?>
                </a>
                <?php if ( get_option( 'page_for_posts' ) ) : ?>
                <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="nd-btn nd-btn-secondary">
                    <?php esc_html_e( 'View latest articles', 'neodark' ); ?>
                </a>
                <?php endif; ?>
            </div>

            <div class="nd-404-quicklinks">
                <?php
                $neodark_404_links = array(
                    array(
                        'label' => __( 'How-To Guides', 'neodark' ),
                        'url'   => home_url( '/how-to-guides/' ),
                        'icon'  => '📘',
                    ),
                    array(
                        'label' => __( 'Free Downloads', 'neodark' ),
                        'url'   => home_url( '/freeware/' ),
                        'icon'  => '⬇️',
                    ),
                    array(
                        'label' => __( 'Shop', 'neodark' ),
                        'url'   => function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ),
                        'icon'  => '🛒',
                    ),
                    array(
                        'label' => __( 'Contact Us', 'neodark' ),
                        'url'   => home_url( '/contact/' ),
                        'icon'  => '✉️',
                    ),
                );

                foreach ( $neodark_404_links as $neodark_404_link ) :
                ?>
                <a href="<?php echo esc_url( $neodark_404_link['url'] ); ?>" class="nd-404-quicklink">
                    <span class="nd-404-quicklink-icon"><?php echo esc_html( $neodark_404_link['icon'] ); ?></span>
                    <span class="nd-404-quicklink-label"><?php echo esc_html( $neodark_404_link['label'] ); ?></span>
                </a>
                <?php endforeach; ?>
            </div>

        </section>

    </div>
</main>

<!-- BROWSE BY CATEGORY (same quick-nav grid used on the homepage) -->
<?php get_template_part( 'template-parts/category-cards' ); ?>

<!-- RECENT ARTICLES -->
<?php
$neodark_404_recent = new WP_Query( array(
    'posts_per_page'      => 3,
    'post_status'         => 'publish',
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
) );

if ( $neodark_404_recent->have_posts() ) :
?>
<section class="nd-latest-posts">
    <div class="nd-container">

        <div class="nd-section-header">
            <h2><?php esc_html_e( 'Recent Articles', 'neodark' ); ?></h2>
        </div>

        <div class="nd-post-grid">
            <?php
            while ( $neodark_404_recent->have_posts() ) :
                $neodark_404_recent->the_post();
                get_template_part( 'template-parts/post-card' );
            endwhile;
            ?>
        </div>

    </div>
</section>
<?php
endif;
wp_reset_postdata();
?>

<?php
get_footer();
