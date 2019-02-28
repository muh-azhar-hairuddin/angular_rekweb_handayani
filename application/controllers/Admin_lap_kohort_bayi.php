<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_lap_kohort_bayi extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->library('pdf');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$this->load->view('admin/laporan/lap_kohort_bayi');
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

			public function cetak()
				{
					error_reporting(0);
					$cek=$this->session->userdata('status');
					$level=$this->session->userdata('level');
					if($cek=='login' && $level=='a'){

						$tgl_awal=tosql($this->input->get('tgl_awal'));
						$tgl_akhir=tosql($this->input->get('tgl_akhir'));
						$image = base_url()."assets/images/login-img.png";
						$pdf = new FPDF('l','mm','A4');
						$pdf->AddPage();
						$pdf->SetFont('Arial','B',20);
						$pdf->Cell( 40, 40, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
						$pdf->SetY(15);
						$pdf->SetX(50);
						$pdf->Cell(190,15,'Kohort Bayi',0,1,'L');
						$pdf->SetX(50);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(40,7,'Laporan Kohort Bayi per '.todate($tgl_awal).' s/d '.todate($tgl_akhir),0,1,'L');
						$pdf->ln(15);

						$pdf->SetFont('Arial','B',6);
						$pdf->Cell(15,6,'ID Reg.',1,0,'C');
						$pdf->Cell(15,6,'Tgl',1,0,'C');
						$pdf->Cell(30,6,'Nama Ibu',1,0,'C');
						$pdf->Cell(15,6,'Usia',1,0,'C');
						$pdf->Cell(20,6,'Jamkesmas',1,0,'C');
						$pdf->Cell(20,6,'DJJ(x/menit)',1,0,'C');
						$pdf->Cell(30,6,'Kepala Thd PAP(M/BM)',1,0,'C');
						$pdf->Cell(20,6,'TBJ(Gr)',1,0,'C');
						$pdf->Cell(30,6,'Jumlah Janin(T/G)',1,0,'C');
						$pdf->Cell(35,6,'Presentasi',1,0,'C');
						$pdf->Cell(30,6,'Bidan',1,1,'C');

						$pdf->SetFont('Arial','',6);
						$laporan = $this->db->select('r.*,p.*,b.*')
						->join('pasien p','p.no_ktp=r.no_ktp','left')
						->join('kohort_bayi b','b.id_register=r.id_register')
						->where("r.tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'")
						->get('register r')->result();
						foreach ($laporan as $dt){
							$user=$this->db->select('nama_lengkap')->where('id_users',$dt->bidan)->get('users')->row()->nama_lengkap;
							$usia=$this->hitung_umur($dt->tgl_lahir);
							$pdf->Cell(15,6,$dt->id_register,1,0,'C');
							$pdf->Cell(15,6,tosql($dt->tgl),1,0,'C');
							$pdf->Cell(30,6,$dt->nama,1,0,'C');
							$pdf->Cell(15,6,$usia,1,0,'C');
							$pdf->Cell(20,6,$dt->jamkesmas,1,0,'C');
							$pdf->Cell(20,6,$dt->djj,1,0,'C');
							$pdf->Cell(30,6,$dt->pap,1,0,'C');
							$pdf->Cell(20,6,$dt->tbj,1,0,'C');
							$pdf->Cell(30,6,$dt->jumlah_janin,1,0,'C');
							$pdf->Cell(35,6,$dt->presetasi_bayi,1,0,'C');
							$pdf->Cell(30,6,$user,1,1,'C');
						}

						$pdf->Output("Laporan_Kohort_Bayi-".date('d-m-Y').".pdf","I");
					}else {
							$this->session->set_flashdata('f_error','Invalid Username or Password');
							redirect(base_url().'logout');
					}

				}


	}

	?>
