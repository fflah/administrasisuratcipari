<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporanmasuk extends CI_Model {
    
   

	function filterbybulan($bulan = null, $tahun = null){


		$query = $this->db->query("SELECT * from tb_masuk where MONTH(tgl_surat) = '$bulan' AND YEAR(tgl_surat) = '$tahun' ORDER BY tgl_surat ASC ");

		return $query->result();
	}

	function filterbytahun($tahun){

		$query = $this->db->query("SELECT * from tb_masuk where YEAR(tgl_surat) = '$tahun' ORDER BY tgl_surat ASC ");

		return $query->result();
	}
	
	
	

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */