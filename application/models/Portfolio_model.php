<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // ── Profile ──────────────────────────────────────────────
    public function get_profile() {
        return $this->db->get('profile')->row();
    }

    // ── Skills ───────────────────────────────────────────────
    public function get_skills() {
        $this->db->order_by('sort_order', 'ASC');
        $result = $this->db->get('skills')->result();
        $grouped = [];
        foreach ($result as $skill) {
            $grouped[$skill->category][] = $skill;
        }
        return $grouped;
    }

    // ── Projects ─────────────────────────────────────────────
    public function get_projects($featured_only = FALSE) {
        if ($featured_only) {
            $this->db->where('featured', 1);
        }
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('projects')->result();
    }

    // ── Experience ───────────────────────────────────────────
    public function get_experience() {
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('experience')->result();
    }

    // ── Education ────────────────────────────────────────────
    public function get_education() {
        $this->db->order_by('sort_order', 'ASC');
        return $this->db->get('education')->result();
    }

    // ── Certifications ───────────────────────────────────────
    public function get_certifications() {
        return $this->db->get('certifications')->result();
    }

    // ── Save Contact Message ─────────────────────────────────
    public function save_message($data) {
        $insert = [
            'name'    => $this->security->xss_clean($data['name']),
            'email'   => $this->security->xss_clean($data['email']),
            'subject' => $this->security->xss_clean($data['subject']),
            'message' => $this->security->xss_clean($data['message']),
        ];
        return $this->db->insert('contact_messages', $insert);
    }
}
