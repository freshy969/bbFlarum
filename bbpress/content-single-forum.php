<?php

/**
 * Single Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

</div>
<?php printf( __( '<div class="naslov text-center" style="background: %3$s;">', 'bbpress' ), bbp_get_forum_permalink( bbp_get_topic_forum_id() ), bbp_get_forum_title( bbp_get_topic_forum_id() ), get_field('color', bbp_get_topic_forum_id()) ); ?>
<div class="container">
	<h1><?php echo bbp_get_topic_title(); ?></h1>
	<p><?php bbp_forum_content(); ?></p>
</div>
</div>

<div class="container">

	<div class="row">

		<div class="col-md-2">
			<div class="lista_kategorija">

				<a class="btn btn-danger btn-block zapocni-temu" href="<?php echo esc_url( bbp_get_forum_permalink()); ?>#new-post "><?php _e( 'Create New Topic', 'bbpress' ); ?></a>

				<ul class="list-unstyled" style="margin-top: 30px;">
					<li <?php if ( is_archive('forum')) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url(bbp_get_root_slug())); ?>"><i class="fa fa-comments-o"></i> <?php _e( 'All Topics', 'bbpress' ); ?></a></li>
					<li <?php if ( bbp_is_single_view()) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/no-replies')); ?>"><i class="fa fa-comment-o"></i> <?php _e( 'Topics with no replies', 'bbpress' ); ?></a></li>
				</ul>

				<ul class="list-unstyled">
					<?php $this_post = $post->ID; ?>
					<?php query_posts(array(
						'post_type' => bbp_get_forum_post_type(),
						'orderby' => 'menu_order',
						'order' => 'asc',
					));
					if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li <?php if( $this_post == $post->ID ) { echo ' class="active"'; } ?>><span class="kategorija" style="background: <?php echo get_field("color"); ?>"> </span><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</ul>

			</div>
		</div>

		<div class="col-md-10">

                <div class="izaberi">
                <div class="btn-group" role="group">
                    <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><?php _e( 'View', 'bbpress' ); ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo bbp_get_user_profile_url( bbp_get_current_user_id() ); ?>favorites/"> <?php _e( 'Favorites', 'bbpress' ); ?></a></li>
                        <li><a href="<?php echo bbp_get_user_profile_url( bbp_get_current_user_id() ); ?>subscriptions/"> <?php _e( 'Subscriptions', 'bbpress' ); ?></a></li>
                    </ul>
                </div>
                <div class="pull-right">
                <a class="btn btn-default" href="#" role="button" onclick="location.reload(true); return false;"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>
                    </div>

			<?php do_action( 'bbp_template_before_single_forum' ); ?>

			<?php if ( post_password_required() ) : ?>

				<?php bbp_get_template_part( 'form', 'protected' ); ?>

			<?php else : ?>

				<?php if ( !bbp_is_forum_category() && bbp_has_topics() ) : ?>

					<?php bbp_get_template_part( 'loop',       'topics'    ); ?>

					<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>

				<?php elseif ( !bbp_is_forum_category() ) : ?>

					<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>


				<?php endif; ?>

			<?php endif; ?>

			<?php do_action( 'bbp_template_after_single_forum' ); ?>

		</div>

	</div>

<?php bbp_get_template_part( 'form',       'topic'     ); ?>
