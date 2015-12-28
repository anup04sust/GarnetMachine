<?php

/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */

function garnetmachine_setup() {
  
}

function garnetmachine_scripts() {
  $fonts = array(
    'Roboto' => '400,100,300,500,400italic,700,900',
  );
  wp_enqueue_style('roboto-fonts', theme_font_url($fonts), array(), null);
  wp_enqueue_style('garnetmachine-css', get_stylesheet_directory_uri() . '/css/garnetmachine.css', array('eli-css'), '20151221');
}

add_action('wp_enqueue_scripts', 'garnetmachine_scripts');

function garnetmachine_topbar() {
  global $eli_options;
  echo sprintf('<div class="pull-right"><a class="btn btn-link tel-no" href="tel:%1$s"><i class="fa fa-phone"></i> %1$s</a></div>', $eli_options['contact_phone']);
}

add_action('eli_header_top', 'garnetmachine_topbar');
