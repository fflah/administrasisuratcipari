<?php

class M_masuk extends CI_Model{

	private function CustomDataTabel()
	{
		

		$sql = "
			SELECT * FROM tb_masuk LIMIT ". $_POST['length']." OFFSET ". $_POST['start'] ." 

		";

		
		if($_POST['search']['value']){
			$query = $_POST['search']['value'];
			$sql = "
				SELECT * FROM tb_masuk WHERE no_surat LIKE'%".$query."%' OR pengirim LIKE'%".$query."%' OR tgl_surat LIKE'%".$query."%' OR perihal LIKE'%".$query."%' OR tgl_terima LIKE'%".$query."%' OR keterangan LIKE'%".$query."%' 
			";

			return $this->db->query($sql)->result();
							
		}

		if($_POST['length'] != -1);
		return $this->db->query($sql)->result();

	}

    function get_datatables()
    {		
        $query = $this->CustomDataTabel();
        return $query;
	}
	
	function count_filtered()
    {
		$sql = "
		SELECT COUNT(no) AS `jumlah_surat` FROM tb_masuk
		";

		$data =  $this->db->query($sql)->row_array();
		return $data['jumlah_surat'];
    }
 
    public function count_all()
    {
        $sql = "
		SELECT COUNT(no) AS `jumlah_surat` FROM tb_masuk
		";

		$data =  $this->db->query($sql)->row_array();
		return $data['jumlah_surat'];

	}
	
	
	public function get($no = null){
		$this->db->from('tb_masuk');
		if($no != null){

			$this->db->where('no', $no);

		}

		//$this->db->order_by('no_surat', 'asc');
		$query = $this->db->get();
		return $query;

	}
	function proses(){

	    $config['upload_path']          = './assets/upload/';
	    $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
	    $config['overwrite']			= true;
	    $config['max_size']             = 1024; // 1MB

	    $this->load->library('upload', $config);

	    if ($this->upload->do_upload('file_surat')) {
	        return $this->upload->data("file_name");
	    }else {
	    	return $this->upload->display_errors();
	    }
	    
	}

	function add($post){
		
		$params = [
			 'no_surat' => $post['no_surat'],
			 'pengirim' => $post['pengirim'],
			 'tgl_surat' => $post['tgl_surat'],
			 'tgl_terima' => $post['tgl_terima'],
			 'keterangan' => empty($post['keterangan']) ? null : $post['keterangan']
			  
		];
		if ($_FILES['file_surat']['name'] != null) {
			$params['file_surat'] = $this->proses();
		}
		 $this->db->insert('tb_masuk', $params);
	}

	function edit($post){
		
		$params = [
			 'no_surat' => $post['no_surat'],
			 'pengirim' => $post['pengirim'],
			 'tgl_surat' => $post['tgl_surat'],
			 'tgl_terima' => $post['tgl_terima'],
			 'keterangan' => empty($post['keterangan']) ? null : $post['keterangan']
			
		];
		if ($_FILES['file_surat']['name'] != null) {
			$params['file_surat'] = $this->proses();
		}
		 $this->db->where('no', $post['no']);
		 $this->db->update('tb_masuk', $params);


	}
	
	public function deleteData($table,$where)
    {

        $this->db->delete($table,$where);
    }

	public function download($no){
     $query = $this->db->get_where('tb_masuk',array('no'=>$no));
     return $query->row_array();
    }
 

}
?>
