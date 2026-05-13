<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Portfolio_model', 'pm');
        $this->load->library(['form_validation', 'email']);
        $this->load->helper(['url', 'form']);
    }

    // ── Main Page ─────────────────────────────────────────────
    public function index() {
        $data['profile']          = $this->pm->get_profile();
        $data['skills']           = $this->pm->get_skills();
        $data['projects']         = $this->pm->get_projects();
        $data['experience']       = $this->pm->get_experience();
        $data['education']        = $this->pm->get_education();
        $data['certifications']   = $this->pm->get_certifications();
        $data['flash_success']    = $this->session->flashdata('success');
        $data['flash_error']      = $this->session->flashdata('error');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('sections/hero', $data);
        $this->load->view('sections/about', $data);
        $this->load->view('sections/skills', $data);
        $this->load->view('sections/experience', $data);
        $this->load->view('sections/projects', $data);
        $this->load->view('sections/education', $data);
        $this->load->view('sections/contact', $data);
        $this->load->view('templates/footer', $data);
    }

    // ── Contact Form Submit ───────────────────────────────────
    public function send_message() {
        if ($this->input->method() !== 'post') {
            redirect('/');
        }

        $this->form_validation->set_rules('name',    'Name',    'required|trim|max_length[100]');
        $this->form_validation->set_rules('email',   'Email',   'required|trim|valid_email|max_length[100]');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|max_length[200]');
        $this->form_validation->set_rules('message', 'Message', 'required|trim|min_length[10]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/#contact');
        } else {
            $saved = $this->pm->save_message([
                'name'    => $this->input->post('name'),
                'email'   => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
            ]);

            if ($saved) {
                $this->session->set_flashdata('success', 'Thank you! Your message has been sent successfully.');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            }
            redirect('/#contact');
        }
    }
}
