<?php

class M_keluar extends CI_Model{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
	}

	private function CustomDataTabel()
	{
		

		$sql = "
			SELECT * FROM (				 
				
				SELECT surat_kematian.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, surat_nikah ,null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_kematian JOIN penduduk ON surat_kematian.id_penduduk=penduduk.id
				UNION ALL 
				
				SELECT surat_nikah.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, ktp_ortu, kk, null as surat_nikah ,null as surat_keterangan_rs, ktp, akta_kelahiran, ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_nikah JOIN penduduk ON surat_nikah.id_penduduk=penduduk.id
				UNION ALL 
				
				SELECT surat_pindah_domisili.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_pindah_domisili JOIN penduduk ON surat_pindah_domisili.id_penduduk=penduduk.id
				UNION ALL 

				SELECT surat_tugas.id as id, nama, nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_tugas JOIN perangkat_desa ON surat_tugas.id_perangkat_desa=perangkat_desa.id
				UNION ALL 

				SELECT surat_undangan.id as id, kepada as nama, null as nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_undangan
				UNION ALL 
				
				SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
				) AS surat_keluar
				WHERE surat_keluar.proses_surat='Finish' ORDER BY surat_keluar.no_surat ASC 
				LIMIT ". $_POST['length']." OFFSET ". $_POST['start'] ." 

		";

		
		if($_POST['search']['value']){
			$tgl = $_POST['search']['value']; 
			$sql = "
				SELECT * FROM (
					
					SELECT surat_kematian.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, surat_nikah ,null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_kematian JOIN penduduk ON surat_kematian.id_penduduk=penduduk.id
					UNION ALL 
					
					SELECT surat_nikah.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, ktp_ortu, kk, null as surat_nikah ,null as surat_keterangan_rs, ktp, akta_kelahiran, ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_nikah JOIN penduduk ON surat_nikah.id_penduduk=penduduk.id
					UNION ALL 
					
					SELECT surat_pindah_domisili.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_pindah_domisili JOIN penduduk ON surat_pindah_domisili.id_penduduk=penduduk.id
					UNION ALL 

					SELECT surat_tugas.id as id, nama, nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_tugas JOIN perangkat_desa ON surat_tugas.id_perangkat_desa=perangkat_desa.id
					UNION ALL 

					SELECT surat_undangan.id as id, kepada as nama, null as nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_undangan
					UNION ALL 
					
					SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
					) AS surat_keluar
					WHERE surat_keluar.proses_surat = 'Finish' AND surat_keluar.nama LIKE'%".$tgl."%' OR surat_keluar.nik LIKE'%".$tgl."%' OR surat_keluar.jenis_surat LIKE'%".$tgl."%' OR surat_keluar.no_surat LIKE'%".$tgl."%' OR surat_keluar.tanggal LIKE'%".$tgl."%'
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
		SELECT COUNT(id) AS `jumlah_surat` FROM (						
			
			SELECT surat_kematian.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, surat_nikah ,null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_kematian JOIN penduduk ON surat_kematian.id_penduduk=penduduk.id
			UNION ALL 
			
			SELECT surat_nikah.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, ktp_ortu, kk, null as surat_nikah ,null as surat_keterangan_rs, ktp, akta_kelahiran, ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_nikah JOIN penduduk ON surat_nikah.id_penduduk=penduduk.id
			UNION ALL 
			
			SELECT surat_pindah_domisili.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_pindah_domisili JOIN penduduk ON surat_pindah_domisili.id_penduduk=penduduk.id
			UNION ALL 

			SELECT surat_tugas.id as id, nama, nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_tugas JOIN perangkat_desa ON surat_tugas.id_perangkat_desa=perangkat_desa.id
			UNION ALL 

			SELECT surat_undangan.id as id, null as nama, null as nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_undangan
			UNION ALL 
			
			SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
			) AS surat_keluar
			
			WHERE surat_keluar.proses_surat='Finish'
		";

		$data =  $this->db->query($sql)->row_array();
		return $data['jumlah_surat'];
    }
 
    public function count_all()
    {
        $sql = "
		SELECT COUNT(id) AS `jumlah_surat` FROM (
			
			SELECT surat_kematian.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, surat_nikah ,null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_kematian JOIN penduduk ON surat_kematian.id_penduduk=penduduk.id
			UNION ALL 
			
			SELECT surat_nikah.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, ktp_ortu, kk, null as surat_nikah ,null as surat_keterangan_rs, ktp, akta_kelahiran, ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_nikah JOIN penduduk ON surat_nikah.id_penduduk=penduduk.id
			UNION ALL 
			
			SELECT surat_pindah_domisili.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_pindah_domisili JOIN penduduk ON surat_pindah_domisili.id_penduduk=penduduk.id
			UNION ALL 

			SELECT surat_tugas.id as id, nama, nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_tugas JOIN perangkat_desa ON surat_tugas.id_perangkat_desa=perangkat_desa.id
			UNION ALL 

			SELECT surat_undangan.id as id, null as nama, null as nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_undangan
			UNION ALL 
			
			SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
			) AS surat_keluar
			WHERE surat_keluar.proses_surat='Finish'
			
		";

		$data =  $this->db->query($sql)->row_array();
		return $data['jumlah_surat'];

	}
	
 

	public function get($no = null){
		$this->db->from('tb_keluar');
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

	    if ($this->upload->do_upload('nama')) {
	        return $this->upload->data("file_name");
	    }else {
	    	return $this->upload->display_errors();
	    }
	    
	}

	function add($post){
		$upload = $this->proses();
		$params = [
			 'no_surat' => $post['no_surat'],
			  'perihal' => $post['perihal'],
			 'tgl_surat' => $post['tgl_surat'],
			 'NIK' => $post['NIK'],
			
			  'nama' => $upload		 	
			
		];
		 $this->db->insert('tb_keluar', $params);
	}

	function edit($post){
		$upload = $this->proses();
		$params = [
			 'no_surat' => $post['no_surat'],
			 'perihal' => $post['perihal'],
			 'tgl_surat' => $post['tgl_surat'],
			 'NIK' => $post['NIK'],
			 
			 'nama' => $upload
			 
			 
		];
		 $this->db->where('no', $post['no']);
		 $this->db->update('tb_keluar', $params);

	}

	public function del($no){
		$this->db->where('no', $no);
		$this->db->delete('tb_keluar');
	}


	public function download($no){
     	$query = $this->db->get_where('tb_keluar',array('no'=>$no));
     	return $query->row_array();
	}

	public function get_surat_internal()
	{
		$sql = "SELECT * FROM(
			SELECT surat_tugas.id as id, nama, nik, jabatan, divisi, jenis_surat, no_surat, tanggal, nama_ttd, jabatan_ttd, kontent  FROM surat_tugas JOIN perangkat_desa ON surat_tugas.id_perangkat_desa=perangkat_desa.id
			
			UNION ALL
			
			SELECT surat_undangan.id as id,  null, null, null, null, jenis_surat, no_surat, tanggal, nama_ttd, jabatan_ttd, kontent  FROM surat_undangan
			) AS surat_internal;";
		
		return $this->db->query($sql)->result();
	}

}
?>
