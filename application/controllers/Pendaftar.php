<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {

	private $folder   = "backend/pendaftar/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_pendaftar','M_jurusan','M_gelombang','M_user']);
		$this->load->library(['pdf']);
  }

	public function index()
	{
		belum_login();
		cek_admin();
    $data = array(
      'page' => 'Pendaftar',
      'row'  => $this->M_pendaftar->get(),
			'gelombang' => $this->M_gelombang->get(),
			'jurusan' => $this->M_jurusan->get(),
	);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
		belum_login();
		cek_admin();
		$pendaftar = new stdClass();
		$pendaftar->pendaftar_id = null;
		$pendaftar->user_id = null;
		$pendaftar->id_gelombang = null;
		$pendaftar->id_jurusan = null;
		$pendaftar->jurusan_id = null;
		$pendaftar->gelombang_id = null;
		$pendaftar->nisn = null;
		$pendaftar->nama_siswa = null;
		$pendaftar->tempat_lahir = null;
		$pendaftar->tgl_lahir = null;
		$pendaftar->jk = null;
		$pendaftar->agama = null;
		$pendaftar->alamat = null;
		$pendaftar->kode_pos = null;
		$pendaftar->no_telp = null;
		$pendaftar->no_hp = null;
		$pendaftar->nama_ayah = null;
		$pendaftar->nama_ibu = null;
		$pendaftar->nama_wali = null;
		$pendaftar->alamat_org = null;
		$pendaftar->nama_sekolah = null;
		$pendaftar->alamat_sekolah = null;
		$pendaftar->kec_sekolah = null;
		$pendaftar->kab_kota_sekolah = null;
		$pendaftar->propinsi = null;
		$pendaftar->tahun_lulus = null;
		$pendaftar->no_ijazah = null;
		$pendaftar->bhs_indo = null;
		$pendaftar->bhs_inggris = null;
		$pendaftar->mtk = null;
		$pendaftar->ipa = null;
		$pendaftar->prestasi = null;
		$pendaftar->info_daftar = null;
		$pendaftar->alasan = null;
		$pendaftar->foto3x4 = null;
		$pendaftar->scan_akte = null;
		$pendaftar->scan_kk = null;
		$pendaftar->scan_ijazah1 = null;
		$pendaftar->scan_ijazah2 = null;
		$pendaftar->scan_skhu = null;

		$data = array(
      'page' => 'Pendaftar',
			'subpage' => 'Add',
			'row' => $pendaftar,
			'gelombang' => $this->M_gelombang->get(),
			'jurusan' => $this->M_jurusan->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}

	public function edit($id)
	{
		belum_login();
		cek_admin();
		$query = $this->M_pendaftar->get($id);
		if ($query->num_rows() > 0) {
			$pendaftar = $query->row();

			$data = array(
        'page' => 'Pendaftar',
				'subpage' => 'Edit',
				'row' => $pendaftar,
				'gelombang' => $this->M_gelombang->get(),
				'jurusan' => $this->M_jurusan->get(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('pendaftar');
		}

	}

	public function process()
	{
		belum_login();
		cek_admin();
		$config['upload_path'] 		= './upload/pendaftar/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  204800;
		$config['file_name']    	=  'Foto3x4-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) { //1
			if($this->M_pendaftar->cek_user_id($post['user_id'])->num_rows() > 0){ //2
				$this->session->set_flashdata('error', "User id $post[user_id] sudah dipakai , silahkan ganti dengan yang berbeda");
				redirect('pendaftar/form');
			}else { //2 /3
				if(@$_FILES['foto3x4']['name'] != null){ // 4
					if($this->upload->do_upload('foto3x4')){ //5
						$post['foto3x4'] = $this->upload->data('file_name');
						$this->M_pendaftar->add($post);
						if ($this->db->affected_rows() > 0) { //6
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						} //6
							redirect('pendaftar');
					} else { //5 /7
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pendaftar/form');
					} //7
				}	else { //4 /8
						$post['foto3x4'] = null;
						$this->M_pendaftar->add($post);
						if ($this->db->affected_rows() > 0) { //9
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						} //10
							redirect('pendaftar');
				} //8
			} //3
		}else if (isset($_POST['Edit'])) { //11
			if($this->M_pendaftar->cek_user_id($post['user_id'], $post['pendaftar_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "User Id $post[user_id] sudah dipakai, silahkan ganti dengan yang berbeda");
				redirect('pendaftar/edit/'.$post['pendaftar_id']);
			}else {
				if(@$_FILES['foto3x4']['name'] != null){
					if($this->upload->do_upload('foto3x4')){
						$pendaftar = $this->M_pendaftar->get($post['pendaftar_id']) -> row();
						if($pendaftar->foto3x4 != null) {
							$target_file = './upload/pendaftar/'.$pendaftar->foto3x4;
							unlink($target_file);
						}
						$post['foto3x4'] = $this->upload->data('file_name');
							$this->M_pendaftar->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pendaftar');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pendaftar/form');
					}
				}	else {
						$post['foto'] = null;
							$this->M_pendaftar->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pendaftar');
				}
			}
		}
		}

		public function cetak_formulir_adm($id)
			{
				belum_login();
				ob_start();
				$pdf = new FPDF('P','mm',array(215,330));
						 // membuat halaman baru
						 $pdf->AddPage();
						 $pdf->Image('./assets/backend/assets/images/Kop Surat Wahas.jpg',0,0,-150);
						 // setting jenis font yang akan digunakan
						 $pdf->Cell(10,45,'',0,1);
						 $pdf->SetFont('Times','B',14);
						 // mencetak string
						 $pdf->Cell(200,6,'FORMULIR PENDAFTARAN',0,1,'C');
						 $pdf->Cell(200,6,'PENERIMAAN PESERTA DIDIK BARU (PPDB)',0,1,'C');
						 $pdf->Cell(200,6,'TAHUN PELAJARAN '.date('Y').'/'.(date('Y')+1),0,1,'C');
						 $pdf->SetFont('Times','B',12);
						 // $pdf->Cell(190,6,'Tanggal Cetak : '.date('d-m-Y H:i'),0,1,'C');

						 // Memberikan space kebawah agar tidak terlalu rapat
						 $pdf->Cell(10,8,'',0,1);
						 $pdf->SetFont('Times','B',12);

						 $id  = $this->uri->segment(3);
						 $data= $this->M_pendaftar->daftar($id);

						 //$pdf->SetY(75);
						 //$pdf->Cell(7,7,'');
						 //$pdf->Cell(70,7,'NOMOR PENDAFTARAN');
						 //$pdf->Cell(7,7,':');
						 //$pdf->Cell(65,7,$data['id_jurusan'].'-'.date("d-m-Y", strtotime($data['created_at'])).'-'.$data['pendaftar_id'].'-'.$data['user_id']);
						 //jurusan-hari-bulan-tahun-id_pendaftar-user_id
						 $pdf->SetY(80);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'A. IDENTITAS CALON SISWA');

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

						 $pdf->SetY(95);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Tempat, Tanggal Lahir');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['tempat_lahir']).','.$data['tgl_lahir']);

						 $pdf->SetY(100);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'4. Jenis Kelamin');
						 $pdf->Cell(7,7,':');
						 if ($data['jk'] == "L") {
							 $pdf->Cell(65,7,'LAKI-LAKI');
						 }else{
							 $pdf->Cell(65,7,'PEREMPUAN');
						 }

						 $pdf->SetY(105);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'5. Agama');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['agama']));

						 $pdf->SetY(110);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'6. Alamat Siswa');
						 $pdf->Cell(7,7,':');
						 $pdf->MultiCell(110,4,strtoupper($data['alamat']));

						 $pdf->SetY(115);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'7. Kode Pos');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,10,$data['kode_pos']);

						 $pdf->SetY(120);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'8. Telepon/Handphone');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,9,$data['no_telp'].'/'.$data['no_hp']);

						 $pdf->SetY(125);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'9. Nama Orang Tua/Wali Murid');

						 $pdf->SetY(130);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Ayah / Wali Murid');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_ayah'].'/'.$data['nama_wali']));

						 $pdf->SetY(135);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. Ibu');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_ibu']));

						 $pdf->SetY(140);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'10. Alamat Orang Tua/Wali Murid');
						 $pdf->Cell(7,7,':');
						 $pdf->MultiCell(110,4,strtoupper($data['alamat_org']));

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(145);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'B. IDENTITAS SEKOLAH ASAL');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(150);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Nama Sekolah');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_sekolah']));

						 $pdf->SetY(155);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'2. Alamat Sekolah');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['alamat_sekolah']));

						 $pdf->SetY(160);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Kecamatan');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['kec_sekolah']));

						 $pdf->SetY(165);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'4. Kab/Kota');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['kab_kota_sekolah']));

						 $pdf->SetY(170);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'5. Propinsi');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['propinsi']));

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(175);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'C. NOMOR IJAZAH DAN NILAI');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(180);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Tahun Lulus');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['tahun_lulus']);

						 $pdf->SetY(185);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'2. Nomor STTB/Ijazah');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['no_ijazah']);

						 $pdf->SetY(190);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Daftar Nilai SKHU');

						 $pdf->SetY(195);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Bahasa Indonesia');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['bhs_indo']);

						 $pdf->SetY(200);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. Bahasa Inggris');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['bhs_inggris']);

						 $pdf->SetY(205);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'c. Matematika');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['mtk']);

						 $pdf->SetY(210);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'d. Ilmu Pengetahuan Alam');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['ipa']);

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(215);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'JUMLAH NEM');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['ipa']+$data['mtk']+$data['bhs_inggris']+$data['bhs_indo']);

						 $pdf->SetY(220);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'D. PRESTASI DAN PENGHARGAAN');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(225);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Prestasi dan Penghargaan');
						 $pdf->SetY(230);
						 $pdf->Cell(16,7,'');
						 $pdf->MultiCell(175,5,substr(strtoupper($data['prestasi']),0,260).'...');

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(250);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'E. PILIHAN KOMPETENSI KEAHLIAN');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(255);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Jurusan yang dipilih');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['judul']));

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(265);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'Data tersebut diatas saya isi dengan benar dan saya bertanggung jawab sepenuhnya atas kebenarannya.');

						 if ($data['foto3x4'] != null) {
							 $pdf->Image('./upload/pendaftar/'.$data['foto3x4'],170,70,28,38);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b> Edit dan Upload Foto 3x4</b>, Terimakasih");
				 			redirect('pendaftar');
						 }

						 $pdf->SetY(275);
						 $pdf->SetX(150);
						 $pdf->Cell(65,7,'Tegal ,...../....../........');
						 $pdf->SetY(280);
						 $pdf->SetX(150);
						 $pdf->Cell(65,7,'Siswa Yang Bersangkutan');

						 $pdf->SetY(300);
						 $pdf->SetX(150);
						 $pdf->Cell(65,7,$data['nama_siswa']);

						 $pdf->AddPage();
						 if ($data['scan_akte'] != null) {
							 $pdf->Image('./upload/pendaftar/'.$data['scan_akte'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Akte</b>, Terimakasih");
 				 			redirect('pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_kk'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_kk'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Kartu Keluarga</b>, Terimakasih");
							redirect('pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_ijazah1'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_ijazah1'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Ijazah Sisi Depan</b>, Terimakasih");
							redirect('pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_ijazah2'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_ijazah2'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Ijazah Sisi Belakang</b>, Terimakasih");
							redirect('pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_skhu'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_skhu'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan SKHU</b>, Terimakasih");
							redirect('pendaftar');
						 }


						 $pdf->Output('Data Pendaftar tgl:'.date('Y-m-d H:i:s').'.pdf','D');
						// I: send the file inline to the browser. The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
						// D: send to the browser and force a file download with the name given by name.
						// F: save to a local file with the name given by name (may include a path).
						// S: return the document as a string. name is ignored.
				// 		 $this->redirect('refresh');
			}


	public function del($id)
	{
		belum_login();
		cek_admin();
		$pendaftar = $this->M_pendaftar->get($id) -> row();

		unlink('./upload/pendaftar/'.$pendaftar->foto3x4);
		unlink('./upload/pendaftar/'.$pendaftar->scan_akte);
		unlink('./upload/pendaftar/'.$pendaftar->scan_kk);
		unlink('./upload/pendaftar/'.$pendaftar->scan_ijazah1);
		unlink('./upload/pendaftar/'.$pendaftar->scan_ijazah2);
		unlink('./upload/pendaftar/'.$pendaftar->scan_skhu);


		$this->M_pendaftar->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('pendaftar');
	}


	// frontend
	public function edit_usr($id)
	{
		belum_login();
		$query = $this->M_user->get($id);
		if ($query->num_rows() > 0) {
			$user = $query->row();
			$data = array(
        'page' => 'User',
				'subpage' => 'Edit',
				'row' => $user,
				'img'  => $this->M_pendaftar->get(),
			);
			$this->template->load($this->foldertemplate.'template2',$this->folder.'edit_usr', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('dashboard/pendaftar');
		}
	}

		public function process_edit_usr()
		{
			belum_login();
			$post = $this->input->post(null, TRUE);
			if (isset($_POST['Edit'])) {
				$this->M_user->edit($post);
			}
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
			}
			redirect('dashboard/pendaftar');
			}


	public function form_reg()
	{
		belum_login();
		$pendaftar = new stdClass();
		$pendaftar->pendaftar_id = null;
		$pendaftar->user_id = null;
		$pendaftar->id_gelombang = null;
		$pendaftar->id_jurusan = null;
		$pendaftar->jurusan_id = null;
		$pendaftar->gelombang_id = null;
		$pendaftar->nisn = null;
		$pendaftar->nama_siswa = null;
		$pendaftar->tempat_lahir = null;
		$pendaftar->tgl_lahir = null;
		$pendaftar->jk = null;
		$pendaftar->agama = null;
		$pendaftar->alamat = null;
		$pendaftar->kode_pos = null;
		$pendaftar->no_telp = null;
		$pendaftar->no_hp = null;
		$pendaftar->nama_ayah = null;
		$pendaftar->nama_ibu = null;
		$pendaftar->nama_wali = null;
		$pendaftar->alamat_org = null;
		$pendaftar->nama_sekolah = null;
		$pendaftar->alamat_sekolah = null;
		$pendaftar->kec_sekolah = null;
		$pendaftar->kab_kota_sekolah = null;
		$pendaftar->propinsi = null;
		$pendaftar->tahun_lulus = null;
		$pendaftar->no_ijazah = null;
		$pendaftar->bhs_indo = null;
		$pendaftar->bhs_inggris = null;
		$pendaftar->mtk = null;
		$pendaftar->ipa = null;
		$pendaftar->prestasi = null;
		$pendaftar->info_daftar = null;
		$pendaftar->alasan = null;
		$pendaftar->foto3x4 = null;
		$pendaftar->scan_akte = null;
		$pendaftar->scan_kk = null;
		$pendaftar->scan_ijazah1 = null;
		$pendaftar->scan_ijazah2 = null;
		$pendaftar->scan_skhu = null;

		$data = array(
      'page' => 'Pendaftar',
			'subpage' => 'Add',
			'row' => $pendaftar,
			'gelombang' => $this->M_gelombang->get(),
			'jurusan' => $this->M_jurusan->get(),
			'img'  => $this->M_pendaftar->get(),
		);
		$this->template->load($this->foldertemplate.'template2',$this->folder.'form_reg', $data);
	}

	public function daftar_edit($id)
	{
		belum_login();
		$query = $this->M_pendaftar->get($id);
		if ($query->num_rows() > 0) {
			$pendaftar = $query->row();

			$data = array(
        'page' => 'Pendaftar',
				'subpage' => 'Edit',
				'row' => $pendaftar,
				'gelombang' => $this->M_gelombang->get(),
				'jurusan' => $this->M_jurusan->get(),
				'img'  => $this->M_pendaftar->get(),
			);
			$this->template->load($this->foldertemplate.'template2',$this->folder.'form_reg', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('dashboard/pendaftar');
		}

	}

	public function daftar()
	{
		belum_login();
		$config['upload_path'] 		= './upload/pendaftar/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  204800;
		$config['file_name']    	=  'Foto3x4-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) { //1
			if($this->M_pendaftar->cek_user_id($post['user_id'])->num_rows() > 0){ //2
				$this->session->set_flashdata('error', "Kamu sudah terdaftar, silahkan lakukan pengeditan apabila ada data yang belum lengkap");
				redirect('pendaftar/form_reg');
			}else { //2 /3
				if(@$_FILES['foto3x4']['name'] != null){ // 4
					if($this->upload->do_upload('foto3x4')){ //5
						$post['foto3x4'] = $this->upload->data('file_name');
						$this->M_pendaftar->add($post);
						if ($this->db->affected_rows() > 0) { //6
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						} //6
							redirect('dashboard/pendaftar');
					} else { //5 /7
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pendaftar/form_reg');
					} //7
				}	else { //4 /8
						$post['foto3x4'] = null;
						$this->M_pendaftar->add($post);
						if ($this->db->affected_rows() > 0) { //9
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						} //10
							redirect('dashboard/pendaftar');
				} //8
			} //3
		}else if (isset($_POST['Edit'])) { //11
				if(@$_FILES['foto3x4']['name'] != null){
					if($this->upload->do_upload('foto3x4')){
						$pendaftar = $this->M_pendaftar->get($post['pendaftar_id']) -> row();
						if($pendaftar->foto3x4 != null) {
							$target_file = './upload/pendaftar/'.$pendaftar->foto3x4;
							unlink($target_file);
						}
						$post['foto3x4'] = $this->upload->data('file_name');
							$this->M_pendaftar->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('dashboard/pendaftar');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pendaftar/form_reg');
					}
				}	else {
						$post['foto'] = null;
							$this->M_pendaftar->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('dashboard/pendaftar');
				}
			}
		}


		public function cetak_formulir()
      {
				belum_login();
        ob_start();
        $pdf = new FPDF('P','mm',array(215,330));
             // membuat halaman baru
             $pdf->AddPage();
             $pdf->Image('./assets/backend/assets/images/Kop Surat Wahas.jpg',0,0,-150);
             // setting jenis font yang akan digunakan
             $pdf->Cell(10,45,'',0,1);
             $pdf->SetFont('Times','B',14);
             // mencetak string
             $pdf->Cell(200,6,'FORMULIR PENDAFTARAN',0,1,'C');
						 $pdf->Cell(200,6,'PENERIMAAN PESERTA DIDIK BARU (PPDB)',0,1,'C');
						 $pdf->Cell(200,6,'TAHUN PELAJARAN '.date('Y').'/'.(date('Y')+1),0,1,'C');
             $pdf->SetFont('Times','B',12);
             // $pdf->Cell(190,6,'Tanggal Cetak : '.date('d-m-Y H:i'),0,1,'C');

             // Memberikan space kebawah agar tidak terlalu rapat
             $pdf->Cell(10,8,'',0,1);
             $pdf->SetFont('Times','B',12);

             $id  = $this->fungsi->user_login()->id;
             $data= $this->M_pendaftar->daftar($id);

						// $pdf->SetY(75);
						 //$pdf->Cell(7,7,'');
						 //$pdf->Cell(70,7,'NOMOR PENDAFTARAN');
						 //$pdf->Cell(7,7,':');
						 //$pdf->Cell(65,7,$data['id_jurusan'].'-'.date("d-m-Y", strtotime($data['created_at'])).'-'.$data['pendaftar_id'].'-'.$data['user_id']);
						 //jurusan-hari-bulan-tahun-id_pendaftar-user_id
						 $pdf->SetY(80);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'A. IDENTITAS CALON SISWA');

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

						 $pdf->SetY(95);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Tempat, Tanggal Lahir');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['tempat_lahir']).','.$data['tgl_lahir']);

						 $pdf->SetY(100);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'4. Jenis Kelamin');
						 $pdf->Cell(7,7,':');
						 if ($data['jk'] == "L") {
							 $pdf->Cell(65,7,'LAKI-LAKI');
						 }else{
							 $pdf->Cell(65,7,'PEREMPUAN');
						 }

						 $pdf->SetY(105);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'5. Agama');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['agama']));

						 $pdf->SetY(110);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'6. Alamat Siswa');
						 $pdf->Cell(7,7,':');
						 $pdf->MultiCell(110,4,strtoupper($data['alamat']));

						 $pdf->SetY(115);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'7. Kode Pos');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,10,$data['kode_pos']);

						 $pdf->SetY(120);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'8. Telepon/Handphone');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,9,$data['no_telp'].'/'.$data['no_hp']);

						 $pdf->SetY(125);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'9. Nama Orang Tua/Wali Murid');

						 $pdf->SetY(130);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Ayah / Wali Murid');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_ayah'].'/'.$data['nama_wali']));

						 $pdf->SetY(135);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. Ibu');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_ibu']));

						 $pdf->SetY(140);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'10. Alamat Orang Tua/Wali Murid');
						 $pdf->Cell(7,7,':');
						 $pdf->MultiCell(110,4,strtoupper($data['alamat_org']));

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(145);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'B. IDENTITAS SEKOLAH ASAL');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(150);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Nama Sekolah');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_sekolah']));

						 $pdf->SetY(155);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'2. Alamat Sekolah');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['alamat_sekolah']));

						 $pdf->SetY(160);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Kecamatan');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['kec_sekolah']));

						 $pdf->SetY(165);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'4. Kab/Kota');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['kab_kota_sekolah']));

						 $pdf->SetY(170);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'5. Propinsi');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['propinsi']));

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(175);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'C. NOMOR IJAZAH DAN NILAI');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(180);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Tahun Lulus');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['tahun_lulus']);

						 $pdf->SetY(185);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'2. Nomor STTB/Ijazah');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['no_ijazah']);

						 $pdf->SetY(190);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Daftar Nilai SKHU');

						 $pdf->SetY(195);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Bahasa Indonesia');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['bhs_indo']);

						 $pdf->SetY(200);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. Bahasa Inggris');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['bhs_inggris']);

						 $pdf->SetY(205);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'c. Matematika');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['mtk']);

						 $pdf->SetY(210);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'d. Ilmu Pengetahuan Alam');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['ipa']);

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(215);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'JUMLAH NEM');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['ipa']+$data['mtk']+$data['bhs_inggris']+$data['bhs_indo']);

						 $pdf->SetY(220);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'D. PRESTASI DAN PENGHARGAAN');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(225);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Prestasi dan Penghargaan');
						 $pdf->SetY(230);
						 $pdf->Cell(16,7,'');
						 $pdf->MultiCell(175,5,substr(strtoupper($data['prestasi']),0,260).'...');

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(250);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'E. PILIHAN KOMPETENSI KEAHLIAN');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(255);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Jurusan yang dipilih');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['judul']));

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(265);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'Data tersebut diatas saya isi dengan benar dan saya bertanggung jawab sepenuhnya atas kebenarannya.');
						 if ($data['foto3x4'] != null) {
							 $pdf->Image('./upload/pendaftar/'.$data['foto3x4'],170,70,28,38);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b> Edit dan Upload Foto 3x4</b>, Terimakasih");
				 			redirect('dashboard/pendaftar');
						 }

						 $pdf->SetY(275);
						 $pdf->SetX(150);
						 $pdf->Cell(65,7,'Tegal ,...../....../........');
						 $pdf->SetY(280);
						 $pdf->SetX(150);
						 $pdf->Cell(65,7,'Siswa Yang Bersangkutan');

						 $pdf->SetY(300);
						 $pdf->SetX(150);
						 $pdf->Cell(65,7,$data['nama_siswa']);

						 $pdf->AddPage();
						 if ($data['scan_akte'] != null) {
							 $pdf->Image('./upload/pendaftar/'.$data['scan_akte'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Akte</b>, Terimakasih");
 				 			redirect('dashboard/pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_kk'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_kk'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Kartu Keluarga</b>, Terimakasih");
							redirect('dashboard/pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_ijazah1'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_ijazah1'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Ijazah Sisi Depan</b>, Terimakasih");
							redirect('dashboard/pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_ijazah2'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_ijazah2'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Ijazah Sisi Belakang</b>, Terimakasih");
							redirect('dashboard/pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_skhu'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_skhu'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan SKHU</b>, Terimakasih");
							redirect('dashboard/pendaftar');
						 }


						 $pdf->Output('Data Pendaftar tgl:'.date('Y-m-d H:i:s').'.pdf','D');
						// I: send the file inline to the browser. The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
						// D: send to the browser and force a file download with the name given by name.
						// F: save to a local file with the name given by name (may include a path).
						// S: return the document as a string. name is ignored.
				// 		 $this->redirect('refresh');
      }
}
