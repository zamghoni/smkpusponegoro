<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jurusan extends CI_model {

  public function get($id = null)
  {
    $this->db->from('jurusan');
    if ($id != null) {
      $this->db->where('jurusan_id',$id);
    }
    $this->db->order_by('jurusan_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'foto' => $post['foto'],
      'created' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('jurusan', $params);
  }

  public function edit($post)
  {
    $params = [
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'updated' => date('Y-m-d H:i:s')
    ];
    if($post['foto'] != null) {
      $params['foto'] = $post['foto'];
    }
    $this->db->where('jurusan_id', $post['jurusan_id']);
    $this->db->update('jurusan', $params);
  }

  function cek_judul($code, $id = null)
  {
    $this->db->from('jurusan');
    $this->db->where('judul', $code);
    if($id != null){
      $this->db->where('jurusan_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('jurusan_id', $id);
    $this->db->delete('jurusan');
	}

  // Frontend

	function jrs_detail($jurusan_id){
		$this->db->where('jurusan_id', $jurusan_id);
		return $this->db->get('jurusan');
	}

}
