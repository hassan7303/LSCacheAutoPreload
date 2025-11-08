<?php

/**
 * Plugin Name: LSCache Auto Preload
 * Description: Automatically preloads purged URLs including homepage after LiteSpeed cache purge.
 * Version: 1.2.0
 * Author: hassan ali askari
 */

if (!defined('ABSPATH')) exit;

if (!class_exists('LSCache_Auto_Preload_Debug')) {

    class LSCache_Auto_Preload_Debug
    {
        private static $preloaded_all = false;

        public static function init()
        {
            add_action('litespeed_purged_link', [__CLASS__, 'preload_url'], 10, 1);
            add_action('litespeed_purged_post', [__CLASS__, 'preload_post'], 10, 1);
            add_action('litespeed_purged_front', [__CLASS__, 'preload_front']);
            add_action('litespeed_purged_all', [__CLASS__, 'preload_home']);
        }

        public static function preload_url($url)
        {
            self::schedule_async_preload($url);
            self::schedule_async_preload(home_url('/'));
        }

        public static function preload_post($post_id)
        {
            $url = get_permalink($post_id);
            self::schedule_async_preload($url);
            self::schedule_async_preload(home_url('/'));
            
            $post_type = get_post_type($post_id);
            if ($post_type === 'product') {
                self::schedule_async_preload(home_url('/shop/'));
            }
        }

        public static function preload_front()
        {
            self::schedule_async_preload(home_url('/'));
        }

        public static function preload_home()
        {
            if (self::$preloaded_all) return;
            self::$preloaded_all = true;

            // Preload صفحه اصلی
            self::schedule_async_preload(home_url('/'));

            // Preload صفحات ثابت مهم
            $important_pages = [
                home_url('/shop/'),
                home_url('/about-us/'),
                home_url('/contact-us/'),
                home_url('/blog/'),
            ];

            foreach ($important_pages as $page_url) {
                self::schedule_async_preload($page_url);
            }


            $posts = get_posts(['numberposts' => -1, 'post_status' => 'publish']);
            foreach ($posts as $post) {
                self::schedule_async_preload(get_permalink($post->ID));
            }
        }
        private static function schedule_async_preload($url)
        {
            error_log('[LSCache ]' . $url);
            $php = escapeshellcmd(PHP_BINARY);
            $script = escapeshellarg(__DIR__ . '/run_preload.php');
            $cmd = "$php $script " . escapeshellarg($url) . " > /dev/null 2>&1 &";

            exec($cmd);
        }
    }

    add_action('plugins_loaded', ['LSCache_Auto_Preload_Debug', 'init']);
}
