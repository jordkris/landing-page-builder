<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        setWIB();
        $this->load->model(['m_auth', 'm_flashdata', 'm_user']);
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('user_id');   
        $this->u($id);
    }

    public function u($user_id)
    {
        $data['profile'] = $this->m_user->getUserById($user_id);
        $data['title'] = 'Profile';
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_profile');
        $this->load->view('main_templates/V_footer');
    }

    public function edit()
    {
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'Edit Profile';
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_profile_edit');
        $this->load->view('main_templates/V_footer');
    }

    public function changepassword()
    {
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'Change Password';
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_profile_changepassword');
        $this->load->view('main_templates/V_footer');
    }

    public function manage() {
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'Manage Users Account';
        if($data['profile']['role_id'] == 1) {
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_account_manage');
        $this->load->view('main_templates/V_footer');
        } else {
            redirect('error_403');
        }
    }
}
