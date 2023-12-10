<?php
if (!defined('ABSPATH')) {
    exit;
}

class VCA_admin_ajax{
    public function __construct(){
        add_action('wp_ajax_{$action}',[$this,'submit_status']);
    }

    public function submit_status(){
        var_dump($_POST);
    }
}