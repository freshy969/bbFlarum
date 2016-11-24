<?php


add_filter('show_admin_bar', '__return_false');

function short_freshness_time( $output) {
    $output = preg_replace( '/, .*[^ago]/', ' ', $output );
    return $output;
}
add_filter( 'bbp_get_time_since', 'short_freshness_time' );
add_filter('bp_core_time_since', 'short_freshness_time');

function closed_topics() {
    $topic_id = bbp_get_topic_id();
    if ( get_post_type( $topic_id ) == bbp_get_topic_post_type() && bbp_is_topic_closed( $topic_id ) )
        echo '<i data-toggle="tooltip" data-placement="top" title="Zaključana" class="fa fa-lock"></i>';
}
add_action( 'bbp_theme_before_topic_title', 'closed_topics' );

function sticky_topics() {
    $topic_id = bbp_get_topic_id();
    if ( get_post_type( $topic_id ) == bbp_get_topic_post_type() && bbp_is_topic_sticky( $topic_id ) )
        echo '<i data-toggle="tooltip" data-placement="top" title="Izdvojena" class="fa fa-thumb-tack"></i>';
}
add_action( 'bbp_theme_before_topic_title', 'sticky_topics' );

function login_redirect( $redirect_to, $request, $user ) {
    return home_url(bbp_get_root_slug());
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );

function redirect_non_admin_users() {
    if (!current_user_can('manage_options') && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF']) {
        wp_redirect(home_url(bbp_get_root_slug()));
        exit;
    }
}
add_action('admin_init', 'redirect_non_admin_users');

function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    $args['quicktags'] = false;

    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );

?>