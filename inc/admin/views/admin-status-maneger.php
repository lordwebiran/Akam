<?php
if (!defined('ABSPATH')) {
    exit;
}

class VCA_admin_status_maneger
{
    private $wpdb;
    private $table;

    const TABLE_NAME = 'VCA_status';
    const ADD_STATUS_NONCE = 'add_status';

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . self::TABLE_NAME;
    }

    public function page()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_status_nonce']) && wp_verify_nonce($_POST['add_status_nonce'], self::ADD_STATUS_NONCE)) {
                $insert = $this->insert($_POST);
                $insert ? VCA_Flash_Message::add_message(' با موفقیت ایجاد') : VCA_Flash_Message::add_message(' با موفقیت ایجاد نشد', 1);
            }

            if (isset($_POST['edit_status_nonce'])) {
                if (!isset($_POST['edit_status_nonce']) && !wp_verify_nonce($_POST['edit_status_nonce'], 'edit_status')) {
                    exit('Sorry , your nonce did not verify');
                }
                $update = $this->update($_POST['order_id'], $_POST);
                $update ? VCA_Flash_Message::add_message('بروزرسانی با موفقیت انجام شد') : VCA_Flash_Message::add_message(' با موفقیت بروز رسانی نشد', 1);
            }
        }

        // Check for deletion action
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            if (isset($_GET['delete_status_nonce']) && wp_verify_nonce($_GET['delete_status_nonce'], 'delete_status')) {
                $this->delete($_GET['id']);
                VCA_Flash_Message::add_message('با موفقیت حذف شد');
                $status = $this->get_status();
                require VCA_admin . 'views/status/mine.php';
            }
        } elseif (isset($_GET['action']) && $_GET['action'] == 'edit') {
            $status = $this->status($_GET['id']);
            include VCA_admin . 'views/status/edit.php';
        } else {
            $status = $this->get_status();
            require VCA_admin . 'views/status/mine.php';
        }
    }

    public function get_status()
    {
        return $this->wpdb->get_results("SELECT * FROM " . $this->table);
    }
    private function status($id)
    {
        return $this->wpdb->get_row($this->wpdb->prepare("SELECT * FROM " . $this->table . " WHERE ID=%d", $id));
    }

    private function insert($data)
    {
        $data = [
            'name' => sanitize_text_field($data['name']),
            'icon' => sanitize_text_field($data['icon']),
            'icon_color' => sanitize_text_field($data['status-icon-color'])
        ];

        $data_format = ['%s', '%s', '%s'];
        $insert = $this->wpdb->insert($this->table, $data, $data_format);

        return $insert ? $this->wpdb->insert_id : null;
    }

    public function update($id, $data)
    {

        $data = [
            'name' => sanitize_text_field($data['name']),
            'icon' => sanitize_text_field($data['icon']),
            'icon_color' => sanitize_text_field($data['status-icon-color'])
        ];
        $where = ['ID' => (int) $id];
        $data_format = ['%s', '%s', '%s'];
        $where_format = ['%d'];


        return $this->wpdb->update($this->table, $data, $where, $data_format, $where_format);
    }

    public function delete($id)
    {
        $this->wpdb->delete($this->table, ['ID' => $id], ['%d']);
    }
}