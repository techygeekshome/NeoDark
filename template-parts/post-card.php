<?php
/**
 * Post Card — NeoDark
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cats = get_the_category();
?>

<article <?php post_class( 'nd-post-card' ); ?>>
    <a href="<?php the_permalink(); ?>">

        <div class="nd-post-thumb">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'medium' ); ?>
                <?php if ( ! empty( $cats ) ) : ?>
                    <span class="nd-post-category-badge"><?php echo esc_html( $cats[0]->name ); ?></span>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="nd-post-content">

            <?php if ( ! has_post_thumbnail() && ! empty( $cats ) ) : ?>
                <div class="nd-post-category">
                    <?php echo esc_html( $cats[0]->name ); ?>
                </div>
            <?php endif; ?>

            <h3 class="nd-post-title">
                <?php the_title(); ?>
            </h3>

            <div class="nd-post-meta">
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

        </div>

    </a>
</article>
