<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function no_surat_keterangan( ){
    $CI = &get_instance();
    $nomor  = $CI->db->query("SELECT *FROM kategori_surat WHERE id_kategori = '1' ")->row();
    $count_surat = $CI->db->query("
    SELECT COUNT(id) AS `jumlah_surat` FROM (
        
        SELECT surat_kematian.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, surat_nikah ,null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_kematian JOIN penduduk ON surat_kematian.id_penduduk=penduduk.id
        UNION ALL 
        
        SELECT surat_nikah.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, ktp_ortu, kk, null as surat_nikah ,null as surat_keterangan_rs, ktp, akta_kelahiran, ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_nikah JOIN penduduk ON surat_nikah.id_penduduk=penduduk.id
        UNION ALL 
        
        SELECT surat_pindah_domisili.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_pindah_domisili JOIN penduduk ON surat_pindah_domisili.id_penduduk=penduduk.id
        UNION ALL 
        
        SELECT surat_sku.id as id, nama, nik, alamat, email, jk, agama, jenis_surat, surat_rt_rw, null as ktp_ortu, null as kk, null as surat_nikah , null as surat_keterangan_rs, ktp, null as akta_kelahiran, null as ijazah, keterangan, proses_surat, no_surat, kode_surat, tanggal FROM surat_sku JOIN penduduk ON surat_sku.id_penduduk=penduduk.id
        ) AS surat_keluar
        
        WHERE surat_keluar.proses_surat='Finish' OR surat_keluar.proses_surat='Accepted'
    ")->row_array();
    $no_surat = $count_surat['jumlah_surat']+1;
    $kode_surat = '01';
    
    if ($no_surat < 10) {
        $no_surat = '000'.$no_surat;
    }elseif ($no_surat < 100) {
        $no_surat = '00'.$no_surat;
    }elseif ($no_surat < 1000) {
        $no_surat = '0'.$no_surat;
    }else{
        $no_surat = $no_surat;
    }

    $no_surat_fix = $no_surat.'/'.$kode_surat.'/'.'404.306.13'.'/'.tgl_romawi(date('m')).'/'.date('Y');
    return $no_surat_fix;

}

function no_surat_pernyataan( ){
    $CI = &get_instance();
    $nomor  = $CI->db->query("SELECT *FROM kategori_surat WHERE id_kategori = '2' ")->row();
    $no_surat = $nomor->no_surat;
    $kode_surat = $nomor->kode_surat;
    
    if ($no_surat < 10) {
        $no_surat = '000'.$no_surat;
    }elseif ($no_surat < 100) {
        $no_surat = '00'.$no_surat;
    }elseif ($no_surat < 1000) {
        $no_surat = '0'.$no_surat;
    }else{
        $no_surat = $no_surat;
    }

    $no_surat_fix = $no_surat.'/'.$kode_surat.'/'.'404.306.13'.'/'.tgl_romawi(date('m')).'/'.date('Y');
    return $no_surat_fix;
}


function no_surat_internal($surat){
    $CI = &get_instance();
    if ($surat == 'undangan') {
        $no_surat = $CI->db->get('surat_undangan')->num_rows()+1;
        $kode_surat = '02';
    } elseif ($surat == 'tugas') {
        $no_surat = $CI->db->get('surat_tugas')->num_rows()+1;
        $kode_surat = '03';
    }
    
    if ($no_surat < 10) {
        $no_surat = '000'.$no_surat;
    }elseif ($no_surat < 100) {
        $no_surat = '00'.$no_surat;
    }elseif ($no_surat < 1000) {
        $no_surat = '0'.$no_surat;
    }else{
        $no_surat = $no_surat;
    }

    $no_surat_fix = $no_surat.'/'.$kode_surat.'/'.'404.306.13'.'/'.tgl_romawi(date('m')).'/'.date('Y');
    return $no_surat_fix;
}




if (!function_exists('tgl_romawi')) {
    function tgl_romawi($bulan_awal) {
        $bulan = array (
            1  =>   'I',
            2  =>   'II',
            3  =>   'III',
            4  =>   'IV',
            5  =>   'V',
            6  =>   'VI',
            7  =>   'VII',
            8  =>   'VIII',
            9  =>   'IX',
            10 =>   'X',
            11 =>   'XI',
            12 =>   'XII'
        );
        return $bulan[(int)$bulan_awal];
    }
}
if (!function_exists('tgl')) {   
    function tgl($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);               
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
    return($result);
}
}

