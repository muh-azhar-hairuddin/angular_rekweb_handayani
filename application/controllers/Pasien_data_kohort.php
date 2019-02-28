<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pasien_data_kohort extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('m_kohort');
		$this->load->library('image_lib');
	}

	public function index()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login'){
			$this->load->view('pasien/data_kohort/view');
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
			<a class="dropdown-item detail" href="#" onclick="loadPage(\''.'user_data_kohort/detail?id_register='.$dt->id_register.'\');" ><i class="fa fa-eye"></i> View</a>
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
		if($cek=='login'){
			$d['id_register']=$this->buat_kode();
			$this->load->view('pasien/data_kohort/add',$d);
		}else {
			redirect('pasien/logout');
		}

	}

	public function edit()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login'){
			$d['title']='Edit register';
			$d['id_register']=$this->input->get('id_register');
			$this->load->view('pasien/data_kohort/edit',$d);
		}else {
			redirect(base_url().'logout');
		}

	}


	public function detail()
	{
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login'){
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
			$this->load->view('pasien/data_kohort/detail',$d);
		}else {
			redirect(base_url().'logout');
		}

	}



	public function cari_kohort()
	{
		error_reporting(0);
		$cek=$this->session->userdata('status');
		$level=$this->session->userdata('level');
		if($cek=='login'){
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


}

?>
