<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporankeluar extends CI_Model {
    
   

	function filterbybulan($bulan = null, $tahun = null){
		$sql = "
		SELECT * FROM (			
			
			SELECT surat_kematian.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, surat_nikah ,null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_kematian JOIN penduduk ON surat_kematian.id_penduduk=penduduk.id
			UNION ALL 
			
			SELECT surat_nikah.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, ktp_ortu, kk, null as surat_nikah ,null as surat_keterangan_rs, ktp, akta_kelahiran, ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_nikah JOIN penduduk ON surat_nikah.id_penduduk=penduduk.id
			UNION ALL 
			
			SELECT surat_pindah_domisili.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_pindah_domisili JOIN penduduk ON surat_pindah_domisili.id_penduduk=penduduk.id
			UNION ALL 

			SELECT surat_tugas.id as id, null as nama, null as nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_tugas 
			UNION ALL 

			SELECT surat_undangan.id as id, null as nama, null as nik, null as alamat, null as email, null as jk, null as agama, jenis_surat, null as surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, null as ktp, null as akta_kelahiran, null as ijazah, null as keterangan, proses_surat, no_surat, null as kode_surat, tanggal FROM surat_undangan
			UNION ALL
			
			SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
			) AS surat_keluar
			
			WHERE surat_keluar.proses_surat='Finish' AND MONTH(surat_keluar.tanggal)=$bulan AND YEAR(surat_keluar.tanggal) = $tahun
		";
		return $this->db->query($sql)->result();
		
	}

	function filterbytahun($tahun){

		$query = $this->db->query("SELECT * from tb_keluar where YEAR(tgl_surat) = '$tahun' ORDER BY tgl_surat ASC ");

		return $query->result();
	}
	
	

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */