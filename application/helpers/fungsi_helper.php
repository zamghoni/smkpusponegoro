<?php

function sudah_login()
{
  $ci =& get_instance();
  $user_session = $ci->session->userdata('username');
  if($user_session){
    redirect('dashboard');
  }
}

function belum_login()
{
  $ci =& get_instance();
  $user_session = $ci->session->userdata('username');
  if(!$user_session){
    redirect('auth/login');
  }
}

function cek_admin()
{
  $ci =& get_instance();
  $ci->load->library('fungsi');
  if ($ci->fungsi->user_login()->role != 1) {
    redirect('dashboard/pendaftar');
  }
}

function cek_bayar()
{
  $ci =& get_instance();
  $ci->load->library('fungsi');
  if ($ci->fungsi->user_login()->status != 1) {
    redirect('dashboard/pendaftar');
  }
}

//-->Paging2
function Paging2($per_page,$GetCount){
$ci =& get_instance();
$ci->load->library('pagination');
$config['base_url'] 		= site_url($ci->uri->segment(1).'/semua_berita');
$config['total_rows'] 	= $GetCount;
$config['per_page'] 		= $per_page;
$config['uri_segment'] 	= 3;
$config['num_links'] 		= 3;
//Membuat Style
$config['first_link']      	= 'First';
$config['last_link']        = 'Last';
$config['next_link']        = '<li class="page-item">
		                                <p class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
		                                </p>
		                            </li>';
$config['prev_link']        = '<li class="page-item">
		                                <p class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
		                                </p>
		                            </li>';
$config['full_tag_open']    = '<nav class="blog-pagination justify-content-center d-flex"><ul class="pagination">';
$config['full_tag_close']   = '</ul></nav>';
// no1
$config['num_tag_open']     = '<li class="page-item"><p class="page-link">';
$config['num_tag_close']    = '</p></li>';
// no aktif
$config['cur_tag_open']     = '<li class="page-item active"><p class="page-link">';
$config['cur_tag_close']    = '</p></li>';

$config['next_tag_open']    = '<li>';
$config['next_tagl_close']  = '</li>';
//no sebelum
$config['prev_tag_open']    = '<li>';
$config['prev_tagl_close']  = '</li>';


$ci->pagination->initialize($config);
return $ci->pagination->create_links();
}
//-->end_Paging
?>
