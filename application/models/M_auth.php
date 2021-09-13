<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function set_session($id) {
		$data = [
			'user_id' => $id,
		];
		$this->session->set_userdata($data);
	}

	public function unset_all_sessions() {
		// shell_exec('rmdir /s "'.APPPATH.'cache\session" /q');
		$this->session->unset_userdata('user_id');
	}

	public function get_session() {
		return $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row_array();
	}
}

?>