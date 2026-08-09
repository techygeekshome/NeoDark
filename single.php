<?php
/**
 * Single Post Template — NeoDark
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="nd-single">
    <div class="nd-container">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article <?php post_class( 'nd-article' ); ?>>

            <!-- Breadcrumbs -->
            <?php neodark_breadcrumbs(); ?>

            <!-- Featured Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="nd-article-image">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <!-- Category -->
            <?php
            $cats = get_the_category();
            if ( ! empty( $cats ) ) :
            ?>
                <div class="nd-article-category">
                    <?php echo esc_html( $cats[0]->name ); ?>
                </div>
            <?php endif; ?>

            <!-- Title -->
            <h1 class="nd-article-title">
                <?php the_title(); ?>
            </h1>

            <!-- Meta -->
            <div class="nd-article-meta">
                <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
                <span class="nd-meta-divider">•</span>
                <?php
                echo esc_html(
                    ceil(
                        str_word_count(
                            wp_strip_all_tags( get_the_content() )
                        ) / 200
                    )
                );
                ?>
                <?php esc_html_e( 'min read', 'neodark' ); ?>
            </div>

            <!-- Table of Contents -->
            <?php get_template_part( 'template-parts/table-of-contents' ); ?>

            <!-- Content -->
            <div class="nd-article-content">
                <?php the_content(); ?>
                <?php
                wp_link_pages(
                    array(
                        'before' => '<div class="nd-page-links">' . __( 'Pages:', 'neodark' ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div>

            <!-- Tags -->
            <?php if ( has_tag() ) : ?>
                <div class="nd-article-tags">
                    <?php the_tags( '', '', '' ); ?>
                </div>
            <?php endif; ?>

            <!-- Author Box -->
            <?php get_template_part( 'template-parts/author-box' ); ?>

            <!-- Comments -->
            <?php
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

        </article>

        <!-- Related Posts -->
        <?php get_template_part( 'template-parts/related-posts' ); ?>

        <?php endwhile; endif; ?>

    </div>
</main>

<?php
get_footer();
?>