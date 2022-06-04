<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_info extends CI_model {

  public function get($id = null)
  {
    $this->db->from('info');
    $this->db->join('kategori', 'kategori.kategori_id = info.id_kategori');
    if ($id != null) {
      $this->db->where('info_id',$id);
    }
    $this->db->order_by('info_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'id_kategori' => $post['id_kategori'],
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'foto' => $post['foto'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('info', $params);
  }

  public function edit($post)
  {
    $params = [
      'id_kategori' => $post['id_kategori'],
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'updated_at' => date('Y-m-d H:i:s')
    ];
    if($post['foto'] != null) {
      $params['foto'] = $post['foto'];
    }
    $this->db->where('info_id', $post['info_id']);
    $this->db->update('info', $params);
  }

  function cek_judul($code, $id = null)
  {
    $this->db->from('info');
    $this->db->where('judul', $code);
    if($id != null){
      $this->db->where('info_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('info_id', $id);
    $this->db->delete('info');
	}

  // Frontend
  function semua_berita(){
		$this->db->order_by('info_id', 'desc');
		return $this->db->get('info');
	}

  function berita(){
    $this->db->where('id_kategori','1');
    $this->db->order_by ('info_id', 'desc');
    return $this->db->get('info');
	}

  function kegiatan(){
    $this->db->where('id_kategori','2');
    $this->db->order_by ('info_id', 'desc');
    return $this->db->get('info');
	}

  function lingkungan(){
    $this->db->where('id_kategori','3');
    $this->db->order_by ('info_id', 'desc');
    return $this->db->get('info');
	}

  function detail($info_id){
		$this->db->where('info_id', $info_id);
		return $this->db->get('info');
	}

  function new_info(){
		$this->db->limit(5);
		$this->db->order_by('info_id', 'desc');
		return $this->db->get('info');
	}
  //Paging
	public function GetDataPaging($limit,$start){
		$this->db->order_by ('info_id', 'desc');
		return $this->db->get('info', $limit, $start);
	}

	public function GetCount(){
		return $this->db->count_all('info');
	}

}
