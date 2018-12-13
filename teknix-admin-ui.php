<?php
/*
Plugin Name:  Teknix Admin UI
Plugin URI:   https://github.com/teknixno/teknix-admin-ui
Description:  Admin interface branding and customization - hide navigation items/dashboard widgets and replace WP logo
Version:      1.0.0
Author:       Teknix
Author URI:   https://teknix.no
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

defined('ABSPATH') or die('Sorry mac, this file is only accessible through Wordpress as a plugin!');

// Most functions are prefixed with "tau" ([t]eknix [a]dmin [u]i)

// Only run plugin if we're on the /wp-admin/ site
if(is_admin()) {

    // Setup action links below Plugin in plugin page
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'tau_plugin_action_links');

    // Initialize Teknix Admin UI once plugins are loaded
    add_action('plugins_loaded', 'tau_init');
    
}

function tau_plugin_action_links($links) {
    $links[] = '<a href="'.esc_url(get_admin_url(null, 'options-general.php?page=teknix-admin-ui')).'">Settings</a>';
    $links[] = '<a href="https://github.com/teknixno" target="_blank">Visit our Github page</a>';
    return $links;
}

function tau_init() {
    include_once('tau-init.php');
}

