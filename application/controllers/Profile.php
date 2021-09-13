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
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'My Profile';
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
}
