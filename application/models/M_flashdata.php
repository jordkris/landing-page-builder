<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_flashdata extends CI_Model
{
	public function set($color, $description)
	{
		if ($color == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><i class="fas fa-check-circle"></i> ' . $description . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>');
		} else if ($color == 'warning') {
			$this->session->set_flashdata('message', '<div class="alert alert-warning mt-3" role="alert"><i class="fas fa-exclamation-triangle"></i> ' . $description . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>');
		} else if ($color == 'danger') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert"><i class="fas fa-exclamation-circle"></i> ' . $description . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>');
		}
	}
}
