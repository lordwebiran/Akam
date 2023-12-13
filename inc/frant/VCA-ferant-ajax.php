<?php

if (!defined('ABSPATH')) {
    exit;
}

class VCA_ferant_ajax
{
    public function __construct()
    {
        add_action('wp_ajax_Callrequest', [$this, 'submit_Callrequest']);
        add_action('wp_ajax_nopriv_Callrequest', [$this, 'submit_Callrequest']);
    }

    public function submit_Callrequest()
    {

        if (!wp_verify_nonce($_POST['nonce'], 'VC_ajax_nonce')) {
            wp_send_json_error();
        }

        $VC_Callrequest_data = [
            'Name_and_surname' => $_POST['Name_and_surname'],
            'phone' => $_POST['phone'],
            'status' => $_POST['status'],
        ];

        $VC_Callrequest = new VC_Callrequest_Manager_ferant();
        $Callrequest = $VC_Callrequest->insert($VC_Callrequest_data);
        $options = get_option('VCA-settings'); 
        if (!isset($Callrequest['insert_id'])) {
            $this->make_response(['__success' => false, 'results' => $Callrequest['insert_id']]);
        } else {
            $this->make_response(['__success' => true, 'results' => $Callrequest['insert_id'],'text'=>$options['VCA-alert-text']]);
        }
    }

    public function make_response($result)
    {
        if (is_array($result)) {
            wp_send_json($result);
        } else {
            echo $result;
        }
        wp_die();
    }
}
