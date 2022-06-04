<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gelombang extends CI_Controller {

  private $folder   = "backend/gelombang/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model('M_gelombang');
		$this->load->library('form_validation');
  }

	public function index()
	{
    belum_login();
		cek_admin();
    $data = array(
      'page' => 'Gelombang',
      'row'  => $this->M_gelombang->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
    belum_login();
    cek_admin();
		$gelombang = new stdClass();
		$gelombang->gelombang_id = null;
		$gelombang->judul_gel = null;
    $gelombang->tgl_buka = null;
    $gelombang->tgl_tutup = null;
    $gelombang->isi = null;
		$data = array(
      'page' => 'Gelombang',
			'subpage' => 'Add',
			'row' => $gelombang
		);
		if ($this->form_validation->run() == FALSE) {
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}
}

	public function edit($id)
	{
    belum_login();
		cek_admin();
		$query = $this->M_gelombang->get($id);
		if ($query->num_rows() > 0) {
			$gelombang = $query->row();
			$data = array(
        'page' => 'Gelombang',
				'subpage' => 'Edit',
				'row' => $gelombang
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('gelombang');
		}

	}

	public function process()
	{
    belum_login();
		cek_admin();
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_gelombang->cek_judul($post['judul'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul Gelombang $post[judul] sudah dipakai gelombang lain, silahkan ganti dengan yang berbeda");
				redirect('gelombang/form');
			} else {
			$this->M_gelombang->add($post);
		}
  }else if (isset($_POST['Edit'])) {
			$this->M_gelombang->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('gelombang');
		}


	public function del($id)
	{
    belum_login();
		cek_admin();
		$this->M_gelombang->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('gelombang');
	}
}
