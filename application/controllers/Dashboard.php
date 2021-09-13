<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['title'] = 'Dashboard';
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_dashboard');
        $this->load->view('main_templates/V_footer');
    }
}
