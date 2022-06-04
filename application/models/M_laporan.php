<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_model {

  public function get($id = null)
  {
    $this->db->from('pendaftar');
    $this->db->join('jurusan', 'jurusan.jurusan_id = pendaftar.id_jurusan');
    if ($id != null) {
      $this->db->where('pendaftar_id',$id);
    }
    $this->db->order_by('pendaftar_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function cetak_pdf()
  {
    $this->db->from('pendaftar');
    $this->db->join('jurusan', 'jurusan.jurusan_id = pendaftar.id_jurusan');
    $this->db->join('user','user.id = pendaftar.user_id');
    $this->db->where('status', 1);
    $this->db->where('jurusan_id !=', null);
    return $this->db->get();
  }


}
