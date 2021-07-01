<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LayananSurat extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('m_suratpengantar');
		$this->load->library('form_validation');
	



	}

	public function index()
	{   

		//$data['ambil_data']= $this->m_suratpengantar->get();

		
		$this->load->view('template_user/header');
	    $this->load->view('template_user/topbar');
	    $this->load->view('user penduduk/layanan');
		$this->load->view('template_user/footer');
		
		
	}
	

	public function pindahdomisili()
	{   

		//$data['ambil_data']= $this->m_suratpengantar->get();

		
		$this->load->view('template_user/header');
	    $this->load->view('template_user/topbar');
	    $this->load->view('user penduduk/layanan_pindahdomisili');
		$this->load->view('template_user/footer');
		
		
	}

	public function nikah()
	{   

		//$data['ambil_data']= $this->m_suratpengantar->get();

		
		$this->load->view('template_user/header');
	    $this->load->view('template_user/topbar');
	    $this->load->view('user penduduk/layanan_nikah');
		$this->load->view('template_user/footer');
		
		
	}

	public function kematian()
	{   

		//$data['ambil_data']= $this->m_suratpengantar->get();

		
		$this->load->view('template_user/header');
	    $this->load->view('template_user/topbar');
	    $this->load->view('user penduduk/layanan_kematian');
		$this->load->view('template_user/footer');
		
		
	}

	public function kelahiran()
	{   

		//$data['ambil_data']= $this->m_suratpengantar->get();

		
		$this->load->view('template_user/header');
	    $this->load->view('template_user/topbar');
	    $this->load->view('user penduduk/layanan_kelahiran');
		$this->load->view('template_user/footer');
		
		
	}

	public function sku()
	{   

		//$data['ambil_data']= $this->m_suratpengantar->get();

		
		$this->load->view('template_user/header');
	    $this->load->view('template_user/topbar');
	    $this->load->view('user penduduk/layanan_keteranganusaha');
		$this->load->view('template_user/footer');
		
		
	}

	public function cek_nik()
	{
		$nik = $this->input->post('nik');
		$data_warga = null;
		if ($nik) {	
			$data_warga = $this->db->get_where('penduduk' ,['NIK' => $nik])->row_array();
		}		

		echo json_encode($data_warga);

	}
}
?>
