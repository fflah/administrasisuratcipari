<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_masuk');
		$this->load->helper(array('url','download'));  
		check_not_login();
		$this->load->library('form_validation');


	}

	public function index()
	{   

	$data = [
			'row' => $this->m_masuk->get(),
			'title' => "Surat Masuk",
			
			
		];		

		$data['row'] = $this->m_masuk->get();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('suratmasuk/suratmasuk_data', $data);
		$this->load->view('template_admin/footer', $data);
	}
    public function add(){
		$suratmasuk = new stdClass();
		$suratmasuk->no = null;
		$suratmasuk->no_surat = null;
		$suratmasuk->pengirim = null;
		$suratmasuk->tgl_surat = null;
		$suratmasuk->tgl_terima = null;
		$suratmasuk->keterangan = null;
		$suratmasuk->file_surat = null;

		  $data = array(
		        'page' => 'add',
		        'row' => $suratmasuk,
		        'title' => "Surat Masuk"
		    );

		    
			$this->load->view('template_admin/header', $data);
	        $this->load->view('template_admin/sidebar');
            $this->load->view('suratmasuk/suratmasuk_form', $data);
            $this->load->view('template_admin/footer',$data);
		
		}



	public function edit($no){
	    $query = $this->m_masuk->get($no);
		   if($query->num_rows() > 0){
               $suratmasuk = $query->row();
               $data = array(
		        'page' => 'edit',
		        'row' => $suratmasuk,
		        'title' => "Surat Masuk"
		    );

          $this->load->view('template_admin/header',$data);
	      $this->load->view('template_admin/sidebar');
          $this->load->view('suratmasuk/suratmasuk_form', $data);
          $this->load->view('template_admin/footer',$data);
          
        }else{
        	echo "<script> alert('Data tidak ditemukan');</script>";
        	echo "<script>window.location='".site_url('suratmasuk')."';</script>";
        }

	}
	
	public function proses2(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			
		  $config['upload_path'] ='assets/upload/';
		  $config['allowed_types'] ='pdf|doc|jpg|png';
		  $config['max_size'] = 2000;
		  $config['file_name'] = 'laporan-'.date('ymd').'-'.substr(md5(rand()), 0,10);

		 $this->load->library('upload', $config);
    

		  if(@$_POST['lampiran'] ['name'] != null){
		  	if($this->upload->do_upload('lampiran')){
		  		$post['lampiran'] = $this->upload->data('file_name');
		  		$this->m_masuk->add($post);
		  		if($this->db->affected_rows() > 0) {
		  			$this->session->set_flashdata('success', 'Data berhasil di simpan');
		  		}
		  		redirect('suratmasuk');
		  	}else{
		  		$error = $this->upload->display_error();
		  		$this->session->set_flashdata('error', $error);
		  		redirect('suratmasuk/add');
		  	}
		  }else{
		  	$post['lampiran'] = null;
		  	$this->m_masuk->add($post);
		  	if($this->db->affected_rows() > 0) {
		  			$this->session->set_flashdata('success', 'Data berhasil di simpan');
		  		}
		  	redirect('suratmasuk');
		  } 

		 }else if (isset($_POST['edit'])) {
			$this->m_masuk->edit($post);

		}

		if($this->db->affected_rows() > 0){
			echo "<script> alert('Data berhasil disimpan');</script>";
		}
		    echo "<script>window.location='".site_url('suratmasuk')."';</script>";

    }
 

    public function hapusdata()
    {
        $id = $this->input->post("no");
        $where = array('no' => $id);
        $this->m_masuk->deleteData('tb_masuk', $where); 
        if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
        redirect ('suratmasuk');    
    }

	public function download($no){
		
    $this->load->helper('download');
    $fileinfo = $this->m_masuk->download($no);
    $masuk = './assets/upload/'.$fileinfo['file_surat'];
    force_download($masuk, NULL);
	}

	 public function openfile($file_surat)
    {
        // Lokasi file
        $filename = "./assets/upload/" . $file_surat;

        if (file_exists($filename)) {
            // check jika ekstensi file (pdf/docx/image) maka
            $ext = pathinfo($file_surat, PATHINFO_EXTENSION);

            if ($ext == 'pdf') {
                header('Content-type: application/pdf');
                header('Content-Disposition: inline; filename"' . $filename . '"');
                header('Content-Transfer-Encoding: binary');
                header('Accept-Ranges: bytes');
                @readfile($filename);
            } elseif ($ext == 'png' || 'jpg' || 'jpeg') {
                header('Content-type: image/png');
                echo file_get_contents($filename);
            }
        } else {
            echo 'file tidak ditemukan, <a href="' . base_url('suratmasuk') . '"> kembali </a>';
        }
    }
	
	
	
}

?>