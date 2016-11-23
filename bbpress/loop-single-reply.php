<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="post-<?php bbp_reply_id(); ?>" class="load">

	<div class="odgovori">
		<div class="row">

			<div class="col-md-1">

				<div class="avatar">
					<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>
					<?php bbp_reply_author_link( array( 'type' => 'avatar', 'size' => 60 ) ); ?>
					<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>
				</div>
				</div>

			<div class="col-md-11">

				<div class="funkcije pull-right">

					<?php if ( is_user_logged_in() ) : ?>

						<?php if ( bbp_is_topic(bbp_get_reply_id()) ) : ?>
							<bottom class="btn btn-sm btn-default"><?php bbp_topic_subscription_link(); ?></bottom>
							<!--								<bottom data-toggle="tooltip" data-placement="bottom" title="Reply to topic" class="btn btn-sm btn-danger">--><?php //echo bbp_get_topic_reply_link(); ?><!--</bottom>-->
						<?php endif; ?>
						<?php if ( bbp_is_single_user_replies() ) :?>

						<?php else: ?>
							<?php if ( bbp_is_reply(bbp_get_reply_id()) ) : ?>
								<bottom class="btn btn-sm btn-default"><?php echo bbp_get_reply_to_link(); ?></bottom>
							<?php endif; ?>
						<?php endif; ?>

							<?php if ( bbp_get_topic_author_id() == bbp_get_current_user_id() || bbp_get_reply_author_id() == bbp_get_current_user_id() || current_user_can('administrator') ) : ?>
								<div class="btn-group">
									<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
									<ul class="dropdown-menu pull-right" role="menu">
										<?php if ( bbp_is_topic(bbp_get_reply_id())) : ?>
											<li><?php echo bbp_get_topic_edit_link(); ?></li>
 											<li><?php echo bbp_get_topic_stick_link(); ?></li>
											<li><?php echo bbp_get_topic_close_link(); ?></li>
											<li><?php echo bbp_get_topic_trash_link(); ?></li>
										<?php endif; ?>
										<?php if ( bbp_is_reply(bbp_get_reply_id())) : ?>
											<li><?php echo bbp_get_reply_edit_link(); ?></li>
											<li><?php echo bbp_get_reply_move_link(); ?></li>
											<li><?php echo bbp_get_reply_trash_link(); ?></li>
										<?php endif; ?>
									</ul>
								</div>
							<?php endif; ?>

					<?php endif; ?>
				</div>

				<div class="poruka">

				<span class="ime">
						<?php bbp_reply_author_link( array( 'type' => 'name' ) ); ?>
				</span>

					<span class="vreme"> pre <?php bbp_reply_post_date(0, true); ?></span>


					<div class="tekst">
						<?php do_action( 'bbp_theme_before_reply_content' ); ?>
						<?php bbp_reply_content(); ?>
						<?php do_action( 'bbp_theme_after_reply_content' ); ?>

					</div>
				</div>

			</div>
		</div>
	</div>

</div>
