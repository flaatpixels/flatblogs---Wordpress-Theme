<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package flatblogs
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

	function flatblogs_comments_callback( $comment, $args, $depth ) {
	    $GLOBALS['comment'] = $comment;
	 
	    ?>
	    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	        <article id="comment-<?php comment_ID(); ?>">
	 					<div class="comment-data">	
	 						<div class="comment-avatar">
	 							<?= get_avatar($comment->comment_author_email); ?>
	 						</div>
	            <div class="comment-content">
	            	<div class="comment-metadata">
	            		<span class="__name"><?= $comment->comment_author; ?></span><span><?= $comment->comment_date; ?></span>
	            	</div>
	            	<div><?php comment_text(); ?></div>
	            </div>
	          </div>
	
            <div class="reply">
                <?= preg_replace( '/comment-reply-link/', 'comment-reply-link ' . 'btn-primary', get_comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Répondre <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) )); ?>
            </div>
	        </article>
	    </li>
	    <?php
	}
	 
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<!--<h2 class="comments-title">
			<?php
			$flatblogs_comment_count = get_comments_number();
			if ( '1' === $flatblogs_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'flatblogs' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $flatblogs_comment_count, 'comments title', 'flatblogs' ) ),
					number_format_i18n( $flatblogs_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2>--><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'callback' => 'flatblogs_comments_callback'
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'flatblogs' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();

	?>

</div><!-- #comments -->
