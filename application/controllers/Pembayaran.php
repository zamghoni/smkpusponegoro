
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	private $folder   = "backend/pembayaran/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_pembayaran','M_user','M_pendaftar','M_jurusan']);
		$this->load->library(['pdf']);
  }

	public function index()
	{
		belum_login();
		cek_admin();
    $data = array(
      'page' => 'Pembayaran',
      'row'  => $this->M_pembayaran->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
		belum_login();
		cek_admin();
		$pembayaran = new stdClass();
		$pembayaran->pembayaran_id = null;
		$pembayaran->id_user = null;
		$pembayaran->id = null;
		$pembayaran->no_rek = null;
		$pembayaran->atas_nama = null;
		$pembayaran->jumlah = null;

		$data = array(
      'page' => 'Pembayaran',
			'subpage' => 'Add',
			'row' => $pembayaran,
			'user' => $this->M_user->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}

	public function edit($id)
	{
		belum_login();
		cek_admin();
		$query = $this->M_pembayaran->get($id);
		if ($query->num_rows() > 0) {
			$pembayaran = $query->row();

			$data = array(
        'page' => 'Pembayaran',
				'subpage' => 'Edit',
				'row' => $pembayaran,
				'user' => $this->M_user->get(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('pembayaran');
		}

	}

	public function process()
	{
		belum_login();
		cek_admin();
		$config['upload_path'] 		= './upload/pembayaran/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  2048;
		$config['file_name']    	=  'pembayaran-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){
						$post['foto'] = $this->upload->data('file_name');
						$this->M_pembayaran->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pembayaran');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pembayaran/form');
					}
				}	else {
						$post['pembayaran'] = null;
						$this->M_pembayaran->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pembayaran');
				}

		}else if (isset($_POST['Edit'])) {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){

						$pembayaran = $this->M_pembayaran->get($post['pembayaran_id']) -> row();
						if($pembayaran->foto != null) {
							$target_file = './upload/pembayaran/'.$pembayaran->foto;
							unlink($target_file);
						}

						$post['foto'] = $this->upload->data('file_name');
							$this->M_pembayaran->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pembayaran');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pembayaran/form');
					}
				}	else {
						$post['foto'] = null;
							$this->M_pembayaran->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pembayaran');
						}
					}
				}

	public function del($id)
	{
		belum_login();
		cek_admin();
		$pembayaran = $this->M_pembayaran->get($id) -> row();
		if($pembayaran->foto != null) {
			$target_file = './upload/pembayaran/'.$pembayaran->foto;
			unlink($target_file);
		}
		$this->M_pembayaran->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('pembayaran');
	}

	public function lunas($id)
  {
	belum_login();
	cek_admin();
    $this->M_user->lunas($this->uri->segment(3));
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
      redirect('pembayaran');
  }

  public function cek($id)
  {
	belum_login();
	cek_admin();
    $this->M_user->cek($this->uri->segment(3));
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
      redirect('pembayaran');
  }

	public function cetak_pembayaran($id)
	{
		belum_login();
		// cek_admin();
		$query = $this->M_pembayaran->data_siswa($id);
		if ($query->num_rows() > 0) {
			$pembayaran = $query->row();
		ob_start();
		$pdf = new FPDF('P','mm',array(215,330));
				 // membuat halaman baru
				 $pdf->AddPage();
				 $pdf->Image('./assets/backend/assets/images/Kop-Surat-SMK-Pusponegoro.jpg',0,0,-150);
				 // setting jenis font yang akan digunakan
				 $pdf->Cell(10,50,'',0,1);
				 $pdf->SetFont('Times','B',14);
				 // mencetak string
				 $pdf->Cell(200,6,'BUKTI PEMBAYARAN SISWA',0,1,'C');
				 $pdf->SetFont('Times','B',12);

				 $pdf->SetY(70);
				 $pdf->Cell(7,7,'');
				 $pdf->Cell(65,7,'IDENTITAS SISWA');

				 $pdf->SetFont('Times','',12);
				 $pdf->SetY(75);
				 $pdf->Cell(12,7,'');
				 $pdf->Cell(50,7,'Nama Siswa');
				 $pdf->Cell(7,7,':');
				 $pdf->Cell(65,7,strtoupper($pembayaran->username));

				 $pdf->SetY(80);
				 $pdf->Cell(12,7,'');
				 $pdf->Cell(50,7,'Jurusan');
				 $pdf->Cell(7,7,':');
				 $jurusan = $this->M_jurusan->get();
				 foreach ($jurusan->result()as $key => $jur) {
				 	if ($jur->jurusan_id == $pembayaran->id_jurusan) {
						$pdf->Cell(65,7,$jur->judul);
				 	}
				 }

				 $pdf->SetY(85);
				 $pdf->Cell(12,7,'');
				 $pdf->Cell(50,7,'Tanggal Pembayaran');
				 $pdf->Cell(7,7,':');
				 $pdf->Cell(65,7,$pembayaran->created);

				 // Memberikan space kebawah agar tidak terlalu rapat
				 $pdf->SetY(88);
				 $pdf->Cell(12,6,'',0,1);
				 $pdf->SetFont('Times','B',12);
				 $pdf->Cell(7,6,'No',1,0);
				 $pdf->Cell(80,6,'Uraian Kegiatan',1,0);
				 $pdf->Cell(40,6,'Jumlah',1,0);
				 $pdf->Cell(60,6,'Keterangan',1,0);

				 $pdf->SetFont('Times','',12);
				 $pdf->Cell(12,6,'',0,1);
				 $pdf->Cell(7,6,'1',1,0);
				 $pdf->Cell(80,6,'Iuran Dana Pendidikan (SPP) Per Bulan',1,0);
				 $pdf->Cell(40,6,'Rp. 120.000',1,0);
				 $pdf->Cell(60,6,'SPP Sudah dibayarkan bulan juli',1,0);

				 $pdf->Cell(12,6,'',0,1);
				 $pdf->Cell(7,6,'2',1,0);
				 $pdf->Cell(80,6,'Iuran Kegiatan Osis',1,0);
				 $pdf->Cell(40,6,'Rp. 200.000',1,0);
				 $pdf->Cell(60,6,'Sudah dibayar 1 tahun',1,0);

				 $pdf->Cell(12,6,'',0,1);
				 $pdf->Cell(7,6,'3',1,0);
				 $pdf->Cell(80,6,'Proses Peningkatan Mutu',1,0);
				 $pdf->Cell(40,6,'Rp. 200.000',1,0);
				 $pdf->Cell(60,6,'Sudah dibayar 1 tahun',1,0);

				 $pdf->Cell(12,6,'',0,1);
				 $pdf->Cell(7,6,'4',1,0);
				 $pdf->Cell(80,6,'Pengadaan Atribut (Osis & Pramuka)',1,0);
				 $pdf->Cell(40,6,'Rp. 80.000',1,0);
				 $pdf->Cell(60,6,'-',1,0);

				 $pdf->Cell(12,6,'',0,1);
				 $pdf->Cell(7,6,'5',1,0);
				 $pdf->Cell(80,6,'Asuransi',1,0);
				 $pdf->Cell(40,6,'Rp. 25.000',1,0);
				 $pdf->Cell(60,6,'-',1,0);

				 $pdf->Cell(12,6,'',0,1);
				 $pdf->Cell(7,6,'6',1,0);
				 $pdf->Cell(80,6,'Seragam Sekolah',1,0);
				 $pdf->Cell(40,6,'Rp. 435.000',1,0);
				 $pdf->Cell(60,6,'-',1,0);

				 $pdf->SetFont('Times','B',12);
				 $pdf->Cell(12,6,'',0,1);
				 // $pdf->Cell(7,6,'',1,0);
				 $pdf->Cell(87,6,'Jumlah',1,0);
				 $pdf->Cell(40,6,'Rp. 1.060.000',1,0);
				 $pdf->Cell(60,6,'',1,0);

				 $pdf->SetFont('Times','I',12);
				 $pdf->SetY(145);
				 $pdf->Cell(7,7,'');
				 $pdf->Cell(65,7,'Terbilang: Satu Juta Enam Puluh Ribu Rupiah');

				 $pdf->SetFont('Times','',12);
				 $pdf->SetY(160);
				 $pdf->Cell(65,7,'Catatan:');

				 $pdf->SetY(165);
				 $pdf->Cell(65,7,'- Disimpan sebagai bukti pembayaran yang SAH');

				 $pdf->SetY(170);
				 $pdf->Cell(65,7,'- Uang yang sudah dibayaran tidak dapat diminta kembali.');

				 $pdf->SetFont('Times','',12);
				 $pdf->SetY(145);
				 $pdf->SetX(150);
				 $pdf->Cell(65,7,'Tegal, '.date_indo(date('Y-m-d')),'C');

				 $pdf->SetY(150);
				 $pdf->SetX(150);
				 $pdf->Cell(65,7,'Yang Menerima,','C');

				 $pdf->SetY(170);
				 $pdf->SetX(150);
				 $pdf->Cell(65,7,'Administrasi Keuangan','C');

			 } else {
				$this->session->set_flashdata('error', "Data tidak ditemukan");
				redirect('pembayaran');
			}

				 $pdf->Output('Bukti Pembayaran :'.$pembayaran->nama_siswa.'.pdf','I');
				 // I: send the file inline to the browser. The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
				// D: send to the browser and force a file download with the name given by name.
				// F: save to a local file with the name given by name (may include a path).
				// S: return the document as a string. name is ignored.
				 $this->redirect('refresh');
	}

	//backend user
	public function form_pay()
	{

		belum_login();
		$id  = $this->fungsi->user_login()->id;
		$check= $this->M_pendaftar->daftar($id);
		if ($check['foto3x4'] == null) {
			$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Foto 3x4 </b>, Terimakasih");
			redirect('dashboard/pendaftar');
			}
		if ($check['scan_ijazah1'] == null) {
			$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Ijasah Depan</b>, Terimakasih");
 			redirect('dashboard/pendaftar');
			}
		if ($check['scan_ijazah2'] == null) {
			$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Ijasah Belakang</b>, Terimakasih");
 			redirect('dashboard/pendaftar');
			}
		if ($check['scan_skhu'] == null) {
			$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan SKHU </b>, Terimakasih");
 			redirect('dashboard/pendaftar');
			}
		if ($check['scan_akte'] == null) {
			$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Akte</b>, Terimakasih");
 			redirect('dashboard/pendaftar');
			}
		if ($check['scan_kk'] == null) {
			$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Kartu Keluarga</b>, Terimakasih");
			redirect('dashboard/pendaftar');
			}
		$pembayaran = new stdClass();
		$pembayaran->pembayaran_id = null;
		$pembayaran->id_user = null;
		$pembayaran->user_id = null;
		$pembayaran->no_rek = null;
		$pembayaran->atas_nama = null;
		$pembayaran->jumlah = null;

		$data = array(
      'page' => 'Pembayaran',
			'subpage' => 'Add',
			'row' => $pembayaran,
			'user' => $this->M_user->get(),
			'img'  => $this->M_pendaftar->get(),
		);
		$this->template->load($this->foldertemplate.'template2',$this->folder.'form_pay', $data);

	}

	public function pembayaran()
  {
		belum_login();
		$data = array(
      'page' => 'Pembayaran',
      'row'  => $this->M_pembayaran->get(),
			'img'  => $this->M_pendaftar->get(),
    );

    $this->template->load($this->foldertemplate.'template2',$this->folder.'data_usr',$data);
  }

	public function process_usr()
	{
		belum_login();
		$config['upload_path'] 		= './upload/pembayaran/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  2048;
		$config['file_name']    	=  'pembayaran-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_pembayaran->cek_user_id($post['id_user'])->num_rows() > 0){ //2
			$this->session->set_flashdata('error', "Kamu sudah Upload Bukti pembayaran, silahkan lakukan pengeditan apabila ingin diganti");
			redirect('pembayaran/pembayaran');
		}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){
						$post['foto'] = $this->upload->data('file_name');
						$this->M_pembayaran->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pembayaran/pembayaran');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pembayaran/form_pay');
					}
				}	else {
						$post['pembayaran'] = null;
						$this->M_pembayaran->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pembayaran/pembayaran');
				}
			}

		}else if (isset($_POST['Edit'])) {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){

						$pembayaran = $this->M_pembayaran->get($post['pembayaran_id']) -> row();
						if($pembayaran->foto != null) {
							$target_file = './upload/pembayaran/'.$pembayaran->foto;
							unlink($target_file);
						}

						$post['foto'] = $this->upload->data('file_name');
							$this->M_pembayaran->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pembayaran/pembayaran');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pembayaran/form_pay');
					}
				}	else {
						$post['foto'] = null;
							$this->M_pembayaran->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pembayaran/pembayaran');
						}
					}
				}

		public function edit_usr($id)
		{
			belum_login();
			$query = $this->M_pembayaran->get($id);
			if ($query->num_rows() > 0) {
				$pembayaran = $query->row();

				$data = array(
					'page' => 'Pembayaran',
					'subpage' => 'Edit',
					'row' => $pembayaran,
					'user' => $this->M_user->get(),
					'img'  => $this->M_pendaftar->get(),
				);
				$this->template->load($this->foldertemplate.'template2',$this->folder.'form_pay', $data);
			} else {
				$this->session->set_flashdata('error', "Data tidak ditemukan");
				redirect('pembayaran');
			}

		}

	// frontend

}
