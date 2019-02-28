<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Kepala_lap_kohort_nifas extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->library('pdf');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='kp'){
						$this->load->view('kepala/laporan/lap_kohort_nifas');
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
					if($cek=='login' && $level=='kp'){

						$tgl_awal=tosql($this->input->get('tgl_awal'));
						$tgl_akhir=tosql($this->input->get('tgl_akhir'));
						$image = base_url()."assets/images/login-img.png";
						$pdf = new FPDF('l','mm','A4');
						$pdf->AddPage();
						$pdf->SetFont('Arial','B',20);
						$pdf->Cell( 40, 40, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
						$pdf->SetY(15);
						$pdf->SetX(50);
						$pdf->Cell(190,15,'Kohort Nifas',0,1,'L');
						$pdf->SetX(50);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(40,7,'Laporan Kohort Nifas per '.todate($tgl_awal).' s/d '.todate($tgl_akhir),0,1,'L');
						$pdf->ln(15);

						$pdf->SetFont('Arial','B',6);
						$pdf->Cell(95,6,'Register',1,0,'C');
						$pdf->Cell(29,6,'Tanda Fital',1,0,'C');
						$pdf->Cell(30,6,'',1,0,'C');
						$pdf->Cell(30,6,'',1,0,'C');
						$pdf->Cell(50,6,'Keadaan',1,0,'C');
						$pdf->Cell(30,6,'',1,1,'C');
						$pdf->Cell(15,6,'ID Reg.',1,0,'C');
						$pdf->Cell(15,6,'Tgl',1,0,'C');
						$pdf->Cell(30,6,'Nama',1,0,'C');
						$pdf->Cell(15,6,'Usia',1,0,'C');
						$pdf->Cell(20,6,'Jamkesmas',1,0,'C');
						$pdf->Cell(20,6,'TD(mmHg)',1,0,'C');
						$pdf->Cell(9,6,'Suhu',1,0,'C');
						$pdf->Cell(30,6,'Komplikasi',1,0,'C');
						$pdf->Cell(30,6,'Fasilitas',1,0,'C');
						$pdf->Cell(25,6,'Keadaan Tiba(M/N)',1,0,'C');
						$pdf->Cell(25,6,'Keadaan Pulang(M/N)',1,0,'C');
						$pdf->Cell(30,6,'Bidan',1,1,'C');

						$pdf->SetFont('Arial','',6);
						$laporan = $this->db->select('r.*,p.*,n.*')
						->join('pasien p','p.no_ktp=r.no_ktp','left')
						->join('kohort_nifas n','n.id_register=r.id_register')
						->where("r.tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'")
						->get('register r')->result();
						foreach ($laporan as $dt){
							$user=$this->db->select('nama_lengkap')->where('id_users ',$dt->bidan)->get('kepalas')->row()->nama_lengkap;
							$usia=$this->hitung_umur($dt->tgl_lahir);
							$pdf->Cell(15,6,$dt->id_register,1,0,'C');
							$pdf->Cell(15,6,tosql($dt->tgl),1,0,'C');
							$pdf->Cell(30,6,$dt->nama,1,0,'C');
							$pdf->Cell(15,6,$usia,1,0,'C');
							$pdf->Cell(20,6,$dt->jamkesmas,1,0,'C');
							$pdf->Cell(20,6,$dt->td_nifas,1,0,'C');
							$pdf->Cell(9,6,$dt->suhu,1,0,'C');
							$pdf->Cell(30,6,$dt->komplikasi_nifas,1,0,'C');
							$pdf->Cell(30,6,$dt->fasilitas_nifas,1,0,'C');
							$pdf->Cell(25,6,$dt->keadaan_tiba,1,0,'C');
							$pdf->Cell(25,6,$dt->keadaan_pulang,1,0,'C');
							$pdf->Cell(30,6,$user,1,1,'C');
						}

						$pdf->Output("Laporan_Kohort_Nifas-".date('d-m-Y').".pdf","I");
					}else {
							$this->session->set_flashdata('f_error','Invalid Username or Password');
							redirect(base_url().'logout');
					}

				}


	}

	?>
