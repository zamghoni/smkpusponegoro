<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

	function info(){
		$this->db->limit(4);
		$this->db->order_by('info_id', 'desc');
		return $this->db->get('info');
	}

	function galeri_foto(){
		$this->db->limit(6);
    $this->db->where('kategori','0');
		$this->db->order_by('galeri_id', 'desc');
		return $this->db->get('galeri');
	}

  function galeri_video(){
		$this->db->limit(2);
    $this->db->where('kategori','1');
		$this->db->order_by('galeri_id', 'desc');
		return $this->db->get('galeri');
	}

	function ppdb(){
		$id_ppdb = array('6','7');
    $this->db->where_in('profil_id', $id_ppdb);
		$this->db->order_by('profil_id', 'asc');
		return $this->db->get('profil');
	}

	function gelombang(){
		$this->db->limit(3);
		$this->db->order_by('gelombang_id', 'asc');
		return $this->db->get('gelombang');
	}

	function jurusan(){
		$this->db->order_by('jurusan_id', 'asc');
		return $this->db->get('jurusan');
	}

	function pengumuman(){
		$this->db->limit(1);
		$this->db->where('status','0');
		$this->db->order_by('pengumuman_id', 'dsc');
		return $this->db->get('pengumuman');
	}

}
?>
