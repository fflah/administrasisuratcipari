<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkat_desa extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_perangkat_desa');
		check_not_login();
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data = [
			'row' => $this->m_perangkat_desa->get(),
			'title' => "Setting"
			
		];

		$data['row'] = $this->m_perangkat_desa->get();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('perangkat_desa/user_data', $data);
		$this->load->view('template_admin/footer', $data);
	
	}

	public function add(){
			$data = [
			'row' => $this->m_perangkat_desa->get(),
			'title' => "Setting"
			
		];


		$this->form_validation->set_rules('nama', 'Nama', 'required');
	    $this->form_validation->set_rules('nik', 'Nik', 'required');
	    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required' , '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');




		if ($this->form_validation->run() == FALSE){

        $this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('perangkat_desa/user_form_add', $data);
		$this->load->view('template_admin/footer', $data);

		}else {
			$post = $this->input->post(null, TRUE);
			$this->m_perangkat_desa->add($post);
			if($this->db->affected_rows() > 0 ){
				echo "<script> alert('Data berhasil disimpan');</script>";
			}
			   echo "<script>window.location='".site_url('perangkat_desa')."';</script>";
		}

	}


    public function edit($id){
    		$data = [
			'row' => $this->m_perangkat_desa->get(),
			'title' => "Setting"
			
		];

		$this->form_validation->set_rules('nama', 'Nama', 'required');
	    $this->form_validation->set_rules('nik', 'Nik', 'required');
	    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required' , '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
            $query = $this->m_perangkat_desa->get($id);
            if($query->num_rows() > 0){
                $data['row'] = $query->row();
                $this->load->view('template_admin/header', $data);
                $this->load->view('template_admin/sidebar');
                $this->load->view('perangkat_desa/user_form_edit', $data);
                $this->load->view('template_admin/footer', $data);
            }else{
                echo "<script> alert('Data tidak ditemukan');</script>";
                echo "<script>window.location='".site_url('perangkat_desa')."';</script>";
            }
        }else {

            $post = $this->input->post(null, TRUE);
            $this->m_perangkat_desa->edit($post);
            if($this->db->affected_rows() > 0 ){
                echo "<script> alert('Data berhasil disimpan');</script>";
            }
                echo "<script>window.location='".site_url('perangkat_desa')."';</script>";
        }
		}        

	public function hapusdata(){

        $id = $this->input->post("id");
        $where = array('id' => $id);
        $this->m_perangkat_desa->deleteData('perangkat_desa', $where); 
        redirect ('perangkat_desa');    
    }     

	

	}
?>