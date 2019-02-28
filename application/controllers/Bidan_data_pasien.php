<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_data_pasien extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_pasien');
				$this->load->library('image_lib');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='b'){
						$this->load->view('bidan/data_pasien/view');
				}else {
				    redirect(base_url().'logout');
				}

			}

			function get_data_pasien()
	    {
	        $list = $this->m_pasien->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {

					    $no++;
	            $row = array();
	            $row[] = '<center>'.$no.'<center>';
							$row[] = '<center><img src="'.base_url().'assets/img/pasien/'.$dt->image.'" height="80px" width="80px"></img></center>';
							$row[] = '<center>'.$dt->no_ktp.'<center>';
							$row[] = $dt->nama;
							$row[] = $dt->alamat;
							$row[] = '<center>'.todate($dt->tgl_lahir).'<center>';
							$row[] =  '<center>
															<div class="dropdown">
																<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
																	<i class="fa fa-ellipsis-h"></i>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																  <a class="dropdown-item edit" href="#"  data-id="'.$dt->id.'" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-pencil"></i> Edit</a>
															</div>
															</div>
													</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_pasien->count_all(),
	            "recordsFiltered" => $this->m_pasien->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }



			public function cari_pasien()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='b'){
								$id['id'] = $this->input->post('id');
								$q=$this->db->get_where('pasien',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['id']=$dt->id;
										$d['no_ktp']=$dt->no_ktp;
										$d['nama']=$dt->nama;
										$d['alamat']=$dt->alamat;
										$d['tgl_lahir']=todate($dt->tgl_lahir);
									}
								}else {
									$d['id']='';
									$d['no_ktp']='';
									$d['nama']='';
									$d['alamat']='';
									$d['tgl_lahir']='';
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
						if($cek=='login' && $level=='b'){
									$id['id'] = $this->input->post('id');
									$q=$this->db->get_where('pasien',$id);
									$row=$q->num_rows();
									if($row>0){
										foreach ($q->result() as $dt) {
											$d['id']=$dt->id;
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
					if($cek=='login' && $level=='b'){
						    // error_reporting(0);
								date_default_timezone_set('Asia/Makassar');
								$key=$this->input->post('id');
								$id['id'] = $key;
								$dt['no_ktp'] = $this->input->post('no_ktp');
								$dt['nama'] = $this->input->post('nama');
								$dt['alamat'] = $this->input->post('alamat');
								$dt['tgl_lahir'] = tosql($this->input->post('tgl_lahir'));

								$files = $_FILES;
								$config['upload_path']="assets/img/pasien/";
								$config['allowed_types'] = 'gif|jpg|png|jpeg';
								$config['max_size'] = '2000000';
								$config['remove_spaces'] = false;
								$config['overwrite'] = true;
								$config['max_width'] = '';
								$config['max_height'] = '';
								$this->load->library('upload',$config);
								$this->upload->initialize($config);
								$this->upload->do_upload();
								if(($files['userfile']['name'])!=''){
									$image_name = $files['userfile']['name'];
									$dt['image'] = $image_name;
								}

								$q=$this->db->get_where('pasien',$id)->num_rows();
								if($q>0){
									$this->db->update('pasien',$dt,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$this->db->insert('pasien',$dt);
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
						if($cek=='login' && $level=='b'){
							    error_reporting(0);
									date_default_timezone_set('Asia/Makassar');
									$key=$this->input->post('id_account');
									$id['id'] = $key;
									$dt['username'] = $this->input->post('username');
									$dt['password'] = md5($this->input->post('password'));
									$this->db->update('pasien',$dt,$id);
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
							if($cek=='login' && $level=='b'){
										$id['id'] = $this->input->post('id');
										$this->db->delete('pasien',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect(base_url().'logout');
							}

						}

	}

	?>
