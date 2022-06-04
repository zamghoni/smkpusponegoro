<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendaftar extends CI_model {

  private $redirect = 'dashboard/pendaftar';

  public function get($id = null)
  {
    $this->db->from('pendaftar');
    $this->db->join('gelombang', 'gelombang.gelombang_id = pendaftar.id_gelombang');
    $this->db->join('jurusan', 'jurusan.jurusan_id = pendaftar.id_jurusan');
    if ($id != null) {
      $this->db->where('pendaftar_id',$id);
    }
    $this->db->order_by('pendaftar_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'id_jurusan' => $post['id_jurusan'],
      'id_gelombang' => 1,
      'nisn' => $post['nisn'],
      'nama_siswa' => $post['nama_siswa'],
      'tempat_lahir' => $post['tempat_lahir'],
      'tgl_lahir' => $post['tgl_lahir'],
      'jk' => $post['jk'],
      'agama' => $post['agama'],
      'alamat' => $post['alamat'],
      'kode_pos' => $post['kode_pos'],
      'no_telp' => $post['no_telp'],
      'no_hp' => $post['no_hp'],
      'nama_ayah' => $post['nama_ayah'],
      'nama_ibu' => $post['nama_ibu'],
      'nama_wali' => $post['nama_wali'],
      'alamat_org' => $post['alamat_org'],
      'nama_sekolah' => $post['nama_sekolah'],
      'alamat_sekolah' => $post['alamat_sekolah'],
      'kec_sekolah' => $post['kec_sekolah'],
      'kab_kota_sekolah' => $post['kab_kota_sekolah'],
      'propinsi' => $post['propinsi'],
      'tahun_lulus' => $post['tahun_lulus'],
      'no_ijazah' => $post['no_ijazah'],
      'bhs_indo' => $post['bhs_indo'],
      'bhs_inggris' => $post['bhs_inggris'],
      'mtk' => $post['mtk'],
      'ipa' => $post['ipa'],
      'prestasi' => $post['prestasi'],
      'foto3x4' => $post['foto3x4'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    if (!empty($_FILES['scan_akte']['name'])) {
      $upload = $this->_do_uploadakte();
      $params['scan_akte'] = $upload;
    }
      if (!empty($_FILES['scan_kk']['name'])) {
      $upload = $this->_do_uploadkk();
      $params['scan_kk'] = $upload;
    }
      if (!empty($_FILES['scan_ijazah1']['name'])) {
      $upload = $this->_do_uploadij1();
      $params['scan_ijazah1'] = $upload;
    }
      if (!empty($_FILES['scan_ijazah2']['name'])) {
      $upload = $this->_do_uploadij2();
      $params['scan_ijazah2'] = $upload;
    }
      if (!empty($_FILES['scan_skhu']['name'])) {
      $upload = $this->_do_uploadskhu();
      $params['scan_skhu'] = $upload;
    }

    $this->db->insert('pendaftar', $params);
  }

  private function _do_uploadakte()
    {
    unset($config);
    $config['upload_path'] 		= './upload/pendaftar/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  204800;
    $config['file_name']    	=  'Scan Akte'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('scan_akte')) {
      $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
      redirect($this->redirect,'refresh');
    }
    return $this->upload->data('file_name');
    }

  private function _do_uploadkk()
    {
    unset($config);
    $config['upload_path'] 		= './upload/pendaftar/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  204800;
    $config['file_name']    	=  'Scan Kartu Keluarga'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('scan_kk')) {
      $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
      redirect($this->redirect,'refresh');
    }
    return $this->upload->data('file_name');
    }

  private function _do_uploadij1()
    {
    unset($config);
    $config['upload_path'] 		= './upload/pendaftar/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  204800;
    $config['file_name']    	=  'Scan Ijazah 1-'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('scan_ijazah1')) {
      $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
      redirect($this->redirect,'refresh');
    }
    return $this->upload->data('file_name');
    }

    private function _do_uploadij2()
    {
    unset($config);
    $config['upload_path'] 		= './upload/pendaftar/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  204800;
    $config['file_name']    	=  'Scan Ijazah 2-'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('scan_ijazah2')) {
      $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
      redirect($this->redirect,'refresh');
    }
    return $this->upload->data('file_name');
    }

    private function _do_uploadskhu()
    {
    unset($config);
    $config['upload_path'] 		= './upload/pendaftar/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  204800;
    $config['file_name']    	=  'Scan SKHU-'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('scan_skhu')) {
      $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
      redirect($this->redirect,'refresh');
    }
    return $this->upload->data('file_name');
    }

  public function edit($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'id_jurusan' => $post['id_jurusan'],
      'id_gelombang' => 1,
      'nisn' => $post['nisn'],
      'nama_siswa' => $post['nama_siswa'],
      'tempat_lahir' => $post['tempat_lahir'],
      'tgl_lahir' => $post['tgl_lahir'],
      'jk' => $post['jk'],
      'agama' => $post['agama'],
      'alamat' => $post['alamat'],
      'kode_pos' => $post['kode_pos'],
      'no_telp' => $post['no_telp'],
      'no_hp' => $post['no_hp'],
      'nama_ayah' => $post['nama_ayah'],
      'nama_ibu' => $post['nama_ibu'],
      'nama_wali' => $post['nama_wali'],
      'alamat_org' => $post['alamat_org'],
      'nama_sekolah' => $post['nama_sekolah'],
      'alamat_sekolah' => $post['alamat_sekolah'],
      'kec_sekolah' => $post['kec_sekolah'],
      'kab_kota_sekolah' => $post['kab_kota_sekolah'],
      'propinsi' => $post['propinsi'],
      'tahun_lulus' => $post['tahun_lulus'],
      'no_ijazah' => $post['no_ijazah'],
      'bhs_indo' => $post['bhs_indo'],
      'bhs_inggris' => $post['bhs_inggris'],
      'mtk' => $post['mtk'],
      'ipa' => $post['ipa'],
      'prestasi' => $post['prestasi'],
      'updated_at' => date('Y-m-d H:i:s')
    ];
    if (!empty($post['foto3x4'])) {
      $params['foto3x4'] = $post['foto3x4'];
    }
    if (!empty($_FILES['scan_akte']['name'])) {
    $upload = $this->_do_uploadakte();
    $params['scan_akte'] = $upload;
    unlink("./upload/pendaftar/".$this->input->post('old_scan_akte'));
    }
    if (!empty($_FILES['scan_kk']['name'])) {
    $upload = $this->_do_uploadkk();
    $params['scan_kk'] = $upload;
    unlink("./upload/pendaftar/".$this->input->post('old_scan_kk'));
    }
    if (!empty($_FILES['scan_ijazah1']['name'])) {
    $upload = $this->_do_uploadij1();
    $params['scan_ijazah1'] = $upload;
    unlink("./upload/pendaftar/".$this->input->post('old_scan_ijazah1'));
    }
    if (!empty($_FILES['scan_ijazah2']['name'])) {
    $upload = $this->_do_uploadij2();
    $params['scan_ijazah2'] = $upload;
    unlink("./upload/pendaftar/".$this->input->post('old_scan_ijazah2'));
    }
    if (!empty($_FILES['scan_skhu']['name'])) {
    $upload = $this->_do_uploadskhu();
    $params['scan_skhu'] = $upload;
    unlink("./upload/pendaftar/".$this->input->post('old_scan_skhu'));
    }
    $this->db->where('pendaftar_id', $post['pendaftar_id']);
    $this->db->update('pendaftar', $params);
    }

  function cek_user_id($code, $id = null)
  {
    $this->db->from('pendaftar');
    $this->db->where('user_id', $code);
    if($id != null){
      $this->db->where('pendaftar_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('pendaftar_id', $id);
    $this->db->delete('pendaftar');
	}

  public function daftar($id)
  {
    $this->db->join('gelombang', 'gelombang.gelombang_id = pendaftar.id_gelombang');
    $this->db->join('jurusan', 'jurusan.jurusan_id = pendaftar.id_jurusan');
    $this->db->where('user_id', $id);
    return $this->db->get("pendaftar")->row_array();
  }

  // Frontend

}
