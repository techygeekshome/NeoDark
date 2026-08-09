<?php
/**
 * Category Cards — NeoDark
 *
 * Categories and icons are chosen in Appearance > Customize > NeoDark
 * Category Cards, so this works for any site's taxonomy — not just
 * one specific set of category slugs. Falls back to the 6 categories
 * with the most posts (generic folder icon) until the site owner
 * configures it.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$icon_choices = neodark_category_card_icon_choices();
$cards        = array();

for ( $i = 1; $i <= 6; $i++ ) {

    $cat_id = get_theme_mod( 'nd_card_category_' . $i );

    if ( ! $cat_id ) {
        continue;
    }

    $term = get_category( $cat_id );

    if ( ! $term || is_wp_error( $term ) ) {
        continue;
    }

    $icon_key = get_theme_mod( 'nd_card_icon_' . $i, 'folder' );
    $icon     = isset( $icon_choices[ $icon_key ] ) ? $icon_choices[ $icon_key ][0] : '📁';

    $cards[] = array(
        'term' => $term,
        'icon' => $icon,
    );
}

// Nothing configured yet — fall back to the 6 categories with the most posts.
if ( empty( $cards ) ) {

    $fallback_terms = get_categories( array(
        'hide_empty' => true,
        'number'     => 6,
        'orderby'    => 'count',
        'order'      => 'DESC',
    ) );

    foreach ( $fallback_terms as $term ) {
        $cards[] = array(
            'term' => $term,
            'icon' => '📁',
        );
    }
}

if ( empty( $cards ) ) {
    return;
}
?>

<section id="browse-categories" class="nd-category-cards">

    <div class="nd-container">

        <div class="nd-section-header">
            <h2><?php esc_html_e( 'Browse By Category', 'neodark' ); ?></h2>
        </div>

        <div class="nd-category-grid">

            <?php foreach ( $cards as $card ) :

                $term = $card['term'];
                $link = get_category_link( $term->term_id );

            ?>

                <a href="<?php echo esc_url( $link ); ?>" class="nd-category-card">

                    <div class="nd-category-card-icon">
                        <?php echo esc_html( $card['icon'] ); ?>
                    </div>

                    <div class="nd-category-card-title">
                        <?php echo esc_html( $term->name ); ?>
                    </div>

                    <div class="nd-category-card-count">
                        <?php
                        printf(
                            /* translators: %d: number of articles in the category */
                            esc_html( _n( '%d article', '%d articles', $term->count, 'neodark' ) ),
                            absint( $term->count )
                        );
                        ?>
                    </div>

                </a>

            <?php endforeach; ?>

        </div>

    </div>

</section>
