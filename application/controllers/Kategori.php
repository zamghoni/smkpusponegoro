<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

  private $folder   = "backend/kategori/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model('M_kategori');
		$this->load->library('form_validation');
  }

	public function index()
	{
    belum_login();
		cek_admin();
    $data = array(
      'page' => 'Kategori',
      'row'  => $this->M_kategori->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
    belum_login();
		cek_admin();
		$kategori = new stdClass();
		$kategori->kategori_id = null;
		$kategori->nama_kategori = null;
		$data = array(
      'page' => 'Kategori',
			'subpage' => 'Add',
			'row' => $kategori
		);
		if ($this->form_validation->run() == FALSE) {
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}
}

	public function edit($id)
	{
    belum_login();
    cek_admin();;
		$query = $this->M_kategori->get($id);
		if ($query->num_rows() > 0) {
			$kategori = $query->row();
			$data = array(
        'page' => 'Kategori',
				'subpage' => 'Edit',
				'row' => $kategori
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('kategori');
		}

	}

	public function process()
	{
    belum_login();
		cek_admin();
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_kategori->cek_nama_kategori($post['nama_kategori'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Nama kategori $post[nama_kategori] sudah dipakai kategori lain, silahkan ganti dengan yang berbeda");
				redirect('kategori/form');
			} else {
			$this->M_kategori->add($post);
		}
  }else if (isset($_POST['Edit'])) {
			$this->M_kategori->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('kategori');
		}


	public function del($id)
	{
    belum_login();
		cek_admin();
		$this->M_kategori->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('kategori');
  	}

}
