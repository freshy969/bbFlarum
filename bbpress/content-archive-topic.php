<?php

/**
 * Archive Topic Content Part
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
                    <li <?php if ( is_archive('forum')) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url(bbp_get_root_slug())); ?>"><i class="fa fa-comments-o"></i> <?php _e( 'All Topics', 'bbpress' ); ?></a></li>
                </ul>

                <ul class="list-unstyled">
                    <?php query_posts(array(
                        'post_type' => bbp_get_forum_post_type(),
                        'orderby' => 'menu_order',
                        'order' => 'asc',
                    ));
                    if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <li><span class="kategorija" style="background: <?php echo get_field("color"); ?>"></span><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <span class="pull-right badge"> <?php echo bbp_get_forum_topic_count(get_the_ID()) ?></span></li>
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
                <span class="btn-group hidden-md hidden-lg" role="group">
                    <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><i class="fa fa-th-large" aria-hidden="true"></i></button>
                    <ul class="dropdown-menu">
                    <?php query_posts(array('post_type' => bbp_get_forum_post_type(), 'orderby' => 'menu_order', 'order' => 'asc',));
                    if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><span class="kategorija" style="background: <?php echo get_field("color"); ?>"></span> <?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    </ul>
                </span>

                    <?php if (is_user_logged_in()) : ?>
               <a class="btn btn-danger zapocni-temu  hidden-md hidden-lg" href="<?php echo esc_url( home_url(bbp_get_root_slug())); ?>/#new-post "><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                    <?php endif; ?>
                    <span class="btn-group" role="group">
                    <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><?php _e( 'View', 'bbpress' ); ?> <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/popular')); ?>"> <?php _e( 'Most popular topics', 'bbpress' ); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url(bbp_get_root_slug(). '/view/no-replies')); ?>"> <?php _e( 'Topics with no replies', 'bbpress' ); ?></a></li>
                    </ul>
                </span>

                <div class="pull-right">
                <a class="btn btn-default" href="#" role="button" onclick="location.reload(true); return false;"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>
                </div>
            </div>
            </div>


            <?php do_action( 'bbp_template_before_topics_index' ); ?>

            <?php if ( bbp_has_topics() ) : ?>


                <?php bbp_get_template_part( 'form',       'topic'     ); ?>

                <?php bbp_get_template_part( 'loop',       'topics'    ); ?>

                <?php bbp_get_template_part( 'pagination', 'topics'    ); ?>


            <?php else : ?>

                <?php bbp_get_template_part( 'form',       'topic'     ); ?>

                <?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

            <?php endif; ?>

            <?php do_action( 'bbp_template_after_topics_index' ); ?>

        </div>



    </div>





