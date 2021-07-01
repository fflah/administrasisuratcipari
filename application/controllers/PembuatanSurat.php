<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'SuratPengantar.php';

class PembuatanSurat extends CI_Controller {	
	var $ttd_img;

	function __construct(){
		parent::__construct();
		$this->load->model('m_keluar');
		check_not_login();
		$this->load->library('form_validation');
		$this->load->helper('my_helper');
		$this->load->library('form_validation');

		$this->ttd_img = [
			'Camat' => 'media\surat\ttd2.jpg',
			'Sekretaris Camat' => 'media\surat\ttd3.jpg',
			'Admin' => 'media\surat\ttd.jpg',
		];

	}

	public function surat_internal()
	{
		$data = [
			'row' => $this->m_keluar->get(),
			'title' => "Surat Internal",
			'data_surat' => $this->m_keluar->get_surat_internal()
		];

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('pembuatan_surat/surat_internal/index', $data);
		$this->load->view('template_admin/footer');
	
	}

	public function surat_internal_add()
	{
		$data = [
			'row' => $this->m_keluar->get(),
			'title' => "Surat Undangan"
		];
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('pembuatan_surat/surat_internal/surat_internal_add', $data);
		$this->load->view('template_admin/footer');

	} 

	public function surat_undangan()
	{

		if ($this->input->server('REQUEST_METHOD') == 'POST'){

			$ttd = explode("%",$this->input->post('ttd'));
			$nama_ttd = $ttd[0];
			$jabatan_ttd = $ttd[1];

			$data =[
				'no_surat' => $this->input->post('no_surat'),
				'nama_ttd' => $nama_ttd,
				'jabatan_ttd' => $jabatan_ttd,
				'jenis_surat' => $this->input->post('jenis_surat'),
				'kepada' => $this->input->post('kepada'),
				'kontent' => $this->input->post('kontent'),

			];
			$this->form_validation->set_rules('no_surat', 'No_surat', 'required|is_unique[surat_undangan.no_surat]');
			if ($this->form_validation->run() == true){
				if($this->db->insert('surat_undangan', $data)){
					$data['ttd_img'] = $this->ttd_img[$jabatan_ttd];
					$data['tanggal_surat'] = $this->input->post('tanggal_surat');
					$this->load->view('print/surat_undangan.php', $data);
				}

			}

		}else{
									
			$data = [
				'row' => $this->m_keluar->get(),
				'title' => "Surat Undangan",
				'no_surat' => no_surat_internal('undangan')
			];
			
			$this->load->view('template_admin/header', $data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('pembuatan_surat/surat_internal/s_undangan', $data);
			$this->load->view('template_admin/footer');
		}
		

	}

	public function surat_tugas()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$ttd = explode("%",$this->input->post('ttd'));
			$nama_ttd = $ttd[0];
			$jabatan_ttd = $ttd[1];

			
			$data = [
				'jenis_surat' => $this->input->post('jenis_surat'),
				'no_surat' => $this->input->post('no_surat'),
				'id_perangkat_desa' => $this->input->post('id_perangkat_desa'),
				'kontent' => $this->input->post('kontent'),
				'tanggal_surat' => $this->input->post('tanggal_surat'),
				'nama_ttd' => $nama_ttd,
				'jabatan_ttd' => $jabatan_ttd,
			];
		

			$this->form_validation->set_rules('no_surat', 'No_surat', 'required|is_unique[surat_tugas.no_surat]');
			if ($this->form_validation->run() == true){				
				if($this->db->insert('surat_tugas', $data)){
					$data['perangkat_desa'] = $this->db->get_where('perangkat_desa', ['id' => $this->input->post('id_perangkat_desa') ])->row_array();
					$data['ttd_img'] = $this->ttd_img[$jabatan_ttd];
					$data['tanggal_surat'] = $this->input->post('tanggal_surat');

					$this->load->view('print/surat_tugas.php', $data);
				}
			}

			
		}else {			
			$data = [
				'row' => $this->m_keluar->get(),
				'title' => "Surat Tugas",
				'data_perangkat_desa' => $this->db->get('perangkat_desa')->result(),
				'no_surat' => no_surat_internal('tugas')
			];
	
	
			$this->load->view('template_admin/header', $data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('pembuatan_surat/surat_internal/s_tugas', $data);
			$this->load->view('template_admin/footer');
		}

	}

	public function cetak()
	{
		$id_surat = $this->uri->segment(3);
		$jenis_surat = $this->uri->segment(4);

		$data_surat = null;
		$template = null;
		$data = null;

		if ($jenis_surat == 'Surat_Undangan') {
			$data_surat = $this->db->get_where('surat_undangan',  ['id' => $id_surat])->row_array();			
			$template = 'print\surat_undangan.php';
			$data =[
				'no_surat' => $data_surat['no_surat'],
				'nama_ttd' => $data_surat['nama_ttd'],
				'jabatan_ttd' => $data_surat['jabatan_ttd'],
				'jenis_surat' => $data_surat['jenis_surat'],
				'kontent' => $data_surat['kontent'],
				'tanggal' => $data_surat['tanggal']

			];
		}else {
			$data_surat = $this->db->get_where('surat_tugas',  ['id' => $id_surat])->row_array();
			$template = 'print\surat_tugas.php';
			$data = [
				'jenis_surat' => $data_surat['jenis_surat'],
				'no_surat' => $data_surat['no_surat'],
				'id_perangkat_desa' => $data_surat['id_perangkat_desa'],
				'kontent' => $data_surat['kontent'],
				'nama_ttd' => $data_surat['nama_ttd'],
				'jabatan_ttd' => $data_surat['jabatan_ttd'],
				'tanggal' => $data_surat['tanggal'],
				'perangkat_desa' => $this->db->get_where('perangkat_desa', ['id' => $data_surat['id_perangkat_desa'] ])->row_array()
			];
			
		}

		if ($data_surat != null) {
			$this->load->view($template, $data);
		}else {
			redirect('pembuatanSurat/surat_internal');
		}

	}

	public function del()
	{
		$id_surat = $this->uri->segment(3);
		$jenis_surat = $this->uri->segment(4);

		

		if ($jenis_surat == 'Surat_Undangan') {
			if($this->db->delete('surat_undangan',  ['id' => $id_surat])){
				echo "<script> alert('Data berhasil dihapus');</script>";
				echo "<script>window.location='".site_url('pembuatanSurat/surat_internal')."';</script>";
			} else {
				echo "<script> alert('Data tidak ditemukan');</script>";
				echo "<script>window.location='".site_url('pembuatanSurat/surat_internal')."';</script>";
			}
		}else {
			if ($this->db->delete('surat_tugas',  ['id' => $id_surat])){
				echo "<script> alert('Data berhasil dihapus');</script>";
				echo "<script>window.location='".site_url('pembuatanSurat/surat_internal')."';</script>";
			}
			echo "<script> alert('Data tidak ditemukan');</script>";
        	echo "<script>window.location='".site_url('pembuatanSurat/surat_internal')."';</script>";
			
		}
		

	}

}
?>