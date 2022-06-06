<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	private $folder   = "backend/profil/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_profil']);
  }

	public function index()
	{
		belum_login();
		cek_admin();
    $data = array(
      'page' => 'Profil',
      'row'  => $this->M_profil->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function visi()
	{
		belum_login();
		cek_admin();
		$data = array(
			'page' => 'Profil',
			'row'  => $this->M_profil->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'datavisi', $data);
	}

	public function org()
	{
		belum_login();
		cek_admin();
		$data = array(
			'page' => 'Profil',
			'row'  => $this->M_profil->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'dataorg', $data);
	}

	public function bdaftar()
	{
		belum_login();
		cek_admin();
		$data = array(
			'page' => 'Profil',
			'row'  => $this->M_profil->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'databdaftar', $data);
	}

	public function bmasuk()
	{
		belum_login();
		cek_admin();
		$data = array(
			'page' => 'Profil',
			'row'  => $this->M_profil->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'databmasuk', $data);
	}


	public function form()
	{
		belum_login();
		cek_admin();
		$profil = new stdClass();
		$profil->profil_id = null;
		$profil->judul = null;
		$profil->isi = null;

		$data = array(
      'page' => 'Profil',
			'subpage' => 'Add',
			'row' => $profil
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}

	public function edit($id)
	{
		belum_login();
		cek_admin();
		$query = $this->M_profil->get($id);
		if ($query->num_rows() > 0) {
			$profil = $query->row();

			$data = array(
        'page' => 'Profil',
				'subpage' => 'Edit',
				'row' => $profil,
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('profil');
		}

	}

	public function process()
	{
		belum_login();
		cek_admin();
		$config['upload_path'] 		= './upload/profil/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  2048;
		$config['file_name']    	=  'profil-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_profil->cek_judul($post['judul'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai , silahkan ganti dengan yang berbeda");
				redirect('profil/form');
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){
						$post['foto'] = $this->upload->data('file_name');
						$this->M_profil->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('profil');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('profil/form');
					}
				}	else {
						$post['profil'] = null;
						$this->M_profil->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('profil');
				}
			}
		}else if (isset($_POST['Edit'])) {
			if($this->M_profil->cek_judul($post['judul'], $post['profil_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai, silahkan ganti dengan yang berbeda");
				redirect('profil/edit/'.$post['profil_id']);
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){

						$profil = $this->M_profil->get($post['profil_id']) -> row();
						if($profil->foto != null) {
							$target_file = './upload/profil/'.$profil->foto;
							unlink($target_file);
						}

						$post['foto'] = $this->upload->data('file_name');
							$this->M_profil->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('profil');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('profil/form');
					}
				}	else {
						$post['foto'] = null;
							$this->M_profil->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('profil');
				}
			}
		}
		}

	public function del($id)
	{
		belum_login();
		cek_admin();
		$profil = $this->M_profil->get($id) -> row();
		if($profil->foto != null) {
			$target_file = './upload/profil/'.$profil->foto;
			unlink($target_file);
		}
		$this->M_profil->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('profil');
	}


	// frontend
	private $frontend   = "frontend/profil/";
	private $frontendtemplate   = "frontend/";

	public function sejarah()
	{
		$data = array(
      'page' => "Sejarah SMK Pusponogoro 01 Brebes",
			'row' => $this->M_profil->sejarah($this->uri->segment(3))->row_array(),
    );

		$this->template->load($this->frontendtemplate.'template',$this->frontend.'sejarah', $data);
	}

	public function visi_misi()
	{
		$data = array(
			'page' => "Visi dan Misi SMK Pusponogoro 01 Brebes",
			'row' => $this->M_profil->visi_misi($this->uri->segment(3))->row_array(),
		);

		$this->template->load($this->frontendtemplate.'template',$this->frontend.'visi-misi', $data);
	}

	public function struktur()
	{
		$data = array(
			'page' => "Struktur Organisasi SMK Pusponogoro 01 Brebes",
			'row' => $this->M_profil->struktur($this->uri->segment(3))->row_array(),
		);

		$this->template->load($this->frontendtemplate.'template',$this->frontend.'struktur', $data);
	}

	public function kontak()
	{
		$data = array(
			'page' => "Kontak Kami SMK Pusponogoro 01 Brebes",
		);

		$this->template->load($this->frontendtemplate.'template',$this->frontend.'kontak-kami',$data);
	}


}
