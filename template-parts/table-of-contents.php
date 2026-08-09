<?php
/**
 * Table of Contents — NeoDark
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$content = get_the_content();

if ( empty( $content ) ) {
    return;
}

preg_match_all( '/<h([2-4])[^>]*>(.*?)<\/h\1>/', $content, $matches, PREG_SET_ORDER );

if ( empty( $matches ) ) {
    return;
}
?>

<div class="nd-toc">
    <div class="nd-toc-title"><?php esc_html_e( 'Table of Contents', 'neodark' ); ?></div>

    <ul class="nd-toc-list">
        <?php foreach ( $matches as $i => $heading ) : ?>
            <li>
                <a href="#section-<?php echo esc_attr( $i ); ?>">
                    <?php echo wp_strip_all_tags( $heading[2] ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
