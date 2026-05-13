<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model', 'am');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }

    // ── Auth guard ────────────────────────────────────────────
    private function _require_login() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }

    private function _load_view($view, $data = []) {
        $data['admin_username'] = $this->session->userdata('admin_username');
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/' . $view, $data);
        $this->load->view('admin/layout/footer', $data);
    }

    // ── Login ─────────────────────────────────────────────────
    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }
        redirect('admin/login');
    }

    public function login() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() === FALSE) {
                $data['error'] = 'Please fill in all fields.';
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $admin    = $this->am->get_admin_by_username($username);

                if ($admin && password_verify($password, $admin->password)) {
                    $this->session->set_userdata([
                        'admin_logged_in' => TRUE,
                        'admin_id'        => $admin->id,
                        'admin_username'  => $admin->username,
                    ]);
                    $this->am->update_last_login($admin->id);
                    redirect('admin/dashboard');
                } else {
                    $data['error'] = 'Invalid username or password.';
                }
            }
        }

        $this->load->view('admin/login', $data ?? []);
    }

    public function logout() {
        $this->session->unset_userdata(['admin_logged_in', 'admin_id', 'admin_username']);
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    // ── Dashboard ─────────────────────────────────────────────
    public function dashboard() {
        $this->_require_login();
        $data['counts']   = $this->am->get_counts();
        $data['messages'] = $this->am->get_recent_messages(5);
        $data['title']    = 'Dashboard';
        $this->_load_view('dashboard', $data);
    }

    // ── Profile ───────────────────────────────────────────────
    public function profile() {
        $this->_require_login();
        $data['profile'] = $this->am->get_profile();
        $data['title']   = 'Edit Profile';
        $data['success'] = $this->session->flashdata('success');
        $data['error']   = $this->session->flashdata('error');
        $this->_load_view('profile', $data);
    }

    public function profile_update() {
        $this->_require_login();
        if ($this->input->method() !== 'post') redirect('admin/profile');

        $this->form_validation->set_rules('name',      'Name',      'required|trim|max_length[100]');
        $this->form_validation->set_rules('tagline',   'Tagline',   'required|trim|max_length[255]');
        $this->form_validation->set_rules('bio',       'Bio',       'required|trim');
        $this->form_validation->set_rules('email',     'Email',     'required|trim|valid_email');
        $this->form_validation->set_rules('phone',     'Phone',     'required|trim|max_length[20]');
        $this->form_validation->set_rules('location',  'Location',  'required|trim|max_length[100]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors(' ', ' | '));
            redirect('admin/profile');
        }

        $this->load->library('upload');

        $update = [
            'name'       => $this->input->post('name'),
            'tagline'    => $this->input->post('tagline'),
            'bio'        => $this->input->post('bio'),
            'email'      => $this->input->post('email'),
            'phone'      => $this->input->post('phone'),
            'location'   => $this->input->post('location'),
            'github'     => $this->input->post('github'),
            'linkedin'   => $this->input->post('linkedin'),
            'hackerrank' => $this->input->post('hackerrank'),
        ];

        // ── Profile Image Upload ──────────────────────────────
        if (!empty($_FILES['profile_image']['name'])) {
            $img_config = [
                'upload_path'   => FCPATH . 'assets/img/',
                'allowed_types' => 'jpg|jpeg|png|gif|webp',
                'max_size'      => 2048,
                'file_name'     => 'avatar',
                'overwrite'     => TRUE,
            ];
            $this->upload->initialize($img_config);
            if ($this->upload->do_upload('profile_image')) {
                $img_data = $this->upload->data();
                $update['profile_image'] = $img_data['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Image upload failed: ' . $this->upload->display_errors('', ''));
                redirect('admin/profile');
            }
        }

        // ── Resume Upload ─────────────────────────────────────
        if (!empty($_FILES['resume']['name'])) {
            $resume_config = [
                'upload_path'   => FCPATH . 'assets/resume/',
                'allowed_types' => 'pdf',
                'max_size'      => 5120,
                'file_name'     => 'Suvajit_Paria_Resume',
                'overwrite'     => TRUE,
            ];
            $this->upload->initialize($resume_config);
            if (!$this->upload->do_upload('resume')) {
                $this->session->set_flashdata('error', 'Resume upload failed: ' . $this->upload->display_errors('', ''));
                redirect('admin/profile');
            }
        }

        $this->am->update_profile($update);
        $this->session->set_flashdata('success', 'Profile updated successfully.');
        redirect('admin/profile');
    }

    // ── Skills ────────────────────────────────────────────────
    public function skills() {
        $this->_require_login();
        $data['skills']  = $this->am->get_all_skills();
        $data['title']   = 'Skills';
        $data['success'] = $this->session->flashdata('success');
        $data['error']   = $this->session->flashdata('error');
        $this->_load_view('skills/index', $data);
    }

    public function skill_add() {
        $this->_require_login();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('name',       'Name',       'required|trim|max_length[100]');
            $this->form_validation->set_rules('category',   'Category',   'required|trim|max_length[50]');
            $this->form_validation->set_rules('percentage', 'Percentage', 'required|integer|greater_than[0]|less_than_equal_to[100]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
            } else {
                $this->am->insert_skill([
                    'name'       => $this->input->post('name'),
                    'category'   => $this->input->post('category'),
                    'percentage' => $this->input->post('percentage'),
                    'icon'       => $this->input->post('icon'),
                    'sort_order' => (int)$this->input->post('sort_order'),
                ]);
                $this->session->set_flashdata('success', 'Skill added successfully.');
            }
            redirect('admin/skills');
        }
        $data['title'] = 'Add Skill';
        $this->_load_view('skills/form', $data);
    }

    public function skill_edit($id) {
        $this->_require_login();
        $data['skill'] = $this->am->get_skill($id);
        if (!$data['skill']) { redirect('admin/skills'); }

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('name',       'Name',       'required|trim|max_length[100]');
            $this->form_validation->set_rules('category',   'Category',   'required|trim|max_length[50]');
            $this->form_validation->set_rules('percentage', 'Percentage', 'required|integer|greater_than[0]|less_than_equal_to[100]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
                redirect('admin/skills');
            } else {
                $this->am->update_skill($id, [
                    'name'       => $this->input->post('name'),
                    'category'   => $this->input->post('category'),
                    'percentage' => $this->input->post('percentage'),
                    'icon'       => $this->input->post('icon'),
                    'sort_order' => (int)$this->input->post('sort_order'),
                ]);
                $this->session->set_flashdata('success', 'Skill updated successfully.');
                redirect('admin/skills');
            }
        }
        $data['title'] = 'Edit Skill';
        $this->_load_view('skills/form', $data);
    }

    public function skill_delete($id) {
        $this->_require_login();
        $this->am->delete_skill($id);
        $this->session->set_flashdata('success', 'Skill deleted.');
        redirect('admin/skills');
    }

    // ── Projects ──────────────────────────────────────────────
    public function projects() {
        $this->_require_login();
        $data['projects'] = $this->am->get_all_projects();
        $data['title']    = 'Projects';
        $data['success']  = $this->session->flashdata('success');
        $data['error']    = $this->session->flashdata('error');
        $this->_load_view('projects/index', $data);
    }

    public function project_add() {
        $this->_require_login();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('title',       'Title',       'required|trim|max_length[150]');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');
            $this->form_validation->set_rules('tech_stack',  'Tech Stack',  'required|trim|max_length[255]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
            } else {
                $this->am->insert_project([
                    'title'       => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'tech_stack'  => $this->input->post('tech_stack'),
                    'live_url'    => $this->input->post('live_url'),
                    'github_url'  => $this->input->post('github_url'),
                    'category'    => $this->input->post('category'),
                    'featured'    => (int)$this->input->post('featured'),
                    'sort_order'  => (int)$this->input->post('sort_order'),
                ]);
                $this->session->set_flashdata('success', 'Project added successfully.');
            }
            redirect('admin/projects');
        }
        $data['title'] = 'Add Project';
        $this->_load_view('projects/form', $data);
    }

    public function project_edit($id) {
        $this->_require_login();
        $data['project'] = $this->am->get_project($id);
        if (!$data['project']) { redirect('admin/projects'); }

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('title',       'Title',       'required|trim|max_length[150]');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');
            $this->form_validation->set_rules('tech_stack',  'Tech Stack',  'required|trim|max_length[255]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
                redirect('admin/projects');
            } else {
                $this->am->update_project($id, [
                    'title'       => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'tech_stack'  => $this->input->post('tech_stack'),
                    'live_url'    => $this->input->post('live_url'),
                    'github_url'  => $this->input->post('github_url'),
                    'category'    => $this->input->post('category'),
                    'featured'    => (int)$this->input->post('featured'),
                    'sort_order'  => (int)$this->input->post('sort_order'),
                ]);
                $this->session->set_flashdata('success', 'Project updated successfully.');
                redirect('admin/projects');
            }
        }
        $data['title'] = 'Edit Project';
        $this->_load_view('projects/form', $data);
    }

    public function project_delete($id) {
        $this->_require_login();
        $this->am->delete_project($id);
        $this->session->set_flashdata('success', 'Project deleted.');
        redirect('admin/projects');
    }

    // ── Experience ────────────────────────────────────────────
    public function experience() {
        $this->_require_login();
        $data['experience'] = $this->am->get_all_experience();
        $data['title']      = 'Experience';
        $data['success']    = $this->session->flashdata('success');
        $data['error']      = $this->session->flashdata('error');
        $this->_load_view('experience/index', $data);
    }

    public function experience_add() {
        $this->_require_login();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('company',     'Company',     'required|trim|max_length[150]');
            $this->form_validation->set_rules('role',        'Role',        'required|trim|max_length[150]');
            $this->form_validation->set_rules('duration',    'Duration',    'required|trim|max_length[100]');
            $this->form_validation->set_rules('location',    'Location',    'required|trim|max_length[100]');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
            } else {
                $this->am->insert_experience([
                    'company'     => $this->input->post('company'),
                    'role'        => $this->input->post('role'),
                    'duration'    => $this->input->post('duration'),
                    'location'    => $this->input->post('location'),
                    'description' => $this->input->post('description'),
                    'type'        => $this->input->post('type'),
                    'sort_order'  => (int)$this->input->post('sort_order'),
                ]);
                $this->session->set_flashdata('success', 'Experience added successfully.');
            }
            redirect('admin/experience');
        }
        $data['title'] = 'Add Experience';
        $this->_load_view('experience/form', $data);
    }

    public function experience_edit($id) {
        $this->_require_login();
        $data['exp'] = $this->am->get_experience($id);
        if (!$data['exp']) { redirect('admin/experience'); }

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('company',     'Company',     'required|trim|max_length[150]');
            $this->form_validation->set_rules('role',        'Role',        'required|trim|max_length[150]');
            $this->form_validation->set_rules('duration',    'Duration',    'required|trim|max_length[100]');
            $this->form_validation->set_rules('location',    'Location',    'required|trim|max_length[100]');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
                redirect('admin/experience');
            } else {
                $this->am->update_experience($id, [
                    'company'     => $this->input->post('company'),
                    'role'        => $this->input->post('role'),
                    'duration'    => $this->input->post('duration'),
                    'location'    => $this->input->post('location'),
                    'description' => $this->input->post('description'),
                    'type'        => $this->input->post('type'),
                    'sort_order'  => (int)$this->input->post('sort_order'),
                ]);
                $this->session->set_flashdata('success', 'Experience updated successfully.');
                redirect('admin/experience');
            }
        }
        $data['title'] = 'Edit Experience';
        $this->_load_view('experience/form', $data);
    }

    public function experience_delete($id) {
        $this->_require_login();
        $this->am->delete_experience($id);
        $this->session->set_flashdata('success', 'Experience deleted.');
        redirect('admin/experience');
    }

    // ── Education ─────────────────────────────────────────────
    public function education() {
        $this->_require_login();
        $data['education'] = $this->am->get_all_education();
        $data['title']     = 'Education';
        $data['success']   = $this->session->flashdata('success');
        $data['error']     = $this->session->flashdata('error');
        $this->_load_view('education/index', $data);
    }

    public function education_add() {
        $this->_require_login();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('institution', 'Institution', 'required|trim|max_length[200]');
            $this->form_validation->set_rules('degree',      'Degree',      'required|trim|max_length[200]');
            $this->form_validation->set_rules('year',        'Year',        'required|trim|max_length[20]');
            $this->form_validation->set_rules('location',    'Location',    'required|trim|max_length[100]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
            } else {
                $this->am->insert_education([
                    'institution' => $this->input->post('institution'),
                    'degree'      => $this->input->post('degree'),
                    'year'        => $this->input->post('year'),
                    'location'    => $this->input->post('location'),
                    'score'       => $this->input->post('score'),
                    'sort_order'  => (int)$this->input->post('sort_order'),
                ]);
                $this->session->set_flashdata('success', 'Education added successfully.');
            }
            redirect('admin/education');
        }
        $data['title'] = 'Add Education';
        $this->_load_view('education/form', $data);
    }

    public function education_edit($id) {
        $this->_require_login();
        $data['edu'] = $this->am->get_education($id);
        if (!$data['edu']) { redirect('admin/education'); }

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('institution', 'Institution', 'required|trim|max_length[200]');
            $this->form_validation->set_rules('degree',      'Degree',      'required|trim|max_length[200]');
            $this->form_validation->set_rules('year',        'Year',        'required|trim|max_length[20]');
            $this->form_validation->set_rules('location',    'Location',    'required|trim|max_length[100]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
                redirect('admin/education');
            } else {
                $this->am->update_education($id, [
                    'institution' => $this->input->post('institution'),
                    'degree'      => $this->input->post('degree'),
                    'year'        => $this->input->post('year'),
                    'location'    => $this->input->post('location'),
                    'score'       => $this->input->post('score'),
                    'sort_order'  => (int)$this->input->post('sort_order'),
                ]);
                $this->session->set_flashdata('success', 'Education updated successfully.');
                redirect('admin/education');
            }
        }
        $data['title'] = 'Edit Education';
        $this->_load_view('education/form', $data);
    }

    public function education_delete($id) {
        $this->_require_login();
        $this->am->delete_education($id);
        $this->session->set_flashdata('success', 'Education deleted.');
        redirect('admin/education');
    }

    // ── Certifications ────────────────────────────────────────
    public function certifications() {
        $this->_require_login();
        $data['certs']   = $this->am->get_all_certifications();
        $data['title']   = 'Certifications';
        $data['success'] = $this->session->flashdata('success');
        $data['error']   = $this->session->flashdata('error');
        $this->_load_view('certifications/index', $data);
    }

    public function certification_add() {
        $this->_require_login();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('title',  'Title',  'required|trim|max_length[200]');
            $this->form_validation->set_rules('issuer', 'Issuer', 'required|trim|max_length[100]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
            } else {
                $this->am->insert_certification([
                    'title'  => $this->input->post('title'),
                    'issuer' => $this->input->post('issuer'),
                    'year'   => $this->input->post('year'),
                ]);
                $this->session->set_flashdata('success', 'Certification added successfully.');
            }
            redirect('admin/certifications');
        }
        $data['title'] = 'Add Certification';
        $this->_load_view('certifications/form', $data);
    }

    public function certification_edit($id) {
        $this->_require_login();
        $data['cert'] = $this->am->get_certification($id);
        if (!$data['cert']) { redirect('admin/certifications'); }

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('title',  'Title',  'required|trim|max_length[200]');
            $this->form_validation->set_rules('issuer', 'Issuer', 'required|trim|max_length[100]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
                redirect('admin/certifications');
            } else {
                $this->am->update_certification($id, [
                    'title'  => $this->input->post('title'),
                    'issuer' => $this->input->post('issuer'),
                    'year'   => $this->input->post('year'),
                ]);
                $this->session->set_flashdata('success', 'Certification updated successfully.');
                redirect('admin/certifications');
            }
        }
        $data['title'] = 'Edit Certification';
        $this->_load_view('certifications/form', $data);
    }

    public function certification_delete($id) {
        $this->_require_login();
        $this->am->delete_certification($id);
        $this->session->set_flashdata('success', 'Certification deleted.');
        redirect('admin/certifications');
    }

    // ── Messages ──────────────────────────────────────────────
    public function messages() {
        $this->_require_login();
        $data['messages'] = $this->am->get_all_messages();
        $data['title']    = 'Contact Messages';
        $data['success']  = $this->session->flashdata('success');
        $this->_load_view('messages/index', $data);
    }

    public function message_view($id) {
        $this->_require_login();
        $data['msg']   = $this->am->get_message($id);
        if (!$data['msg']) { redirect('admin/messages'); }
        $this->am->mark_read($id);
        $data['title'] = 'View Message';
        $this->_load_view('messages/view', $data);
    }

    public function message_delete($id) {
        $this->_require_login();
        $this->am->delete_message($id);
        $this->session->set_flashdata('success', 'Message deleted.');
        redirect('admin/messages');
    }

    // ── Change Password ───────────────────────────────────────
    public function change_password() {
        $this->_require_login();
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('current_password', 'Current Password', 'required');
            $this->form_validation->set_rules('new_password',     'New Password',     'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', validation_errors(' ', ' | '));
            } else {
                $admin = $this->am->get_admin_by_username($this->session->userdata('admin_username'));
                if ($admin && password_verify($this->input->post('current_password'), $admin->password)) {
                    $this->am->update_password($admin->id, password_hash($this->input->post('new_password'), PASSWORD_DEFAULT));
                    $this->session->set_flashdata('success', 'Password changed successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Current password is incorrect.');
                }
            }
            redirect('admin/change_password');
        }
        $data['title']   = 'Change Password';
        $data['success'] = $this->session->flashdata('success');
        $data['error']   = $this->session->flashdata('error');
        $this->_load_view('change_password', $data);
    }
}
