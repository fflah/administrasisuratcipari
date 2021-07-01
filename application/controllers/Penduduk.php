<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('m_penduduk');
		$this->load->library('form_validation');

	}

	public function index()
	{
		
		$data = [
			'row' => $this->m_penduduk->get(),
			'title' => "Penduduk"
			
		];

		$data['row'] = $this->m_penduduk->get();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('penduduk/penduduk_data', $data);
		$this->load->view('template_admin/footer', $data);

	}

	public function user_datatabel(){
		$list = $this->m_penduduk->get_datatables(); 

        $data = array();
        $no = $_POST['start'];
		$type=$this->input->get('type');
        foreach ($list as $field) {			
            $no++; 
            $row = array();
            $row['no'] = $no;
            $row['NIK'] = $field->NIK;
            $row['nama'] = $field->nama;
            $row['jk'] = $field->jk;
            $row['tempat_tgl_lahir'] = $field->tempat_tgl_lahir;
            $row['agama'] = $field->agama;
            $row['status'] = $field->status;
            $row['pekerjaan'] = $field->pekerjaan;
            $row['alamat'] = $field->alamat;
			$row['aksi'] = '<a href="penduduk/edit/'.$field->id.'" class="btn btn-primary btn-xs" ><i class="fas fa-pencil-alt"></i> Update</a> &nbsp; <a href="penduduk/del/'.$field->id.'" class="btn btn-danger btn-xs" onclick="konfirmasi()" ><i class="fa fa-trash"> </i> Delete</a>';
            $data[] = $row;
		}
		
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_penduduk->count_all(),
            "recordsFiltered" => $this->m_penduduk->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
	}

	public function add(){
		$penduduk = new stdClass();
		$penduduk->id = null;
		$penduduk->nama = null;
		$penduduk->NIK = null;
		$penduduk->jk = null;
		$penduduk->tempat_tgl_lahir = null;
		$penduduk->agama = null;
		$penduduk->status = null;
		$penduduk->pekerjaan = null;
		$penduduk->alamat = null;
		$penduduk->email = null;
		$penduduk->wa = null;
		

		  
		  $data = array(
		        'page' => 'add',
		        'row' => $penduduk,
		        'title' => "penduduk"
		    );

		    
			$this->load->view('template_admin/header', $data);
	        $this->load->view('template_admin/sidebar');
            $this->load->view('penduduk/penduduk_form', $data);
            $this->load->view('template_admin/footer',$data);
    }

	public function edit($id){
	    $query = $this->m_penduduk->get($id);
		   if($query->num_rows() > 0){
               $penduduk = $query->row();
                $data = array(
		        'page' => 'edit',
		        'row' => $penduduk,
		        'title' => "penduduk"
		    );

          $this->load->view('template_admin/header',$data);
	      $this->load->view('template_admin/sidebar');
          $this->load->view('penduduk/penduduk_form', $data);
          $this->load->view('template_admin/footer',$data);
          
        }else{
        	echo "<script> alert('Data tidak ditemukan');</script>";
        	echo "<script>window.location='".site_url('penduduk')."';</script>";
        }

	}



	public function proses(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->m_penduduk->add($post);
		 }else if (isset($_POST['edit'])) {
			$this->m_penduduk->edit($post);
		}

		
		if($this->db->affected_rows() > 0){
			echo "<script> alert('Data berhasil disimpan');</script>";
		}
		    echo "<script>window.location='".site_url('penduduk')."';</script>";

    }
 

    public function del($id){
		
		$this->m_penduduk->del($id);

		if($this->db->affected_rows() > 0){
			echo "<script> alert('Data berhasil dihapus');</script>";
		}
		    echo "<script>window.location='".site_url('penduduk')."';</script>";
	}
		



		
	
}
?>