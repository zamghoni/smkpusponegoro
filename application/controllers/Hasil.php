<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

	private $folder   = "backend/hasil/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_pendaftar']);
		$this->load->library(['pdf']);
  }

	public function index()
	{
		cek_bayar();
		belum_login();
    $data = array(
      'page' => 'Pengumuman Hasil PPDB',
      'row'  => $this->M_pendaftar->get(),
			'img'  => $this->M_pendaftar->get(),
    );
		$this->template->load($this->foldertemplate.'template2',$this->folder.'data', $data);
	}

  public function cetak()
  {
		cek_bayar();
    belum_login();
    ob_start();
    $pdf = new FPDF('P','mm',array(215,330));
         // membuat halaman baru
         $pdf->AddPage();
         $pdf->Image('./assets/backend/assets/images/Kop Surat Wahas.jpg',0,0,-150);
         // setting jenis font yang akan digunakan
         $pdf->Cell(10,50,'',0,1);
         $pdf->SetFont('Arial','B',13);
         // mencetak string

         $pdf->Cell(200,6,'PENGUMUMAN HASIL PPDB',0,1,'C');
         $pdf->Cell(200,6,'SMK NU WAHID HASYIM TALANG',0,1,'C');
         $pdf->Cell(200,6,'TAHUN PELAJARAN '.date('Y').'/'.(date('Y')+1),0,1,'C');
         $pdf->SetFont('Times','B',12);
         // $pdf->Cell(190,6,'Tanggal Cetak : '.date('d-m-Y H:i'),0,1,'C');

         // Memberikan space kebawah agar tidak terlalu rapat
         $pdf->Cell(10,8,'',0,1);
         $pdf->SetFont('Times','B',12);

				 $id  = $this->fungsi->user_login()->id;
         $data= $this->M_pendaftar->daftar($id);
         
						 $pdf->SetY(80);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'A. IDENTITAS SISWA');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(85);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. NISN');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['nisn']);

						 $pdf->SetY(90);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'2. Nama Siswa');
						 $pdf->Cell(7,7,':');
             $pdf->Cell(65,7,strtoupper($data['nama_siswa']));

             $pdf->SetFont('Times','',12);
						 $pdf->SetY(95);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Asal Sekolah');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_sekolah']));

             $pdf->SetFont('Times','',12);
						 $pdf->SetY(100);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'4. Jurusan yang dipilih');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['judul']));

             $pdf->SetFont('Times','',12);
						 $pdf->SetY(115);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'Berdasarkan hasil dari seleksi data dan administrasi serta peminatan saudara pada jurusan yang anda pilih,');

             $pdf->SetFont('Times','',12);
						 $pdf->SetY(120);
						 $pdf->Cell(7,7,'');
             $pdf->Cell(65,7,'dengan ini panitia PPDB SMK NU Wahid Hasyim Talang menutuskan saudara dinyatakan :');

             $pdf->SetFont('Times','B',20);
						 $pdf->SetY(135);
						 $pdf->Cell(7,7,'');
             $pdf->Cell(180,7,'DITERIMA',0,1,'C');

             $pdf->SetFont('Times','B',12);
						 $pdf->SetY(145);
						 $pdf->Cell(7,7,'');
             $pdf->Cell(180,7,'Di SMK NU Wahid Hasyim Talang Tahun Pelajaran 2021/2022',0,1,'C');

             $pdf->Cell(10,8,'',0,1);
             $pdf->SetFont('Times','B',12);
             
                 $pdf->SetY(155);
                 $pdf->Cell(7,7,'');
                 $pdf->Cell(65,7,'B. Mulai MASUK SEKOLAH :');
    
                 $pdf->SetFont('Times','',12);
                 $pdf->SetY(160);
                 $pdf->Cell(12,7,'');
                 $pdf->Cell(65,7,'Hari / Tanggal');
                 $pdf->Cell(7,7,':');
                 $pdf->Cell(65,7,'SENIN, 12 Juli 2021');

                 $pdf->SetFont('Times','',12);
                 $pdf->SetY(165);
                 $pdf->Cell(12,7,'');
                 $pdf->Cell(65,7,'Pukul');
                 $pdf->Cell(7,7,':');
                 $pdf->Cell(65,7,'07:30 - Selesai');

                 $pdf->SetFont('Times','',12);
                 $pdf->SetY(170);
                 $pdf->Cell(12,7,'');
                 $pdf->Cell(65,7,'Acara');
                 $pdf->Cell(7,7,':');
                 $pdf->Cell(65,7,'Pembagian Kelas dan Pembekalan MOS');

                 $pdf->SetFont('Times','',12);
                 $pdf->SetY(175);
                 $pdf->Cell(12,7,'');
                 $pdf->Cell(65,7,'Tempat');
                 $pdf->Cell(7,7,':');
                 $pdf->Cell(65,7,'SMK NU Wahid Hasyim Talang');

                 $pdf->SetFont('Times','',12);
                 $pdf->SetY(180);
                 $pdf->Cell(12,7,'');
                 $pdf->Cell(65,7,'Pakaian');
                 $pdf->Cell(7,7,':');
                 $pdf->Cell(65,7,'Seragam SMP/MTS');

                  $pdf->Cell(10,8,'',0,1);
                  $pdf->SetFont('Times','B',12);
                 
                     $pdf->SetY(190);
                     $pdf->Cell(7,7,'');
                     $pdf->Cell(65,7,'Contact Person :');
        
                     $pdf->SetFont('Times','',12);
                     $pdf->SetY(195);
                     $pdf->Cell(12,7,'');
                     $pdf->Cell(65,7,'Hasyim Mashuri');
                     $pdf->Cell(7,7,':');
                     $pdf->Cell(65,7,'085373839383 (WA/SMS)');
                

         $pdf->Output('PENGUMUMAN HASIL PPDB '.strtoupper($data['nama_siswa']).'.pdf','D');
        //  $this->redirect('refresh');
  }
}
