<?php
/**
 * Site Enhancements — NeoDark
 *
 * Presentation-related tweaks that belong in the theme: deferring
 * render-blocking core jQuery scripts, and (WooCommerce sites only)
 * fixing cropped product thumbnails when the featured image isn't square.
 *
 * Anything unrelated to how the theme looks/renders (hiding the WordPress
 * generator tag, adding rel="nofollow" to auto-generated links, removing
 * third-party font requests, etc.) has been intentionally removed from
 * here — that's "plugin territory" per the WordPress.org Theme Review
 * Guidelines and belongs in a plugin, not a theme.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* -----------------------------------------------------------------------
 * 1. Defer jQuery core/migrate so they don't render-block — safe here
 *    since every script that depends on jQuery (WooCommerce etc.) is
 *    already loaded with defer, and deferred scripts execute in
 *    document order, so jQuery still loads before anything needing it.
 * -------------------------------------------------------------------- */

add_filter( 'script_loader_tag', 'neodark_defer_jquery', 10, 2 );
function neodark_defer_jquery( $tag, $handle ) {
	if ( is_admin() ) {
		return $tag;
	}
	if ( in_array( $handle, array( 'jquery-core', 'jquery-migrate' ), true ) && strpos( $tag, 'defer' ) === false ) {
		$tag = str_replace( ' src=', ' defer src=', $tag );
	}
	return $tag;
}

/* -----------------------------------------------------------------------
 * 2. Fix cropped/cut-off product thumbnails on the shop archive for
 *    stores whose product images are wider than they are tall (a 3:2
 *    "graphic with text" style featured image, for example) — the
 *    default "woocommerce_thumbnail" size hard-crops to a square, which
 *    can cut text off the start/end of an image. Only takes effect on
 *    sites running WooCommerce.
 * -------------------------------------------------------------------- */

if ( class_exists( 'WooCommerce' ) ) {
	add_filter( 'woocommerce_get_image_size_woocommerce_thumbnail', 'neodark_fix_product_thumbnail_size' );
}
function neodark_fix_product_thumbnail_size( $size ) {
	$size['width']  = 600;
	$size['height'] = 400;
	$size['crop']   = 1;
	return $size;
}
