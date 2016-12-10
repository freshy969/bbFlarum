<?php

/**
 * New/Edit Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( bbp_is_forum_edit() ) : ?>

    </div>
    <div class="naslov text-center" style="background: <?php echo get_field('color', bbp_get_topic_forum_id()) ?>;">
        <div class="container">
		<span class="tema_status">
		<?php do_action( 'bbp_theme_before_topic_title' ); ?>
		</span>
            <?php printf( __( '<span class="kategorija text-uppercase"><a style="color: %3$s;" href="%1$s">%2$s</a></span>', 'bbpress' ), bbp_get_forum_permalink( bbp_get_topic_forum_id() ), bbp_get_forum_title( bbp_get_topic_forum_id() ), get_field('color', bbp_get_topic_forum_id()) ); ?>
            <h1><?php printf( __( 'Now Editing &ldquo;%s&rdquo;', 'bbpress' ), bbp_get_forum_title() ); ?></h1>
            <p><?php bbp_single_forum_description( array( 'forum_id' => bbp_get_forum_id() ) ); ?></p>
        </div>
    </div>
    <div class="container">

<?php endif; ?>

<?php if ( bbp_current_user_can_access_create_forum_form() ) : ?>


        <?php if ( bbp_is_forum_edit() || is_page()  ) : ?>
		<form name="new-post" method="post" action="<?php the_permalink(); ?>" class="odgovori_forma">
            <?php else: ?>
            <form id="new-post" name="new-post" method="post" action="<?php the_permalink(); ?>" class="odgovori_forma">


            <?php endif; ?>
			<?php do_action( 'bbp_theme_before_forum_form' ); ?>

                <div class="naslovi">
                    <h3 class="text-uppercase"><div class="zatvori pull-right" style="margin-top: -1px;">&times;</div>
					<?php bbp_is_single_forum() ? printf( __( 'Create New Forum in &ldquo;%s&rdquo;', 'bbpress' ), bbp_get_forum_title() ) : _e( 'Create New Forum', 'bbpress' ); ?>
                </h3>
                    <hr>
                </div>


				<?php do_action( 'bbp_theme_before_forum_form_notices' ); ?>

				<?php if ( !bbp_is_forum_edit() && bbp_is_forum_closed() ) : ?>

                    <div class="alert alert-warning">
						<p><?php _e( 'This forum is closed to new content, however your account still allows you to do so.', 'bbpress' ); ?></p>
					</div>

				<?php endif; ?>

				<?php if ( current_user_can( 'unfiltered_html' ) ) : ?>

                    <div class="alert alert-success">
						<p><?php _e( 'Your account has the ability to post unrestricted HTML content.', 'bbpress' ); ?></p>
					</div>

				<?php endif; ?>

				<?php do_action( 'bbp_template_notices' ); ?>


                <div class="row">
                    <div class="form-group col-md-8">
                    <?php do_action( 'bbp_theme_before_forum_form_title' ); ?>
                    <input class="form-control" type="text" id="bbp_forum_title" value="<?php bbp_form_forum_title(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_forum_title" maxlength="<?php bbp_title_max_length(); ?>" placeholder="<?php printf( __( 'Forum Name (Maximum Length: %d):', 'bbpress' ), bbp_get_title_max_length() ); ?>" />
                    <?php do_action( 'bbp_theme_after_forum_form_title' ); ?>
                </div>

                    <div class="form-group col-md-4">
                        <?php do_action( 'bbp_theme_before_forum_form_type' ); ?>

                        <?php
                        bbp_form_forum_type_dropdown( array(
                            'selected'  => bbp_get_form_forum_parent(),
                        ) );
                        ?>
                        <?php do_action( 'bbp_theme_after_forum_form_type' ); ?>

                    </div>

                </div>


                <div class="form-group">
					<?php do_action( 'bbp_theme_before_forum_form_content' ); ?>
					<?php bbp_the_content( array( 'context' => 'forum' ) ); ?>
					<?php do_action( 'bbp_theme_after_forum_form_content' ); ?>
                </div>
					<?php if ( ! ( bbp_use_wp_editor() || current_user_can( 'unfiltered_html' ) ) ) : ?>

						<p class="form-allowed-tags">
							<label><?php _e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:','bbpress' ); ?></label><br />
							<code><?php bbp_allowed_tags(); ?></code>
						</p>

					<?php endif; ?>


					<?php do_action( 'bbp_theme_before_forum_form_status' ); ?>

                <div class="form-group">
						<label for="bbp_forum_status"><?php _e( 'Status:', 'bbpress' ); ?></label><br />
						<?php bbp_form_forum_status_dropdown(); ?>
					</div>

					<?php do_action( 'bbp_theme_after_forum_form_status' ); ?>

					<?php do_action( 'bbp_theme_before_forum_form_status' ); ?>

                    <div class="form-group">
						<label for="bbp_forum_visibility"><?php _e( 'Visibility:', 'bbpress' ); ?></label><br />
						<?php bbp_form_forum_visibility_dropdown(); ?>
                    </div>

					<?php do_action( 'bbp_theme_after_forum_visibility_status' ); ?>

					<?php do_action( 'bbp_theme_before_forum_form_parent' ); ?>

                <div class="form-group">
						<label for="bbp_forum_parent_id"><?php _e( 'Parent Forum:', 'bbpress' ); ?></label><br />

						<?php
							bbp_dropdown( array(
								'select_id' => 'bbp_forum_parent_id',
								'show_none' => __( '(No Parent)', 'bbpress' ),
								'selected'  => bbp_get_form_forum_parent(),
								'exclude'   => bbp_get_forum_id()
							) );
						?>
                </div>

					<?php do_action( 'bbp_theme_after_forum_form_parent' ); ?>

					<?php do_action( 'bbp_theme_before_forum_form_submit_wrapper' ); ?>

                <div class="form-group text-right">

						<?php do_action( 'bbp_theme_before_forum_form_submit_button' ); ?>

						<button type="submit" tabindex="<?php bbp_tab_index(); ?>" id="bbp_forum_submit" name="bbp_forum_submit" class="btn btn-danger"><?php _e( 'Submit', 'bbpress' ); ?></button>

						<?php do_action( 'bbp_theme_after_forum_form_submit_button' ); ?>

					</div>

					<?php do_action( 'bbp_theme_after_forum_form_submit_wrapper' ); ?>


				<?php bbp_forum_form_fields(); ?>


			<?php do_action( 'bbp_theme_after_forum_form' ); ?>

		</form>

<?php elseif ( bbp_is_forum_closed() ) : ?>

	<div id="no-forum-<?php bbp_forum_id(); ?>" class="bbp-no-forum">
        <div class="alert alert-warning">
			<p><?php printf( __( 'The forum &#8216;%s&#8217; is closed to new content.', 'bbpress' ), bbp_get_forum_title() ); ?></p>
		</div>
	</div>

<?php else : ?>

	<div id="no-forum-<?php bbp_forum_id(); ?>" class="bbp-no-forum">
        <div class="alert alert-warning">
			<p><?php is_user_logged_in() ? _e( 'You cannot create new forums.', 'bbpress' ) : _e( 'You must be logged in to create new forums.', 'bbpress' ); ?></p>
		</div>
	</div>

<?php endif; ?>

<?php if ( bbp_is_forum_edit() ) : ?>

</div>

<?php endif; ?>
