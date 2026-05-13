<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    protected $current_user = null;
    protected $wallet = 0;
    protected $img_url = 'https://cgdemo.sbs/myhospital/uploads/';

    public function __construct()
    {
        parent::__construct();

        // ✅ Common helpers & libraries
        $this->load->helper(['url', 'form', 'image']);
        $this->load->library('session');

        // ✅ Common models
        $this->load->model('Model_users');
        $this->load->model('Mymodel');
        $this->load->model('Model_notifications');
        $this->load->model('User_model'); // 🔥 REQUIRED for wallet

        // ✅ Logged-in user
        $user_id = $this->session->userdata('user_id');

        if ($user_id) {
            $this->current_user = $this->db
                ->get_where('user', ['id' => $user_id])
                ->row();

            // ✅ Wallet balance
            $this->wallet = (float) $this->User_model->get_wallet($user_id);
        }

        // 🔥 MAKE AVAILABLE IN ALL VIEWS
        $this->load->vars([
            'current_user' => $this->current_user,
            'wallet'       => $this->wallet,
            'img_url'      => $this->img_url
        ]);
    }

    protected function add_crud_notification($type, $action, $post_array, $primary_key, $name_field = 'name', $deleted_name = null)
    {
        $this->load->model('Model_notifications');

        $cleanType = ucwords(str_replace('_', ' ', $type));
        $base_url = base_url('supercontrol/' . ucfirst($type) . 's');

        //  Fix: handle plural table name automatically
        if (empty($post_array) && $primary_key) {
            $table = $this->db->table_exists($type) ? $type : $type . 's';
            $post_array = $this->db->get_where($table, ['id' => $primary_key])->row_array() ?? [];
        }

        $name = null;
        if (isset($post_array[$name_field])) {
            $name = $post_array[$name_field];
        } elseif (isset($post_array['type'])) {
            $name = $post_array['type'];
        } elseif (isset($post_array['title'])) {
            $name = $post_array['title'];
        }

        if (isset($post_array['last_name'])) {
            $name = trim($name . ' ' . $post_array['last_name']);
        }

        if ($type === 'hospital_type' && isset($post_array['type'])) {
            $name = $post_array['type'];
        }

        if ($action === 'Deleted') {
            $name_info = $deleted_name ?: ($name ?: 'Unknown ' . $cleanType);
            $message = "{$cleanType} <b>{$name_info}</b> was deleted.";
            $post_array = ['deleted_name' => $name_info];
        } else {
            $name = $name ?: 'Unknown ' . $cleanType;
            $message = "{$cleanType} <b>{$name}</b> has been {$action} successfully.";
        }

        $details = json_encode($post_array, JSON_PRETTY_PRINT);

        //  Optional: Debug logging
        log_message('debug', 'CRUD Notification: ' . print_r([
            'type' => $type,
            'action' => $action,
            'message' => $message,
            'details' => $post_array
        ], true));

        $this->Model_notifications->add_notification(
            $type,
            "{$cleanType} {$action}",
            $message,
            $base_url,
            $details
        );

        return true;
    }
}
