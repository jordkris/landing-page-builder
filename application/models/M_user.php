<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function add($data) {
		$this->db->insert('users', $data);
	}

	public function get($id) {
		return $this->db->get_where('users', ['id' => $id])->row_array();
	}

	public function delete($id) {
		$this->db->delete('users', ['id' => $id]);
	}

	public function get_all() {
		return $this->db->get('users')->result_array();
	}

	public function count_all() {
	    return $this->db->get('users')->num_rows();
	}

    public function get_username($username) {
		return $this->db->get_where('users', ['username' => $username])->row_array();
	}

	public function set_ava($id_user, $photo) {
		$this->db->set('foto', $photo);
		$this->db->where('id', $id_user);
		$this->db->update('users');
	}

	public function set_activation($num, $id_user) {
		$this->db->set('is_active', $num);
		$this->db->where('id', $id_user);
		$this->db->update('users');
	}

	public function count_nonactive() {
		$nonactive = $this->db->get_where('users', ['is_active' => 0]);
		return $nonactive->num_rows();
	}

	public function get_access_menu($data) {
		return $this->db->get_where('user_access_menu', $data);
	}

	public function add_access_menu($data) {
		$this->db->insert('user_access_menu', $data); 
	}

	public function delete_access_menu($data) {
		$this->db->delete('user_access_menu', $data);	
	}

	public function update_und($id_user, $username, $name, $divisi) {
		$this->db->set('username', $username);
		$this->db->set('name', $name);
		$this->db->set('divisi', $divisi);
		$this->db->where('id', $id_user);
		$this->db->update('users');
	}

	public function update_un($id_user, $username, $name) {
		$this->db->set('username', $username);
		$this->db->set('name', $name);
		$this->db->where('id', $id_user);
		$this->db->update('users');
	}

	public function update_password($id_user, $password) {
		$this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
		$this->db->where('id', $id_user);
		$this->db->update('users');
	}

	public function update_photo($id_user, $photo) {
		$photo = str_replace(' ', '_', $photo);
		$this->db->set('foto', $photo);
		$this->db->where('id', $id_user);
		$this->db->update('users');
	}

	public function set_active_time($id_user) {
		$this->db->set('active_time', time());
		$this->db->where('username', $id_user);
		$this->db->update('users');
	}
}

?>