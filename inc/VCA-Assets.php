<?php

defined("ABSPATH") || exit();


class VCA_Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'VCA_ip']);
        add_action('admin_enqueue_scripts', [$this, 'VCA_ip']);
        add_action('wp_enqueue_scripts', [$this, 'fontawesome']);
        add_action('admin_enqueue_scripts', [$this, 'fontawesome']);
        add_action('wp_enqueue_scripts', [$this, 'vc_faicons']);
        add_action('admin_enqueue_scripts', [$this, 'vc_faicons']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts_and_styles']);
        add_action('admin_enqueue_scripts', [$this, 'admin_assets']);
        add_action( 'elementor/editor/before_enqueue_styles', array( __CLASS__,'VCA_eVCA') );
        add_action( 'elementor/editor/after_enqueue_styles',array( __CLASS__, 'VCA_eVCA') );
    }

    function enqueue_scripts_and_styles()
    {
        //style
        wp_enqueue_style('VCA-style', VCA_ASSETS . 'css/VCA-style.css');

        //script
        wp_enqueue_script('jquery');
        wp_enqueue_script('VCA-script', VCA_ASSETS . 'js/VCA-script.js', array('jquery'), null, true);
        wp_localize_script('VCA-script', 'VC_DATA', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('VC_ajax_nonce')
        ]);
    }
    function admin_assets()
    {
        //style
        wp_enqueue_style('VCA-admin', VCA_ASSETS . 'css/VCA-admin.css');

        //script
        wp_enqueue_script('jquery');
        wp_enqueue_script('VCA-admin', VCA_ASSETS . 'js/VCA-admin.js', array('jquery'), null, true);
        wp_localize_script('VCA-admin', 'VC_DATA', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('VC_ajax_nonce')
        ]);
    }


    function fontawesome()
    {
        //style
        wp_enqueue_style('VCA-all', VCA_fontawesome . 'css/all.min.css');
        wp_enqueue_style('VCA-brands', VCA_fontawesome . 'css/brands.min.css');
        wp_enqueue_style('VCA-fontawesom', VCA_fontawesome . 'css/fontawesome.min.css');
        wp_enqueue_style('VCA-regular', VCA_fontawesome . 'css/regular.min.css');
        wp_enqueue_style('VCA-solid', VCA_fontawesome . 'css/solid.min.css');
        wp_enqueue_style('VCA-svg-with-j', VCA_fontawesome . 'css/svg-with-js.min.css');
        wp_enqueue_style('VCA-v4-font-face', VCA_fontawesome . 'css/v4-font-face.min.css');
        wp_enqueue_style('VCA-v4-shims', VCA_fontawesome . 'css/v4-shims.min.css');
        wp_enqueue_style('VCA-v5-font-face', VCA_fontawesome . 'css/v5-font-face.min.css');

        //script
        wp_enqueue_script('VCA-all', VCA_fontawesome . 'js/all.min.js', null, null, true);
        wp_enqueue_script('VCA-brands', VCA_fontawesome . 'js/brands.min.js', null, null, true);
        wp_enqueue_script('VCA-conflict-detection', VCA_fontawesome . 'js/conflict-detection.min.js', null, null, true);
        wp_enqueue_script('VCA-fontawesome', VCA_fontawesome . 'js/fontawesome.min.js', null, null, true);
        wp_enqueue_script('VCA-regular', VCA_fontawesome . 'js/regular.min.js', null, null, true);
        wp_enqueue_script('VCA-solid', VCA_fontawesome . 'js/solid.min.js', null, null, true);
        wp_enqueue_script('VCA-v4-shims', VCA_fontawesome . 'js/v4-shims.min.js', null, null, true);
    }

    function vc_faicons()
    {
        wp_enqueue_style('VCA-faicons', VCA_ASSETS . 'font/vc-faicons/style.css');
    }

    function VCA_ip()
    {
        wp_enqueue_style('VCA-ip-awesome-solid', 'https://cdn.iconplanet.app/uicons/awesome-solid/css/ip-awesome-solid.css');
        wp_enqueue_style('VCA-ip-awesome-regular', 'https://cdn.iconplanet.app/uicons/awesome-regular/css/ip-awesome-regular.css');
        wp_enqueue_style('VCA-ip-brands', 'https://cdn.iconplanet.app/uicons/brands/css/ip-brands.css');
    }

    public static function VCA_eVCA()
    {
        wp_enqueue_style('VCA-faicons', VCA_ASSETS . 'font/eVCA-v1.0/style.css');
    }
}
