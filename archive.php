<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_header();
?>

<main id="primary" class="nd-archive">
    <div class="nd-container">

        <header class="nd-archive-header">
            <?php neodark_breadcrumbs(); ?>
            <h1 class="nd-archive-title">
                <?php
                if ( is_category() ) {
                    single_cat_title();
                } elseif ( is_tag() ) {
                    single_tag_title();
                } elseif ( is_author() ) {
                    the_author();
                } elseif ( is_date() ) {
                    echo get_the_date();
                } else {
                    esc_html_e( 'Archive', 'neodark' );
                }
                ?>
            </h1>
        </header>

        <?php if ( have_posts() ) : ?>

            <div class="nd-post-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/post-card' ); ?>
                <?php endwhile; ?>
            </div>

            <?php the_posts_pagination(); ?>

        <?php else : ?>

            <p><?php esc_html_e( 'No posts found.', 'neodark' ); ?></p>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
