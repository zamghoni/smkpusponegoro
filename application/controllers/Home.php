<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  private $folder   = "frontend/home/";
  private $foldertemplate   = "frontend/";

  function __construct()
  {
    parent::__construct();
    $this->load->model(['M_home']);
  }

	public function index()
	{
    $params = array ('username','role');
		$this->session->unset_userdata($params);

    $data = array(
      'info'    => $this->M_home->info(),
      'galeri_foto'    => $this->M_home->galeri_foto(),
      'galeri_video'   => $this->M_home->galeri_video(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'home',$data);
	}

  public function ppdb()
	{
    $data = array(
      'info'    => $this->M_home->info(),
      'ppdb'    => $this->M_home->ppdb(),
      'gelombang'    => $this->M_home->gelombang(),
      'jurusan'   => $this->M_home->jurusan(),
      'pengumuman' => $this->M_home->pengumuman(),
    );
		$this->template->load($this->foldertemplate.'template2',$this->folder.'ppdb',$data);
	}


}
