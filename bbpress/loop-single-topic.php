<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<ul id="bbp-topic-<?php bbp_topic_id(); ?>"  class="list-unstyled">
<li>

<div class="teme">
<div class="row">

<div class="col-md-12">
<div class="avatar pull-left">
<?php bbp_topic_author_link( array( 'type' => 'avatar', 'size' => 50 ) ); ?>
<span class="status">
<?php do_action( 'bbp_theme_before_topic_title' ); ?>
</span>
</div>

<div class="pull-right">

<?php if ( !bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) : ?>
<?php do_action( 'bbp_theme_before_topic_started_in' ); ?>
<span class="kategorija" style="background: <?php echo get_field('color', bbp_get_topic_forum_id()) ?>;"><a href="<?php echo bbp_get_forum_permalink( bbp_get_topic_forum_id() ) ?>"><?php echo bbp_get_forum_title( bbp_get_topic_forum_id() ) ?></a></span>
<?php do_action( 'bbp_theme_after_topic_started_in' ); ?>
<?php endif; ?>

<span class="odgovora">
<i class="fa fa-comment-o" aria-hidden="true"></i>
<?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?>
</span>

<?php if ( is_user_logged_in() ) : ?>
<span class="omiljeno">
<div class="dropdown pull-right">
<a class="dropdown-toggle" type="button" id="omiljeno" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu" aria-labelledby="omiljeno">
<li style="padding: 15px 15px"><?php bbp_user_favorites_link(array( 'before' => '', 'favorite' => '<i class="fa fa-star" aria-hidden="true"></i> '. translate('Favorite', bbpress) .'', 'favorited' => '<i class="fa fa-star-o" aria-hidden="true"></i> '. translate('Unfavorite', bbpress) .' ' ) ); ?></li>
<li style="padding: 15px 15px"><?php bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '<i class="fa fa-eye" aria-hidden="true"></i> '. translate('Subscribe', bbpress) .'', 'unsubscribe' => '<i class="fa fa-eye-slash" aria-hidden="true"></i> '. translate('Unsubscribe', bbpress) .' ' ) ); ?></li>
</ul>
</div>
</span>
<?php endif; ?>

</div>

<div class="naziv">
<a href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>
<?php do_action( 'bbp_theme_after_topic_title' ); ?>
<?php bbp_topic_pagination(); ?>
</div>

<div class="poruka">

<p>
<span class="ime">
<i class="fa fa-reply" aria-hidden="true"></i>
<?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'type' => 'name') ); ?>
</span>

<span class="vrijeme">
<?php do_action( 'bbp_theme_before_topic_freshness_link' ); ?>
<?php bbp_topic_freshness_link(); ?>
<?php do_action( 'bbp_theme_after_topic_freshness_link' ); ?>
</span>
</p>

<?php if ( bbp_is_topic_sticky()) : ?>
<div class="excerpt">
<?php the_excerpt(); ?>
</div>
<?php endif; ?>

</div>

</div>

</div>
</div>

</li>
</ul>