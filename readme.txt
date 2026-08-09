=== NeoDark ===
Contributors: techygeekshome
Requires at least: 6.4
Tested up to: 7.0
Requires PHP: 7.4
Version: 1.1.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, one-column, custom-menu, custom-logo, featured-images, footer-widgets, threaded-comments, translation-ready, block-patterns, block-styles, editor-style, wide-blocks

A fast, lightweight dark-mode theme for tech guides, tutorials and reviews with Customizer-driven homepage sections.

== Description ==

NeoDark is a fast, lightweight dark-mode WordPress theme built for tech guides, tutorials and review sites. It ships with a Customizer-driven homepage (featured guides, browse-by-category cards, latest articles, and six configurable category sections), a single-post layout with an automatic table of contents, related posts, and an author box, plus site-wide breadcrumbs.

Key features:

* Dark-mode-first design with a consistent, accessible color system
* Customizer-driven homepage: choose which six categories get their own homepage section, no code required
* Automatic table of contents on long-form posts, generated from your headings
* Related posts based on shared categories
* Breadcrumbs on every archive, single post, and page
* A site-wide social links menu (Appearance > Menus) with automatic icon detection for common networks
* Mobile-friendly navigation with an accessible menu toggle
* Built-in search overlay
* No page builder, no bundled plugins, no tracking

NeoDark does not include any remote/CDN-loaded scripts, styles, or fonts, and stores no personal data beyond what WordPress core already provides.

== Installation ==

1. In your WordPress admin, go to Appearance > Themes > Add New and search for "NeoDark", or upload the theme zip via Appearance > Themes > Add New > Upload Theme.
2. Activate the theme.
3. Go to Appearance > Menus and assign a menu to the "Social Menu" location if you want social icons in the author box / footer (links to twitter.com, facebook.com, instagram.com, linkedin.com, github.com, youtube.com, etc. get their icon automatically).
4. Go to Appearance > Customize > NeoDark Homepage to choose which categories appear as homepage sections.

== Frequently Asked Questions ==

= How do I add social icons? =

Create a menu, add links to your social profiles, and assign that menu to the "Social Menu" location under Appearance > Menus. NeoDark detects the network from the link's domain automatically, so no extra plugin or per-user setup is needed.

= Does NeoDark support WooCommerce? =

Yes. NeoDark includes WooCommerce compatibility fixes out of the box (correct product thumbnail sizing, responsive product grids, pagination handling).

= Is there a Pro version? =

NeoDark Pro adds multiple homepage layouts, additional content blocks for reviews and comparisons, a mega menu, and more. See https://techygeekshome.info for details.

== Changelog ==

= 1.1.7 =
* Fix: removed generator-tag removal (remove_action('wp_head','wp_generator')) and two other non-presentational hacks (an SEO-motivated nofollow script, and a MutationObserver that deleted an unrelated third-party font request) from inc/site-enhancements.php. This was plugin-territory functionality that had been merged into the theme from an old separate plugin - it's been stripped back to only the two presentational tweaks that belong in a theme (jQuery defer, WooCommerce thumbnail crop fix).
* Fix: added the missing License and License URI lines to the style.css header.
* Fix: added the missing Theme URI line to the style.css header.
* Fix: added CSS for the core content classes WordPress expects themes to style (.wp-caption, .wp-caption-text, .gallery-caption, .sticky, .bypostauthor, .alignleft, .alignright, .aligncenter).

= 1.1.6 =
* Fix: mobile menu and search overlay now trap keyboard focus properly while open (Tab/Shift+Tab cycle within the modal instead of escaping to page content behind it), close on Escape, and restore focus to the triggering button on close. Added visible close buttons to both.
* Fix: front-page.php now displays the actual content of the page assigned in Settings > Reading when "Your homepage displays" is set to "A static page", instead of always showing the Customizer-driven homepage design regardless of that setting.
* Fix: the two example values in the Spec Table block pattern ("£000" price and "0/10" rating) are now translation-ready.
* Fix: corrected a class name mismatch that left the search overlay's panel unstyled (background/border/padding) in some cases.

= 1.1.5 =
* Fix: added missing CSS for "Gear We Recommend" / download recommendation cards (.tgh-gear-card and related classes), which previously had no styling at all.
* Fix: corrected a CSS specificity bug where the recommendation card button text was the same colour as its background (invisible text) because the theme's article link colour rule was overriding the button text colour.

= 1.1.3 =
* Fix: corrected page and archive description max-width so long-form content displays correctly on wide screens.
* Fix: resolved a CSS specificity issue that prevented multi-column grids from collapsing to a single column on mobile.
* Fix: corrected footer widget column stacking on mobile.
* Improvement: standardised button styling site-wide using the theme's accent colour variable.
* General polish and refinements since initial release.

= 1.0.0 =
* Initial public release.

== Resources ==

NeoDark does not bundle any third-party images, fonts, or icon libraries. All social icons are original SVG artwork authored for this theme, encoded as CSS background images in style.css.

== Copyright ==

NeoDark WordPress Theme, Copyright 2026 TechyGeeksHome
NeoDark is distributed under the terms of the GNU General Public License v2 (or later).

This theme, like WordPress, is licensed under the GPL.
Use it to make something great, have fun, and share what you learn with others.
