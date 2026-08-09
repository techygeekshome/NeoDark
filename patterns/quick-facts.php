<?php
/**
 * Title: Quick Facts
 * Slug: neodark/quick-facts
 * Categories: neodark
 * Description: A callout box for the key takeaways at the top of a guide.
 * Keywords: summary, tldr, key facts, takeaways
 * Block Types: core/post-content
 */
?>
<!-- wp:group {"className":"nd-pattern-quick-facts"} -->
<div class="wp-block-group nd-pattern-quick-facts">
<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php esc_html_e( 'Quick Facts', 'neodark' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><?php esc_html_e( 'Key takeaway one', 'neodark' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php esc_html_e( 'Key takeaway two', 'neodark' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php esc_html_e( 'Key takeaway three', 'neodark' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
