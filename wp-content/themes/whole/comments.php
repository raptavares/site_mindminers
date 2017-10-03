<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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

	<?php if ( have_comments() ) : ?>
		
		<div class="comment-list-wrap box-blog">
			<h3 class="wg-title">
				<?php echo esc_html__('Comments', 'whole'); ?>
				<span class="line1"></span>
                <span class="line2"></span>
                <span class="line3"></span>
			</h3>

			<?php whole_comment_nav(); ?>

			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
					) );
				?>
			</ol><!-- .comment-list -->

			<?php whole_comment_nav(); ?>
		</div>

	<?php endif; // have_comments() ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'whole' ); ?></p>
	<?php endif; ?>

	<?php 
		$args = array(
				'id_form'           => 'commentform',
				'id_submit'         => 'submit',
				'title_reply'       => esc_html__( 'Leave A Reply', 'whole'),
				'title_reply_to'    => esc_html__( 'Leave A Reply To ', 'whole') . '%s',
				'cancel_reply_link' => esc_html__( 'Cancel Comment', 'whole'),
				'label_submit'      => esc_html__( 'Post Your Comment', 'whole'),
				'comment_notes_before' => '',
				'fields' => apply_filters( 'comment_form_default_fields', array(

						'author' =>
						'<div class="row"><div class="comment-form-author col-lg-4 col-md-4 col-sm-12 col-xs-12">'.
						'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
						'" size="30" placeholder="'.esc_html__('Name*', 'whole').'"/></div>',

						'email' =>
						'<div class="comment-form-email col-lg-4 col-md-4 col-sm-12 col-xs-12">'.
						'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						'" size="30" placeholder="'.esc_html__('Email*', 'whole').'"/></div>',

						'website' =>
						'<div class="comment-form-website col-lg-4 col-md-4 col-sm-12 col-xs-12">'.
						'<input id="website" name="website" type="text" value="" size="30" placeholder="'.esc_html__('Website', 'whole').'"/></div></div>',
				)
				),
				'comment_field' =>  '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_html__('Comment', 'whole').'" aria-required="true">' .
				'</textarea></div>',
		);
		comment_form($args); 
	?>

</div><!-- .comments-area -->
