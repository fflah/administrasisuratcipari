<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_keluar');
        $this->load->model('m_masuk');
        $this->load->helper('tgl_indo_helper');
    }

    public function index()
    {   
    

        $suratmasuk = $this->db->query("SELECT * FROM tb_masuk");
        $suratkeluar = $this->M_keluar->count_all();
    
        $data['title'] = "Dashboard";
        $data['masuk'] = $suratmasuk->num_rows();
        $data['keluar'] = $suratkeluar;
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }

    public function permintaan_surat_datatabel(){
        $list = $this->m_keluar->get_datatables(); 

        $data = array();
        $no = $_POST['start'];
        $type=$this->input->get('type');
        $count = $this->m_keluar->count_all();      
        foreach ($list as $field) {                     
            $no++; 
            $row = array();
            $row['no'] = $no;
            $row['id'] = $field->id;
            $row['NIK'] = $field->nik;
            $row['nama'] = $field->nama;
            $row['alamat'] = $field->alamat;
            $row['email'] = $field->email;
            $row['jenis_surat'] = $field->jenis_surat;
            $row['keterangan'] = $field->keterangan;
            $row['kk'] = $field->kk;
            $row['kode_surat'] = $field->kode_surat;
            $row['ktp'] = $field->ktp;
            $row['ktp_ortu'] = $field->ktp_ortu;
            $row['no_surat'] = $field->no_surat;
            $row['surat_keterangan_rs'] = $field->surat_keterangan_rs;
            $row['surat_nikah'] = $field->surat_nikah;
            $row['surat_rt_rw'] = $field->surat_rt_rw;
            $row['tanggal'] = tanggal_indo(date('Y-n-d', strtotime($field->tanggal)));
            $row['akta_kelahiran'] = $field->akta_kelahiran;
            $row['ijazah'] = $field->ijazah;
            $row['aksi'] = array('id' => $field->id, 'jenis_surat' => $field->jenis_surat);
            $data[] = $row;
        }
    
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function get_surat_masuk(){
        $list = $this->m_masuk->get_datatables(); 

        $data = array();
        $no = $_POST['start'];
        $type=$this->input->get('type');
        $count = $this->m_masuk->count_all();       
        foreach ($list as $field) {                     
            $no++; 
            $row = array();
            $row['no'] = $no;
            $row['id'] = $field->no;
            $row['pengirim'] = $field->pengirim;
            $row['no_surat'] = $field->no_surat;
            $row['tgl_surat'] = $field->tgl_surat;
            $row['tgl_terima'] = $field->tgl_terima;
            $row['keterangan'] = $field->keterangan;
            $row['file_surat'] = $field->file_surat;
            $row['aksi'] = array('no' => $field->no);
            $data[] = $row;
        }
    
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $data,
        );
        echo json_encode($output);
    }

    

    public function detail_surat(){
        $id_surat = $this->input->post('id');
        $jenis_surat = $this->input->post('jenis_surat');

        $data_surat = null;
        if ($jenis_surat == 'Surat Keterangan Usaha') {         
            $data_surat =  $this->db->select('*')->from('surat_sku')->join('penduduk', 'penduduk.id=surat_sku.id_penduduk')->where(['surat_sku.id' => $id_surat])->get()->row_array();

            
        }elseif ($jenis_surat == 'Surat Kematian') {            
            $data_surat =  $this->db->select('*')->from('surat_kematian')->join('penduduk', 'penduduk.id=surat_kematian.id_penduduk')->where(['surat_kematian.id' => $id_surat])->get()->row_array();

        }elseif ($jenis_surat == 'Surat Nikah') {           
            $data_surat =  $this->db->select('*')->from('surat_nikah')->join('penduduk', 'penduduk.id=surat_nikah.id_penduduk')->where(['surat_nikah.id' => $id_surat])->get()->row_array();

        }elseif ($jenis_surat == 'Surat Pindah Daerah') {           
            $data_surat =  $this->db->select('*')->from('surat_pindah_domisili')->join('penduduk', 'penduduk.id=surat_pindah_domisili.id_penduduk')->where(['surat_pindah_domisili.id' => $id_surat])->get()->row_array();

        }elseif ($jenis_surat == 'Surat Tugas') {           
            $data_surat =  $this->db->select('*')->from('surat_tugas')->join('perangkat_desa', 'surat_tugas.id_perangkat_desa=perangkat_desa.id')->where(['surat_tugas.id' => $id_surat])->get()->row_array();

        }elseif ($jenis_surat == 'Surat Undangan') {            
            $data_surat =  $this->db->select('*')->from('surat_undangan')->where(['surat_undangan.id' => $id_surat])->get()->row_array();

        }

        $data_surat['tanggal'] = tanggal_indo(date('Y-n-d', strtotime($data_surat['tanggal'])));
        

        $output =[
            'data_surat' => $data_surat,
        ];



        echo json_encode($output);
    }

    public function detail_surat_masuk(){
        $no_surat = $this->input->post('id');
        
                
        $data_surat =  $this->db->select('*')->from('tb_masuk')->where(['no' => $no_surat])->get()->row_array();
        $data_surat['tgl_surat'] = tanggal_indo(date('Y-n-d', strtotime($data_surat['tgl_surat']))); 
        $data_surat['tgl_terima'] = tanggal_indo(date('Y-n-d', strtotime($data_surat['tgl_terima']))); 
                    

        $output =[
            'data_surat' => $data_surat,
        ];



        echo json_encode($output);
    }


}
