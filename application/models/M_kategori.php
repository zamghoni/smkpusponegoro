<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_model {

  public function get($id = null)
  {
    $this->db->from('kategori');
    if ($id != null) {
      $this->db->where('kategori_id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'nama_kategori' => $post['nama_kategori'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('kategori', $params);
  }


  public function edit($post)
  {
    $params = [
      'nama_kategori' => $post['nama_kategori'],
      'updated_at' => date('Y-m-d H:i:s')
    ];
    $this->db->where('kategori_id', $post['id']);
    $this->db->update('kategori', $params);
  }


  function cek_nama_kategori($code, $id = null)
  {
    $this->db->from('kategori');
    $this->db->where('nama_kategori', $code);
    if($id != null){
      $this->db->where('kategori_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('kategori_id', $id);
    $this->db->delete('kategori');
	}

}
