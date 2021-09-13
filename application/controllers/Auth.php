<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		setWIB();
		$this->load->model(['m_auth', 'm_flashdata', 'm_user']);
	}

	public function goToDefaultPage()
	{
		if ($this->session->userdata('user_id')) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->goToDefaultPage();
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'WebOX Login';
			$this->load->view('auth_templates/V_auth_header', $data);
			$this->load->view('auth/V_login');
			$this->load->view('auth_templates/V_auth_footer');
		} else {
			//validasi sukses
			$this->login();
		}
	}

	private function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$profile = $this->m_user->get_username($username);

		if ($profile) {
			if ($profile['is_active'] == 1) {
				if (md5($password) == $profile['password']) {
					$this->m_auth->set_session($profile['id']);
					redirect('dashboard');
				} else {
					$this->m_flashdata->set('danger', 'Password salah!');
					redirect('auth');
				}
			} else {
				$this->m_flashdata->set('danger', 'Akun anda belum diaktifkan!');
				redirect('auth');
			}
		} else {
			$this->m_flashdata->set('danger', 'Username ini tidak terdaftar di sistem!');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->goToDefaultPage();
		$this->form_validation->set_rules(
			'name',
			'Name',
			'required|trim|min_length[3]',
			[
				'min_length' => 'Nama terlalu pendek!'
			]
		);
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|trim|min_length[3]|is_unique[users.username]',
			[
				'is_unique' => 'Username ini telah terdaftar di sistem!',
				'min_length' => 'Username terlalu pendek!'
			]
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[3]|matches[password2]',
			[
				'matches' => 'Password tidak cocok!',
				'min_length' => 'Password terlalu pendek!'
			]
		);
		$this->form_validation->set_rules(
			'password2',
			'Password',
			'required|trim|min_length[3]|matches[password1]',
			[
				'matches' => 'Password tidak cocok!',
				'min_length' => 'Password terlalu pendek!'
			]
		);
		if ($this->form_validation->run() == false) {
			$data['title'] = 'WebOX Registration';
			$this->load->view('auth_templates/V_auth_header', $data);
			$this->load->view('auth/V_registration');
			$this->load->view('auth_templates/V_auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name')),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => md5($this->input->post('password1')),
				'role_id' => 2,
				'image' => '1.jpg',
				'is_active' => 0,
				'date_created' => date('Y-m-d H:i:s')
			];
			$this->m_user->add($data);
			$this->m_flashdata->set('success', 'Selamat! Akun anda telah berhasil dibuat. Silahkan minta admin untuk mengaktifkannya!');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->m_auth->unset_all_sessions();
		$this->m_flashdata->set('warning', 'Anda telah berhasil logout!');
		redirect('auth','refresh');
	}

	public function session_destroy() {
		if(isset($_SESSION['message'])){
			unset($_SESSION['message']);
		}
	}
}
