<?php
/**
 * Title: Pros & Cons
 * Slug: neodark/pros-cons
 * Categories: neodark
 * Description: A two-column pros and cons breakdown for a review.
 * Keywords: pros, cons, review, comparison
 * Block Types: core/post-content
 */
?>
<!-- wp:columns {"className":"nd-pattern-pros-cons"} -->
<div class="wp-block-columns nd-pattern-pros-cons">

<!-- wp:column {"className":"nd-pros"} -->
<div class="wp-block-column nd-pros">
<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php esc_html_e( 'Pros', 'neodark' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><?php esc_html_e( 'Reason this is great', 'neodark' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php esc_html_e( 'Another strong point', 'neodark' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php esc_html_e( 'A third advantage', 'neodark' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"nd-cons"} -->
<div class="wp-block-column nd-cons">
<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php esc_html_e( 'Cons', 'neodark' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><?php esc_html_e( 'A limitation worth knowing about', 'neodark' ); ?></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><?php esc_html_e( 'Something that could be better', 'neodark' ); ?></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
