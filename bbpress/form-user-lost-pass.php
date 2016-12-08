<?php

/**
 * User Lost Password Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

</div>
<div class="naslov text-center" style="background: <?php echo get_field('color', bbp_get_topic_forum_id()) ?>;">
    <div class="container">
        <h1><?php _e( 'Lost Password', 'bbpress' ); ?></h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

<form method="post" action="<?php bbp_wp_login_action( array( 'action' => 'lostpassword', 'context' => 'login_post' ) ); ?>" class="bbp-login-form">

        <div class="form-group">
				<input class="form-control" type="text" name="user_login" value="" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Username or Email', 'bbpress' ); ?>" />
		</div>

		<?php do_action( 'login_form', 'resetpass' ); ?>

        <div class="form-group text-right">

			<button type="submit" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="btn btn-danger"><?php _e( 'Reset My Password', 'bbpress' ); ?></button>

			<?php bbp_user_lost_pass_fields(); ?>

		</div>
</form>

        </div>
    </div>