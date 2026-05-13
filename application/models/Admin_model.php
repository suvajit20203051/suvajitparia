<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // ── Auth ──────────────────────────────────────────────────
    public function get_admin_by_username($username) {
        return $this->db->get_where('admin_users', ['username' => $username, 'is_active' => 1])->row();
    }

    public function update_last_login($id) {
        $this->db->where('id', $id);
        $this->db->update('admin_users', ['last_login' => date('Y-m-d H:i:s')]);
    }

    public function update_password($id, $hashed) {
        $this->db->where('id', $id);
        return $this->db->update('admin_users', ['password' => $hashed]);
    }

    // ── Dashboard counts ──────────────────────────────────────
    public function get_counts() {
        return [
            'skills'        => $this->db->count_all('skills'),
            'projects'      => $this->db->count_all('projects'),
            'experience'    => $this->db->count_all('experience'),
            'education'     => $this->db->count_all('education'),
            'certifications'=> $this->db->count_all('certifications'),
            'messages'      => $this->db->count_all('contact_messages'),
            'unread'        => $this->db->get_where('contact_messages', ['is_read' => 0])->num_rows(),
        ];
    }

    public function get_recent_messages($limit = 5) {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('contact_messages')->result();
    }

    // ── Profile ───────────────────────────────────────────────
    public function get_profile() {
        return $this->db->get('profile')->row();
    }

    public function update_profile($data) {
        $this->db->where('id', 1);
        return $this->db->update('profile', $data);
    }

    // ── Skills ────────────────────────────────────────────────
    public function get_all_skills() {
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('skills')->result();
    }

    public function get_skill($id) {
        return $this->db->get_where('skills', ['id' => $id])->row();
    }

    public function insert_skill($data) {
        return $this->db->insert('skills', $data);
    }

    public function update_skill($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('skills', $data);
    }

    public function delete_skill($id) {
        return $this->db->delete('skills', ['id' => $id]);
    }

    // ── Projects ──────────────────────────────────────────────
    public function get_all_projects() {
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('projects')->result();
    }

    public function get_project($id) {
        return $this->db->get_where('projects', ['id' => $id])->row();
    }

    public function insert_project($data) {
        return $this->db->insert('projects', $data);
    }

    public function update_project($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('projects', $data);
    }

    public function delete_project($id) {
        return $this->db->delete('projects', ['id' => $id]);
    }

    // ── Experience ────────────────────────────────────────────
    public function get_all_experience() {
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('experience')->result();
    }

    public function get_experience($id) {
        return $this->db->get_where('experience', ['id' => $id])->row();
    }

    public function insert_experience($data) {
        return $this->db->insert('experience', $data);
    }

    public function update_experience($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('experience', $data);
    }

    public function delete_experience($id) {
        return $this->db->delete('experience', ['id' => $id]);
    }

    // ── Education ─────────────────────────────────────────────
    public function get_all_education() {
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('education')->result();
    }

    public function get_education($id) {
        return $this->db->get_where('education', ['id' => $id])->row();
    }

    public function insert_education($data) {
        return $this->db->insert('education', $data);
    }

    public function update_education($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('education', $data);
    }

    public function delete_education($id) {
        return $this->db->delete('education', ['id' => $id]);
    }

    // ── Certifications ────────────────────────────────────────
    public function get_all_certifications() {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('certifications')->result();
    }

    public function get_certification($id) {
        return $this->db->get_where('certifications', ['id' => $id])->row();
    }

    public function insert_certification($data) {
        return $this->db->insert('certifications', $data);
    }

    public function update_certification($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('certifications', $data);
    }

    public function delete_certification($id) {
        return $this->db->delete('certifications', ['id' => $id]);
    }

    // ── Messages ──────────────────────────────────────────────
    public function get_all_messages() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('contact_messages')->result();
    }

    public function get_message($id) {
        return $this->db->get_where('contact_messages', ['id' => $id])->row();
    }

    public function mark_read($id) {
        $this->db->where('id', $id);
        return $this->db->update('contact_messages', ['is_read' => 1]);
    }

    public function delete_message($id) {
        return $this->db->delete('contact_messages', ['id' => $id]);
    }
}
