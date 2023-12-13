<?php

if (!defined('ABSPATH')) {
    exit;
}

class VCA_ferant_ajax{
    public function __construct(){
        add_action('wp_ajax_Callrequest',[$this,'submit_Callrequest']);
        add_action('wp_ajax_nopriv_Callrequest',[$this,'submit_Callrequest']);
    }

    public function submit_Callrequest(){
        
    }
}