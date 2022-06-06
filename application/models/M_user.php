<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_model {

  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username',$post['username']);
    $this->db->where('password',md5($post['password']));
    $query = $this->db->get();
    return $query;
  }

  public function get($id = null)
  {
    $this->db->from('user');
    if ($id != null) {
      $this->db->where('id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'username' => $post['username'],
      'email' => $post['email'],
      'password' => md5($post['password']),
      'role' => $post['role'],
      // 'status' => $post['status'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('user', $params);
  }

  public function add_create($post)
  {
    $params = [
      'username' => $post['username'],
      'email' => $post['email'],
      'password' => md5($post['password']),
      'role' => 0,
      'status' => 0,
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('user', $params);
  }


  public function edit($post)
  {
    $params = [
      'email' => $post['email'],
      'role' => $post['role'],
      // 'status' => $post['status'],
      'updated_at' => date('Y-m-d H:i:s')
    ];
    if (!empty($post['username'])) {
      $params['username'] = $post['username'];
    }
    if (!empty($post['password'] && $post['konf_password'])) {
      $params['password'] = md5($post['password']);
    }
    $this->db->where('id', $post['id']);
    $this->db->update('user', $params);
  }

  function cek_username($code, $id = null)
  {
    $this->db->from('user');
    $this->db->where('username', $code);
    if($id != null){
      $this->db->where('id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('id_user', $id);
    $this->db->delete('pembayaran');
    $this->db->where('user_id', $id);
    $this->db->delete('pendaftar');
    $this->db->where('id', $id);
    $this->db->delete('user');
  }

  public function lunas($id)
  {
    $params = [
      'status' => '1',
      'updated_at' => date('Y-m-d H:i:s')
    ];
    $this->db->where('id', $id);
    $this->db->update('user', $params);
  }

  public function cek($id)
  {
    $params = [
      'status' => '0',
      'updated_at' => date('Y-m-d H:i:s')
    ];
    $this->db->where('id', $id);
    $this->db->update('user', $params);
  }

}
