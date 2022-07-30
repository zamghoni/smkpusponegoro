<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_model {

  public function get($id = null)
  {
    $this->db->from('pembayaran');
    $this->db->join('user', 'user.id = pembayaran.id_user');
    if ($id != null) {
      $this->db->or_where('pembayaran_id',$id);
    }
    $this->db->order_by('pembayaran_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'id_user' => $post['id_user'],
      'no_rek' => $post['no_rek'],
      'atas_nama' => $post['atas_nama'],
      'jumlah' => $post['jumlah'],
      'foto' => $post['foto'],
      'created' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('pembayaran', $params);
  }

  public function edit($post)
  {
    $params = [
      'id_user' => $post['id_user'],
      'no_rek' => $post['no_rek'],
      'atas_nama' => $post['atas_nama'],
      'jumlah' => $post['jumlah'],
      'updated' => date('Y-m-d H:i:s')
    ];
    if($post['foto'] != null) {
      $params['foto'] = $post['foto'];
    }
    $this->db->where('pembayaran_id', $post['pembayaran_id']);
    $this->db->update('pembayaran', $params);
  }

  function cek_user_id($code, $id = null)
  {
    $this->db->from('pembayaran');
    $this->db->where('id_user', $code);
    if($id != null){
      $this->db->where('pembayaran_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('pembayaran_id', $id);
    $this->db->delete('pembayaran');
	}

  public function data_siswa($id)
  {
    $this->db->from('pembayaran');
    $this->db->join('pendaftar', 'pendaftar.user_id = pembayaran.id_user');
    $this->db->join('user', 'user.id = pembayaran.id_user');
    if ($id != null) {
      $this->db->or_where('pembayaran_id',$id);
    }
    $this->db->order_by('pembayaran_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

}
