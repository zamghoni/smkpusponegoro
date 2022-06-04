
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	private $folder   = "backend/pembayaran/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_pembayaran','M_user','M_pendaftar']);
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
