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
    public function insert($data)
    {
        $options = get_option('VCA-settings');
        $errors = [];

        if (empty($data['Name_and_surname'])) {
            $errors[] = $options['VCA-errors-Name-and-surname-text'];
        }
        if (empty($data['phone'])) {
            $errors[] = $options['VCA-errors-phone-text'];
        }
        if (empty($data['status'])) {
            $errors[] = 'خطا در ارسال اطلاعات';
        }
        if (count($errors) > 0) {
            return $errors;
        }
        //var_dump($data);
        //exit;
        $this->wpdb->insert(
            $this->table,
            [
                'NF' => sanitize_text_field($data['Name_and_surname']),
                'phone' => sanitize_text_field($data['phone']),
                'ID_status' => sanitize_text_field($data['status']),
            ],
            ['%s', '%s', '%d']
        );
        $insert_id = $this->wpdb->insert_id;
        return ['insert_id' => $insert_id];
    }
}
