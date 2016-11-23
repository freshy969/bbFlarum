<?php

/**
 * Single View Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

		<div class="row">

			<div class="col-md-2">
				<div class="lista_kategorija">

					<a class="btn btn-danger btn-block zapocni-temu" href="<?php echo esc_url( home_url(bbp_get_root_slug(). '/view/no-replies')); ?>/#new-post "><?php _e( 'Create New Topic', 'bbpress' ); ?></a>

					<ul class="list-unstyled" style="margin-top: 30px;">
                    <li <?php if ( is_archive('forum')) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url(bbp_get_root_slug())); ?>"><i class="fa fa-comments-o"></i> <?php _e( 'All Topics', 'bbpress' ); ?></a></li>
                    <li <?php if ( bbp_is_single_view()) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/no-replies')); ?>"><i class="fa fa-comment-o"></i> <?php _e( 'No Replies', 'bbpress' ); ?></a></li>
					</ul>


					<ul class="list-unstyled">
						<?php query_posts(array(
							'post_type' => bbp_get_forum_post_type(),
							'orderby' => 'menu_order',
							'order' => 'asc',
						));
						if (have_posts()) : while (have_posts()) : the_post(); ?>
							<li><span class="kategorija" style="background: <?php echo get_field("color"); ?>"> </span><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</ul>
				</div>
			</div>

			<div class="col-md-10">

				<div class="izaberi">
					<div class="btn-group text-left" role="group">
						<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><?php _e( 'View', 'bbpress' ); ?> <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="<?php echo bbp_get_user_profile_url( get_current_user_id() ); ?>favorites/"> <?php _e( 'Favorites', 'bbpress' ); ?></a></li>
							<li><a href="<?php echo bbp_get_user_profile_url( get_current_user_id() ); ?>subscriptions/"> <?php _e( 'Subscriptions', 'bbpress' ); ?></a></li>
						</ul>
					</div>
					<div class="pull-right">
						<a class="btn btn-default" href="#" role="button" onclick="location.reload(true); return false;"><i class="fa fa-refresh" aria-hidden="true"></i></a>
					</div>
				</div>

				<?php bbp_set_query_name( bbp_get_view_rewrite_id() ); ?>

				<?php if ( bbp_view_query() ) : ?>

					<?php bbp_get_template_part( 'loop',       'topics'    ); ?>

					<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>

				<?php else : ?>

					<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

				<?php endif; ?>

				<?php bbp_reset_query_name(); ?>

			</div>

		</div>

<?php bbp_get_template_part( 'form',       'topic'     ); ?>

