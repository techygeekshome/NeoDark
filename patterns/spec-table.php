<?php
/**
 * Title: Spec Table
 * Slug: neodark/spec-table
 * Categories: neodark
 * Description: A styled table for listing product or tool specifications.
 * Keywords: specs, table, specifications, review
 * Block Types: core/post-content
 */
?>
<!-- wp:table {"className":"is-style-nd-spec-table"} -->
<figure class="wp-block-table is-style-nd-spec-table"><table>
<tbody>
<tr><td><strong><?php esc_html_e( 'Spec', 'neodark' ); ?></strong></td><td><strong><?php esc_html_e( 'Details', 'neodark' ); ?></strong></td></tr>
<tr><td><?php esc_html_e( 'Category', 'neodark' ); ?></td><td><?php esc_html_e( 'e.g. laptop, software, peripheral', 'neodark' ); ?></td></tr>
<tr><td><?php esc_html_e( 'Price', 'neodark' ); ?></td><td><?php esc_html_e( '£000', 'neodark' ); ?></td></tr>
<tr><td><?php esc_html_e( 'Best for', 'neodark' ); ?></td><td><?php esc_html_e( 'Who this is aimed at', 'neodark' ); ?></td></tr>
<tr><td><?php esc_html_e( 'Our rating', 'neodark' ); ?></td><td><?php esc_html_e( '0/10', 'neodark' ); ?></td></tr>
</tbody>
</table></figure>
<!-- /wp:table -->
