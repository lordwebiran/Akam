<?php
if (!defined('ABSPATH')) {
    exit;
}

class VCA_admin_status_maneger
{
    private $wpdb;
    private $table;
    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . 'VCA_status';
    }
    public function page()
    {
        $status = $this->get_status();
        require VCA_admin . 'views/status/mine.php';
    }
    public function get_status()
    {
        return $this->wpdb->get_results("SELECT * FROM " . $this->table );
    }
}
