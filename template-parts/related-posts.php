<?php
/**
 * Related Posts — NeoDark
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$categories = wp_get_post_categories( get_the_ID() );

$related = new WP_Query( array(
    'category__in'   => $categories,
    'post__not_in'   => array( get_the_ID() ),
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

if ( ! $related->have_posts() ) {
    wp_reset_postdata();
    return;
}

// "Related Posts Layout" — Appearance > Customize > NeoDark Homepage.
$layout       = get_theme_mod( 'nd_related_posts_layout', 'grid' );
$layout_class = ( 'list' === $layout ) ? 'nd-related-layout-list' : 'nd-related-layout-grid';
?>

<div class="nd-related-posts">
    <h2 class="nd-section-header"><?php esc_html_e( 'Related Posts', 'neodark' ); ?></h2>

    <div class="<?php echo esc_attr( $layout_class ); ?>">
        <?php while ( $related->have_posts() ) : $related->the_post(); ?>
            <?php get_template_part( 'template-parts/post-card' ); ?>
        <?php endwhile; ?>
    </div>
</div>

<?php
wp_reset_postdata();
