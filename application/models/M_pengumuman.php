<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengumuman extends CI_model {

  public function get($id = null)
  {
    $this->db->from('pengumuman');
    if ($id != null) {
      $this->db->where('pengumuman_id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'link' => $post['link'],
      'status' => $post['status'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('pengumuman', $params);
  }

  public function edit($post)
  {
    $params = [
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'link' => $post['link'],
      'status' => $post['status'],
      'updated_at' => date('Y-m-d H:i:s')
    ];
    $this->db->where('pengumuman_id', $post['pengumuman_id']);
    $this->db->update('pengumuman', $params);
  }


  function cek_judul($code, $id = null)
  {
    $this->db->from('pengumuman');
    $this->db->where('judul', $code);
    if($id != null){
      $this->db->where('pengumuman_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('pengumuman_id', $id);
    $this->db->delete('pengumuman');
	}

}
