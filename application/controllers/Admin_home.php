<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_home extends CI_Controller {
	function __construct() {
		parent::__construct();
				// $this->load->model('m_data');
	}

	public function index()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$d['title'] ='Dashboard';
			$d['content']='dashboard';
			$this->load->view('admin/home',$d);
		}else {
			$this->session->set_flashdata('f_error','Invalid Username or Password');
			redirect(base_url().'logout');
		}

	}

	public function dashboard(){
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$this->load->view('admin/dashboard');
		}else {
			redirect(base_url().'logout');
		}
	}

}

?>
