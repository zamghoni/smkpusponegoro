<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gelombang extends CI_model {

  public function get($id = null)
  {
    $this->db->from('gelombang');
    if ($id != null) {
      $this->db->where('gelombang_id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'judul_gel' => $post['judul'],
      'tgl_buka' => $post['tgl_buka'],
      'tgl_tutup' => $post['tgl_tutup'],
      'isi' => $post['isi'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('gelombang', $params);
  }

  public function edit($post)
  {
    $params = [
      'judul_gel' => $post['judul'],
      'tgl_buka' => $post['tgl_buka'],
      'tgl_tutup' => $post['tgl_tutup'],
      'isi' => $post['isi'],
      'updated_at' => date('Y-m-d H:i:s')
    ];
    $this->db->where('gelombang_id', $post['gelombang_id']);
    $this->db->update('gelombang', $params);
  }


  function cek_judul($code, $id = null)
  {
    $this->db->from('gelombang');
    $this->db->where('judul', $code);
    if($id != null){
      $this->db->where('gelombang_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('gelombang_id', $id);
    $this->db->delete('gelombang');
	}

}
