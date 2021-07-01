<?php

if (!function_exists('sasi')) {
    function sasi($ss){ 
        switch($ss){
            case 1: 
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;

            default:
                $ss = date('F');
            break;
        }
        return $ss;
    }
}

if (!function_exists('bulan')) {
    function bulan(){ 
       $bulan = date('m') ;
        switch($bulan){
            case 1: 
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;

            default:
                $bulan = date('F');
            break;
        }
        return $bulan;
    }
}
// fungsi untuk mencetak tanggal dalam format tanggal indonesia

if(!function_exists('tanggal')){
    function tanggal(){
        $tanggal = date('d')." ".bulan()." ".date('Y');
        return $tanggal;
    }
}