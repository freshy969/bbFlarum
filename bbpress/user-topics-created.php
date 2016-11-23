<?php

/**
 * User Topics Created
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_topics_created' ); ?>

<div class="naslovi">
	<h3 class="text-uppercase"><?php _e( 'Forum Topics Started', 'bbpress' ); ?></h3><hr>
</div>



			<?php if ( bbp_get_user_topics_started() ) : ?>

				<?php bbp_get_template_part( 'loop',       'topics' ); ?>

				<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

			<?php else : ?>

				<p><?php bbp_is_user_home() ? _e( 'You have not created any topics.', 'bbpress' ) : _e( 'This user has not created any topics.', 'bbpress' ); ?></p>

			<?php endif; ?>


	<?php do_action( 'bbp_template_after_user_topics_created' ); ?>
