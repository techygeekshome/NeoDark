<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_header();
?>

<main id="primary" class="nd-homepage">
    <div class="nd-container">
        <h1><?php esc_html_e( 'Latest Posts', 'neodark' ); ?></h1>

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
get_footer();