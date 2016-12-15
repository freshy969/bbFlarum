<?php

// Admin bar
add_filter('show_admin_bar', '__return_false');

// Micanje verzije iz wp_head
remove_action('wp_head','wp_generator');

// Rss feed osim za forum
remove_action('wp_head', 'feed_links', 2);

// Micanje verzije
function bbflarum_version($src){
    return remove_query_arg('ver', $src);
}
add_filter('script_loader_src', 'bbflarum_version');
add_filter('style_loader_src', 'bbflarum_version');

// Time
function bbflarum_vrijeme($output) {
    $output = preg_replace('/, .*[^ago]/', ' ', $output);
    return $output;
}
add_filter('bbp_get_time_since', 'bbflarum_vrijeme');
add_filter('bp_core_time_since', 'bbflarum_vrijeme');

// Login redirekcija
function bbflarum_redirekcija($redirect_to, $request, $user) {
    return home_url(bbp_get_root_slug());
}
add_filter('login_redirect', 'bbflarum_redirekcija', 10, 3);

// Logo url
function bbflarum_logourl() {
    return home_url(bbp_get_root_slug());
}
add_filter('login_headerurl', 'bbflarum_logourl');

// Samo administratorima dozvoljen wp-admin
function bbflarum_wpadmin(){
    if ( !current_user_can('edit_posts') ){
        wp_redirect(home_url(bbp_get_root_slug()));
        exit;
    }
}
add_action('admin_init', 'bbflarum_wpadmin');

// Ediotor
function bbflarum_editor( $args = array() ) {
    $args['tinymce'] = true;
    $args['quicktags'] = true;
    $args['media_buttons'] = true;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbflarum_editor' );

// Nova tema
function bbflarum_novo() {
    $offset = 60*60*1;
    if (get_post_time() > date('U') - $offset)
        echo '<span class="novo">'. translate('New Topic', bbpress) .'</span>';
}
add_action('bbp_theme_after_topic_title', 'bbflarum_novo');

// Zatvoren topic
function bbflarum_zakljucana() {
    if ( bbp_is_topic_closed() && !bbp_is_topic_sticky() && !bbp_is_topic_super_sticky() )
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'.  _x('Closed', 'post', bbpress) .'" class="fa fa-lock"></i></span>';
}
add_action('bbp_theme_before_topic_title', 'bbflarum_zakljucana');

// Izdvojen topic
function bbflarum_izdvojena() {
    if ( bbp_is_topic_sticky() && !bbp_is_topic_closed() && !bbp_is_topic_super_sticky())
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'. _x('Sticky', 'Make topic sticky', bbpress) .'" class="fa fa-thumb-tack"></i></span>';
}
add_action('bbp_theme_before_topic_title', 'bbflarum_izdvojena');

// Izdvojena i zakljucana
function bbflarum_izdvojena_zakljucana() {
    if ( bbp_is_topic_sticky() && bbp_is_topic_closed() && !bbp_is_topic_super_sticky())
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'. _x('Super Sticky', 'Make topic super sticky', bbpress) .'" class="fa fa-bullhorn"></i></span>';
}
add_action( 'bbp_theme_before_topic_title', 'bbflarum_izdvojena_zakljucana' );

// Izdvojena na sve strane
function bbflarum_glavna() {
    if ( bbp_is_topic_super_sticky())
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'. _x('Super Sticky', 'Make topic super sticky', bbpress) .'" class="fa fa-bullhorn"></i></span>';
}
add_action( 'bbp_theme_before_topic_title', 'bbflarum_glavna' );

// Samo jedan revision
function bbflarum_revision($r='') {
    $arr = array(end($r));
    reset($r);
    return($arr);
}
add_filter('bbp_get_reply_revisions', 'bbflarum_revision', 20, 1);
add_filter('bbp_get_topic_revisions', 'bbflarum_revision', 20, 1);

// Sakrij crtice
function bbflarum_crtice($args = array() ) {
    $args['before'] = '';
    return $args;
}
add_filter ('bbp_before_get_forum_subscribe_link_parse_args', 'bbflarum_crtice') ;

// Automacki login posle registracije
function bbflarum_autologin($user_id) {
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    wp_new_user_notification($user_id, null, 'both');
    wp_redirect(home_url(bbp_get_root_slug()));
    exit;
}
add_action( 'user_register', 'bbflarum_autologin' );

// Zabrana imena u registraciji
function bbflarum_username($errors, $name) {
    if (!preg_match('/^[A-Za-z0-9]{3,16}$/', $name)){
        $errors->add('user_name', __( '<strong>ERROR</strong>: Invalid username.'));
    }
    return $errors;
}
add_filter('registration_errors', 'bbflarum_username', 10, 3);

// Za izdvojene teme opis
function bbflarum_excerpt($more) {
    return '<a class="text-lowercase" data-toggle="tooltip" data-placement="bottom" title="' . translate( 'Open this topic', bbpress ) . '" href="'. get_permalink($post->ID) . '">' . __( 'Read more...' ) . '</a>';
}
add_filter('excerpt_more', 'bbflarum_excerpt');

// Za izdvojene teme duzina teksta
function bbflarum_length($length) {
    return 40;
}
add_filter('excerpt_length', 'bbflarum_length', 999);

?>