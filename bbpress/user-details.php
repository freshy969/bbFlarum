<?php

/**
 * User Details
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_details' ); ?>

<div class="lista_kategorija">
	<ul class="list-unstyled">
				<li class="<?php if ( bbp_is_single_user_profile() ) :?>active<?php endif; ?>">
					<span class="vcard bbp-user-profile-link">
						<a class="url fn n" href="<?php bbp_user_profile_url(); ?>" title="<?php printf( esc_attr__( "%s's Profile", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>" rel="me"><i class="fa fa-user-o" aria-hidden="true"></i> <?php _e( 'Profile', 'bbpress' ); ?></a>
					</span>
				</li>

				<li class="<?php if ( bbp_is_single_user_topics() ) :?>active<?php endif; ?>">
					<span class='bbp-user-topics-created-link'>
						<a href="<?php bbp_user_topics_created_url(); ?>" title="<?php printf( esc_attr__( "%s's Topics Started", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php _e( 'Topics Started', 'bbpress' ); ?></a>
					</span>
				</li>

				<li class="<?php if ( bbp_is_single_user_replies() ) :?>active<?php endif; ?>">
					<span class='bbp-user-replies-created-link'>
						<a href="<?php bbp_user_replies_created_url(); ?>" title="<?php printf( esc_attr__( "%s's Replies Created", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php _e( 'Replies Created', 'bbpress' ); ?></a>
					</span>
				</li>

				<?php if ( bbp_is_favorites_active() ) : ?>
					<li class="<?php if ( bbp_is_favorites() ) :?>active<?php endif; ?>">
						<span class="bbp-user-favorites-link">
							<a href="<?php bbp_favorites_permalink(); ?>" title="<?php printf( esc_attr__( "%s's Favorites", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><i class="fa fa-star-o" aria-hidden="true"></i> <?php _e( 'Favorites', 'bbpress' ); ?></a>
						</span>
					</li>
				<?php endif; ?>

				<?php if ( bbp_is_user_home() || current_user_can( 'edit_users' ) ) : ?>

					<?php if ( bbp_is_subscriptions_active() ) : ?>
						<li class="<?php if ( bbp_is_subscriptions() ) :?>active<?php endif; ?>">
							<span class="bbp-user-subscriptions-link">
								<a href="<?php bbp_subscriptions_permalink(); ?>" title="<?php printf( esc_attr__( "%s's Subscriptions", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><i class="fa fa-eye" aria-hidden="true"></i> <?php _e( 'Subscriptions', 'bbpress' ); ?></a>
							</span>
						</li>
					<?php endif; ?>

					<li class="<?php if ( bbp_is_single_user_edit() ) :?>active<?php endif; ?>">
						<span class="bbp-user-edit-link">
							<a href="<?php bbp_user_profile_edit_url(); ?>" title="<?php printf( esc_attr__( "Edit %s's Profile", 'bbpress' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php _e( 'Edit', 'bbpress' ); ?></a>
						</span>
					</li>

				<?php endif; ?>

			</ul>
	</div>

	<?php do_action( 'bbp_template_after_user_details' ); ?>
