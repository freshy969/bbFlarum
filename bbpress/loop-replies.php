<?php

/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_replies_loop' ); ?>

<div id="content">
<ul id="topic-<?php bbp_topic_id(); ?>-replies" class="load list-unstyled">
	<li>
		<?php if ( bbp_thread_replies() ) : ?>
			<?php bbp_list_replies(); ?>
		<?php else : ?>
			<?php while ( bbp_replies() ) : bbp_the_reply(); ?>
				<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</li>
</ul>
</div>

<?php do_action( 'bbp_template_after_replies_loop' ); ?>
