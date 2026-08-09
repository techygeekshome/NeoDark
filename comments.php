<?php
/**
 * Comments Template — NeoDark
 *
 * Uses the default wp_list_comments() output (no custom walker), which
 * matches the .comment / .comment-author / .comment-meta / .comment-content
 * selectors already styled in style.css.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// If the current post is password protected, don't show comments.
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="nd-comments">

	<?php if ( have_comments() ) : ?>

		<h3 class="nd-comments-title">
			<?php
			$neodark_comment_count = get_comments_number();

			if ( 1 === (int) $neodark_comment_count ) {
				printf(
					/* translators: %s: post title */
					esc_html__( 'One thought on &ldquo;%s&rdquo;', 'neodark' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count, 2: post title */
					esc_html(
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$neodark_comment_count,
							'comments title',
							'neodark'
						)
					),
					number_format_i18n( $neodark_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h3>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size'=> 42,
				)
			);
			?>
		</ol>

		<?php
		the_comments_pagination(
			array(
				'prev_text' => esc_html__( 'Older Comments', 'neodark' ),
				'next_text' => esc_html__( 'Newer Comments', 'neodark' ),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="nd-comments-closed"><?php esc_html_e( 'Comments are closed.', 'neodark' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php comment_form(); ?>

</div>
