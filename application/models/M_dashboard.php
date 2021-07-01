<?php

class M_dashboard extends CI_Model{
	
	
	public function GetStatistikSuratKeluar($bulan){
		
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
			
			WHERE surat_keluar.proses_surat='Finish' AND MONTH(surat_keluar.tanggal)=$bulan
		";

		return $this->db->query($sql)->row_array();

	}

	public function GetStatistikSuratMasuk($bulan)
	{
		$sql = "
		SELECT COUNT(no) AS `jumlah_surat` FROM tb_masuk			
			WHERE MONTH(tgl_terima)=$bulan
		";

		return $this->db->query($sql)->row_array();
	}

	public function CountSuratKeluar()
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
			
			WHERE surat_keluar.proses_surat='Finish'
		";

		return $this->db->query($sql)->row_array();
	}

}
?>
