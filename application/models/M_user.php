<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function add($data) {
		$this->db->insert('users', $data);
	}

	public function getUserById($id) {
		return $this->db->get_where('users', ['id' => $id])->row_array();
	}

	public function delete($id) {
		$this->db->delete('users', ['id' => $id]);
	}

	public function get_all() {
		$allUser = $this->db->get('users')->result_array();
        $res = [];
        foreach ($allUser as $key => $val) {
            $res[$key] = $val;
            unset($res[$key]['password']);
        }
        return $res;
	}

	public function upload_config($path) {
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);
    }

    public function upload_file($path, $postName)
    {
        if (!empty($_FILES[$postName]['name'])) {
            $_FILES['file']['name'] = $_FILES[$postName]['name'];
            $_FILES['file']['type'] = $_FILES[$postName]['type'];
            $_FILES['file']['tmp_name'] = $_FILES[$postName]['tmp_name'];
            $_FILES['file']['error'] = $_FILES[$postName]['error'];
            $_FILES['file']['size'] = $_FILES[$postName]['size'];
            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                // $this->resizeImage($path, $uploadData['file_name']);
                // unlink($path . '/' . $uploadData['file_name']);
                return $uploadData;
            } else {
                $uploadData['file_name'] = '';
                return $uploadData;
            }
        } else {
            $uploadData['file_name'] = '';
            return $uploadData;
        }
    }

	public function updateUser($id, $data) {
        $path = './public/assets/images/users';
        $this->upload_config($path);
		if ($_FILES['userImage']['name'] != '') {
			$temp_image = $this->upload_file($path, 'userImage');
			$this->db->set('image', $temp_image['file_name']);
		}
		$this->db->set('name', $data['name']);
		$this->db->set('username', $data['username']);
		$this->db->where('id', $id);
		$this->db->update('users');
	}

	public function changePassword($id, $new_password) {
		$this->db->set('password', md5($new_password));
		$this->db->where('id', $id);
		$this->db->update('users');
	}

	public function count_all() {
	    return $this->db->get('users')->num_rows();
	}

    public function get_username($username) {
		return $this->db->get_where('users', ['username' => $username])->row_array();
	}

	public function isActiveById($id)
    {
        $this->db->select('is_active');
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

	public function activateUser($id)
    {
        $isActive = $this->isActiveById($id)['is_active'];
        if ($isActive == 0) {
            $this->db->set('is_active', 1);
        } else {
            $this->db->set('is_active', 0);
        }
        $this->db->where('id', $id);
        $this->db->update('users');
        return $isActive;
    }

	// public function set_ava($id_user, $photo) {
	// 	$this->db->set('foto', $photo);
	// 	$this->db->where('id', $id_user);
	// 	$this->db->update('users');
	// }

	// public function set_activation($num, $id_user) {
	// 	$this->db->set('is_active', $num);
	// 	$this->db->where('id', $id_user);
	// 	$this->db->update('users');
	// }

	// public function count_nonactive() {
	// 	$nonactive = $this->db->get_where('users', ['is_active' => 0]);
	// 	return $nonactive->num_rows();
	// }

	// public function get_access_menu($data) {
	// 	return $this->db->get_where('user_access_menu', $data);
	// }

	// public function add_access_menu($data) {
	// 	$this->db->insert('user_access_menu', $data); 
	// }

	// public function delete_access_menu($data) {
	// 	$this->db->delete('user_access_menu', $data);	
	// }

	// public function update_und($id_user, $username, $name, $divisi) {
	// 	$this->db->set('username', $username);
	// 	$this->db->set('name', $name);
	// 	$this->db->set('divisi', $divisi);
	// 	$this->db->where('id', $id_user);
	// 	$this->db->update('users');
	// }

	// public function update_un($id_user, $username, $name) {
	// 	$this->db->set('username', $username);
	// 	$this->db->set('name', $name);
	// 	$this->db->where('id', $id_user);
	// 	$this->db->update('users');
	// }

	// public function update_password($id_user, $password) {
	// 	$this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
	// 	$this->db->where('id', $id_user);
	// 	$this->db->update('users');
	// }

	// public function update_photo($id_user, $photo) {
	// 	$photo = str_replace(' ', '_', $photo);
	// 	$this->db->set('foto', $photo);
	// 	$this->db->where('id', $id_user);
	// 	$this->db->update('users');
	// }

	// public function set_active_time($id_user) {
	// 	$this->db->set('active_time', time());
	// 	$this->db->where('username', $id_user);
	// 	$this->db->update('users');
	// }
}

?>