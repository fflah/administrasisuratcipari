<?php


Class Fungsi {

	protected $ci;

	function __construct(){
	$this->ci =& get_instance();
	}

	function user_login(){
	 $this->ci->load->model('m_user');
	 $id = $this->ci->session->userdata('id');
	 $user_data = $this->ci->m_user->get($id)->row();
	 return $user_data;
}

  
}
