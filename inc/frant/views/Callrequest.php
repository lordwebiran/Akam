<?php
if (!defined('ABSPATH')) {
    exit;
}

class VC_Callrequest_Manager_ferant
{
    private $wpdb;
    private $table;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . 'VCA_Callrequest';
    }
    public function insert($data){

        if(i){

        }

    }
}
