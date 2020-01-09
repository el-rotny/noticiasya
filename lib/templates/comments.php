<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" role="tablist" aria-multiselectable="true">
	<div class="comments-heading" role="tab" id="headingOne">
		<a data-toggle="collapse" data-parent="#comments" href="#comment-cotnent" aria-expanded="true" aria-controls="#comment-cotnent">

			<h2 class="comments-title">
				<?php
				$comment_count = get_comments_number();
				// if ( '1' === $comment_count ) {
				// 	printf(
				// 		/* translators: 1: title. */
				// 		esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'NoticiasYa' ),
				// 		'<span>' . get_the_title() . '</span>'
				// 	);
				// } else {
				// 	printf( // WPCS: XSS OK.
				// 		/* translators: 1: comment count number, 2: title. */
				// 		esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'NoticiasYa' ) ),
				// 		number_format_i18n( $comment_count ),
				// 		'<span>' . get_the_title() . '</span>'
				// 	);
				// }
				?>
				<?php echo $comment_count ?> Commentarios
			</h2><!-- .comments-title -->
		</a>
	</div>
	<div id="comment-cotnent" class="comments-area collapse" role="tabpanel" aria-labelledby="headingOne">
		<?php #$comment_count = get_comments_number(); echo $comment_count;
		?>

		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
			?>

			<?php # the_comments_navigation(); ?>

			<ol class="comment-list">
				<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'per_page' => 10
				) );
				?>
			</ol><!-- .comment-list -->

			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'NoticiasYa' ); ?></p>
				<?php
			endif;

		endif; // Check for have_comments().

		comment_form();
		?>

	</div><!-- #comments -->
	<div class="comments__toggle" id="comments__toggle">
		<a class="btn btn--black" data-toggle="collapse" data-parent="#accordion" href="#comments" aria-expanded="true" aria-controls="comments">
			Leave a comment </a>
	<div>
</div>
