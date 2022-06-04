<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  private $folder   = "backend/user/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    belum_login();
    $this->load->model('M_user');
		$this->load->library('form_validation');
  }

	public function index()
	{
    cek_admin();
    $data = array(
      'page' => 'User',
      'row'  => $this->M_user->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
    cek_admin();
		$user = new stdClass();
		$user->id = null;
		$user->username = null;
    $user->email = null;
    $user->password = null;
    $user->role = null;
    $user->status = null;
		$data = array(
      'page' => 'User',
			'subpage' => 'Add',
			'row' => $user
		);
		if ($this->form_validation->run() == FALSE) {
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}
}

	public function edit($id)
	{
    cek_admin();
		$query = $this->M_user->get($id);
		if ($query->num_rows() > 0) {
			$user = $query->row();
			$data = array(
        'page' => 'User',
				'subpage' => 'Edit',
				'row' => $user
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('user');
		}

	}
	
	public function process()
	{
    cek_admin();
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_user->cek_username($post['username'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Username $post[username] sudah dipakai user lain, silahkan ganti dengan yang berbeda");
				redirect('user/form');
			} else {
			$this->M_user->add($post);
		}
  }else if (isset($_POST['Edit'])) {
			$this->M_user->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('user');
		}


	public function del($id)
	{
    cek_admin();
		$this->M_user->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('user');
	}
}
