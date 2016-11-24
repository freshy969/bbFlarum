<?php

// Time
add_filter('show_admin_bar', '__return_false');

function short_freshness_time( $output) {
    $output = preg_replace( '/, .*[^ago]/', ' ', $output );
    return $output;
}
add_filter( 'bbp_get_time_since', 'short_freshness_time' );
add_filter('bp_core_time_since', 'short_freshness_time');

// Login redirekcija
function login_redirect( $redirect_to, $request, $user ) {
    return home_url(bbp_get_root_slug());
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );


// Samo administratorima dozvoljen wp-admin
function redirect_non_admin_users(){
    if ( !current_user_can('edit_posts') ){
        wp_redirect(home_url(bbp_get_root_slug()));
        exit;
    }
}
add_action( 'admin_init', 'redirect_non_admin_users' );

// Logo na login stranici link
function login_page_custom_url() {
    return home_url(bbp_get_root_slug());
}
add_filter('login_headerurl', 'login_page_custom_url');

// Logo na login stranici
function login_logo() {
echo "<style>
body.login { background-color: #fff; }
body.login #login h1 a { background: url('".get_template_directory_uri()."/bbpress/img/logo.png') no-repeat scroll center transparent; width:auto; }
</style>";
}
add_action("login_head", "login_logo");

// Ediotor
function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    $args['quicktags'] = false;

    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );

// Nova tema
function new_topic() {
    $offset = 60*60*1;
    if ( get_post_time() > date('U') - $offset )
        echo '<span class="novo text-uppercase">'. translate( 'New Topic', bbpress ) .'</span>';
}
add_action( 'bbp_theme_after_topic_title', 'new_topic' );


// Zatvoren topic
function zakljucana_tema() {
    if ( bbp_is_topic_closed() && !bbp_is_topic_sticky() )
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'. translate( 'Locked', bbpress ) .'" class="fa fa-lock"></i></span>';
}
add_action( 'bbp_theme_before_topic_title', 'zakljucana_tema' );

// Izdvojen topic
function izdvojena_tema() {
    if ( bbp_is_topic_sticky() && !bbp_is_topic_closed() )
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'. translate( 'Sticky', bbpress ) .'" class="fa fa-thumb-tack"></i></span>';
}
add_action( 'bbp_theme_before_topic_title', 'izdvojena_tema' );

// Izdvojena i zakljucana
function izdvojena_zakljucana() {
    if ( bbp_is_topic_sticky() && bbp_is_topic_closed() )
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'. translate( 'Announcement', bbpress ) .'" class="fa fa-bullhorn"></i></span>';
}
add_action( 'bbp_theme_before_topic_title', 'izdvojena_zakljucana' );

// Samo jedan revision
function revision_log( $r='' ) {
    $arr = array( end( $r ));
    reset( $r );
    return( $arr );
}
add_filter( 'bbp_get_reply_revisions', 'revision_log', 20, 1 );
add_filter( 'bbp_get_topic_revisions', 'revision_log', 20, 1 );

// Sakrij crticu
function sakrij_crticu($args = array() ) {
    $args['before'] = '';
    return $args;
}
add_filter ('bbp_before_get_forum_subscribe_link_parse_args', 'sakrij_crticu') ;

// Automacki login
function auto_login($user_id) {
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    wp_new_user_notification( $user_id, null, 'both' );
    wp_redirect(home_url(bbp_get_root_slug()));
    exit;
}
add_action( 'user_register', 'auto_login' );



?>