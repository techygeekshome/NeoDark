<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Adds matching id="section-N" anchors to H2-H4 headings in post content,
 * so the auto-generated Table of Contents links actually jump somewhere.
 *
 * IMPORTANT: the numbering here must stay in sync with the heading-matching
 * regex in template-parts/table-of-contents.php - both walk the same raw
 * post content in the same order, so index 0, 1, 2... lines up either way.
 */
function neodark_add_heading_anchors( $content ) {

    if ( is_admin() || ! is_singular() || empty( $content ) ) {
        return $content;
    }

    $index = 0;

    $content = preg_replace_callback(
        '/<h([2-4])(.*?)>(.*?)<\/h[2-4]>/',
        function ( $matches ) use ( &$index ) {
            $tag        = $matches[1];
            $attrs      = $matches[2];
            $inner_html = $matches[3];

            // If the heading already has an id (e.g. a Gutenberg anchor
            // block), leave it alone rather than overwrite it.
            if ( stripos( $attrs, 'id=' ) !== false ) {
                $index++;
                return "<h{$tag}{$attrs}>{$inner_html}</h{$tag}>";
            }

            $anchor_id = 'section-' . $index;
            $index++;

            return "<h{$tag}{$attrs} id=\"{$anchor_id}\">{$inner_html}</h{$tag}>";
        },
        $content
    );

    return $content;
}
add_filter( 'the_content', 'neodark_add_heading_anchors', 20 );