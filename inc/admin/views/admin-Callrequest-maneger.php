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
            if (isset($_POST['edit_Callrequest_nonce'])) {
                if (!isset($_POST['edit_Callrequest_nonce']) && !wp_verify_nonce($_POST['edit_Callrequest_nonce'], 'edit_Callrequest')) {
                    exit('Sorry , your nonce did not verify');
                }
                $update = $this->update($_POST['Callrequest_id'], $_POST);
                if ($update) {
                    VCA_Flash_Message::add_message('بروزرسانی با موفقیت انجام شد');
                }
            }
        }

        // Check for deletion action
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            if (isset($_GET['delete_Callrequest_nonce']) && wp_verify_nonce($_GET['delete_Callrequest_nonce'], 'delete_Callrequest')) {
                $this->delete($_GET['id']);
                VCA_Flash_Message::add_message('با موفقیت حذف شد');
                $statuses = $this->get_status();
                $Callrequest = $this->get_Callrequest();
                require VCA_admin . 'views/Callrequest/mine.php';
            }
        } elseif (isset($_GET['action']) && $_GET['action'] == 'edit') {
            $statuses = $this->get_status();
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


    public function update($id, $data)
    {

        $data = [
            'ID_status' => sanitize_text_field($data['Callrequest_status_id']),
        ];
        $where = ['ID' => (int) $id];
        $data_format = ['%d'];
        $where_format = ['%d'];


        return $this->wpdb->update($this->table, $data, $where, $data_format, $where_format);
    }

    public function delete($id)
    {
        $this->wpdb->delete($this->table, ['ID' => $id], ['%d']);
    }
}
