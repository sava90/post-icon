<?php
/*
Plugin Name: Post Icon
Description: Adds an icon to the title
Version: 1.0.0
Author: Vitaliy Savchuk
*/

define('POST_ICON_PLUGIN_DIR', plugin_dir_path(__FILE__));

register_activation_hook(__FILE__, array('PostIcon', 'pluginActivation'));
register_deactivation_hook( __FILE__, array('PostIcon', 'pluginDeactivation'));

require_once(POST_ICON_PLUGIN_DIR.'class.postIcon.php');
add_action('init', array('PostIcon', 'init'));
add_action('the_title', array('PostIcon', 'addedIconForPost'), 10, 2);

if (is_admin()) {
    require_once(POST_ICON_PLUGIN_DIR.'class.postIconAdmin.php');
    add_action('init', array('PostIconAdmin', 'init'));
}