<?php
if (!defined('ABSPATH')) {
    exit;
}

class VC_Callrequest_Manager_ferant
{
    private $options = get_option('VCA-settings');
    private $wpdb;
    private $table;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . 'VCA_Callrequest';
    }
    public function insert($data)
    {

        $errors = [];
        if (empty($data['Name_and_surname'])) {
            $errors[] = $this->options['VCA-errors-Name-and-surname-text'];
        }
        if (empty($data['phone'])) {
            $errors[] = $this->options['VCA-errors-phone-text'];
        }
        if (empty($data['status'])) {
            $errors[] = 'خطا در ارسال اطلاعات';
        }
        if (count($errors) > 0) {
            return $errors;
        }

        $this->wpdb->insert(
            $this->table,
            [
                'NF' => sanitize_text_field($data['Name_and_surname']) ,
                'phone' => sanitize_text_field($data['phone']) ,
                'status' => sanitize_text_field($data['status']) ,
            ],
            ['%s','$s','$D']
        );
        $insert_id = $this->wpdb->insert_id;
        return ['insert_id' => $insert_id];
    }
}
