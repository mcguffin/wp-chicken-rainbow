<?php
/*
Plugin Name: Chicken
Plugin URI: https://github.com/mcguffin
Description: Provides syntax highlighting for code written in <a href="http://esolangs.org/wiki/Chicken">chicken</a>. Additionally offers a rainbow theme that will hide code examples on your blog.
Version: 1.0.0
Author: Jörn Lund
Author URI: https://github.com/mcguffin
License: GPL2+
*/


function chicken_js_url( $module_url , $language ) {
    if ( $language == 'chicken' )
        return plugins_url( "/js/chicken.js" , __FILE__ );
    return $module_url;
}

add_filter('wprainbow_language_module_url' , 'chicken_js_url' , 10 ,2 );

/* Chicken is the best! */
function add_chicken( $languages ) {
    if ( ! isset( $languages['chicken'] ) )
        $languages['chicken'] = 'Chicken';
	return $languages;
}
add_filter('wprainbow_available_languages','add_chicken' );

function polite_css_url( $theme_url , $theme_slug ) {
    if ( $theme_slug == 'polite' )
        return plugins_url( "/css/polite.css" , __FILE__ );
    return $theme_url;
}
add_filter('wprainbow_theme_url' , 'polite_css_url' , 10 ,2 );

function add_politeness( $themes ) {
    if ( ! isset( $themes['polite'] ) )
        $themes['polite'] = 'Polite';
	return $themes;
}
add_filter('wprainbow_available_themes','add_politeness' );

