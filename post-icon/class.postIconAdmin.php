<?php

class PostIconAdmin
{
    private static $configPage = 'post-icon-config';

    public static function init()
    {
        add_action('admin_menu', array('PostIconAdmin', 'adminMenu'));
        add_action('admin_enqueue_scripts', array('PostIconAdmin', 'loadResources'));
    }

    public static function adminMenu()
    {
        add_options_page('Post icon', 'Post icon', 'manage_options', self::$configPage, array('PostIconAdmin', 'displayPage'));
    }

    public static function loadResources()
    {
        wp_register_style('post-icon-style-admin.css', plugin_dir_url(__FILE__).'assets/css/post-icon-style-admin.css', array());
        wp_enqueue_style('post-icon-style-admin.css');

        wp_register_script('post-icon-js.js', plugin_dir_url( __FILE__).'assets/js/post-icon-js.js', array('jquery'));
        wp_enqueue_script('post-icon-js.js');
    }

    public static function displayPage()
    {
        if (!empty($_POST) && $_POST['action'] == 'update') {
            self::updateConfig($_POST);
        }
        if (!empty($_GET) && $_GET['page'] == self::$configPage) {
            self::view(self::$configPage);
        }
    }

    public static function view($name)
    {
        include(POST_ICON_PLUGIN_DIR.'view/'.$name.'.php');
    }

    public static function getAllTypePost()
    {
        return get_post_types(array(
            'public' => true,
        ));
    }

    public static function getAllDashicon()
    {
        $dashicons = file_get_contents(get_home_path().'wp-includes/fonts/dashicons.svg');
        preg_match_all('/<symbol.*><title>(.+)<\/title>.*<\/symbol>/simU', $dashicons, $matches);

        if (empty($matches[1])) {
            return array();
        }

        return $matches[1];
    }

    public static function getAllPosition()
    {
        return array(
            'left' => 'Left',
            'right' => 'Right'
        );
    }

    private static function updateConfig($data)
    {
        if (!wp_verify_nonce($_POST['_wpnonce'])) {
            return false;
        }

        update_option(PostIcon::$postIconTypePostField, $_POST[PostIcon::$postIconTypePostField]);
        update_option(PostIcon::$postIconField, htmlentities(stripslashes($_POST[PostIcon::$postIconField])));
        update_option(PostIcon::$postIconPositionField, $_POST[PostIcon::$postIconPositionField]);

        return true;
    }
}