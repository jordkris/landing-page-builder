<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Id extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_landingpage', 'm_flashdata']);
        setWIB();
    }
    public function index($token)
    {
        $this->d($token);
    }

    public function d($token)
    {
        if ($this->m_landingpage->isValidDraftToken($token) > 0) {
            if (!$this->session->userdata('user_id')) {
                redirect('error_403');
            } else {
                $this->load->view('landingpage/v_header');
                $this->load->view('landingpage/v_main');
                $this->load->view('landingpage/v_footer');
            }
        } else {
            redirect('error_404');
        }
    }

    public function p($subUri)
    {
        $complete_url = base_url('id/p/') . $subUri;
        if ($this->m_landingpage->isValidUrl($complete_url) > 0) {
            $status = $this->m_landingpage->isPublished($complete_url)['is-published'];
            if ($status == "1") {
                $this->load->view('landingpage/v_header');
                $this->load->view('landingpage/v_main');
                $this->load->view('landingpage/v_footer');
            } else {
                redirect('error_404');
            }
        } else {
            redirect('error_404');
        }
    }

    public function r($redirectUri)
    {
        $this->m_flashdata->set($this->input->get('type'), str_replace("_", " ", $this->input->get('message')));
        redirect(str_replace("_", "/", $redirectUri));
    }
}
