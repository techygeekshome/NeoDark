<?php
/**
 * Trust Badges — NeoDark
 *
 * A short row of reassurance points at the bottom of the homepage.
 * Static by design (like the other section headings in this theme) —
 * kept generic so it reads well on any tech guide/review site.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$badges = array(
    array(
        'icon'  => '✅',
        'title' => __( 'Easy to Follow', 'neodark' ),
        'desc'  => __( 'Clear, step-by-step tutorials anyone can use.', 'neodark' ),
    ),
    array(
        'icon'  => '💡',
        'title' => __( 'Practical Advice', 'neodark' ),
        'desc'  => __( 'Tips you can put to work right away.', 'neodark' ),
    ),
    array(
        'icon'  => '⭐',
        'title' => __( 'Honest Reviews', 'neodark' ),
        'desc'  => __( 'Real opinions, no fluff.', 'neodark' ),
    ),
    array(
        'icon'  => '🔄',
        'title' => __( 'Updated Regularly', 'neodark' ),
        'desc'  => __( 'Fresh content, kept current.', 'neodark' ),
    ),
);
?>

<section class="nd-trust-badges">
    <div class="nd-container">
        <div class="nd-trust-badges-grid">
            <?php foreach ( $badges as $badge ) : ?>
                <div class="nd-trust-badge">
                    <span class="nd-trust-badge-icon" aria-hidden="true"><?php echo esc_html( $badge['icon'] ); ?></span>
                    <div>
                        <div class="nd-trust-badge-title"><?php echo esc_html( $badge['title'] ); ?></div>
                        <div class="nd-trust-badge-desc"><?php echo esc_html( $badge['desc'] ); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
