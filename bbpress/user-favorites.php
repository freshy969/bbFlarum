<?php

/**
 * User Favorites
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_favorites' ); ?>

<div class="naslovi">
	<h3 class="text-uppercase"><?php _e( 'Favorite Forum Topics', 'bbpress' ); ?></h3><hr>
</div>



			<?php if ( bbp_get_user_favorites() ) : ?>

				<?php bbp_get_template_part( 'loop',       'topics' ); ?>

				<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

			<?php else : ?>

				<p><?php bbp_is_user_home() ? _e( 'You currently have no favorite topics.', 'bbpress' ) : _e( 'This user has no favorite topics.', 'bbpress' ); ?></p>

			<?php endif; ?>


	<?php do_action( 'bbp_template_after_user_favorites' ); ?>
