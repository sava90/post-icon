<?php

class PostIcon
{
    public static $postIconTypePostField = 'select-post-icon-type-post';
    public static $postIconField = 'select-post-icon';
    public static $postIconPositionField = 'select-post-icon-position';

    public static function init()
    {
        add_action('wp_enqueue_scripts', array('PostIcon', 'loadResources'));
    }

    public static function loadResources()
    {
        wp_register_style('post-icon-style.css', plugin_dir_url(__FILE__).'assets/css/post-icon-style.css', array());
        wp_enqueue_style('post-icon-style.css');
    }

    public static function addedIconForPost($title, $id)
    {
        $postType = get_post_type($id);
        if ($postType != get_option(self::$postIconTypePostField, '')) {
            return $title;
        }

        if (get_option(self::$postIconPositionField, '') == 'left') {
            return html_entity_decode(get_option(self::$postIconField, '')).' '.$title;
        }

        return $title.' '.html_entity_decode(get_option(self::$postIconField, ''));
    }

    public static function pluginActivation()
    {
        add_option(self::$postIconTypePostField, '');
        add_option(self::$postIconField, '');
        add_option(self::$postIconPositionField, '');
    }

    public static function pluginDeactivation()
    {
        delete_option(self::$postIconTypePostField);
        delete_option(self::$postIconField);
        delete_option(self::$postIconPositionField);
    }
}