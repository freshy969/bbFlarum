<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<div class="kategorije" style="background: <?php echo get_field('color', bbp_get_topic_forum_id()) ?>;">


		<div class="naziv">

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

		<a href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?> <span class="pull-right badge"> <?php echo bbp_get_forum_topic_count(get_the_ID()) ?></span></a>

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>

<!--		<span style="margin-left:20px;">-->
<!--		--><?php //if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>
<!--			--><?php //do_action( 'bbp_theme_before_forum_subscription_action' ); ?>
<!--			--><?php //bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '', 'unsubscribe' => '' ) ); ?>
<!--			--><?php //do_action( 'bbp_theme_after_forum_subscription_action' ); ?>
<!--		--><?php //endif; ?>
<!--		</span>-->

		</div>

		<div class="opis">
		<?php do_action( 'bbp_theme_before_forum_description' ); ?>

		<?php bbp_forum_content(); ?>

		<?php do_action( 'bbp_theme_after_forum_description' ); ?>
		</div>

		<?php bbp_forum_row_actions(); ?>



		<span class="pod_kategorije">
		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

            <div class="pod_kategorije">
            <ul class="list-inline">
        <?php bbp_list_forums(array (
            'before'              => '',
            'after'               => '',
            'link_before'         => '<li>',
            'link_after'          => '</li>',
            'count_before'        => ' <span class="badge">',
            'count_after'         => '</span> ',
            'count_sep'           => '',
            'separator'           => '',
            'show_topic_count'    => true,
            'show_reply_count'    => false,
        )); ?>
            </ul>
        </div>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		</span>

	</div>
