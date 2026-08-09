<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_header();
?>

<main id="primary" class="nd-page">

    <header class="nd-page-hero">
        <h1 class="nd-page-title"><?php the_title(); ?></h1>
        <?php if ( function_exists( 'neodark_breadcrumbs' ) ) neodark_breadcrumbs(); ?>
    </header>

    <div class="nd-page-content">
        <?php
        while ( have_posts() ) :
            the_post();
            if ( has_post_thumbnail() ) :
                ?>
                <div class="nd-page-image">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
                <?php
            endif;
            the_content();
        endwhile;
        ?>
    </div>

</main>

<?php get_footer(); ?>
