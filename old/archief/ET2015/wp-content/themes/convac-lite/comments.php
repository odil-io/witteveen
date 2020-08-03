<?php
/**
 * The template for displaying Comments.
 * The area of the page that contains comments and the comment form.
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

<!-- You can start editing here. -->

<div id="commentsbox">
<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number(__('No Comment','convac-lite'), __('One Comment','convac-lite'), __('% Comments','convac-lite') );?><?php esc_html_e(' so far:','convac-lite'); ?></h3>
	<ol class="commentlist">
		<?php wp_list_comments(array('avatar_size' => 77)); ?>
	</ol>

	<div class="comment-nav">
		<div class="alignleft">
			<?php previous_comments_link() ?>
		</div>

		<div class="alignright">
			<?php next_comments_link() ?>
		</div>
	</div>

<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( ! comments_open() && ! is_page() ) : ?>
		<?php esc_html_e('Comments are closed.','convac-lite'); ?>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<div id="comment-form">
		<?php comment_form(); ?>
	</div>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>