<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_403 extends CI_Controller {

	public function index()
	{
		$this->load->view('errors/Error_403');
	}
}

?>
