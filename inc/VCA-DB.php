<?php
if (!defined('ABSPATH')) {
    exit;
}

class VCA_DB
{
    public static function create_table()
    {
        // تعریف جدول
        global $wpdb;
        $VCA_status = $wpdb->prefix . 'VCA_status';
        $VCA_Callrequest = $wpdb->prefix . 'VCA_Callrequest';
        $VCA_Floatbutton = $wpdb->prefix . 'VCA_Floatbutton';

        $charset_collate = $wpdb->get_charset_collate();


        //جدول وضعیت درخواست تماس
        $status_sql = "CREATE TABLE IF NOT EXISTS `" . $VCA_status . "` (
            `ID` bigint(20) NOT NULL AUTO_INCREMENT,
            `name` varchar(128) NOT NULL,
            `img` text NOT NULL,
            PRIMARY KEY (`ID`))
            ENGINE=InnoDB " . $charset_collate . ";";


        //جدول درخواست تماس
        $Callrequest_sql = "CREATE TABLE IF NOT EXISTS `" . $VCA_Callrequest . "` (
            `ID` bigint(20) NOT NULL AUTO_INCREMENT,
            `NF` varchar(128) NOT NULL,
            `phone` INT DEFAULT NULL,
            `status` INT DEFAULT NULL,
            PRIMARY KEY (`ID`),
            KEY `status` (`status`))
            ENGINE=InnoDB " . $charset_collate . ";";

        // تعریف جدول دکمه شناور
        $Floatbutton_sql = "CREATE TABLE IF NOT EXISTS `" . $VCA_Floatbutton . "` (
            `ID` bigint(20) NOT NULL AUTO_INCREMENT,
            `name` varchar(128) NOT NULL,
            `position` INT DEFAULT NULL,
            `link` text NOT NULL,
            `img` text NOT NULL,
            PRIMARY KEY (`ID`))
            ENGINE=InnoDB " . $charset_collate . ";";

        if (!function_exists('dbDelta')) {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        }

        dbDelta($status_sql);
        // اطلاعات برای افزودن
        $data_to_insert = array(
            array(
                'name' => 'تماس گرفته شود',
                'img' => VCA_IMG_FRONT.'phone-arrow-down-left-512.png',
            ),
            array(
                'name' => 'تماس انجام شد',
                'img' => VCA_IMG_FRONT.'phone-hangup-512.png',
            ),
        );

        // افزودن اطلاعات به جدول
        foreach ($data_to_insert as $data) {
            $wpdb->insert($VCA_status, $data);
        }
        dbDelta($Callrequest_sql);
        dbDelta($Floatbutton_sql);
    }
}