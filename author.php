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
                <?php echo esc_html( get_the_author() ); ?>
            </h1>

            <?php $nd_author_bio = get_the_author_meta( 'description' ); ?>
            <?php if ( ! empty( $nd_author_bio ) ) : ?>
                <div class="nd-archive-description">
                    <?php echo esc_html( $nd_author_bio ); ?>
                </div>
            <?php endif; ?>
        </header>

        <div class="nd-post-grid">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/post-card' );
                endwhile;
            else :
                echo '<p>' . esc_html__( 'No posts found.', 'neodark' ) . '</p>';
            endif;
            ?>
        </div>

        <div class="nd-archive-pagination">
            <?php
            the_posts_pagination(
                array(
                    'mid_size'  => 2,
                    'prev_text' => __( 'Previous', 'neodark' ),
                    'next_text' => __( 'Next', 'neodark' ),
                )
            );
            ?>
        </div>

    </div>

</main>

<?php
get_footer(); ?>