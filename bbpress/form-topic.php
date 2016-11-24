<?php

/**
 * New/Edit Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

?>



<?php if ( bbp_is_topic_edit() ) : ?>

</div>
<?php printf( __( '<div class="naslov text-center" style="background: %3$s;">', 'bbpress' ), bbp_get_forum_permalink( bbp_get_topic_forum_id() ), bbp_get_forum_title( bbp_get_topic_forum_id() ), get_field('color', bbp_get_topic_forum_id()) ); ?>
<div class="container">
		<span class="tema_status">
		<?php do_action( 'bbp_theme_before_topic_title' ); ?>
		</span>
	<?php printf( __( '<span class="kategorija text-uppercase"><a style="color: %3$s;" href="%1$s">%2$s</a></span>', 'bbpress' ), bbp_get_forum_permalink( bbp_get_topic_forum_id() ), bbp_get_forum_title( bbp_get_topic_forum_id() ), get_field('color', bbp_get_topic_forum_id()) ); ?>
	<h1><?php echo bbp_get_topic_title(); ?></h1>
</div>
</div>

<div class="container">

<!--				<div class="naslovi" style="margin-top: 30px;">-->
<!--					<h3 class="text-uppercase">Oznake</h3><hr>-->
<!--					<span class="oznake">-->
<!--					--><?php //$args = array(
//					'before' => '',
//					'sep' => '',
//					'after' => ''
//				);
//				bbp_topic_tag_list( '', $args ); ?>
<!--				</span>-->
<!--				</div>-->
<!---->
<!--	--><?php //bbp_topic_tag_list( bbp_get_topic_id() ); ?>
<!---->
<!--	--><?php //bbp_single_topic_description( array( 'topic_id' => bbp_get_topic_id() ) ); ?>

<?php endif; ?>

<?php if ( bbp_current_user_can_publish_topics() ) : ?>

	<?php if ( bbp_is_topic_edit() ) : ?>
	<form name="new-post" method="post" action="<?php the_permalink(); ?>"  class="odgovori_forma">
	<?php else: ?>
		<form id="new-post" name="new-post" method="post" action="<?php the_permalink(); ?>"  class="odgovori_forma">
	<?php endif; ?>
		<?php do_action( 'bbp_theme_before_topic_form' ); ?>

		<?php do_action( 'bbp_theme_before_topic_form_notices' ); ?>

		<?php if ( !bbp_is_topic_edit() && bbp_is_forum_closed() ) : ?>

			<div class="alert alert-warning">
				<p><?php _e( 'This forum is marked as closed to new topics, however your posting capabilities still allow you to do so.', 'bbpress' ); ?></p>
			</div>

		<?php endif; ?>

		<?php if ( current_user_can( 'unfiltered_html' ) ) : ?>

			<div class="alert alert-success">
				<p><?php _e( 'Your account has the ability to post unrestricted HTML content.', 'bbpress' ); ?></p>
			</div>

		<?php endif; ?>

		<?php do_action( 'bbp_template_notices' ); ?>

		<?php bbp_get_template_part( 'form', 'anonymous' ); ?>

		<?php do_action( 'bbp_theme_before_topic_form_title' ); ?>
		<div class="row">
		<div class="form-group col-md-8">
				<input placeholder="Naslov teme (najveća moguća dužina: 80)" class="form-control" type="text" id="bbp_topic_title" value="<?php bbp_form_topic_title(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_title" maxlength="<?php bbp_title_max_length(); ?>" />
			</div>

			<?php if ( !bbp_is_single_forum() ) : ?>
			<?php do_action( 'bbp_theme_before_topic_form_forum' ); ?>
			<div class="form-group col-md-4">
				<?php
				bbp_dropdown( array(
					'selected'  => bbp_get_form_topic_forum(),
				) );
				?>
			</div>
			<?php do_action( 'bbp_theme_after_topic_form_forum' ); ?>

		<?php endif; ?>
		</div>

		<?php do_action( 'bbp_theme_after_topic_form_title' ); ?>

		<?php do_action( 'bbp_theme_before_topic_form_content' ); ?>
		<div class="form-group">
			<?php bbp_the_content( array( 'context' => 'topic' ) ); ?>
		</div>
		<?php do_action( 'bbp_theme_after_topic_form_content' ); ?>

		<?php if ( ! ( bbp_use_wp_editor() || current_user_can( 'unfiltered_html' ) ) ) : ?>

			<p class="form-allowed-tags">
				<label><?php _e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:','bbpress' ); ?></label><br />
				<code><?php bbp_allowed_tags(); ?></code>
			</p>

		<?php endif; ?>

		<?php if ( bbp_allow_topic_tags() && current_user_can( 'assign_topic_tags' ) ) : ?>

			<?php do_action( 'bbp_theme_before_topic_form_tags' ); ?>

			<div class="form-group">
				<label for="bbp_topic_tags"><?php _e( 'Topic Tags:', 'bbpress' ); ?></label><br />
				<input type="text" value="<?php bbp_form_topic_tags(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_tags" id="bbp_topic_tags" <?php disabled( bbp_is_topic_spam() ); ?> class="form-control" />
			</div>

			<?php do_action( 'bbp_theme_after_topic_form_tags' ); ?>

		<?php endif; ?>

		<?php if ( current_user_can( 'moderate' ) ) : ?>
			<div class="row">
				<?php do_action( 'bbp_theme_before_topic_form_type' ); ?>
				<div class="col-md-6 form-group">

					<label for="bbp_stick_topic"><?php _e( 'Topic Type:', 'bbpress' ); ?></label><br />

					<?php bbp_form_topic_type_dropdown(); ?>

				</div>

				<?php do_action( 'bbp_theme_after_topic_form_type' ); ?>

				<?php do_action( 'bbp_theme_before_topic_form_status' ); ?>

				<div class="col-md-6 form-group">

					<label for="bbp_topic_status"><?php _e( 'Topic Status:', 'bbpress' ); ?></label><br />

					<?php bbp_form_topic_status_dropdown(); ?>

				</div>
			</div>

			<?php do_action( 'bbp_theme_after_topic_form_status' ); ?>

		<?php endif; ?>

		<?php if ( bbp_is_subscriptions_active() && !bbp_is_anonymous() && ( !bbp_is_topic_edit() || ( bbp_is_topic_edit() && !bbp_is_topic_anonymous() ) ) ) : ?>

			<?php do_action( 'bbp_theme_before_topic_form_subscriptions' ); ?>

			<p>
				<input name="bbp_topic_subscription" id="bbp_topic_subscription" type="checkbox" value="bbp_subscribe" <?php bbp_form_topic_subscribed(); ?> tabindex="<?php bbp_tab_index(); ?>" />

				<?php if ( bbp_is_topic_edit() && ( bbp_get_topic_author_id() !== bbp_get_current_user_id() ) ) : ?>

					<label for="bbp_topic_subscription"><?php _e( 'Notify the author of follow-up replies via email', 'bbpress' ); ?></label>

				<?php else : ?>

					<?php _e( 'Notify me of follow-up replies via email', 'bbpress' ); ?>

				<?php endif; ?>
			</p>

			<?php do_action( 'bbp_theme_after_topic_form_subscriptions' ); ?>

		<?php endif; ?>

		<?php if ( bbp_allow_revisions() && bbp_is_topic_edit() ) : ?>

			<?php do_action( 'bbp_theme_before_topic_form_revisions' ); ?>
			<div class="form-group">
					<input name="bbp_log_topic_edit" id="bbp_log_topic_edit" type="checkbox" value="1" <?php bbp_form_topic_log_edit(); ?> tabindex="<?php bbp_tab_index(); ?>" />
					<?php _e( 'Keep a log of this edit:', 'bbpress' ); ?>
			</div>
				<div class="form-group">
					<label for="bbp_topic_edit_reason"><?php printf( __( 'Optional reason for editing:', 'bbpress' ), bbp_get_current_user_name() ); ?></label><br />
					<input type="text" value="<?php bbp_form_topic_edit_reason(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_edit_reason" id="bbp_topic_edit_reason" class="form-control" />
				</div>

			<?php do_action( 'bbp_theme_after_topic_form_revisions' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_topic_form_submit_wrapper' ); ?>

		<div class="form-group  text-right">

			<?php do_action( 'bbp_theme_before_topic_form_submit_button' ); ?>
			<hr>
			<button type="submit" tabindex="<?php bbp_tab_index(); ?>" id="bbp_topic_submit" name="bbp_topic_submit" class="btn btn-danger"><?php _e( 'Submit', 'bbpress' ); ?></button>

			<?php do_action( 'bbp_theme_after_topic_form_submit_button' ); ?>

		</div>

		<?php do_action( 'bbp_theme_after_topic_form_submit_wrapper' ); ?>


		<?php bbp_topic_form_fields(); ?>


		<?php do_action( 'bbp_theme_after_topic_form' ); ?>


	</form>

<?php elseif ( bbp_is_forum_closed() ) : ?>

	<div id="no-topic-<?php bbp_topic_id(); ?>" class="bbp-no-topic">
		<div class="alert alert-warning">
			<p><?php printf( __( 'The forum &#8216;%s&#8217; is closed to new topics and replies.', 'bbpress' ), bbp_get_forum_title() ); ?></p>
		</div>
	</div>

<?php else : ?>

<!--	<div id="no-topic---><?php //bbp_topic_id(); ?><!--" class="bbp-no-topic">-->
<!--		<div class="alert alert-warning">-->
<!--			<p>--><?php //is_user_logged_in() ? _e( 'You cannot create new topics.', 'bbpress' ) : _e( 'You must be logged in to create new topics.', 'bbpress' ); ?><!--</p>-->
<!--		</div>-->
<!--	</div>-->

<?php endif; ?>

<?php if ( !bbp_is_single_forum() ) : ?>

<?php endif; ?>
