<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="post-<?php bbp_reply_id(); ?>" class="load prvi_odgovor">

	<div class="odgovori">
		<div class="row">

			<div class="col-md-1 col-xs-2">

				<div class="avatar">
					<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>
					<?php bbp_reply_author_link( array( 'type' => 'avatar', 'size' => 60 ) ); ?>
					<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>
				</div>
				</div>

			<div class="col-md-11 col-xs-10">

				<?php if ( is_user_logged_in() ) : ?>

				<div class="funkcije pull-right">

						<?php if ( bbp_is_topic(bbp_get_reply_id()) ) : ?>
							<bottom class="btn btn-sm btn-default"><?php bbp_topic_subscription_link(); ?></bottom>
						<?php endif; ?>

					<?php if ( bbp_is_reply(bbp_get_reply_id() ) ) : ?>
							<?php if ( bbp_get_reply_author_id() == bbp_get_current_user_id() ) : ?>
							<?php else: ?>
								<bottom class="btn btn-sm btn-default"><?php echo bbp_get_reply_to_link(); ?></bottom>
							<?php endif; ?>
						<?php endif; ?>


									<div class="btn-group">
									<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
									<ul class="dropdown-menu pull-right" role="menu">
										<li><?php $args = array('before' => '<li>', 'sep' => '', 'after' => '</li>'); bbp_reply_admin_links( $args ); ?></li>
									</ul>
									</div>

				</div>

				<?php endif; ?>


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
