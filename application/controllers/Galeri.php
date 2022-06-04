<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	private $folder   = "backend/galeri/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_galeri']);
  }

	public function index()
	{
		belum_login();
		cek_admin();
    $data = array(
      'page' => 'Galeri',
      'row'  => $this->M_galeri->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
		belum_login();
		cek_admin();
		$galeri = new stdClass();
		$galeri->galeri_id = null;
		$galeri->judul = null;
		$galeri->kategori = null;
		$galeri->isi = null;
		$galeri->link = null;

		$data = array(
      'page' => 'Galeri',
			'subpage' => 'Add',
			'row' => $galeri
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}

	public function edit($id)
	{
		belum_login();
		cek_admin();
		$query = $this->M_galeri->get($id);
		if ($query->num_rows() > 0) {
			$galeri = $query->row();

			$data = array(
        'page' => 'Galeri',
				'subpage' => 'Edit',
				'row' => $galeri,
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('galeri');
		}

	}

	public function process()
	{
		belum_login();
		cek_admin();
		$config['upload_path'] 		= './upload/galeri/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  2048;
		$config['file_name']    	=  'galeri-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_galeri->cek_judul($post['judul'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai , silahkan ganti dengan yang berbeda");
				redirect('galeri/form');
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){
						$post['foto'] = $this->upload->data('file_name');
						$this->M_galeri->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('galeri');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('galeri/form');
					}
				}	else {
						$post['galeri'] = null;
						$this->M_galeri->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('galeri');
				}
			}
		}else if (isset($_POST['Edit'])) {
			if($this->M_galeri->cek_judul($post['judul'], $post['galeri_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai, silahkan ganti dengan yang berbeda");
				redirect('galeri/edit/'.$post['galeri_id']);
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){

						$galeri = $this->M_galeri->get($post['galeri_id']) -> row();
						if($galeri->foto != null) {
							$target_file = './upload/galeri/'.$galeri->foto;
							unlink($target_file);
						}

						$post['foto'] = $this->upload->data('file_name');
							$this->M_galeri->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('galeri');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('galeri/form');
					}
				}	else {
						$post['foto'] = null;
							$this->M_galeri->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('galeri');
				}
			}
		}
		}

	public function del($id)
	{
		belum_login();
		cek_admin();
		$galeri = $this->M_galeri->get($id) -> row();
		if($galeri->foto != null) {
			$target_file = './upload/galeri/'.$galeri->foto;
			unlink($target_file);
		}
		$this->M_galeri->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('galeri');
	}


	// frontend
	private $frontend   = "frontend/galeri/";
  private $frontendtemplate   = "frontend/";

  public function foto()
  {
    $data['galeri_foto'] = $this->M_galeri->galeri_foto();
		$data['page'] = 'Galeri Foto';
    $this->template->load($this->frontendtemplate.'template',$this->frontend.'foto', $data);
  }

	public function video()
  {
    $data['galeri_video'] = $this->M_galeri->galeri_video();
		$data['page'] = 'Galeri Video';
    $this->template->load($this->frontendtemplate.'template',$this->frontend.'video', $data);
  }


}
