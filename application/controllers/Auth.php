<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $folder  = "backend/";
	private $redirect  = "backend/dashboard/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_user', 'M_pendaftar']);
		$this->load->helper(['form']);
		$this->load->library(['form_validation']);
  }

	public function login()
	{
		sudah_login();
		$this->load->view($this->folder.'login');

	}

	public function register()
	{
		$user = new stdClass();
		$user->id = null;
		$user->username = null;
    $user->email = null;
    $user->password = null;
    $user->role = null;
		$user->status = null;
		$data = array(
			'page' => 'add',
			'row' => $user
		);
		if ($this->form_validation->run() == FALSE){
		$this->load->view($this->folder.'register',$data);
			}
		}

	public function process_register()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if($this->M_user->cek_username($post['username'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Username $post[username] sudah dipakai user lain, silahkan ganti dengan yang berbeda");
				redirect('auth/register');
			} else {
				//start kirim email
				$config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://mail.smkwahasta.site',
               'smtp_user' => 'panitiappdb@smkwahasta.site',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'smkwahasta01',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];
				$this->load->library('email',$config);

				$this->email->from('panitiappdb@smkwahasta.site', 'PPDB Online');
				$this->email->to($post['email']);

				$this->email->subject('Registrasi Berhasil ! | PPDB Online SMK NU Wahid Hasyim Talang');
				$this->email->message("Hai kamu berhasil registrasi akun PPDB Online SMK NU Wahid Hasyim Talang<br>
				dengan username dan password dibawah ini : <br><br>
				<strong>Username : </strong> ".$post['username']."<br>
				<strong>Password : </strong> ".$post['password']."<br><br>
				Harap jaga kerahasiaan akun anda. <br>
				Terimakasih");

				$this->email->send();
				//end kirim email
			$this->M_user->add_create($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dibuat, Silahkan Login');
		}
		redirect('auth/login');
			}
		}

	public function process($value='')
	{
			$post= $this->input->post(null, TRUE);
			if (isset($post['login'])) {
				$this->load->model('M_user');
				$query = $this->M_user->login($post);
				if ($query->num_rows()>0) {
					$row = $query -> row();
					$params = array(
						'id' => $row->id,
						'username' => $row->username,
						'email' => $row->email,
						'role' => $row->role,
					 );
					 $this->session->set_userdata($params);
					 $this->session->set_flashdata('success','Selamat Datang...<b> '. $this->session->userdata('username') .'</b> pada halaman Administrator, salam semangat dan sukses selalu');
					 if ($this->fungsi->user_login()->role != 1 ) {
						 $this->session->set_flashdata('success','Selamat Datang...<b> '. $this->session->userdata('username') .'</b> pada halaman Beranda, salam semangat dan sukses selalu');
						 redirect('dashboard/pendaftar','refresh');
					 }
					 else{
						 redirect('dashboard','refresh');
					 }
				 	} else {
					$this->session->set_flashdata('error','<center>Login gagal, <br> Username / Password salah</center>');
					redirect('auth/login');
				}
			}
	}

	public function logout()
	{
		$params = array ('username','role');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
