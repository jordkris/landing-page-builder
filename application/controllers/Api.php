<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		setWIB();
		$this->load->model(['m_auth', 'm_flashdata', 'm_user','m_landingpage']);
	}

    public function index() {
        // $this->getAll();
        echo 'Error Occured';
    }

    public function getAllLandingPage() {
        $result = $this->m_landingpage->getAll();
        header('Content-Type: application/json');
        echo json_encode($result,JSON_PRETTY_PRINT);
    }
}
