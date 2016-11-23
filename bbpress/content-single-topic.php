<?php

/**
 * Single Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>



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

	<div class="row">
		<div class="col-md-10">

	<?php do_action( 'bbp_template_before_single_topic' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>


		<?php if ( bbp_show_lead_topic() ) : ?>

			<?php bbp_get_template_part( 'content', 'single-topic-lead' ); ?>

		<?php endif; ?>

		<?php if ( bbp_has_replies() ) : ?>


			<?php bbp_get_template_part( 'loop',       'replies' ); ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

		<?php endif; ?>

		<?php bbp_get_template_part( 'form', 'reply' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_topic' ); ?>

</div>
		<div class="col-md-2">

			<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
			<?php printf( __( '<a class="btn btn-danger btn-block zapocni-temu" href="%1$s #new-post">', 'bbpress' ), bbp_get_reply_to_link() ); ?>
			<?php _e( 'Reply', 'bbpress' ); ?>
			</a>

			<?php if ( is_user_logged_in() ) : ?>
			<button class="btn btn-default btn-block"><?php bbp_user_favorites_link(); ?></button>
			<?php endif; ?>


<!--			--><?php //if ( bbp_has_topic_tag() ) : ?>
<!--				<div class="naslovi" style="margin-top: 30px;">-->
<!--					<h3 class="text-uppercase">Oznake</h3><hr>-->
<!--					<span class="oznake">-->
<!--				--><?php //$args = array(
//					'before' => '',
//					'sep' => '',
//					'after' => ''
//				);
//				bbp_topic_tag_list( '', $args ); ?>
<!--			</span>-->
<!--				</div>-->
<!--			--><?php //endif; ?><!-- -->

			</div>
		</div>


</div>