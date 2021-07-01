<?php

class M_penduduk extends CI_Model{
    // Get data peduduk using datatabel
    var $table = 'penduduk'; //nama tabel dari database
    var $column_order = array('id', 'NIk', 'nama', 'jk', 'tempat_tgl_lahir', 'agama', 'status', 'pekerjaan', 'alamat'); //field yang ada di table user
    var $column_search = array('id', 'NIk', 'nama', 'jk', 'tempat_tgl_lahir', 'agama', 'status', 'pekerjaan', 'alamat'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    private function _get_datatables_query()
    {
        $this->db->select(['id', 'NIK', 'nama', 'jk', 'tempat_tgl_lahir', 'agama', 'status', 'pekerjaan', 'alamat']);
        $this->db->from('penduduk');
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
	
	public function get($id = null){
		$this->db->from('penduduk');
		if($id != null){

			$this->db->where('id', $id);

		}
		$query = $this->db->get();
		return $query;

	}

	function add($post){
		$params = [
			 'nama' => $post['nama'],
			 'NIK' => $post['NIK'],
			 'jk' => $post['jk'],
			 'tempat_tgl_lahir' => $post['tempat_tgl_lahir'],
			
			 'agama' => $post['agama'],
			 'status' => $post['status'],
			
			 'pekerjaan' => $post['pekerjaan'],
			 'alamat' => $post['alamat'],
			 'email' => $post['email'],
			 'wa' => $post['wa']
			 
			 
		];
		 $this->db->insert('penduduk', $params);
	}

	function edit($post){
	$params = [
			 'nama' => $post['nama'],
			 'NIK' => $post['NIK'],
			 'jk' => $post['jk'],
			 'tempat_tgl_lahir' => $post['tempat_tgl_lahir'],
			 
			 'agama' => $post['agama'],
			 'status' => $post['status'],
			
			 'pekerjaan' => $post['pekerjaan'],
			 'alamat' => $post['alamat'],
			 'email' => $post['email'],
			 'wa' => $post['wa']
			 
			 
		];
		 
		 $this->db->where('id', $post['id']);
		 $this->db->update('penduduk', $params);


	}

	public function del($id){
		$this->db->where('id', $id);
		$this->db->delete('penduduk');
	}

	 public function find($id)
    {
        $this->db->select('*');
        $this->db->order_by('NIK');
        $this->db->from('');
        $this->db->where('penduduk',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function find2($NIK)
    {
        $this->db->select('penduduk');
        $this->db->from('penduduk');
        ///$this->db->join('desa','penduduk.id_desa = desa.id_desa', 'LEFT');
        $this->db->where('penduduk.NIK',$NIK);
        $query = $this->db->get();
        return $query->result();
    }
   // public function find3($NIK)
    ////{
        //$this->db->select('penduduk.*, desa.desa');
        //$this->db->from('penduduk');
        //$this->db->join('desa','penduduk.id_desa = desa.id_desa', 'LEFT');
        //$this->db->where('penduduk.nik_penduduk',$nik_penduduk);
        //$query = $this->db->get();
        ///return $query->row();
	//}
	

	
    

}
?>
