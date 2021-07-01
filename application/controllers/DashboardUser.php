<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboarduser extends CI_Controller {

	public function index()
	{   
		$this->load->view('template_user/header');
		$this->load->view('template_user/topbar');
		$this->load->view('user penduduk/dashboard');
		$this->load->view('template_user/footer');
		
		
	}
}