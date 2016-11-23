<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_topics_loop' ); ?>


<div id="content">
	<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="list-unstyled">
		<li>
		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>
			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>
		<?php endwhile; ?>
		</li>
	</ul>
</div>


<?php do_action( 'bbp_template_after_topics_loop' ); ?>
