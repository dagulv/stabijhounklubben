<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package staby
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

<div id="comments" class="comments-area">

	<?php

	

	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php echo esc_html(get_comment_count($post->ID)['approved']);?> Kommentarer
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'short_ping' => true,
					'callback' => 'staby_comment_list',
				)
			);
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		$comments_args = array(
			'fields' => array(
				'cookies' => '',
			), 
			'title_reply' => __( 'Lämna en kommentar', 'textdomain' ),
			'label_submit' => __( 'Skicka', 'textdomain' ),
			'comment_field' => '<textarea id="comment" name="comment" aria-required="true"></textarea>',
			'comment_notes_before' => '',
			'logged_in_as' => '',
		);
		comment_form( $comments_args );
		

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Kommentarer är inaktiverade.', 'staby' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().


	?>

</div><!-- #comments -->
