<?php
if (!defined('ABSPATH')) {
    exit;
}

class VCA_Floatbutton_maneger_ferant
{
    private $wpdb;
    private $table;

    const TABLE_NAME = 'vca_floatbutton';

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . self::TABLE_NAME;
    }

    public function page()
    {

        $Floatbutton = $this->get_Floatbutton();
        require VCA_INC . 'frant/views/Floatbutton/Floatbutton.php';
    }

    public function get_Floatbutton()
    {
        return $this->wpdb->get_results("SELECT * FROM " . $this->table . " ORDER BY position ASC");
    }
}
