<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_model {

  public function get($id = null)
  {
    $this->db->from('galeri');
    if ($id != null) {
      $this->db->where('galeri_id',$id);
    }
    $this->db->order_by('galeri_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'judul' => $post['judul'],
      'kategori' => $post['kategori'],
      'isi' => $post['isi'],
      'foto' => $post['foto'],
      'link' => $post['link'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('galeri', $params);
  }

  public function edit($post)
  {
    $params = [
      'judul' => $post['judul'],
      'kategori' => $post['kategori'],
      'isi' => $post['isi'],
      'link' => $post['link'],
      'updated_at' => date('Y-m-d H:i:s')
    ];
    if($post['foto'] != null) {
      $params['foto'] = $post['foto'];
    }
    $this->db->where('galeri_id', $post['galeri_id']);
    $this->db->update('galeri', $params);
  }

  function cek_judul($code, $id = null)
  {
    $this->db->from('galeri');
    $this->db->where('judul', $code);
    if($id != null){
      $this->db->where('galeri_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('galeri_id', $id);
    $this->db->delete('galeri');
	}

  // Frontend
  function galeri_foto(){
    $this->db->where('kategori','0');
    $this->db->order_by ('galeri_id', 'desc');
    return $this->db->get('galeri');
  }

  // Frontend
  function galeri_video(){
    $this->db->where('kategori','1');
    $this->db->order_by ('galeri_id', 'desc');
    return $this->db->get('galeri');
  }

}
