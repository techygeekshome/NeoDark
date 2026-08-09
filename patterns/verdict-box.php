<?php
/**
 * Title: Verdict Box
 * Slug: neodark/verdict-box
 * Categories: neodark
 * Description: A highlighted callout for your final verdict and score, for the end of a review.
 * Keywords: review, verdict, rating, summary, score
 * Block Types: core/post-content
 */
?>
<!-- wp:group {"className":"nd-pattern-verdict"} -->
<div class="wp-block-group nd-pattern-verdict">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Our Verdict', 'neodark' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"nd-verdict-score"} -->
<p class="nd-verdict-score"><?php esc_html_e( '9/10 — Excellent', 'neodark' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( "Sum up why this gets your recommendation in two or three sentences. What's the single best reason someone should — or shouldn't — buy this?", 'neodark' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
