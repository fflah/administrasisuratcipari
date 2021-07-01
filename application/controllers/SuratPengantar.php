<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratPengantar extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_suratpengantar');
		$this->load->library('form_validation');
		$this->load->helper('my_helper');
	}

	public function index()
	{   

		$data['ambil_data']= $this->m_suratpengantar->get()->result_array();

		
		$this->load->view('template_user/header', $data);
	    $this->load->view('template_user/topbar', $data);
	    //$this->load->view('user penduduk/layanan', $data);
		$this->load->view('template_user/footer', $data);
		
		
	}
	public function add_surat_general()
	{
		$nama = $this->input->post('nama');
		$NIK = $this->input->post('NIK');
		$email = $this->input->post('email');
		$penduduk = null;
		$checkPenduduk = $this->db->get_where('penduduk', ['NIK' => $NIK, 'nama' => $nama])->num_rows();

		// check user penduduk
		if ($checkPenduduk >= 1) {
			$penduduk = $this->db->get_where('penduduk', ['NIK' => $NIK, 'nama' => $nama])->row_array();
			if ($email != '') {
				$this->db->update('penduduk', ['email' => $email], ['NIK' => $NIK, 'nama' => $nama]);
			}
			
		}else{
			// Insert data to penduduk
			$dataInfoPenduduk = array();
			$dataInfoSurat = array();
			foreach (array_keys($_POST) as $key) {
				$dataInfoPenduduk[$key] = $this->input->post($key);
			}
			
			unset($dataInfoPenduduk['jenis_surat']);
			unset($dataInfoPenduduk['keterangan']);
			if ($this->input->post('jenis_surat') == 'Surat Pindah Daerah') {
				unset($dataInfoPenduduk['alamat_pindah']);
				unset($dataInfoPenduduk['alasan_pindah']);
				unset($dataInfoPenduduk['pengikut']);
				
			} else if ($this->input->post('jenis_surat') == 'Surat Kematian') {
				unset($dataInfoPenduduk['hari_meninggal']);
				unset($dataInfoPenduduk['jam_meninggal']);
			}  else if ($this->input->post('jenis_surat') == 'Surat Keterangan Usaha') {
				unset($dataInfoPenduduk['nama_usaha']);
			}
			$this->db->insert('penduduk', $dataInfoPenduduk);
			$penduduk = $this->db->get_where('penduduk', ['NIK' => $NIK, 'nama' => $nama])->row_array();
			
		}

		// insert data to surat general
		$this->load->library('upload');
		$this->upload->initialize($this->set_upload_options());			
		foreach (array_keys($_FILES) as $key) {
			if ( ! $this->upload->do_upload($key)){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				
			}else{
				$dataInfoSurat[$key] = $this->upload->data('file_name');
			}
		}
		$dataInfoSurat['tanggal'] = Date('Y-m-d');
		$dataInfoSurat['keterangan'] = $this->input->post('keterangan');
		$dataInfoSurat['id_penduduk'] = $penduduk['id'];


		if ($this->input->post('jenis_surat') == 'Surat Pindah Daerah') {
			$dataInfoSurat['alamat_pindah'] = $this->input->post('alamat_pindah');
			$dataInfoSurat['alasan_pindah'] = $this->input->post('alasan_pindah');
			$dataInfoSurat['pengikut'] = $this->input->post('pengikut');
			$this->db->insert('surat_pindah_domisili', $dataInfoSurat);
			
		} else if ($this->input->post('jenis_surat') == 'Surat Nikah') {
			$this->db->insert('surat_nikah', $dataInfoSurat);

		} else if ($this->input->post('jenis_surat') == 'Surat Kematian') {
			$dataInfoSurat['hari_meninggal'] = $this->input->post('hari_meninggal');
			$dataInfoSurat['jam_meninggal'] = $this->input->post('jam_meninggal');
			$this->db->insert('surat_kematian', $dataInfoSurat);
			
		} else if ($this->input->post('jenis_surat') == 'Surat Keterangan Usaha') {
			$dataInfoSurat['nama_usaha'] = $this->input->post('nama_usaha');
			$this->db->insert('surat_sku', $dataInfoSurat);
		}
		echo "<script> alert('Data berhasil disimpan');</script>";
		echo "<script>window.location='".site_url('DashboardUser')."';</script>";
	}

	private function set_upload_options()
	{   
		$config = array();
		$config['upload_path']          = './media/surat';
		$config['allowed_types']        = 'jpeg|jpg|png|pdf|doc';
		$config['max_size']             = 3000;

		return $config;
	}

	public function add(){
			$data = [
			'row' => $this->m_suratpengantar->get(),
			//'row' => $pengantar,
			'title' => "Permintaan Surat"
			
		];

		$pengantar = new stdClass();
		$pengantar->nama = null;
		$pengantar->NIK = null;
		$pengantar->alamat = null;
		$pengantar->whatsapp = null;
		$pengantar->keperluan = null;
		$pengantar->keterangan = null;
		$pengantar->file_surat = null;
		



		if ($this->form_validation->run() == FALSE){

       
			$post = $this->input->post(null, TRUE);
			$this->m_suratpengantar->add($post);
			if($this->db->affected_rows() > 0 ){
				echo "<script> alert('Data berhasil disimpan');</script>";
			}
			   echo "<script>window.location='".site_url('suratPengantar')."';</script>";
		}

	}

	public function permintaan_surat_datatabel(){
		$list = $this->m_suratpengantar->get_datatables(); 

        $data = array();
        $no = $_POST['start'];
		$type=$this->input->get('type');
        foreach ($list as $field) {			
			$jenis_surat = "'".$field->jenis_surat."'";
			$nama = "'".$field->nama."'";
			$nik = "'".$field->nik."'";
			$proses_surat = "'".$field->proses_surat."'";
			$JenisSurat = str_replace(' ', '_', $field->jenis_surat);

			$tombol_proses_surat = '<a onClick="proses_button('.$field->id.','.$jenis_surat.','.$nama.','.$nik.','.$proses_surat.')" class="btn btn-danger btn-xs" onclick="konfirmasi()" >Process</a>';
			$tombol_buat_surat = '<a href="../surat/Surat/'.$field->id.'" class="btn btn-primary disabled btn-xs" >Buat Surat</a> ';
			if ($field->proses_surat == 'Accepted') {
				$tombol_buat_surat = '<a href="../surat/Surat/s_keterangan/'.$JenisSurat.'/'.$field->id.'" class="btn btn-primary btn-xs" >Buat Surat</a> ';
				$tombol_proses_surat = '<a onClick="proses_button('.$field->id.','.$jenis_surat.','.$nama.','.$nik.','.$proses_surat.')" class="btn btn-success btn-xs" onclick="konfirmasi()" >Accepted</a>';

			}else if($field->proses_surat == 'Rejected'){
				$tombol_proses_surat = '<a onClick="proses_button('.$field->id.','.$jenis_surat.','.$nama.','.$nik.','.$proses_surat.')" class="btn btn-warning btn-xs" onclick="konfirmasi()" >Rejected</a>';
				
			}else if($field->proses_surat == 'Finish'){
				$tombol_proses_surat = '<a onClick="proses_button('.$field->id.','.$jenis_surat.','.$nama.','.$nik.','.$proses_surat.')" class="btn btn-success btn-xs" onclick="konfirmasi()" >Finish</a>';
			}

            $no++; 
            $row = array();
            $row['no'] = $no;
            $row['NIK'] = $field->nik;
            $row['nama'] = $field->nama;
            $row['alamat'] = $field->alamat;
            $row['email'] = $field->email;
            $row['jenis_surat'] = $field->jenis_surat;
            $row['keterangan'] = $field->keterangan;
            $row['proses_surat'] = $tombol_proses_surat;
            $row['kk'] = $field->kk;
            $row['kode_surat'] = $field->kode_surat;
            $row['ktp'] = $field->ktp;
            $row['ktp_ortu'] = $field->ktp_ortu;
            $row['no_surat'] = $field->no_surat;
            $row['surat_keterangan_rs'] = $field->surat_keterangan_rs;
            $row['surat_nikah'] = $field->surat_nikah;
            $row['surat_rt_rw'] = $field->surat_rt_rw;
            $row['tanggal'] = $field->tanggal;
            $row['akta_kelahiran'] = $field->akta_kelahiran;
            $row['ijazah'] = $field->ijazah;
			$row['aksi'] = $tombol_buat_surat;
            $data[] = $row;
		}
		
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_suratpengantar->count_all(),
            "recordsFiltered" => $this->m_suratpengantar->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
	}

	public function permintaan(){
		$data = [
			'row' => $this->m_suratpengantar->get()->result(),
			'title' => "Permintaan Surat"
			
		];
		$this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('permintaan_surat/permintaan',$data);
		$this->load->view('template_admin/footer',$data);

	}

	public function proses_permintaan_surat(){

		$id = $this->input->post('id');
		$jenis_surat = $this->input->post('jenis_surat');
		$proses_surat = $this->input->post('proses_surat');
		$no_surat = no_surat_keterangan();		
		$alasan = $this->input->post('alasan');

		// print_r($no_surat);
		// die;



		$pesan = null;

		if ($jenis_surat == 'Surat Kematian') {
			if($proses_surat == 'Accepted' ){
				$this->db->update('surat_kematian', ['proses_surat' => $proses_surat, 'no_surat' => $no_surat], ['id' => $id]);
			}						
			
			if ($alasan != '') {
				$this->db->update('surat_kematian', ['proses_surat' => $proses_surat, 'alasan_reject' => $alasan], ['id' => $id]);
			}
			
			$data_surat =  $this->db->select('*')->from('surat_kematian')->join('penduduk', 'penduduk.id=surat_kematian.id_penduduk')->where(['surat_kematian.id' => $id])->get()->row_array();
			if ($data_surat['alasan_reject'] != '') {
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => sprintf("Assalamu'alaikum Wr. Wb <br>
						Maaf Pengajuan surat anda ditolak dengan alasan <strong>%s</strong>, silakan melakukan permintaan surat kembali dengan pengisian data lebih cermat, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>", $data_surat['alasan_reject'] )
					)
				);
			}

		}elseif ($jenis_surat == 'Surat Kelahiran') {
			if($proses_surat == 'Accepted' ){
				$this->db->update('surat_kelahiran',  ['proses_surat' => $proses_surat, 'no_surat' => $no_surat], ['id' => $id]);
			}

			if ($alasan != '') {
				$this->db->update('surat_kelahiran', ['proses_surat' => $proses_surat, 'alasan_reject' => $alasan], ['id' => $id]);
			}

			$data_surat =  $this->db->select('*')->from('surat_kelahiran')->join('penduduk', 'penduduk.id=surat_kelahiran.id_penduduk')->where(['surat_kelahiran.id' => $id])->get()->row_array();
			if ($data_surat['alasan_reject'] != '') {
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => sprintf("Assalamu'alaikum Wr. Wb <br>
						Maaf Pengajuan surat anda ditolak dengan alasan <strong>%s</strong>, silakan melakukan permintaan surat kembali dengan pengisian data lebih cermat, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>", $data_surat['alasan_reject'] )
					)
				);
			}
		}elseif ($jenis_surat == 'Surat Nikah') {
			if($proses_surat == 'Accepted' ){
				$this->db->update('surat_nikah',  ['proses_surat' => $proses_surat, 'no_surat' => $no_surat], ['id' => $id]);
			}
			

			if ($alasan != '') {
				$this->db->update('surat_nikah', ['proses_surat' => $proses_surat, 'alasan_reject' => $alasan], ['id' => $id]);
			}

			$data_surat =  $this->db->select('*')->from('surat_nikah')->join('penduduk', 'penduduk.id=surat_nikah.id_penduduk')->where(['surat_nikah.id' => $id])->get()->row_array();
			if ($data_surat['alasan_reject'] != '') {
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => sprintf("Assalamu'alaikum Wr. Wb <br>
						Maaf Pengajuan surat anda ditolak dengan alasan <strong>%s</strong>, silakan melakukan permintaan surat kembali dengan pengisian data lebih cermat, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>", $data_surat['alasan_reject'] )
					)
				);

			}

		}elseif ($jenis_surat == 'Surat Pindah Daerah') {
			if($proses_surat == 'Accepted' ){
				$this->db->update('surat_pindah_domisili',  ['proses_surat' => $proses_surat, 'no_surat' => $no_surat], ['id' => $id]);
			}
			
			if ($alasan != '') {
				$this->db->update('surat_pindah_domisili', ['proses_surat' => $proses_surat, 'alasan_reject' => $alasan], ['id' => $id]);
			}
			
			$data_surat =  $this->db->select('*')->from('surat_pindah_domisili')->join('penduduk', 'penduduk.id=surat_pindah_domisili.id_penduduk')->where(['surat_pindah_domisili.id' => $id])->get()->row_array();

			if ($data_surat['alasan_reject'] != '') {
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => sprintf("Assalamu'alaikum Wr. Wb <br>
						Maaf Pengajuan surat anda ditolak dengan alasan <strong>%s</strong>, silakan melakukan permintaan surat kembali dengan pengisian data lebih cermat, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>", $data_surat['alasan_reject'] )
					)
				);

			}
			
		}elseif ($jenis_surat == 'Surat Keterangan Usaha') {
			if($proses_surat == 'Accepted' ){
				$this->db->update('surat_sku',  ['proses_surat' => $proses_surat, 'no_surat' => $no_surat], ['id' => $id]);
			}
			
			if ($alasan != '') {
				$this->db->update('surat_sku', ['proses_surat' => $proses_surat, 'alasan_reject' => $alasan], ['id' => $id]);
				
			}

			$data_surat =  $this->db->select('*')->from('surat_sku')->join('penduduk', 'penduduk.id=surat_sku.id_penduduk')->where(['surat_sku.id' => $id])->get()->row_array();
			if ($data_surat['alasan_reject'] != '') {					
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => sprintf("Assalamu'alaikum Wr. Wb <br>
						Maaf Pengajuan surat anda ditolak dengan alasan <strong>%s</strong>, silakan melakukan permintaan surat kembali dengan pengisian data lebih cermat, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>", $data_surat['alasan_reject'] )
					)
				);
			}
		}

		$output = array(
            "proses_permintaan_surat" => $jenis_surat,
        );
        echo json_encode($output);
	}

	private function send_email($data)
    {
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'arsipsurat6@gmail.com',  // Email gmail
            'smtp_pass'   => 'arsip123456',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
		];

		// Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('arsipsurat6@gmail.com', 'Kantor Kelurahan Gandrungmangu');

        // Email penerima
        $this->email->to($data['receiver']); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject($data['subject']);

        // Isi email
		$this->email->message($data['message']);				
		
		$this->email->send();

    }




}

?>