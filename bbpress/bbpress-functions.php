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
    $args['quicktags'] = true;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );

// Nova tema
function new_topic() {
    $offset = 60*60*1;
    if ( get_post_time() > date('U') - $offset )
        echo '<span class="novo">'. translate( 'New Topic', bbpress ) .'</span>';
}
add_action( 'bbp_theme_after_topic_title', 'new_topic' );

// Zatvoren topic
function zakljucana_tema() {
    if ( bbp_is_topic_closed() && !bbp_is_topic_sticky() )
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'.  _x( 'Closed', 'post', bbpress ) .'" class="fa fa-lock"></i></span>';
}
add_action( 'bbp_theme_before_topic_title', 'zakljucana_tema' );

// Izdvojen topic
function izdvojena_tema() {
    if ( bbp_is_topic_sticky() && !bbp_is_topic_closed() )
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'. _x('Sticky', 'Make topic sticky', bbpress) .'" class="fa fa-thumb-tack"></i></span>';
}
add_action( 'bbp_theme_before_topic_title', 'izdvojena_tema' );

// Izdvojena i zakljucana
function izdvojena_zakljucana() {
    if ( bbp_is_topic_sticky() && bbp_is_topic_closed() )
        echo '<span class="status"><i data-toggle="tooltip" data-placement="top" title="'. _x( 'Super Sticky', 'Make topic super sticky', bbpress ) .'" class="fa fa-bullhorn"></i></span>';
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

// Automacki login posle registracije
function auto_login($user_id) {
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    wp_new_user_notification( $user_id, null, 'both' );
    wp_redirect(home_url(bbp_get_root_slug()));
    exit;
}
add_action( 'user_register', 'auto_login' );

// Dodaj upload
function bavotasan_bbpress_upload_media( $args ) {
    $args['media_buttons'] = true;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bavotasan_bbpress_upload_media' );


// Zabrana imena u registraciji
add_filter('registration_errors', 'limit_username_alphanumerics', 10, 3);
function limit_username_alphanumerics ($errors, $name) {
    if ( !preg_match('/^[A-Za-z0-9]{3,16}$/', $name) ){
        $errors->add( 'user_name', __( '<strong>ERROR</strong>: Invalid username.' ) );
    }
    return $errors;
}

// Micanje verzije iz wp_head
remove_action('wp_head','wp_generator');

// Rss feed osim za forum
remove_action('wp_head', 'feed_links', 2);

// Za izdvojene teme opis
function wpdocs_excerpt_more( $more ) {
    return ' <a class="text-lowercase" href="'. get_permalink($post->ID) . '">' . __( 'Read more...' ) . '</a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function wpdocs_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// Micanje verzije
function wcs_remove_script_styles_version( $src ){
    return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'wcs_remove_script_styles_version' );
add_filter( 'style_loader_src', 'wcs_remove_script_styles_version' );

?>