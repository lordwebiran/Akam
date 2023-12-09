<?php
if (!defined('ABSPATH')) {
    exit;
}

class VCA_Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts_and_styles']);
        add_action('admin_enqueue_scripts',[$this,'admin_assets']);
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
}
