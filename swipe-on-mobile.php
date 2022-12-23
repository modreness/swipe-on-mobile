<?php
/*
Plugin Name: Swipe/revert columns on mobile for WPBakery Builder
Plugin URI: https://plugins.tehnoklik.ba/wpbakery-swipe-on-mobile
Description: A WPBakery Page Builder plugin that adds the option to swipe/revert columns in row on mobile devices. 
Version: 1.0
Author: Žan Anđić, Tehnoklik
Author URI: https://tehnoklik.ba
License: GPL2
*/

//Function to load css style for plugin

function wpbakery_swipe_on_mobile_init() {
   wp_enqueue_style('wpbakery-swipe-on-mobile', plugins_url('style.css', __FILE__));
}
add_action('init', 'wpbakery_swipe_on_mobile_init');

//Function to add css class on WPBakery row if field on row editor is checked

function wpbakery_swipe_on_mobile_row_css_class($class, $base, $atts) {
   if ($base == 'vc_row' && isset($atts['swipe_on_mobile']) && $atts['swipe_on_mobile'] == true) {
      $class .= ' swipe-on-mobile';
   }
   return $class;
}
add_filter('vc_shortcodes_css_class', 'wpbakery_swipe_on_mobile_row_css_class', 10, 3);

//Add field to WPbakery row editor where you can checkmark swipe/revert option and save row settings

vc_add_param('vc_row', array(
   'type' => 'checkbox',
   'param_name' => 'swipe_on_mobile',
   'value' => array(
      'Swipe/revert columns on mobile' => true
   ),
   'description' => 'If checked, the columns in this row will be swiped/reverted on mobile devices.',
   'heading' => 'Swipe/revert'
));