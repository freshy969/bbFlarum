<?php

/**
 * User Login Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

</div>
<div class="naslov text-center" style="background: <?php echo get_field('color', bbp_get_topic_forum_id()) ?>;">
    <div class="container">
        <h1><?php _e( 'Log In', 'bbpress' ); ?></h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">

                <div class="form-group">
                    <input class="form-control" type="text" name="log" value="<?php bbp_sanitize_val( 'user_login', 'text' ); ?>" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Username', 'bbpress' ); ?>" />
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="pwd" value="<?php bbp_sanitize_val( 'user_pass', 'password' ); ?>" size="20" id="user_pass" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Password', 'bbpress' ); ?>" />
                </div>

                <div class="form-group">
                    <input type="checkbox" name="rememberme" value="forever" <?php checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ); ?> id="rememberme" tabindex="<?php bbp_tab_index(); ?>"  checked>
                    <?php _e( 'Keep me signed in', 'bbpress' ); ?>
                </div>

                <?php do_action( 'login_form' ); ?>

                <div class="form-group text-right">

                    <button type="submit" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="btn btn-default"><?php _e( 'Log In', 'bbpress' ); ?></button>

                    <?php bbp_user_login_fields(); ?>

                </div>
            </form>

        </div>
    </div>