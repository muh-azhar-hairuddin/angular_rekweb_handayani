<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_data_admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_admin');
	}

	public function index()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$this->load->view('admin/data_admin/view');
		}else {
			redirect(base_url().'logout');
		}

	}

	function get_data_admin()
	{
		$list = $this->m_admin->get_datatables();
		$data = array();
		$no = $this->input->post('start');
		foreach ($list as $dt) {
			if($dt->level=='a'){
				$lvl='Admin';
			}elseif ($dt->level=='b'){
				$lvl='Bidan';
			}elseif ($dt->level=='kp'){
				$lvl='Kepala Puskesmas';
			}
			$no++;
			$row = array();
			$row[] = '<center>'.$no.'<center>';
			$row[] = '<center>'.$dt->username.'<center>';
			$row[] = '<center>'.$lvl.'<center>';
			$row[] = $dt->nama_lengkap;
			$row[] = $dt->alamat;
			$row[] =  '<center>
			<div class="dropdown">
			<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
			<i class="fa fa-ellipsis-h"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item edit" href="#"  data-id="'.$dt->id_users.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-pencil"></i> Edit</a>
			<a class="dropdown-item account" href="#"  data-id="'.$dt->id_users.'" data-toggle="modal" data-target="#modal-account"><i class="fa fa-key"></i> Account</a>
			<a class="dropdown-item hapus" href="#" data-id="'.$dt->id_users.'"><i class="fa fa-trash"></i> Delete</a>
			</div>
			</div>
			</center>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->m_admin->count_all(),
			"recordsFiltered" => $this->m_admin->count_filtered(),
			"data" => $data,
		);
	        //output dalam format JSON
		echo json_encode($output);
	}



	public function cari_admin()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$id['id_users'] = $this->input->post('id');
			$q=$this->db->get_where('users',$id);
			$row=$q->num_rows();
			if($row>0){
				foreach ($q->result() as $dt) {
					if($dt->level=='a'){
						$lvl='Admin';
					}elseif ($dt->level=='b'){
						$lvl='Bidan';
					}elseif ($dt->level=='kp'){
						$lvl='Kepala Puskesmas';
					}
					$d['id']=$dt->id_users;
					$d['username']=$dt->username;
					$d['level']=$dt->level;
					$d['nama_lengkap']=$dt->nama_lengkap;
					$d['alamat']=$dt->alamat;
				}
			}else {
				$d['id']='';
				$d['username']='';
				$d['level']='';
				$d['nama_lengkap']='';
				$d['alamat']='';
			}
			echo json_encode($d);
		}else {
			redirect(base_url().'logout');
		}

	}

	public function cari_account()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$id['id_users'] = $this->input->post('id');
			$q=$this->db->get_where('users',$id);
			$row=$q->num_rows();
			if($row>0){
				foreach ($q->result() as $dt) {
					$d['id']=$dt->id_users;
					$d['username']=$dt->username;
				}
			}else {
				$d['id']='';
				$d['username']='';
			}
			echo json_encode($d);
		}else {
			redirect(base_url().'logout');
		}

	}

	public function simpan()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
						    // error_reporting(0);
			date_default_timezone_set('Asia/Makassar');
			$key=$this->input->post('id');
			$id['id_users'] = $key;
			$dt['username'] = $this->input->post('username');
			$dt['nama_lengkap'] = $this->input->post('nama_lengkap');
			$dt['alamat'] = $this->input->post('alamat');
			$dt['level'] = $this->input->post('level');

			$q=$this->db->get_where('users',$id)->num_rows();
			if($q>0){
				$this->db->update('users',$dt,$id);
				echo "Data Sukses DiUpdate";
			}else {
				$dt['password'] = md5($this->input->post('password'));
				$this->db->insert('users',$dt);
				echo "Data Sukses DiSimpan";
			}
		}else {
			redirect(base_url().'logout');
		}

	}

	public function simpan_account()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			error_reporting(0);
			date_default_timezone_set('Asia/Makassar');
			$key=$this->input->post('id_account');
			$id['id_users'] = $key;
			$dt['username'] = $this->input->post('username');
			$dt['password'] = md5($this->input->post('password'));
			$this->db->update('users',$dt,$id);
			echo "Data Sukses DiUpdate";
		}else {
			redirect(base_url().'logout');
		}

	}


	public function hapus()
	{
		error_reporting(0);
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login' && $level=='a'){
			$id['id_users'] = $this->input->post('id');
			$this->db->delete('users',$id);
			echo "Data Sukses Dihapus";
		}else {
			redirect(base_url().'logout');
		}

	}

}

?>
