<?php

/**
 * Single View Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

		<div class="row">

			<div class="col-md-12 hidden-md hidden-lg">
				<a class="btn btn-danger zapocni-temu pull-left" style="background:<?php echo get_field('color', bbp_get_topic_forum_id()) ?>; border-color:<?php echo get_field('color', bbp_get_topic_forum_id()) ?>;" href="<?php echo esc_url( bbp_get_forum_permalink()); ?>#new-post "><?php _e( 'Create New Topic', 'bbpress' ); ?></a>
				<form role="search" method="get" id="bbp-searchform" action="<?php echo esc_url( home_url(bbp_get_root_slug()) ); ?>" class="pretraga pull-right">
					<div class="form-group has-feedback has-feedback-left">
						<input data-toggle="tooltip" data-placement="top" title="<?php _e( 'Search', 'bbpress' ); ?>" type="text" name="ts" id="ts" style="width: 100%" class="form-control">
						<span class="fa fa-search form-control-feedback" aria-hidden="true"></span>
					</div>
				</form>
			</div>

			<div class="col-md-2 hidden-xs hidden-sm">
				<div class="lista_kategorija">

					<a class="btn btn-danger btn-block zapocni-temu" href="<?php echo esc_url( home_url(bbp_get_root_slug(). '/view/no-replies')); ?>/#new-post "><?php _e( 'Create New Topic', 'bbpress' ); ?></a>

					<ul class="list-unstyled" style="margin-top: 30px;">
                    <li <?php if ( is_archive('forum')) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url(bbp_get_root_slug())); ?>"><i class="fa fa-comments-o"></i> <?php _e( 'All Topics', 'bbpress' ); ?></a></li>
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

			<div class="col-md-10 col-xs-12 col-sm-12">

				<div class="row">
					<div class="col-md-12">
				<div class="izaberi">
					<div class="btn-group text-left" role="group">
						<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><?php _e( 'View', 'bbpress' ); ?> <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/popular')); ?>"> <?php _e( 'Most popular topics', 'bbpress' ); ?></a></li>
							<li><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/no-replies')); ?>"> <?php _e( 'Topics with no replies', 'bbpress' ); ?></a></li>
						</ul>
					</div>
					<div class="pull-right">
						<a class="btn btn-default" href="#" role="button" onclick="location.reload(true); return false;"><i class="fa fa-refresh" aria-hidden="true"></i></a>
					</div>
				</div>
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

