<?php
/**
 * Search Form — NeoDark
 *
 * Loaded automatically by get_search_form(). Markup and class names match
 * the #nd-search-overlay JS/CSS in assets/js/main.js and style.css.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$neodark_unique_id = wp_unique_id( 'nd-search-input-' );
?>
<form role="search" method="get" class="nd-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $neodark_unique_id ); ?>"><?php esc_html_e( 'Search for:', 'neodark' ); ?></label>
	<input type="search" id="<?php echo esc_attr( $neodark_unique_id ); ?>" class="nd-search-input" name="s" placeholder="<?php esc_attr_e( 'Search articles…', 'neodark' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
	<button type="submit" class="nd-btn nd-btn-primary"><?php esc_html_e( 'Search', 'neodark' ); ?></button>
</form>
