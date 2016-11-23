<?php

/**
 * User Replies Created
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_replies' ); ?>
<div class="naslovi">
	<h3 class="text-uppercase"><?php _e( 'Forum Replies Created', 'bbpress' ); ?></h3><hr>
</div>


			<?php if ( bbp_get_user_replies_created() ) : ?>

				<?php bbp_get_template_part( 'loop',       'replies' ); ?>

				<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

			<?php else : ?>

				<p><?php bbp_is_user_home() ? _e( 'You have not replied to any topics.', 'bbpress' ) : _e( 'This user has not replied to any topics.', 'bbpress' ); ?></p>

			<?php endif; ?>


	<?php do_action( 'bbp_template_after_user_replies' ); ?>
