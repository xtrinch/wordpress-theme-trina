<?php

add_action('after_setup_theme', 'trina_setup');
function trina_setup(){
	load_theme_textdomain('trina', get_template_directory() . '/languages');
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(
	array( 'main-menu' => __( 'Main Menu', 'trina' ) )
	);
}

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

function trina_scripts() {
	wp_enqueue_style( 'trina-style', get_stylesheet_uri(), array( ) );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), 'v4.7.0', false );

	wp_enqueue_style( 'trina-fonts', zillah_fonts_url(), array(), null );

	/*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}*/

	/* if ( is_front_page() ) {

		wp_enqueue_script( 'zillah_ajax_slider_posts',  get_template_directory_uri() . '/js/ajax-slider-posts.js', array( 'jquery' ), '1.0', true );

		wp_localize_script( 'zillah_ajax_slider_posts', 'requestpost', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		) );

	}*/
}
add_action( 'wp_enqueue_scripts', 'trina_scripts' );

function zillah_fonts_url() {
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Muli:100,200,300,400,500,600,700,800,900';

	$font_families[] = 'Quicksand:100,200,300,400,500,600,700,800,900';

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	return $fonts_url;
}

add_action('comment_form_before', 'trina_enqueue_comment_reply_script');

function trina_enqueue_comment_reply_script() {
	if(get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}

add_filter('the_title', 'trina_title');

function trina_title($title) {
	if ($title == '') {
	return 'Untitled';
	} else {
	return $title;
	}
}
add_filter('wp_title', 'trina_filter_wp_title');

function trina_filter_wp_title($title) {
	return $title . esc_attr(get_bloginfo('name'));
}

add_filter('comment_form_defaults', 'trina_comment_form_defaults');

function trina_comment_form_defaults( $args ) {
	$req = get_option( 'require_name_email' );
	$required_text = sprintf( ' ' . __('Required fields are marked %s', 'trina'), '<span class="required">*</span>' );
	$args['comment_notes_before'] = '<p class="comment-notes">' . __('Your email is kept private.', 'trina') . ( $req ? $required_text : '' ) . '</p>';
	$args['title_reply'] = __('', 'trina');
	$args['title_reply_to'] = __('Post a Reply to %s', 'trina');
	return $args;
}

add_action( 'widgets_init', 'trina_widgets_init' );

function trina_widgets_init() {
	register_sidebar( array (
	'name' => __('Sidebar Widget Area', 'trina'),
	'id' => 'primary-widget-area',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</li>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}

$preset_widgets = array (
'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
);

function trina_get_page_number() {
	if (get_query_var('paged')) {
	print ' | ' . __( 'Page ' , 'trina') . get_query_var('paged');
	}
}

function trina_catz($glue) {
$current_cat = single_cat_title( '', false );
$separator = "\n";
$cats = explode( $separator, get_the_category_list($separator) );
foreach ( $cats as $i => $str ) {
if ( strstr( $str, ">$current_cat<" ) ) {
unset($cats[$i]);
break;
}
}
if ( empty($cats) )
return false;
return trim(join( $glue, $cats ));
}
function trina_tag_it($glue) {
$current_tag = single_tag_title( '', '',  false );
$separator = "\n";
$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
foreach ( $tags as $i => $str ) {
if ( strstr( $str, ">$current_tag<" ) ) {
unset($tags[$i]);
break;
}
}
if ( empty($tags) )
return false;
return trim(join( $glue, $tags ));
}
function trina_commenter_link() {
$commenter = get_comment_author_link();
$commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
$avatar_email = get_comment_author_email();
$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}

function trina_custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth;
	?>
	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	<div class="comment-author vcard"><?php trina_commenter_link() ?></div>
	<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s', 'trina' ), get_comment_date(), get_comment_time() ); ?><span class="meta-sep"> | </span> <a href="#comment-<?php echo get_comment_ID(); ?>" title="<?php _e('Permalink to this comment', 'trina' ); ?>"><?php _e('Permalink', 'trina' ); ?></a>
	<?php edit_comment_link(__('Edit', 'trina'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
	<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your comment is awaiting moderation.', 'trina'); echo '</span>\n'; } ?>
	<div class="comment-content">
	<?php comment_text() ?>
	</div>
	<?php
	if($args['type'] == 'all' || get_comment_type() == 'comment') :
	comment_reply_link(array_merge($args, array(
	'reply_text' => __('Reply','trina'),
	'login_text' => __('Login to reply.', 'trina'),
	'depth' => $depth,
	'before' => '<div class="comment-reply-link">',
	'after' => '</div>'
	)));
	endif;
}

function trina_custom_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'trina'),
	get_comment_author_link(),
	get_comment_date(),
	get_comment_time() );
	edit_comment_link(__('Edit', 'trina'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
	<?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your trackback is awaiting moderation.', 'trina'); echo '</span>\n'; } ?>
	<div class="comment-content">
	<?php comment_text() ?>
	</div>
	<?php
}

function trina_read_more_link() {
	/* translators: s: The post title */
	return '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" class="more-link">' . sprintf( __( 'Continue Reading %s', 'trina' ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) . ' &nbsp;<i class="fa fa-angle-right"></i>' ) . '</a>';
}

add_filter( 'the_content_more_link', 'trina_read_more_link' );

function trina_custom_excerpt_length( $length ) {
    return 70;
}

add_filter( 'excerpt_length', 'trina_custom_excerpt_length', 999 );

function trina_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>,<code>,<ins>';
    }

function trina_custom_wp_trim_excerpt($trina_excerpt) {
	$raw_excerpt = $trina_excerpt;

    $trina_excerpt = get_the_content('');
    $trina_excerpt = strip_shortcodes( $trina_excerpt );
    $trina_excerpt = apply_filters('the_content', $trina_excerpt);
    $trina_excerpt = str_replace(']]>', ']]&gt;', $trina_excerpt);
    $trina_excerpt = strip_tags($trina_excerpt, trina_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

    //Set the excerpt word count and only break after sentence is complete.
    $excerpt_word_count = 70;
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
    $tokens = array();
    $excerptOutput = '';
    $count = 0;

    // Divide the string into tokens; HTML tags, or words, followed by any whitespace
    preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $trina_excerpt, $tokens);

    foreach ($tokens[0] as $token) {

        if ($count >= $excerpt_length && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) {
        // Limit reached, continue until , ; ? . or ! occur at the end
            $excerptOutput .= trim($token);
            break;
        }

        // Add words to complete sentence
        $count++;

        // Append what's left of the token
        $excerptOutput .= $token;
    }

    $trina_excerpt = trim(force_balance_tags($excerptOutput));

    $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'trina' ), get_the_title()) . '</a>';
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);

    return $trina_excerpt;
}

add_filter('get_the_excerpt', 'trina_custom_wp_trim_excerpt');

add_filter( 'wp_postratings_ratings_image_alt', 'wp_postratings_ratings_image_alt' );
function wp_postratings_ratings_image_alt( $alt_title_text ) {
	return '';
}
