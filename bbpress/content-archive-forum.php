<?php

/**
 * Archive Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<div class="row">

        <div class="col-md-2 hidden-xs hidden-sm">
            <div class="lista_kategorija">

            <a class="btn btn-danger btn-block zapocni-temu" href="#new-post "><?php _e( 'Create New Topic', 'bbpress' ); ?></a>
            <ul class="list-unstyled" style="margin-top: 30px;">
                <li <?php if ( is_archive('forum')) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url(bbp_get_root_slug())); ?>"><i class="fa fa-th-large" aria-hidden="true"></i> <?php _e( 'All Forums', 'bbpress' ); ?></a></li>
            </ul>

            <ul class="list-unstyled">
                <li><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/popular')); ?>"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php _e( 'Most popular topics', 'bbpress' ); ?></a></li>
                <li><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/no-replies')); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php _e( 'Topics with no replies', 'bbpress' ); ?></a></li>
            </ul>
            </div>

        </div>

        <div class="col-md-10 col-xs-12 col-sm-12">

            <div class="row">
                <div class="col-md-12">

                    <div class="izaberi">

                        <?php if (is_user_logged_in()) : ?>
                            <a class="btn btn-danger zapocni-temu  hidden-md hidden-lg" data-toggle="tooltip" data-placement="top" title="<?php _e( 'Create New Topic', 'bbpress' ); ?>" href="<?php echo esc_url( home_url(bbp_get_root_slug())); ?>/#new-post "><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <div class="btn-group" role="group">
                            <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><?php _e( 'View', 'bbpress' ); ?> <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/popular')); ?>"> <?php _e( 'Most popular topics', 'bbpress' ); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/no-replies')); ?>"> <?php _e( 'Topics with no replies', 'bbpress' ); ?></a></li>
                            </ul>
                        </div>

                        <div class="pull-right">
                            <a data-toggle="tooltip" data-placement="top" title="<?php echo __('Update Now'); ?>" class="btn btn-default" href="#" role="button" onclick="location.reload(true); return false;"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

	<?php bbp_forum_subscription_link(); ?>

	<?php do_action( 'bbp_template_before_forums_index' ); ?>

	<?php if ( bbp_has_forums() ) : ?>

        <?php bbp_get_template_part( 'form',       'topic'     ); ?>

		<?php bbp_get_template_part( 'loop',     'forums'    ); ?>



	<?php else : ?>

        <?php bbp_get_template_part( 'form',       'topic'     ); ?>

        <?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_forums_index' ); ?>

</div>


