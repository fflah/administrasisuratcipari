<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LaporanMasuk extends CI_Controller {
	var $ttd_img;

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('m_laporanmasuk');
		$this->ttd_img = [
			'Camat' => 'media\surat\ttd2.jpg',
			'Sekretaris Camat' => 'media\surat\ttd3.jpg',
			'Admin' => 'media\surat\ttd.jpg',
		];
	}

	public function index()
	{
	  $data['title'] = "Laporan Masuk";
      $this->load->view('template_admin/header', $data);
	  $this->load->view('template_admin/sidebar');
      $this->load->view('laporanMasuk/laporanMasuk', $data);
      $this->load->view('template_admin/footer');
        
	}

	public function data_surat_masuk()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');		
		$list = $this->m_laporanmasuk->filterbybulan($bulan,$tahun);			
		$no = 0;		
        foreach ($list as $field) {						
            $no++; 
            $row = array();
            $row['no'] = $no;
            $row['no_surat'] = $field->no_surat;            
            $row['tanggal'] = $field->tgl_surat;            
            $row['keterangan'] = $field->keterangan;
            $data[] = $row;
		}	
        echo json_encode($data);
	}

	function print(){
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data['datafilter'] = $this->m_laporanmasuk->filterbybulan($bulan,$tahun);
		$data['ttd_img'] = $this->ttd_img['Admin'];
		$this->load->view('LaporanMasuk/v_Laporan', $data);

	}




}

