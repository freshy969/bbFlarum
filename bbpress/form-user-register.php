<?php

/**
 * User Registration Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
</div>
<div class="naslov text-center" style="background: <?php echo get_field('color', bbp_get_topic_forum_id()) ?>;">
    <div class="container">
        <h1><?php _e( 'Create an Account', 'bbpress' ); ?></h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">

		<div class="alert alert-warning">
			<p><?php _e( 'Your username must be unique, and cannot be changed later.', 'bbpress' ) ?></p>
			<p><?php _e( 'We use your email address to email you a secure password and verify your account.', 'bbpress' ) ?></p>
		</div>

		<div class="form-group">
			<input class="form-control" type="text" name="user_login" value="<?php bbp_sanitize_val( 'user_login' ); ?>" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Username', 'bbpress' ); ?>" />
		</div>

		<div class="form-group">
			<input class="form-control" type="text" name="user_email" value="<?php bbp_sanitize_val( 'user_email' ); ?>" size="20" id="user_email" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Email', 'bbpress' ); ?>" />
		</div>

		<?php do_action( 'register_form' ); ?>

		<div class="form-group text-right">

			<button type="submit" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="btn btn-success"><?php _e( 'Register', 'bbpress' ); ?></button>

			<?php bbp_user_register_fields(); ?>

		</div>
</form>
        </div>
    </div>
