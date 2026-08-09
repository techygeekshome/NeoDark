<?php
/**
 * Block Patterns & Block Styles — NeoDark
 *
 * Registers a dedicated pattern category and a handful of block STYLE
 * VARIATIONS (extra class-based styling options for existing core
 * blocks). This does not register any custom block types — WordPress.org
 * theme review guidelines disallow custom blocks in themes, but pattern
 * registration and register_block_style() are both fully compliant
 * since they only compose/style core blocks.
 *
 * The patterns themselves live in /patterns and are auto-registered by
 * WordPress 6.0+ from that directory using each file's header comment.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function neodark_register_pattern_category() {
    register_block_pattern_category(
        'neodark',
        array( 'label' => __( 'NeoDark', 'neodark' ) )
    );
}
add_action( 'init', 'neodark_register_pattern_category' );

function neodark_register_block_styles() {

    register_block_style(
        'core/table',
        array(
            'name'  => 'nd-spec-table',
            'label' => __( 'NeoDark Spec Table', 'neodark' ),
        )
    );
}
add_action( 'init', 'neodark_register_block_styles' );
