<?php
function registerCSS()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('_css', get_template_directory_uri() . "/style.css", array(), $version, 'all');
    wp_enqueue_style('_fonts', "https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&family=Source+Serif+Pro:wght@400;600;700;900&display=swap", array(), "1.0", 'all');
    wp_enqueue_style(
        'font-awesome-6',
        get_template_directory_uri() . "/fontawesome6/css/all.css",
        array(),
        '5.3.0', 'all'
    );
}

function registerJS()
{
    wp_enqueue_script("_jq", "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", "", 'all', true);
    if (is_page()) {
        global $wp_query;

        $template_name = get_post_meta($wp_query->post->ID, '_wp_page_template', true);
        if ($template_name == 'index.php') {

        }
    }
    wp_enqueue_script('_js', get_template_directory_uri() . "/main.js", array(), "", 'all');

}

function registerMasonry(){
//    wp_enqueue_script("_masonry", "https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js", "", 'all', true);

}
remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );

function registerThemeSupport()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

function pietergoosen_theme_setup() {
    register_nav_menus( array(
        'header' => 'Header menu',
        'footer' => 'Footer menu'
    ) );
}

add_action( 'after_setup_theme', 'pietergoosen_theme_setup' );

add_action('after_setup_theme', 'registerThemeSupport');
add_action('wp_enqueue_scripts', 'registerJS',11);
add_action('wp_enqueue_scripts','registerMasonry',10);
add_action('wp_enqueue_scripts', "registerCSS");

require_once __DIR__ . "/Classes/Post.php";
