<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	private $folder   = "backend/info/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_info','M_kategori']);
  }

	public function index()
	{
		belum_login();
		cek_admin();
    $data = array(
      'page' => 'Info',
      'row'  => $this->M_info->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
		belum_login();
		cek_admin();
		$info = new stdClass();
		$info->info_id = null;
		$info->id_kategori = null;
		$info->kategori_id = null;
		$info->judul = null;
		$info->isi = null;

		$data = array(
      'page' => 'Info',
			'subpage' => 'Add',
			'row' => $info,
			'kategori' => $this->M_kategori->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}

	public function edit($id)
	{
		belum_login();
		cek_admin();
		$query = $this->M_info->get($id);
		if ($query->num_rows() > 0) {
			$info = $query->row();

			$data = array(
        'page' => 'Info',
				'subpage' => 'Edit',
				'row' => $info,
				'kategori' => $this->M_kategori->get(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('info');
		}

	}

	public function process()
	{
		belum_login();
		cek_admin();
		$config['upload_path'] 		= './upload/info/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  2048;
		$config['file_name']    	=  'info-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_info->cek_judul($post['judul'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai , silahkan ganti dengan yang berbeda");
				redirect('info/form');
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){
						$post['foto'] = $this->upload->data('file_name');
						$this->M_info->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('info');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('info/form');
					}
				}	else {
						$post['info'] = null;
						$this->M_info->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('info');
				}
			}
		}else if (isset($_POST['Edit'])) {
			if($this->M_info->cek_judul($post['judul'], $post['info_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai, silahkan ganti dengan yang berbeda");
				redirect('info/edit/'.$post['info_id']);
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){

						$info = $this->M_info->get($post['info_id']) -> row();
						if($info->foto != null) {
							$target_file = './upload/info/'.$info->foto;
							unlink($target_file);
						}

						$post['foto'] = $this->upload->data('file_name');
							$this->M_info->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('info');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('info/form');
					}
				}	else {
						$post['foto'] = null;
							$this->M_info->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('info');
				}
			}
		}
		}

	public function del($id)
	{
		belum_login();
		cek_admin();
		$info = $this->M_info->get($id) -> row();
		if($info->foto != null) {
			$target_file = './upload/info/'.$info->foto;
			unlink($target_file);
		}
		$this->M_info->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('info');
	}

	// frontend
	private $frontend   = "frontend/info/";
	private $frontendtemplate   = "frontend/";
	//paging
	private $per_page 	= 3;

	public function semua_berita()
	{
		$page 	 = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$semua_berita = $this->M_info->semua_berita();
		$semua_berita  = $this->M_info->GetDataPaging($this->per_page, $page);

		$data = array(
      'page' => "Semua Berita",
      'semua_berita'   => $semua_berita,
			'new' => $this->M_info->new_info(),
			'paging' 	=> Paging2($this->per_page,$this->M_info->GetCount())
    );

		$this->template->load($this->frontendtemplate.'template',$this->frontend.'semua_berita', $data);
	}

	public function berita()
	{
		$berita = $this->M_info->berita();

		$data = array(
			'page' => "Berita Sekolah",
			'berita'   => $berita,
		);

		$this->template->load($this->frontendtemplate.'template',$this->frontend.'berita', $data);
	}

	public function kegiatan()
	{
		$kegiatan = $this->M_info->kegiatan();

		$data = array(
			'page' => "Kegiatan Sekolah",
			'kegiatan'   => $kegiatan,
		);

		$this->template->load($this->frontendtemplate.'template',$this->frontend.'kegiatan', $data);
	}

	public function lingkungan()
	{
		$lingkungan = $this->M_info->lingkungan();

		$data = array(
			'page' => "Lingkungan Sekolah",
			'lingkungan'   => $lingkungan,
		);

		$this->template->load($this->frontendtemplate.'template',$this->frontend.'lingkungan', $data);
	}

	public function detail()
	{
		$data = array(
      'page' => "Detail Info",
			'row' => $this->M_info->detail($this->uri->segment(3))->row_array(),
    );

		$this->template->load($this->frontendtemplate.'template',$this->frontend.'detail', $data);
	}
}
