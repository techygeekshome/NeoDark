<?php
/**
 * Category Section — NeoDark
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$slug  = $args['slug'];
$title = $args['title'];

$category = get_category_by_slug( $slug );

if ( ! $category ) {
    return;
}

$args = array(
    'cat'            => $category->term_id,
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
?>

<section class="nd-category-section">
    <div class="nd-container">

        <div class="nd-section-header">
            <h2><?php echo esc_html( $title ); ?></h2>
            <a class="nd-view-all" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                <?php esc_html_e( 'View all →', 'neodark' ); ?>
            </a>
        </div>

        <div class="nd-post-grid">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php get_template_part( 'template-parts/post-card' ); ?>
            <?php endwhile; ?>
        </div>

    </div>
</section>

<?php
endif;
wp_reset_postdata();
