<?php
if (!defined('ABSPATH')) {
    exit;
}

class VCA_admin_Floatbutton_maneger
{
    private $wpdb;
    private $table;

    const TABLE_NAME = 'VCA_Floatbutton';
    const ADD_Floatbutton_NONCE = 'add_Floatbutton';

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . self::TABLE_NAME;
    }

    public function page()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_Floatbutton_nonce']) && wp_verify_nonce($_POST['add_Floatbutton_nonce'], self::ADD_Floatbutton_NONCE)) {
                $insert = $this->insert($_POST);
                $insert ? VCA_Flash_Message::add_message(' با موفقیت ایجاد') : VCA_Flash_Message::add_message(' با موفقیت ایجاد نشد', 1);
            }

            if (isset($_POST['edit_Floatbutton_nonce'])) {
                if (!isset($_POST['edit_Floatbutton_nonce']) && !wp_verify_nonce($_POST['edit_Floatbutton_nonce'], 'edit_Floatbutton')) {
                    exit('Sorry , your nonce did not verify');
                }
                $update = $this->update($_POST['Floatbutton_id'], $_POST);
                $update ? VCA_Flash_Message::add_message('بروزرسانی با موفقیت انجام شد') : VCA_Flash_Message::add_message(' با موفقیت بروز رسانی نشد', 1);
            }
        }

        // Check for deletion action
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            if (isset($_GET['delete_Floatbutton_nonce']) && wp_verify_nonce($_GET['delete_Floatbutton_nonce'], 'delete_Floatbutton')) {
                $this->delete($_GET['id']);
                VCA_Flash_Message::add_message('با موفقیت حذف شد');
                $Floatbutton = $this->get_Floatbutton();
                require VCA_admin . 'views/Floatbutton/mine.php';
            }
        } elseif (isset($_GET['action']) && $_GET['action'] == 'edit') {
            $Floatbutton = $this->Floatbutton($_GET['id']);
            include VCA_admin . 'views/Floatbutton/edit.php';
        } else {
            $Floatbutton = $this->get_Floatbutton();
            require VCA_admin . 'views/Floatbutton/mine.php';
        }
    }

    public function get_Floatbutton()
    {
        return $this->wpdb->get_results("SELECT * FROM " . $this->table . " ORDER BY position ASC");
    }
    private function Floatbutton($id)
    {
        return $this->wpdb->get_row($this->wpdb->prepare("SELECT * FROM " . $this->table . " WHERE ID=%d", $id));
    }

    private function insert($data)
    {
        $data = [
            'name' => sanitize_text_field($data['Floatbutton-name']),
            'position' => sanitize_text_field($data['Floatbutton-position']),
            'link' => sanitize_text_field($data['Floatbutton-link']),
            'icon' => sanitize_text_field($data['Floatbutton-icon']),
            'icon_color' => sanitize_text_field($data['Floatbutton-icon-color'])
        ];

        $data_format = ['%s', '%d', '%s', '%s', '%s'];
        $insert = $this->wpdb->insert($this->table, $data, $data_format);

        return $insert ? $this->wpdb->insert_id : null;
    }

    public function update($id, $data)
    {

        $data = [
            'name' => sanitize_text_field($data['Floatbutton-name']),
            'position' => sanitize_text_field($data['Floatbutton-position']),
            'link' => sanitize_text_field($data['Floatbutton-link']),
            'icon' => sanitize_text_field($data['Floatbutton-icon']),
            'icon_color' => sanitize_text_field($data['Floatbutton-icon-color'])
        ];
        $where = ['ID' => (int) $id];
        $data_format = ['%s', '%d', '%s', '%s', '%s'];
        $where_format = ['%d'];


        return $this->wpdb->update($this->table, $data, $where, $data_format, $where_format);
    }

    public function delete($id)
    {
        $this->wpdb->delete($this->table, ['ID' => $id], ['%d']);
    }
}