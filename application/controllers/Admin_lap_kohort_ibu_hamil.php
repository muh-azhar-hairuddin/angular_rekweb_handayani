<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_lap_kohort_ibu_hamil extends CI_Controller {
	function __construct() {
        parent::__construct();
				$this->load->library('pdf');
    }

		public function index()
			{
				$cek=$this->session->userdata('status');
				$level=$this->session->userdata('level');
				if($cek=='login' && $level=='a'){
						$this->load->view('admin/laporan/lap_kohort_ibu_hamil');
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
						$pdf->Cell(190,15,'Kohort Ibu Hamil',0,1,'L');
						$pdf->SetX(50);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(40,7,'Laporan Kohort Ibu Hamil per '.todate($tgl_awal).' s/d '.todate($tgl_akhir),0,1,'L');
						$pdf->ln(15);

						$pdf->SetFont('Arial','B',6);
						$pdf->Cell(83,6,'Register',1,0,'C');
						$pdf->Cell(82,6,'Pemeriksaan',1,0,'C');
						$pdf->Cell(22,6,'Pelayanan',1,0,'C');
						$pdf->Cell(27,6,'Laboratorium',1,0,'C');
						$pdf->Cell(20,6,'',1,0,'C');
						$pdf->Cell(20,6,'',1,0,'C');
						$pdf->Cell(20,6,'',1,1,'C');
						$pdf->Cell(15,6,'ID Reg.',1,0,'C');
						$pdf->Cell(15,6,'Tgl',1,0,'C');
						$pdf->Cell(15,6,'Nama',1,0,'C');
						$pdf->Cell(8,6,'Usia',1,0,'C');
						$pdf->Cell(12,6,'Jamkesmas',1,0,'C');
						$pdf->Cell(18,6,'Usia Kehamilan',1,0,'C');
						$pdf->Cell(12,6,'Anamnesis',1,0,'C');
						$pdf->Cell(9,6,'BB(Kg)',1,0,'C');
						$pdf->Cell(11,6,'T.Bdn(cm)',1,0,'C');
						$pdf->Cell(8,6,'TD(cm)',1,0,'C');
						$pdf->Cell(10,6,'LILA(cm)',1,0,'C');
						$pdf->Cell(12,6,'Stat.Gizi(+/-)',1,0,'C');
						$pdf->Cell(20,6,'Refleks Patella(+/-)',1,0,'C');
						$pdf->Cell(10,6,'Injek. TT',1,0,'C');
						$pdf->Cell(12,6,'Fe(Tab/Btl)',1,0,'C');
						$pdf->Cell(10,6,'Hb(Gr/dl)',1,0,'C');
						$pdf->Cell(17,6,'Pretein Urin(+/-)',1,0,'C');
						$pdf->Cell(20,6,'Komplikasi',1,0,'C');
						$pdf->Cell(20,6,'Fasilitas',1,0,'C');
						$pdf->Cell(20,6,'Bidan',1,1,'C');

						$pdf->SetFont('Arial','',6);
						$laporan = $this->db->select('r.*,p.*,ih.*')
						->join('pasien p','p.no_ktp=r.no_ktp','left')
						->join('kohort_ibu_hamil ih','ih.id_register=r.id_register')
						->where("r.tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'")
						->get('register r')->result();
						foreach ($laporan as $dt){
							$user=$this->db->select('nama_lengkap')->where('id_users',$dt->bidan)->get('users')->row()->nama_lengkap;
							$usia=$this->hitung_umur($dt->tgl_lahir);
							$pdf->Cell(15,6,$dt->id_register,1,0,'L');
							$pdf->Cell(15,6,tosql($dt->tgl),1,0,'L');
							$pdf->Cell(15,6,$dt->nama,1,0,'L');
							$pdf->Cell(8,6,$usia,1,0,'L');
							$pdf->Cell(12,6,$dt->jamkesmas,1,0,'L');
							$pdf->Cell(18,6,$dt->usia_kehamilan,1,0,'L');
							$pdf->Cell(12,6,$dt->anamnesis,1,0,'L');
							$pdf->Cell(9,6,$dt->bb,1,0,'L');
							$pdf->Cell(11,6,$dt->tb,1,0,'L');
							$pdf->Cell(8,6,$dt->td,1,0,'L');
							$pdf->Cell(10,6,$dt->lila,1,0,'L');
							$pdf->Cell(12,6,$dt->status_gizi,1,0,'L');
							$pdf->Cell(20,6,$dt->refleks_patella,1,0,'L');
							$pdf->Cell(10,6,$dt->injeksi_tt,1,0,'L');
							$pdf->Cell(12,6,$dt->fa,1,0,'L');
							$pdf->Cell(10,6,$dt->hb,1,0,'L');
							$pdf->Cell(17,6,$dt->pretein_urin,1,0,'L');
							$pdf->Cell(20,6,$dt->komplikasi,1,0,'L');
							$pdf->Cell(20,6,$dt->fasilitas,1,0,'L');
							$pdf->Cell(20,6,$user,1,1,'L');
						}

						$pdf->Output("Laporan_Kohort_Ibu_Hamil".date('d-m-Y').".pdf","I");
					}else {
							$this->session->set_flashdata('f_error','Invalid Username or Password');
							redirect(base_url().'logout');
					}

				}


	}

	?>
