<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_user');
		check_not_login();
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data = [
			'row' => $this->m_user->get(),
			'title' => "Setting"
			
		];

		$data['row'] = $this->m_user->get();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('user/user_data', $data);
		$this->load->view('template_admin/footer', $data);
	
	}

	public function add(){
			$data = [
			'row' => $this->m_user->get(),
			'title' => "Setting"
			
		];


		$this->form_validation->set_rules('name', 'Nama', 'required');
	    $this->form_validation->set_rules('username', 'Usename', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	   
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_message('required' , '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');




		if ($this->form_validation->run() == FALSE){

        $this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('user/user_form_add', $data);
		$this->load->view('template_admin/footer', $data);

		}else {
			$post = $this->input->post(null, TRUE);
			$this->m_user->add($post);
			if($this->db->affected_rows() > 0 ){
				echo "<script> alert('Data berhasil disimpan');</script>";
			}
			   echo "<script>window.location='".site_url('user')."';</script>";
		}

	}


    public function edit($id){
    		$data = [
			'row' => $this->m_user->get(),
			'title' => "Setting"
			
		];

		$this->form_validation->set_rules('name', 'Nama', 'required');
	    $this->form_validation->set_rules('username', 'Usename', 'required|callback_username_check');
	    $this->form_validation->set_rules('password', 'Password');
		  
	   

		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_message('required' , '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){

            $query = $this->m_user->get($id);
            if($query->num_rows() > 0){
            $data['row'] = $query->row();
            	$this->load->view('template_admin/header', $data);
				$this->load->view('template_admin/sidebar');
				$this->load->view('user/user_form_edit', $data);
				$this->load->view('template_admin/footer', $data);
            }else{
            	echo "<script> alert('Data tidak ditemukan');</script>";
            	echo "<script>window.location='".site_url('user')."';</script>";
            }
		    }else {
			$post = $this->input->post(null, TRUE);
			$this->m_user->edit($post);
			if($this->db->affected_rows() > 0 ){
				echo "<script> alert('Data berhasil disimpan');</script>";
			}
			   echo "<script>window.location='".site_url('user')."';</script>";
		  }
		}

        function username_check(){
    	$post = $this->input->post(null, TRUE);
    	$query = $this->db->query("SELECT * FROM users WHERE username = '$post[username]' AND id != '$post[id]'");
    	if($query->num_rows() > 0){
    		$this->form_validation->set_message('username_check' , '{field} ini sudah dipakai, silahkan ganti!');
    		   return FALSE;

    	}else{
    		   return TRUE;
    	}

    }


	public function del($id){
		$this->m_user->del($id);

		if($this->db->affected_rows() > 0){
			echo "<script> alert('Data berhasil dihapus');</script>";
		}
		    echo "<script>window.location='".site_url('user')."';</script>";
	}

	public function hapusdata()
    {
        $id = $this->input->post("id");
        $where = array('id' => $id);
        $this->m_user->deleteData('users', $where); 
        redirect ('user');    
    }

	

	}
?>