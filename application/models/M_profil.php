<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_model {

  public function get($id = null)
  {
    $this->db->from('profil');
    if ($id != null) {
      $this->db->where('profil_id',$id);
    }
    $this->db->order_by('profil_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'foto' => $post['foto'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('profil', $params);
  }

  public function edit($post)
  {
    $params = [
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'updated_at' => date('Y-m-d H:i:s')
    ];
    if($post['foto'] != null) {
      $params['foto'] = $post['foto'];
    }
    $this->db->where('profil_id', $post['profil_id']);
    $this->db->update('profil', $params);
  }

  function cek_judul($code, $id = null)
  {
    $this->db->from('profil');
    $this->db->where('judul', $code);
    if($id != null){
      $this->db->where('profil_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('profil_id', $id);
    $this->db->delete('profil');
	}

  // Frontend
  function sejarah($info_id){
    $this->db->where('profil_id', '3');
    return $this->db->get('profil');
  }

  function visi_misi($info_id){
    $this->db->where('profil_id', '4');
    return $this->db->get('profil');
  }

  function struktur($info_id){
    $this->db->where('profil_id', '5');
    return $this->db->get('profil');
  }

}
