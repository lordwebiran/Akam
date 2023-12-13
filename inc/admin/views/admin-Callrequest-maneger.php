<?php
if (!defined('ABSPATH')) {
    exit;
}

class VCA_admin_Callrequest_maneger
{
    private $wpdb;
    private $table;
    private $status;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . 'VCA_Callrequest';
        $this->status = $wpdb->prefix . 'VCA_status';
    }

    public function page()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_Callrequest_nonce']) && wp_verify_nonce($_POST['add_Callrequest_nonce'], 'add_Callrequest')) {
                $insert = $this->insert($_POST);
                if ($insert) {
                    VCA_Flash_Message::add_message(' با موفقیت ایجاد');
                } else {
                    VCA_Flash_Message::add_message(' با موفقیت ایجاد نشد', 1);
                }
            }

            if (isset($_POST['edit_Callrequest_nonce'])) {
                if (!isset($_POST['edit_Callrequest_nonce']) && !wp_verify_nonce($_POST['edit_Callrequest_nonce'], 'edit_Callrequest')) {
                    exit('Sorry , your nonce did not verify');
                }
                $update = $this->update($_POST['order_id'], $_POST);
                if ($update) {
                    VC_Flash_Message::add_message('بروزرسانی با موفقیت انجام شد');
                }
            }
        }

        // Check for deletion action
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            if (isset($_GET['delete_Callrequest_nonce']) && wp_verify_nonce($_GET['delete_Callrequest_nonce'], 'delete_Callrequest')) {
                $this->delete($_GET['id']);
                VCA_Flash_Message::add_message('با موفقیت حذف شد');
            }
        } elseif (isset($_GET['action']) && $_GET['action'] == 'edit') {
            $Callrequest = $this->Callrequest($_GET['id']);
            include VCA_admin . 'views/Callrequest/edit.php';
        } else {
            $statuses = $this->get_status();
            $Callrequest = $this->get_Callrequest();
            require VCA_admin . 'views/Callrequest/mine.php';
        }
    }

    public function get_Callrequest()
    {
        return $this->wpdb->get_results("SELECT * FROM " . $this->table);
    }
    private function Callrequest($id)
    {
        return $this->wpdb->get_row($this->wpdb->prepare("SELECT * FROM " . $this->table . " WHERE ID=%d", $id));
    }
    private function status($id)
    {
        return $this->wpdb->get_row($this->wpdb->prepare("SELECT * FROM " . $this->status . " WHERE ID=%d", $id));
    }
    private function Callreques_status($status_id)
    {
        $result = $this->wpdb->get_results($this->wpdb->prepare("SELECT * FROM " . $this->table . " WHERE ID_status=%d", $status_id));

        return count($result);
    }


    public function get_status()
    {
        return $this->wpdb->get_results("SELECT * FROM " . $this->status);
    }

    private function insert($data)
    {
        $data = [
            'name' => sanitize_text_field($data['name']),
            'icon' => sanitize_text_field($data['icon']),
            'icon_color' => sanitize_text_field($data['Callrequest-icon-color'])
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
            'icon_color' => sanitize_text_field($data['Callrequest-icon-color'])
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
