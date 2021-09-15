<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
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
        $data['title'] = 'Create New Landing Page';
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_landingpage');
        $this->load->view('main_templates/V_footer');
    }

    public function new()
    {
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'New Landing Page';
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/landingpage/V_00_product_main');
        $this->load->view('main_templates/V_footer');
    }

    public function list()
    {
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'List Landing Page';
        $this->load->view('main_templates/V_header', $data);
        $this->load->view('main_templates/V_topbar');
        $this->load->view('main_templates/V_sidebar');
        $this->load->view('main/V_landingpage_list');
        $this->load->view('main_templates/V_footer');
    }
}
