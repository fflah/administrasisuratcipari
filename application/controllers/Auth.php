<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		
		$this->load->view('formLogin');
	}

	public function process(){

		$post = $this->input->post(null,TRUE);
		if(isset($post['auth'])){
			$this->load->model('m_user');
			$user = $post['username'];
			$pw = sha1($post['password']);
			$query = $this->m_user->login($user,$pw);

			if($query->num_rows() > 0){
				$row = $query->row();
				$params =array(
				     'id' => $row->id

				 );
				$this->session->set_userdata($params);
				echo "<script> alert('Selamat, login berhasil'); window.location='".site_url('dashboard')."'; </script>";
			} else {
				echo "<script> alert('Login gagal'); window.location='".site_url('auth')."'; </script>";
			}
		}

	}		public function logout(){
				$params = array('id');
				$this->session->unset_userdata($params);
				redirect('auth');
			}

		
	
}