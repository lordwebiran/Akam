<?php
if (!defined('ABSPATH')) {
    exit;
}

class VCA_DBDL
{
    public static function create_table()
    {
        global $wpdb;
        $VCA_status = $wpdb->prefix . 'VCA_status';
        $VCA_Callrequest = $wpdb->prefix . 'VCA_Callrequest';
        $VCA_Floatbutton = $wpdb->prefix . 'VCA_Floatbutton';

        $tables_to_delete = array(
            $VCA_status,
            $VCA_Callrequest,
            $VCA_Floatbutton,
        );
        
        // حذف جدول‌ها
        foreach ($tables_to_delete as $table_name) {
            $sql = "DROP TABLE IF EXISTS $table_name;";
            $wpdb->query($sql);
        }
    }
}
