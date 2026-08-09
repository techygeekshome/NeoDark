<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Respect Settings → Reading → "Your homepage displays".
 *
 * front-page.php is loaded for the site root regardless of that setting.
 * When it's left at the default ("Your latest posts", show_on_front ===
 * 'posts'), the custom magazine-style homepage below is exactly what
 * should render. But when the site owner switches to "A static page" and
 * assigns one, WordPress still loads this file instead of that page's own
 * content — so without the check below, whatever they wrote on that page
 * would be silently discarded in favour of the hardcoded design every
 * time. Only the static-page case needs special handling here.
 */
if ( 'page' === get_option( 'show_on_front' ) ) {
    // "A static page" — the site owner has written real content for the
    // page assigned as the front page. Show it, the same way page.php
    // would, instead of silently discarding it for the design below.
    get_header();
    ?>
    <main id="primary" class="nd-static-front-page">
        <div class="nd-container">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article <?php post_class( 'nd-page-content' ); ?>>
                    <?php if ( get_the_title() ) : ?>
                        <h1 class="nd-page-title"><?php the_title(); ?></h1>
                    <?php endif; ?>
                    <div class="nd-page-body">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>
    </main>
    <?php
    get_footer();
    return;
}

get_header();
?>

<main id="primary" class="nd-homepage">

    <?php $nd_shown_ids = array(); ?>

    <!-- HERO -->
    <section class="nd-hero">
        <div class="nd-container">

            <!-- LEFT: HERO TEXT -->
            <div class="nd-hero-content">

                <div class="nd-badge">
                    <?php echo esc_html( get_theme_mod( 'neodark_hero_badge', 'Tech Made Simple' ) ); ?>
                </div>

                <h1 class="nd-hero-title">
                    <?php echo esc_html( get_theme_mod( 'neodark_hero_heading', 'Modern guides, reviews & tutorials' ) ); ?>
                </h1>

                <p class="nd-hero-description">
                    <?php echo esc_html( get_theme_mod( 'neodark_hero_description', 'Practical, clear and reliable tech help for IT pros, enthusiasts and everyday users.' ) ); ?>
                </p>

                <div class="nd-hero-actions">
                    <?php
                    $cta_text = get_theme_mod( 'neodark_hero_cta_text', 'Explore Guides' );
                    $cta_link = get_theme_mod( 'neodark_hero_cta_link', home_url( '/guides' ) );
                    ?>

                    <a href="<?php echo esc_url( $cta_link ); ?>" class="nd-btn nd-btn-primary">
                        <?php echo esc_html( $cta_text ); ?>
                    </a>

                    <a href="#browse-categories" class="nd-btn nd-btn-secondary">
                        <?php esc_html_e( 'Browse Categories', 'neodark' ); ?>
                    </a>
                </div>

            </div>

            <!-- RIGHT: FEATURED SPOTLIGHT -->
            <?php
            $spotlight_ids = get_option( 'sticky_posts' );

            $spotlight_query = new WP_Query( array(
                'posts_per_page'      => 1,
                'post_status'         => 'publish',
                'orderby'             => ! empty( $spotlight_ids ) ? 'post__in' : 'date',
                'order'               => 'DESC',
                'post__in'            => ! empty( $spotlight_ids ) ? $spotlight_ids : null,
                'ignore_sticky_posts' => true,
            ) );

            if ( $spotlight_query->have_posts() ) :
                while ( $spotlight_query->have_posts() ) :
                    $spotlight_query->the_post();

                    $nd_shown_ids[] = get_the_ID();

                    $cats       = get_the_category();
                    $hero_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
            ?>

            <article class="nd-feature-card nd-hero-spotlight">

                <?php if ( $hero_image ) : ?>
                    <div class="nd-hero-spotlight-image">
                        <?php the_post_thumbnail( 'large' ); ?>
                        <span class="nd-hero-spotlight-badge"><?php esc_html_e( 'Featured Guide', 'neodark' ); ?></span>
                    </div>
                <?php endif; ?>

                <div class="nd-hero-spotlight-body">

                    <div class="nd-feature-category">
                        <?php
                        if ( ! empty( $cats ) ) {
                            echo esc_html( $cats[0]->name );
                        }
                        ?>
                    </div>

                    <h2 class="nd-feature-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <a href="<?php the_permalink(); ?>" class="nd-hero-spotlight-link">
                        <?php esc_html_e( 'Read Guide', 'neodark' ); ?> &rarr;
                    </a>

                </div>

            </article>

            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>
    </section>

    <!-- TRUST BADGES -->
    <?php get_template_part( 'template-parts/trust-badges' ); ?>

    <!-- FEATURED GUIDES -->
    <?php
    $sticky_ids = get_option( 'sticky_posts' );

    if ( ! empty( $sticky_ids ) ) {
        $featured_args = array(
            'post__in'            => $sticky_ids,
            'posts_per_page'      => 3,
            'ignore_sticky_posts' => true,
            'orderby'             => 'post__in',
        );
    } else {
        $featured_args = array(
            'posts_per_page'      => 3,
            'orderby'             => 'date',
            'order'               => 'DESC',
            'ignore_sticky_posts' => true,
        );
    }

    $featured_posts = new WP_Query( $featured_args );

    if ( $featured_posts->have_posts() ) :
    ?>
    <section class="nd-featured-posts">
        <div class="nd-container">

            <div class="nd-section-header">
                <h2><?php esc_html_e( 'Featured Guides', 'neodark' ); ?></h2>
            </div>

            <div class="nd-post-grid">
                <?php
                while ( $featured_posts->have_posts() ) :
                    $featured_posts->the_post();
                    $nd_shown_ids[] = get_the_ID();
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

    <!-- CATEGORY CARDS -->
    <?php get_template_part( 'template-parts/category-cards' ); ?>

    <!-- LATEST ARTICLES -->
    <?php
    $latest_posts = new WP_Query( array(
        'posts_per_page'      => 6,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => true,
        'post__not_in'        => $nd_shown_ids,
    ) );

    if ( $latest_posts->have_posts() ) :
    ?>
    <section class="nd-latest-posts">
        <div class="nd-container">

            <div class="nd-section-header">
                <h2><?php esc_html_e( 'Latest Articles', 'neodark' ); ?></h2>
            </div>

            <div class="nd-post-grid">
                <?php
                while ( $latest_posts->have_posts() ) :
                    $latest_posts->the_post();
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

    <!-- CATEGORY SECTIONS (Customizer-driven) -->
    <?php
    for ( $i = 1; $i <= 6; $i++ ) {

        $category_id = get_theme_mod( 'nd_category_' . $i );

        if ( ! $category_id ) {
            continue;
        }

        $category = get_category( $category_id );

        if ( ! $category ) {
            continue;
        }

        get_template_part(
            'template-parts/category-section',
            null,
            array(
                'slug'  => $category->slug,
                'title' => $category->name,
            )
        );
    }
    ?>

</main>

<?php get_footer(); ?>
