<?php
/**
 * NeoDark Theme Bootstrap
 *
 * This file only loads the theme's modules. All implementation lives in /inc.
 * Do not add functions directly here — add them to the relevant /inc file
 * (or create a new one) so functions.php stays a clean entry point.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/enqueue-assets.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/breadcrumbs.php';
require_once get_template_directory() . '/inc/social-links.php';
require_once get_template_directory() . '/inc/block-patterns.php';
require_once get_template_directory() . '/inc/site-enhancements.php';
