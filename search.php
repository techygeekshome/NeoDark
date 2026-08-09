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
                printf(
                    /* translators: %s: search query */
                    esc_html__( 'Search results for: %s', 'neodark' ),
                    esc_html( get_search_query() )
                );
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

            <p><?php esc_html_e( 'No results found. Try a different search term.', 'neodark' ); ?></p>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
