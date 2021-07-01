<?php

class M_suratpengantar extends CI_Model{
	var $table = 'surat_kelahiran'; //nama tabel dari database
    var $column_order = array('nama', 'nik', 'alamat', 'email', 'jenis_surat', 'keterangan', 'proses_surat', 'no_surat', 'kode_surat', 'tanggal'); //field yang ada di table user
    var $column_search = array('nama', 'nik', 'alamat', 'email', 'jenis_surat', 'keterangan', 'proses_surat', 'no_surat', 'kode_surat', 'tanggal'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 

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
				
				SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
				) AS surat_keluar
				ORDER BY surat_keluar.no_surat	DESC
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
					
					SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
					) AS surat_keluar
					WHERE surat_keluar.nama LIKE'%".$tgl."%' OR surat_keluar.nik LIKE'%".$tgl."%' OR surat_keluar.jenis_surat LIKE'%".$tgl."%' OR surat_keluar.no_surat LIKE'%".$tgl."%' OR surat_keluar.tanggal LIKE'%".$tgl."%'
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
			
			SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
			) AS surat_keluar
			
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
			
			SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
			) AS surat_keluar
			
		";

		$data =  $this->db->query($sql)->row_array();
		return $data['jumlah_surat'];

	}
	
	
	public function get(){
		$sql = 
		"SELECT surat_kematian.id as id, nama, nik, alamat, email, `jenis_surat`, `surat_rt_rw`, null as `ktp_ortu`, `kk`, `surat_nikah` ,null as `surat_keterangan_rs`, `ktp`, null as `akta_kelahiran`, null as `ijazah`, `keterangan`, `proses_surat`, `no_surat`, `kode_surat`, `tanggal` FROM surat_kematian JOIN penduduk ON surat_kematian.id_penduduk=penduduk.id  WHERE 
		tanggal
		UNION ALL 
		
		SELECT surat_nikah.id as id, nama, nik, alamat, email, `jenis_surat`, `surat_rt_rw`, `ktp_ortu`, `kk`, null as `surat_nikah` ,null as `surat_keterangan_rs`, `ktp`, `akta_kelahiran`, `ijazah`, `keterangan`, `proses_surat`, `no_surat`, `kode_surat`, `tanggal` FROM surat_nikah JOIN penduduk ON surat_nikah.id_penduduk=penduduk.id  WHERE 
		tanggal
		UNION ALL 
		
		SELECT surat_pindah_domisili.id as id, nama, nik, alamat, email, `jenis_surat`, `surat_rt_rw`, null as `ktp_ortu`, `kk`, null as `surat_nikah` , null as `surat_keterangan_rs`, `ktp`, null as `akta_kelahiran`, null as `ijazah`, `keterangan`, `proses_surat`, `no_surat`, `kode_surat`, `tanggal` FROM surat_pindah_domisili JOIN penduduk ON surat_pindah_domisili.id_penduduk=penduduk.id  WHERE 
		tanggal
		UNION ALL 
		
		SELECT surat_sku.id as id, nama, nik, alamat, email, `jenis_surat`, `surat_rt_rw`, null as `ktp_ortu`, null as `kk`, null as `surat_nikah` , null as `surat_keterangan_rs`, `ktp`, null as `akta_kelahiran`, null as `ijazah`, `keterangan`, `proses_surat`, `no_surat`, `kode_surat`, `tanggal` FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id  WHERE 
		tanggal";
		$hsl = $this->db->query($sql);
		return $hsl;

	}

	function add($post){
		$params = [
			 'nama' => $post['nama'],
			 'NIK' => $post['NIK'],
			 'alamat' => $post['alamat'],
			 'whatsapp' => $post['whatsapp'],
			 'keperluan' => $post['keperluan'],
			 'keterangan' => empty($post['keterangan']) ? null : $post['keterangan'],
			 //'file_surat' => $post['file_surat'],

			 
		];
		 $this->db->insert('suratpengantar', $params);
	}

	

	public function get_penduduk(){
		
		$this->db->query('select nama, nik, alamat from penduduk'); 
		$query = $this->db->get();
		return $query;
	}
    
	

	public function ambil_data($id = null)
    {
        $this->db->select('*');
        $this->db->from('suratpengantar');
        if($id != null){
            $this->db->where('id',$id);

        }
        $query = $this->db->get();
        return $query;
    }




	
}
?>