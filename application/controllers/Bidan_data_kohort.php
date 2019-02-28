<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_data_kohort extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->model('m_kohort');
				$this->load->library('image_lib');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='b'){
					$this->load->view('bidan/data_kohort/view');
				}else {
				    redirect(base_url().'logout');
				}

			}

			function hitung_umur($tanggal_lahir) {
			    list($year,$month,$day) = explode("-",$tanggal_lahir);
			    $year_diff  = date("Y") - $year;
			    $month_diff = date("m") - $month;
			    $day_diff   = date("d") - $day;
			    if ($month_diff < 0) $year_diff--;
			        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
			    return $year_diff;
			}

			function get_data_kohort()
	    {
					error_reporting(0);
	        $list = $this->m_kohort->get_datatables();
	        $data = array();
	        $no = $this->input->post('start');
	        foreach ($list as $dt) {
							$user=$this->db->select('nama_lengkap')->where('id_users',$dt->bidan)->get('users')->row()->nama_lengkap;
					    $no++;
	            $row = array();
							$row[] = $dt->id_register;
							$row[] = '<center>'.todate($dt->tgl).'</center>';
							$row[] = $dt->no_ktp;
							$row[] = $dt->nama;
							$row[] = $dt->alamat;
							$row[] = '<center>'.$this->hitung_umur($dt->tgl_lahir).' Tahun </center>';
							$row[] = $dt->jamkesmas;
							$row[] = '<center>'.$dt->usia_kehamilan.' Hari </center>';
							$row[] = '<center>'. $dt->trimester.'</center>';
							$row[] = '<center>'. $user.'</center>';
							$row[] =  '<center>
															<div class="dropdown">
																<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
																	<i class="fa fa-ellipsis-h"></i>
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item edit" href="#" onclick="loadPage(\''.'bidan_data_kohort/edit?id_register='.$dt->id_register.'\');" ><i class="fa fa-pencil"></i> Edit</a>
																	<a class="dropdown-item detail" href="#" onclick="loadPage(\''.'bidan_data_kohort/detail?id_register='.$dt->id_register.'\');" ><i class="fa fa-eye"></i> View</a>
															</div>
															</div>
													</center>';

	            $data[] = $row;
	        }

	        $output = array(
	            "draw" => $this->input->post('draw'),
	            "recordsTotal" => $this->m_kohort->count_all(),
	            "recordsFiltered" => $this->m_kohort->count_filtered(),
	            "data" => $data,
	        );
	        //output dalam format JSON
	        echo json_encode($output);
	    }

			public function buat_kode(){
				$row=$this->db->get('register')->num_rows();
				if($row>0){
					$id_register=$this->db->select_max('id_register')->get('register')->row()->id_register;
					$id=substr($id_register,3);
					$id='REG'.str_pad(($id+1), 6, '0', STR_PAD_LEFT);
				}else {
					$id='REG000001';
				}
				return $id;
			}

			public function add()
				{
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='b'){
						  $d['id_register']=$this->buat_kode();
							$this->load->view('bidan/data_kohort/add',$d);
					}else {
							redirect(base_url().'logout');
					}

				}

				public function edit()
					{
						$cek=$this->session->userdata('status');
						$level=$this->session->userdata('level');
						if($cek=='login' && $level=='b'){
								$d['title']='Edit register';
								$d['id_register']=$this->input->get('id_register');
								$this->load->view('bidan/data_kohort/edit',$d);
						}else {
								redirect(base_url().'logout');
						}

					}


					public function detail()
						{
							$cek=$this->session->userdata('status');
							$level=$this->session->userdata('level');
							if($cek=='login' && $level=='b'){
									$d['title']='Detail Pemeriksaan';
									$q_img=$this->db->select('p.image')->join('pasien p','p.no_ktp=rh.no_ktp')->get('register rh');
									$row=$q_img->num_rows();
									if($row>0){
										$image=$q_img->row()->image;
									}else{
										$image='avatar.png';
									}
									$img='<img class="img-photo" src="'.base_url().'assets/img/pasien/'.$image.'">';
									$d['id_register']=$this->input->get('id_register');
									$d['image_show']=$img;
									$this->load->view('bidan/data_kohort/detail',$d);
							}else {
									redirect(base_url().'logout');
							}

						}



			public function cari_kohort()
				{
					error_reporting(0);
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='b'){
								$id['rh.id_register'] = $this->input->post('id_register');
								$q=$this->db
								->select('rh.id_register,rh.tgl,rh.no_ktp, rh.usia_kehamilan, p.nama,p.image, p.alamat,p.tgl_lahir,p.tgl_periksa_selanjutnya, rh.jamkesmas,rh.trimester,b.*,p.*,ih.*,ps.*')
								->join('pasien p','p.no_ktp=rh.no_ktp')
								->join('kohort_bayi b','b.id_register=rh.id_register')
								->join('kohort_nifas n','n.id_register=rh.id_register')
								->join('kohort_ibu_hamil ih','ih.id_register=rh.id_register')
								->join('kohort_persalinan ps','ps.id_register=rh.id_register')
								->get_where('register rh',$id);
								$row=$q->num_rows();
								if($row>0){
									foreach ($q->result() as $dt) {
										$d['tanggal']=todate($dt->tgl);
										$d['nama']=$dt->nama;
										$d['no_ktp']=$dt->no_ktp;
										$d['alamat']=$dt->alamat;
										$d['usia']=$this->hitung_umur($dt->tgl_lahir);
										$d['usia_kehamilan']=$dt->usia_kehamilan;
										$d['jamkesmas']=$dt->jamkesmas;
										$d['trimester']=$dt->trimester;

										$d['anamnesis'] = $dt->anamnesis;
										$d['bb'] = $dt->bb;
										$d['tb'] = $dt->tb;
										$d['td'] = $dt->td;
										$d['tfu'] = $dt->tfu;
										$d['lila'] = $dt->lila;
										$d['status_gizi'] = $dt->status_gizi;
										$d['refleks_patella'] = $dt->refleks_patella;
										$d['injeksi_tt'] = $dt->injeksi_tt;
										$d['buku_kia'] = $dt->buku_kia;
										$d['fa'] = $dt->fa;
										$d['hb'] = $dt->hb;
										$d['pretein_urin'] = $dt->pretein_urin;
										$d['gula_darah'] = $dt->gula_darah;
										$d['deteksi_resiko'] = $dt->deteksi_resiko;
										$d['komplikasi'] = $dt->komplikasi;
										$d['fasilitas'] = $dt->fasilitas;

										$d['tglk1'] = tosql($dt->tglk1);
										$d['jamk1'] = $dt->jamk1;
										$d['tglk2'] = tosql($dt->tglk2);
										$d['jamk2'] = $dt->jamk2;
										$d['tglbl'] = tosql($dt->tglbl);
										$d['jambl'] = $dt->jambl;
										$d['tglpl'] = tosql($dt->tglpl);
										$d['jampl'] = $dt->jampl;
										$d['usia_hpht'] = $dt->usia_hpht;
										$d['presentasi'] = $dt->presentasi;
										$d['berat_bayi'] = $dt->berat_bayi;
										$d['cara_persalinan'] = $dt->cara_persalinan;
										$d['tempat'] = $dt->tempat;
										$d['keadaan_ibu'] = $dt->keadaan_ibu;
										$d['keadaan_bayi'] = $dt->keadaan_bayi;
										$d['komplikasi_persalinan'] = $dt->komplikasi_persalinan;
										$d['fasilitas_persalinan'] = $dt->fasilitas_persalinan;

										$d['td_nifas'] = $dt->td_nifas;
										$d['suhu'] = $dt->suhu;
										$d['komplikasi_nifas'] = $dt->komplikasi_nifas;
										$d['fasilitas_nifas'] = $dt->fasilitas_nifas;
										$d['keadaan_tiba'] = $dt->keadaan_tiba;
										$d['keadaan_pulang'] = $dt->keadaan_pulang;

										$d['djj'] = $dt->djj;
										$d['tbj'] = $dt->tbj;
										$d['pap'] = $dt->pap;
										$d['jumlah_janin'] = $dt->pap;
										$d['presentasi_bayi'] = $dt->presentasi_bayi;

										$d['tgl_periksa_selanjutnya'] = tosql($dt->tgl_periksa_selanjutnya);


									}
								}
								echo json_encode($d);
					}else {
						  redirect(base_url().'logout');
					}

				}

				public function cari_no_ktp()
					{
						$cek=$this->session->userdata('status');
						$level=$this->session->userdata('level');
						if($cek=='login' && $level=='b'){
									$id['no_ktp'] = str_replace(' ', '', $this->input->post('no_ktp'));
									$q=$this->db->get_where('pasien',$id);
									$row=$q->num_rows();
									if($row>0){
										foreach ($q->result() as $dt) {
											$d['nama']=$dt->nama;
											$d['alamat']=$dt->alamat;
											$d['usia']=$this->hitung_umur($dt->tgl_lahir);
										}
									}else {
										$d['nama']='';
										$d['alamat']='';
										$d['usia']='';
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
								$key=$this->input->post('id_register');
								$id['id_register'] = $key;
								$dt['id_register'] = $key;
								$dt['no_ktp'] = $this->input->post('no_ktp');
								$dt['jamkesmas'] = $this->input->post('jamkesmas');
								$dt['usia_kehamilan'] = $this->input->post('usia_kehamilan');
								$dt['trimester'] = $this->input->post('trimester');
								$dt['tgl'] = tosql($this->input->post('tanggal'));
								$dt['bidan'] = $this->session->userdata('id_users');

								//Kohort Ibu Hamil
								$ih['id_register'] = $key;
								$param_ih=$this->input->post('anamnesis');
								if(!empty($param_ih)){
									$ih['anamnesis'] = $this->input->post('anamnesis');
									$ih['bb'] = $this->input->post('bb');
									$ih['tb'] = $this->input->post('tb');
									$ih['td'] = $this->input->post('td');
									$ih['tfu'] = $this->input->post('tfu');
									$ih['lila'] = $this->input->post('lila');
									$ih['status_gizi'] = $this->input->post('status_gizi');
									$ih['refleks_patella'] = $this->input->post('refleks_patella');
									$ih['injeksi_tt'] = $this->input->post('injeksi_tt');
									$ih['buku_kia'] = $this->input->post('buku_kia');
									$ih['fa'] = $this->input->post('fa');
									$ih['hb'] = $this->input->post('hb');
									$ih['pretein_urin'] = $this->input->post('pretein_urin');
									$ih['gula_darah'] = $this->input->post('gula_darah');
									$ih['deteksi_resiko'] = $this->input->post('deteksi_resiko');
									$ih['komplikasi'] = $this->input->post('komplikasi');
									$ih['fasilitas'] = $this->input->post('fasilitas');

								}
								//END Kohort Ibu Hamil

								//Kohort Persalinan
								$ps['id_register'] = $key;
								$param_ps=$this->input->post('tglk1');
								if(!empty($param_ps)){
									$ps['tglk1'] = tosql($this->input->post('tglk1'));
									$ps['jamk1'] = $this->input->post('jamk1');
									$ps['tglk2'] = tosql($this->input->post('tglk2'));
									$ps['jamk2'] = $this->input->post('jamk2');
									$ps['tglbl'] = tosql($this->input->post('tglbl'));
									$ps['jambl'] = $this->input->post('jambl');
									$ps['tglpl'] = tosql($this->input->post('tglpl'));
									$ps['jampl'] = $this->input->post('jampl');
									$ps['usia_hpht'] = $this->input->post('usia_hpht');
									$ps['presentasi'] = $this->input->post('presentasi');
									$ps['berat_bayi'] = $this->input->post('berat_bayi');
									$ps['cara_persalinan'] = $this->input->post('cara_persalinan');
									$ps['tempat'] = $this->input->post('tempat');
									$ps['keadaan_ibu'] = $this->input->post('keadaan_ibu');
									$ps['keadaan_bayi'] = $this->input->post('keadaan_bayi');
									$ps['komplikasi_persalinan'] = $this->input->post('komplikasi_persalinan');
									$ps['fasilitas_persalinan'] = $this->input->post('fasilitas_persalinan');
								}
								//End Kohort Persalinan

								//Kohort Nifas
								$n['id_register'] = $key;
								$param_n=$this->input->post('td_nifas');
								if(!empty($param_n)){
									$n['td_nifas'] = $this->input->post('td_nifas');
									$n['suhu'] = $this->input->post('suhu');
									$n['komplikasi_nifas'] = $this->input->post('komplikasi_nifas');
									$n['fasilitas_nifas'] = $this->input->post('fasilitas_nifas');
									$n['keadaan_tiba'] = $this->input->post('keadaan_tiba');
									$n['keadaan_pulang'] = $this->input->post('keadaan_pulang');
								}
								//End Kohort Nifas

								//Kohort Bayi
								$b['id_register'] = $key;
								$param_b=$this->input->post('djj');
								if(!empty($param_b)){
									$b['djj'] = $this->input->post('djj');
									$b['tbj'] = $this->input->post('tbj');
									$b['pap'] = $this->input->post('pap');
									$b['jumlah_janin'] = $this->input->post('jumlah_janin');
									$b['presentasi_bayi'] = $this->input->post('presentasi_bayi');
							  }
								//End Kohort Bayi


								$q=$this->db->get_where('register',$id)->num_rows();
								if($q>0){
									$this->db->update('register',$dt,$id);
									$this->db->update('kohort_persalinan',$ps,$id);
									$this->db->update('kohort_bayi',$b,$id);
									$this->db->update('kohort_nifas',$n,$id);
									$this->db->update('kohort_ibu_hamil',$ih,$id);
									echo "Data Sukses DiUpdate";
								}else {
									$this->db->insert('register',$dt);
									$this->db->insert('kohort_ibu_hamil',$ih);
									$this->db->insert('kohort_persalinan',$ps);
									$this->db->insert('kohort_bayi',$b);
									$this->db->insert('kohort_nifas',$n);
									echo "Data Sukses DiSimpan";
								}
								$dp['tgl_periksa_selanjutnya'] = tosql($this->input->post('tgl_periksa_selanjutnya'));
								$idp['no_ktp'] = $this->input->post('no_ktp');
								$this->db->update('pasien',$dp,$idp);
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
										$id['id_register'] = $this->input->post('id');
										$this->db->delete('register',$id);
										$this->db->delete('kohort_ibu_hamil',$id);
										$this->db->delete('kohort_persalinan',$id);
										$this->db->delete('kohort_bayi',$id);
										$this->db->delete('kohort_nifas',$id);
										echo "Data Sukses Dihapus";
							}else {
								  redirect(base_url().'logout');
							}

						}

	}

	?>
