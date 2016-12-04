<?php

/**
 * Anonymous User
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( bbp_current_user_can_access_anonymous_user_form() ) : ?>

	<?php do_action( 'bbp_theme_before_anonymous_form' ); ?>

    <div class="naslovi">
        <h3 class="text-uppercase"><?php ( bbp_is_topic_edit() || bbp_is_reply_edit() ) ? _e( 'Author Information', 'bbpress' ) : _e( 'Your information:', 'bbpress' ); ?></h3><hr>
    </div>


		<?php do_action( 'bbp_theme_anonymous_form_extras_top' ); ?>

		<div class="form-group">
            <?php _e( 'Name (required):', 'bbpress' ); ?>
			<input class="form-control" type="text" id="bbp_anonymous_author"  value="<?php bbp_author_display_name(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_anonymous_name" />
		</div>

        <div class="form-group">
            <?php _e( 'Mail (will not be published) (required):', 'bbpress' ); ?>
			<input class="form-control" type="text" id="bbp_anonymous_email"   value="<?php bbp_author_email(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_anonymous_email" />
        </div>

        <div class="form-group">
            <?php _e( 'Website:', 'bbpress' ); ?>
			<input class="form-control" type="text" id="bbp_anonymous_website" value="<?php bbp_author_url(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_anonymous_website" />
        </div>

		<?php do_action( 'bbp_theme_anonymous_form_extras_bottom' ); ?>


	<?php do_action( 'bbp_theme_after_anonymous_form' ); ?>

<?php endif; ?>
