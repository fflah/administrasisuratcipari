<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LaporanKeluar extends CI_Controller {
	var $ttd_img;

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('m_laporankeluar');
		$this->ttd_img = [
			'Kepala Desa' => 'media\surat\ttd2.jpg',
			'Sekretaris Desa' => 'media\surat\ttd3.jpg',
			'Admin' => 'media\surat\ttd.jpg',
		];
	}

	public function index()
	{
	  $data['title'] = "Laporan Keluar";
      $this->load->view('template_admin/header', $data);
	  $this->load->view('template_admin/sidebar');
      $this->load->view('laporanKeluar/laporanKeluar', $data);
      $this->load->view('template_admin/footer');
	}

	public function data_surat_keluar()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');		
		$list = $this->m_laporankeluar->filterbybulan($bulan,$tahun);				
		$no = 0;		
        foreach ($list as $field) {						
            $no++; 
            $row = array();
            $row['no'] = $no;
            $row['no_surat'] = $field->no_surat;            
            $row['tanggal'] = $field->tanggal;            
            $row['jenis_surat'] = $field->jenis_surat;
            $data[] = $row;
		}	
        echo json_encode($data);
	}


	function print(){
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');		
		$data['datafilter'] = $this->m_laporankeluar->filterbybulan($bulan,$tahun);
		$data['ttd_img'] = $this->ttd_img['Admin'];
		$this->load->view('LaporanKeluar/v_Laporan', $data);
	}
}

