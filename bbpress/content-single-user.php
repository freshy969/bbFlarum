<?php

/**
 * Single User Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

</div>
	<div class="naslov">
		<div class="container">
			<div class="pull-left">
			<a class="img-responsive avatar" href="<?php bbp_user_profile_url(); ?>" title="<?php bbp_displayed_user_field( 'display_name' ); ?>" rel="me">
				<?php echo get_avatar( bbp_get_displayed_user_field( 'user_email', 'raw' ), apply_filters( 'bbp_single_user_details_avatar_size', 100 ) ); ?>
			</a>
			</div>
<!--			<bottom class="btn btn-default pull-right" style="margin-top:10px;">-->
<!--				--><?php // printf( __( '%s', 'bbpress' ), bbp_get_user_display_role() ); ?>
<!--			</bottom>-->
			<h1><?php bbp_displayed_user_field( 'display_name' ); ?></h1>
            <?php if ( bbp_get_displayed_user_field( 'description' ) ) : ?>
			<p><?php bbp_displayed_user_field( 'description' ); ?></p>
            <?php endif; ?>
            <p>
                <a href="mailto:<?php bbp_displayed_user_field( 'user_email' ); ?>" title="<?php _e( 'Email', 'bbpress' ); ?>" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-lg fa-envelope-o" aria-hidden="true"></i></a>
                <a href="<?php bbp_displayed_user_field( 'user_url' ); ?>" title="<?php _e( 'Website', 'bbpress' ); ?>" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-lg fa-globe" aria-hidden="true"></i></a>

            </p>
		</div>
		</div>

<div class="container">
	<div class="row">

		<div class="col-md-2">

			<div class="naslovi">
				<h3 class="text-uppercase"><?php _e( 'Menus', 'bbpress' ); ?></h3><hr>
			</div>

			<?php bbp_get_template_part( 'user', 'details' ); ?>
		</div>

		<div class="col-md-10">
			<?php do_action( 'bbp_template_notices' ); ?>
			<?php if ( bbp_is_favorites()                 ) bbp_get_template_part( 'user', 'favorites'       ); ?>
			<?php if ( bbp_is_subscriptions()             ) bbp_get_template_part( 'user', 'subscriptions'   ); ?>
			<?php if ( bbp_is_single_user_topics()        ) bbp_get_template_part( 'user', 'topics-created'  ); ?>
			<?php if ( bbp_is_single_user_replies()       ) bbp_get_template_part( 'user', 'replies-created' ); ?>
			<?php if ( bbp_is_single_user_edit()          ) bbp_get_template_part( 'form', 'user-edit'       ); ?>
			<?php if ( bbp_is_single_user_profile()       ) bbp_get_template_part( 'user', 'profile'         ); ?>
		</div>

</div>
