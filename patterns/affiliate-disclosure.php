<?php
/**
 * Title: Affiliate Disclosure
 * Slug: neodark/affiliate-disclosure
 * Categories: neodark
 * Description: A short, muted disclosure notice for posts containing affiliate links.
 * Keywords: affiliate, disclosure, disclaimer
 * Block Types: core/post-content
 */
?>
<!-- wp:paragraph {"className":"nd-pattern-disclosure"} -->
<p class="nd-pattern-disclosure"><?php esc_html_e( "Disclosure: this post may contain affiliate links. If you buy through one of them, we may earn a small commission at no extra cost to you. We only recommend products we've tested or genuinely rate.", 'neodark' ); ?></p>
<!-- /wp:paragraph -->
