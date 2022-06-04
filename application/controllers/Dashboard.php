<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  private $folder   = "backend/dashboard/";
  private $foldertemplate   = "backend/";

  function __construct()
  {
    parent::__construct();
    belum_login();
    $this->load->model(['M_info','M_pendaftar','M_galeri','M_jurusan','M_laporan','M_pembayaran','M_pengumuman']);
  }

	public function index()
	{
    cek_admin();
    $data = array(
      'page' => "Dashboard",
      'data_info'   => $this->M_info->get(),
      'data_pendaftar'   => $this->M_pendaftar->get(),
      'data_pembayaran'  => $this->M_pembayaran->get(),
      'data_pengumuman'  => $this->M_pengumuman->get(),
      'data_galeri'   => $this->M_galeri->get(),
      'data_laporan'   => $this->M_laporan->cetak_pdf(),
    );

		$this->template->load($this->foldertemplate.'template',$this->folder.'dashboard',$data);
	}

  //backend user
  public function pendaftar()
  {
    $data = array(
      'page' => "Pendaftar",
      'row'  => $this->M_pendaftar->get(),
      'jurusan' => $this->M_jurusan->get(),
      'img'  => $this->M_pendaftar->get(),
    );

    $this->template->load($this->foldertemplate.'template2',$this->folder.'beranda',$data);
  }

}
