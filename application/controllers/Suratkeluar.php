<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'SuratPengantar.php';

class Suratkeluar extends CI_Controller {
	var $ttd_img;

	function __construct(){
		parent::__construct();
		$this->load->model('m_keluar');
		check_not_login();
		$this->load->library('form_validation');
		$this->load->helper('my_helper');
		$this->ttd_img = [
			'Camat' => '..\..\media\surat\ttd2.jpg',
			'Sekretaris Camat' => '..\..\media\surat\ttd3.jpg',
			'Admin' => '..\..\media\surat\ttd.jpg',
		];

	}

	public function index()
	{
		
		$data = [
			'row' => $this->m_keluar->get(),
			'title' => "Surat Keluar"
			
			
		];
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('suratkeluar/suratkeluar_data', $data);
		$this->load->view('template_admin/footer');
	
	}

	public function permintaan_surat_datatabel(){
		$list = $this->m_keluar->get_datatables(); 

        $data = array();
        $no = $_POST['start'];
		$type=$this->input->get('type');
		$count = $this->m_keluar->count_all();
		// $count = $count['jumlah_surat'];
        foreach ($list as $field) {			
			$jenis_surat = "'".$field->jenis_surat."'";
			$nama = "'".$field->nama."'";
			$nik = "'".$field->nik."'";
			$proses_surat = "'".$field->proses_surat."'";
			$JenisSurat = str_replace(' ', '_', $field->jenis_surat);			

            $no++; 
            $row = array();
            $row['no'] = $no;
            $row['id'] = $field->id;
            $row['NIK'] = $field->nik;
            $row['nama'] = $field->nama;
            $row['alamat'] = $field->alamat;
            $row['email'] = $field->email;
            $row['jenis_surat'] = $field->jenis_surat;
            $row['keterangan'] = $field->keterangan;
            $row['kk'] = $field->kk;
            $row['kode_surat'] = $field->kode_surat;
            $row['ktp'] = $field->ktp;
            $row['ktp_ortu'] = $field->ktp_ortu;
            $row['no_surat'] = $field->no_surat;
            $row['surat_keterangan_rs'] = $field->surat_keterangan_rs;
            $row['surat_nikah'] = $field->surat_nikah;
            $row['surat_rt_rw'] = $field->surat_rt_rw;
            $row['tanggal'] = tanggal_indo(date('Y-n-d', strtotime($field->tanggal))); 
            $row['akta_kelahiran'] = $field->akta_kelahiran;
            $row['ijazah'] = $field->ijazah;
			$row['aksi'] = array('id' => $field->id, 'jenis_surat' => $field->jenis_surat);
            $data[] = $row;
		}
	
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $data,
        );
        echo json_encode($output);
	}

	public function deleteSurat()
	{
		$id = $this->input->post('id');
		$jenis_surat = $this->input->post('jenis_surat');

		if ($jenis_surat == 'Surat Kematian') {
			if($this->db->delete('surat_kematian', ['id' => $id])){
				$pesan = 'berhasil';
			}

		}elseif ($jenis_surat == 'Surat Kelahiran') {
			if($this->db->delete('surat_kelahiran',  ['id' => $id])){
				$pesan = 'berhasil';
			}
		}elseif ($jenis_surat == 'Surat Nikah') {
			if($this->db->delete('surat_nikah',  ['id' => $id])){
				$pesan = 'berhasil';
			}
		}elseif ($jenis_surat == 'Surat Pindah Daerah') {
			if($this->db->delete('surat_pindah_domisili',  ['id' => $id])){
				$pesan = 'berhasil';
			}
		}elseif ($jenis_surat == 'Surat Keterangan Usaha') {
			if($this->db->delete('surat_sku',  ['id' => $id])){
				$pesan = 'berhasil';
			}
		}elseif ($jenis_surat == 'Surat Tugas') {
			if($this->db->delete('surat_tugas',  ['id' => $id])){
				$pesan = 'berhasil';
			}
		}elseif ($jenis_surat == 'Surat Undangan') {
			if($this->db->delete('surat_undangan',  ['id' => $id])){
				$pesan = 'berhasil';
			}
		}

		$output = array(
			'respon' => $pesan,
			'jenis_surat' => $jenis_surat

		);

		echo json_encode($output);
	}

	
	public function add(){
		$suratkeluar = new stdClass();
		$suratkeluar->no = null;
		$suratkeluar->no_surat = null;
		$suratkeluar->perihal = null;
		$suratkeluar->tgl_surat = null;
		$suratkeluar->NIK = null;
		
		$suratkeluar->nama = null;
		

		  $data = array(
		        'page' => 'add',
		        'row' => $suratkeluar,
		        'title' => "Surat Keluar"
		    );

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar');
		$this->load->view('suratkeluar/suratkeluar_form', $data);
		$this->load->view('template_admin/footer');
		
		}

	 public function edit($no){
	    $query = $this->m_keluar->get($no);
		   if($query->num_rows() > 0){
               $suratkeluar = $query->row();
               $data = array(
		        'page' => 'edit',
		        'row' => $suratkeluar,
		        'title' => "Surat Keluar"
		    );
          
        $this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('suratkeluar/suratkeluar_form', $data);
		$this->load->view('template_admin/footer',$data);
         
        }else{
        	echo "<script> alert('Data tidak ditemukan');</script>";
        	echo "<script>window.location='".site_url('suratkeluar')."';</script>";
        }

	}

	public function proses(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			
		  $config['upload_path'] ='./uploads/';
		  $config['allowed_types'] ='pdf|doc|jpg|png';
		  $config['max_size'] = 2000;
		  $config['file_name'] = 'laporan-'.date('ymd').'-'.substr(md5(rand()), 0,10);

		 $this->load->library('upload', $config);
    

		  if(@$_POST['lampiran'] ['name'] != null){
		  	if($this->upload->do_upload('lampiran')){
		  		$post['lampiran'] = $this->upload->data('file_name');
		  		$this->m_keluar->add($post);
		  		if($this->db->affected_rows() > 0) {
		  			$this->session->set_flashdata('success', 'Data berhasil di simpan');
		  		}
		  		redirect('suratkeluar');
		  	}else{
		  		$error = $this->upload->display_error();
		  		$this->session->set_flashdata('error', $error);
		  		redirect('suratkeluar/add');
		  	}
		  }else{
		  	$post['lampiran'] = null;
		  	$this->m_keluar->add($post);
		  	if($this->db->affected_rows() > 0) {
		  			$this->session->set_flashdata('success', 'Data berhasil di simpan');
		  		}
		  	redirect('suratkeluar');
		  } 

		 }else if (isset($_POST['edit'])) {
			$this->m_keluar->edit($post);

		}

		if($this->db->affected_rows() > 0){
			echo "<script> alert('Data berhasil disimpan');</script>";
		}
		    echo "<script>window.location='".site_url('suratkeluar')."';</script>";

    }
	


    public function del($no){
		
		$this->m_keluar->del($no);

		if($this->db->affected_rows() > 0){
			echo "<script> alert('Data berhasil dihapus');</script>";
		}
		    echo "<script>window.location='".site_url('suratkeluar')."';</script>";
	}

	public function download($no){
		
    $this->load->helper('download');
    $fileinfo = $this->m_keluar->download($no);
    $keluar = './assets/upload/'.$fileinfo['file_surat'];
    force_download($keluar, NULL);

	}

	public function cetak_pdf(){		
		$template_surat = null;

		$jenis_surat = $this->uri->segment(3);
		$id_surat = $this->uri->segment(4);

		$data_surat = null;
		if ($jenis_surat == 'Surat_Kelahiran') {
			$template_surat = "print/surat_kelahiran.php";
			$data_surat =  $this->db->select('*')->from('surat_kelahiran')->join('penduduk', 'penduduk.id=surat_kelahiran.id_penduduk')->where(['surat_kelahiran.id' => $id_surat])->get()->row_array();
			
		}elseif ($jenis_surat == 'Surat_Keterangan_Usaha') {
			$template_surat = "print/surat_sku.php";
			$data_surat =  $this->db->select('*')->from('surat_sku')->join('penduduk', 'penduduk.id=surat_sku.id_penduduk')->where(['surat_sku.id' => $id_surat])->get()->row_array();

			
		}elseif ($jenis_surat == 'Surat_Kematian') {
			$template_surat = "print/surat_kematian.php";
			$data_surat =  $this->db->select('*')->from('surat_kematian')->join('penduduk', 'penduduk.id=surat_kematian.id_penduduk')->where(['surat_kematian.id' => $id_surat])->get()->row_array();

		}elseif ($jenis_surat == 'Surat_Nikah') {
			$template_surat = "print/surat_nikah.php";
			$data_surat =  $this->db->select('*')->from('surat_nikah')->join('penduduk', 'penduduk.id=surat_nikah.id_penduduk')->where(['surat_nikah.id' => $id_surat])->get()->row_array();

		}elseif ($jenis_surat == 'Surat_Pindah_Daerah') {
			$template_surat = "print/surat_pindah_daerah.php";
			$data_surat =  $this->db->select('*')->from('surat_pindah_domisili')->join('penduduk', 'penduduk.id=surat_pindah_domisili.id_penduduk')->where(['surat_pindah_domisili.id' => $id_surat])->get()->row_array();

		}elseif ($jenis_surat == 'Surat_Undangan') {
			$data_surat = $this->db->get_where('surat_undangan',  ['id' => $id_surat])->row_array();			
			$template_surat = 'print\surat_undangan.php';
			$data =[
				'no_surat' => $data_surat['no_surat'],
				'nama_ttd' => $data_surat['nama_ttd'],
				'jabatan_ttd' => $data_surat['jabatan_ttd'],
				'jenis_surat' => $data_surat['jenis_surat'],
				'kontent' => $data_surat['kontent'],
				'tanggal' => $data_surat['tanggal'],
				'ttd_img' => $this->ttd_img[$data_surat['jabatan_ttd']],

			];			
		}elseif($jenis_surat == 'Surat_Tugas'){
			$data_surat = $this->db->get_where('surat_tugas',  ['id' => $id_surat])->row_array();
			$template_surat = 'print\surat_tugas.php';
			$data = [
				'jenis_surat' => $data_surat['jenis_surat'],
				'no_surat' => $data_surat['no_surat'],
				'id_perangkat_desa' => $data_surat['id_perangkat_desa'],
				'kontent' => $data_surat['kontent'],
				'nama_ttd' => $data_surat['nama_ttd'],
				'jabatan_ttd' => $data_surat['jabatan_ttd'],
				'tanggal' => $data_surat['tanggal'],
				'ttd_img' => $this->ttd_img[$data_surat['jabatan_ttd']],
				'perangkat_desa' => $this->db->get_where('perangkat_desa', ['id' => $data_surat['id_perangkat_desa'] ])->row_array()
			];
			
		}

		if ($jenis_surat != 'Surat_Undangan' && $jenis_surat != 'Surat_Tugas') {
			$month = explode("-",$data_surat['tanggal']);
			$dateObj   = DateTime::createFromFormat('!m', $month[1]);
			$monthName = $dateObj->format('F'); // March
			$str_month = $month[1] . ' ' . $monthName . ' ' . $month[0];
			$data_surat['tanggal'] = $str_month;
			$data = [
				"data_surat" =>$data_surat,
				"nama_ttd" => $data_surat['nama_ttd'],
				"jabatan_ttd" => $data_surat['jabatan_ttd']
			];
		}

		
		$this->load->view($template_surat, $data);
	}

}
?>