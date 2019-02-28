<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_login');
		$this->load->library('encrypt');
	}

	public function index()
	{
		$this->load->view('login');
	}

	function cek_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		$this->form_validation->set_error_delimiters('<div style="color:rgb(209, 18, 18);margin-top:-15px;">', '</div>');
		$this->form_validation->set_message('required', '*Enter %s');


		if($this->form_validation->run() == false){
			$this->load->view('login');
		}else {
			$where = array(
				'username' => $username,
				'password' => md5($password),
				'aktif' 	=> '1'
			);
			$q= $this->db->get_where('users',$where);
			$cek=$q->num_rows();
			if($cek > 0){
				foreach ($q->result() as $dt) {
					$level=$dt->level;
					$data_session = array(
						'username' => $dt->username,
						'nama_lengkap' => $dt->nama_lengkap,
						'status' => "login",
						'level' => $level,
						'id_users'=>$dt->id_users
					);
				}
				$this->session->set_userdata($data_session);
				if($level=='a'){
					redirect(base_url("admin_home"));
				}elseif ($level=='b') {
					redirect(base_url("bidan_home"));
				}else{
					redirect(base_url("kepala_home"));
				}
			}

			$where = array(
				'username' => $username,
				'password' => md5($password),
			);
			$q= $this->db->get_where('pasien',$where);
			$cek=$q->num_rows();
			if($cek > 0){
				foreach ($q->result() as $dt) {
					$level=$dt->level;
					$data_session = array(
						'username' => $dt->username,
						'nama_lengkap' => $dt->nama,
						'no_ktp' => $dt->no_ktp,
						'status' => "login",
					);
				}
				$this->session->set_userdata($data_session);
				redirect(base_url("pasien_home"));
			}

			if($cek<=0){
				$this->session->set_flashdata('f_error','Invalid Username or Password');
				redirect(base_url());
			}
		}


	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}

?>
