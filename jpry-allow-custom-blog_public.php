<?php
/**
 * Plugin Name: Allow custom blog_public on WPE Staging
 * Plugin URI: https://github.com/JCPry/WPE-Allow-custom-blog_public-on-staging
 * Description: This plugin allows you to set your own blog_public option on a WP Engine Staging site. <strong>Use with care, as this could allow your site to be indexed by Search Engines</strong>
 * Version: 1.0
 * Author: Jeremy Pry
 * Author URI: http://jeremypry.com/
 * License: GPL-2.0+
 */
 
 // Prevent direct access to this file.
 if ( ! defined( 'ABSPATH' ) ) {
      die( "You can't do anything by accessing this file directly!" );
 }

// The is_wpe_snapshot() determines whether we're on the staging site or production site. 
if ( function_exists( 'is_wpe_snapshot' ) ) {
     if ( is_wpe_snapshot() ) {
          if ( has_filter( 'pre_option_blog_public', 'wpe_filter_privacy_option' ) ) {
               remove_filter( 'pre_option_blog_public', 'wpe_filter_privacy_option' );
          } elseif ( has_filter( 'pre_option_blog_public', '__return_zero' ) ) {
               remove_filter( 'pre_option_blog_public', '__return_zero' );
          }
     }
}
