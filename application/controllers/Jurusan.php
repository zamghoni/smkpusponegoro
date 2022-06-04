<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	private $folder   = "backend/jurusan/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_jurusan']);
  }

	public function index()
	{
		belum_login();
		cek_admin();
    $data = array(
      'page' => 'Jurusan',
      'row'  => $this->M_jurusan->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
		belum_login();
		cek_admin();
		$jurusan = new stdClass();
		$jurusan->jurusan_id = null;
		$jurusan->judul = null;
		$jurusan->isi = null;

		$data = array(
      'page' => 'Jurusan',
			'subpage' => 'Add',
			'row' => $jurusan
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}

	public function edit($id)
	{
		belum_login();
		cek_admin();
		$query = $this->M_jurusan->get($id);
		if ($query->num_rows() > 0) {
			$jurusan = $query->row();

			$data = array(
        'page' => 'Jurusan',
				'subpage' => 'Edit',
				'row' => $jurusan,
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('jurusan');
		}

	}

	public function process()
	{
		belum_login();
		cek_admin();
		$config['upload_path'] 		= './upload/jurusan/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  2048;
		$config['file_name']    	=  'jurusan-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_jurusan->cek_judul($post['judul'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai , silahkan ganti dengan yang berbeda");
				redirect('jurusan/form');
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){
						$post['foto'] = $this->upload->data('file_name');
						$this->M_jurusan->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('jurusan');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('jurusan/form');
					}
				}	else {
						$post['jurusan'] = null;
						$this->M_jurusan->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('jurusan');
				}
			}
		}else if (isset($_POST['Edit'])) {
			if($this->M_jurusan->cek_judul($post['judul'], $post['jurusan_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai, silahkan ganti dengan yang berbeda");
				redirect('jurusan/edit/'.$post['jurusan_id']);
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){

						$jurusan = $this->M_jurusan->get($post['jurusan_id']) -> row();
						if($jurusan->foto != null) {
							$target_file = './upload/jurusan/'.$jurusan->foto;
							unlink($target_file);
						}

						$post['foto'] = $this->upload->data('file_name');
							$this->M_jurusan->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('jurusan');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('jurusan/form');
					}
				}	else {
						$post['foto'] = null;
							$this->M_jurusan->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('jurusan');
				}
			}
		}
		}

	public function del($id)
	{
		belum_login();
		cek_admin();
		$jurusan = $this->M_jurusan->get($id) -> row();
		if($jurusan->foto != null) {
			$target_file = './upload/jurusan/'.$jurusan->foto;
			unlink($target_file);
		}
		$this->M_jurusan->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('jurusan');
	}

	// frontend
	private $frontend   = "frontend/jurusan/";
	private $frontendtemplate   = "frontend/";

	public function detail()
	{
		$data = array(
			'page' => "Detail Jurusan",
			'row' => $this->M_jurusan->jrs_detail($this->uri->segment(3))->row_array(),
		);

		$this->template->load($this->frontendtemplate.'template2',$this->frontend.'detail', $data);
	}

}
