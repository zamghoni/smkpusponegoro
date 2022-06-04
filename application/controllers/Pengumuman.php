<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

  private $folder   = "backend/pengumuman/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model('M_pengumuman');
		$this->load->library('form_validation');
  }

	public function index()
	{
    belum_login();
		cek_admin();
    $data = array(
      'page' => 'Pengumuman',
      'row'  => $this->M_pengumuman->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
    belum_login();
    cek_admin();
		$pengumuman = new stdClass();
		$pengumuman->pengumuman_id = null;
		$pengumuman->judul = null;
    $pengumuman->isi = null;
    $pengumuman->link = null;
    $pengumuman->status = null;
		$data = array(
      'page' => 'Pengumuman',
			'subpage' => 'Add',
			'row' => $pengumuman
		);
		if ($this->form_validation->run() == FALSE) {
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}
}

	public function edit($id)
	{
    belum_login();
		cek_admin();
		$query = $this->M_pengumuman->get($id);
		if ($query->num_rows() > 0) {
			$pengumuman = $query->row();
			$data = array(
        'page' => 'Pengumuman',
				'subpage' => 'Edit',
				'row' => $pengumuman
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('pengumuman');
		}

	}

	public function process()
	{
    belum_login();
		cek_admin();
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_pengumuman->cek_judul($post['judul'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul pengumuman $post[judul] sudah dipakai pengumuman lain, silahkan ganti dengan yang berbeda");
				redirect('pengumuman/form');
			} else {
			$this->M_pengumuman->add($post);
		}
  }else if (isset($_POST['Edit'])) {
			$this->M_pengumuman->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('pengumuman');
		}


	public function del($id)
	{
    belum_login();
		cek_admin();
		$this->M_pengumuman->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('pengumuman');
	}
}
