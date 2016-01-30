<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}

add_action('wp_enqueue_scripts', 'enqueue_month_view_scripts');
function enqueue_month_view_scripts() {
    if ( is_front_page() ) {
        Tribe__Events__Template_Factory::asset_package('ajax-calendar');
        Tribe__Events__Template_Factory::asset_package('events-css');
        Tribe__Events__Template_Factory::asset_package('bootstrap-datepicker');
        Tribe__Events__Template_Factory::asset_package('tribe-events');
    }
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_filter('widget_text', 'do_shortcode');

//function to call first uploaded image in functions file
function main_image() {
$files = get_children('post_parent='.get_the_ID().'&post_type=attachment
&post_mime_type=image&order=desc');
  if($files) :
    $keys = array_reverse(array_keys($files));
    $j=0;
    $num = $keys[$j];
    $image=wp_get_attachment_image($num, 'large', true);
    $imagepieces = explode('"', $image);
    $imagepath = $imagepieces[1];
    $main=wp_get_attachment_url($num);
		$template=get_template_directory();
		$the_title=get_the_title();
    print "<img src='$main' alt='$the_title' class='frame' />";
  endif;
}
?>