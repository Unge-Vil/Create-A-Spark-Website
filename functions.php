<?php
add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('cas-child', get_stylesheet_directory_uri().'/assets/css/cas.css', [], '1.0.0');
  wp_enqueue_script('cas-main', get_stylesheet_directory_uri().'/assets/js/cas-main.js', [], '1.0.0', true);
  wp_enqueue_script('cas-sparks', get_stylesheet_directory_uri().'/assets/js/cas-sparks.js', ['cas-main'], '1.0.0', true);
});