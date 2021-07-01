<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('m_masuk');
		//$this->load->helper(array('url','download'));  
		check_not_login();
		$this->load->library('form_validation');


	}

	public function index()
	{   

	$data = [
			//'row' => $this->m_masuk->get(),
			'title' => "Surat Masuk"
			
		];

		//$data['row'] = $this->m_masuk->get();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('eksternal_surat/s_warga', $data);
		$this->load->view('template_admin/footer', $data);
	}

	public function s_keterangan()
	{   

		$jenis_surat = $this->uri->segment(4);
		$id_surat = $this->uri->segment(5);

		$data_surat =  $this->db->get_where('penduduk', ['id' => $id_surat])->row_array();

		if ($jenis_surat == 'Surat_Kelahiran') {
			$data_surat =  $this->db->select('*')->from('surat_kelahiran')->join('penduduk', 'penduduk.id=surat_kelahiran.id_penduduk')->where(['surat_kelahiran.id' => $id_surat])->get()->row_array();
			
		}elseif ($jenis_surat == 'Surat_Keterangan_Usaha') {
			$data_surat =  $this->db->select('*')->from('surat_sku')->join('penduduk', 'penduduk.id=surat_sku.id_penduduk')->where(['surat_sku.id' => $id_surat])->get()->row_array();

		}elseif ($jenis_surat == 'Surat_Kematian') {
			$data_surat =  $this->db->select('*')->from('surat_kematian')->join('penduduk', 'penduduk.id=surat_kematian.id_penduduk')->where(['surat_kematian.id' => $id_surat])->get()->row_array();

		}elseif ($jenis_surat == 'Surat_Nikah') {
			$data_surat =  $this->db->select('*')->from('surat_nikah')->join('penduduk', 'penduduk.id=surat_nikah.id_penduduk')->where(['surat_nikah.id' => $id_surat])->get()->row_array();

		}elseif ($jenis_surat == 'Surat_Pindah_Daerah') {
			$data_surat =  $this->db->select('*')->from('surat_pindah_domisili')->join('penduduk', 'penduduk.id=surat_pindah_domisili.id_penduduk')->where(['surat_pindah_domisili.id' => $id_surat])->get()->row_array();

		}

		
		
		$data = [
				'data_surat' => $data_surat,
				'title' => "Surat Keluar"
				
			];
		
		
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('eksternal_surat/s_keterangan', $data);		
		$this->load->view('template_admin/footer', $data);
	}

	public function s_pernyataan()
	{   

	$data = [
			//'row' => $this->m_masuk->get(),
			'title' => "Surat Masuk"
			
		];

		//$data['row'] = $this->m_masuk->get();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('eksternal_surat/s_pernyataan', $data);
		$this->load->view('template_admin/footer', $data);
	}

	public function s_undangan()
	{   

	$data = [
			//'row' => $this->m_masuk->get(),
			'title' => "Surat Masuk"
			
		];

		//$data['row'] = $this->m_masuk->get();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('eksternal_surat/s_undangan', $data);
		$this->load->view('template_admin/footer', $data);
	}

	public function cetak_pdf(){
		$id_surat = $this->input->post('id_surat');
		$jenis_surat = $this->input->post('jenis_surat');
		$ttd = explode("%",$this->input->post('ttd'));
		$template_surat = null;
		$nama_ttd = $ttd[0];
		$jabatan_ttd = $ttd[1];

		$proses_surat = 'Finish';
		
		$data_surat = null;
		if ($jenis_surat == 'Surat_Kelahiran') {
			$template_surat = "print/surat_kelahiran.php";
			$data_surat =  $this->db->select('*')->from('surat_kelahiran')->join('penduduk', 'penduduk.id=surat_kelahiran.id_penduduk')->where(['surat_kelahiran.id' => $id_surat])->get()->row_array();
			if ($data_surat['proses_surat'] != $proses_surat){
				$this->db->update('surat_kelahiran',  ['proses_surat' => $proses_surat, 'jabatan_ttd' => $jabatan_ttd, 'nama_ttd' => $nama_ttd], ['id' => $id_surat]);
			}

			// send email
			if ($data_surat['send_notif'] == 0) {
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => "Assalamu'alaikum Wr. Wb <br>
						Pengajuan surat anda telah disetujui dan telah dicetak, silakan mengambilnya di Kelurahan Gandrungmangu, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>" 
					)
				);
	
				// update send_notif
				$this->db->update('surat_kelahiran',  ['send_notif' => 1], ['id' => $id_surat]);
			}
			
		}elseif ($jenis_surat == 'Surat_Keterangan_Usaha') {
			$template_surat = "print/surat_sku.php";
			$data_surat =  $this->db->select('*')->from('surat_sku')->join('penduduk', 'penduduk.id=surat_sku.id_penduduk')->where(['surat_sku.id' => $id_surat])->get()->row_array();
			if ($data_surat['proses_surat'] != $proses_surat){
				$this->db->update('surat_sku',  ['proses_surat' => $proses_surat, 'jabatan_ttd' => $jabatan_ttd, 'nama_ttd' => $nama_ttd], ['id' => $id_surat]);
			}

			// send email
			if ($data_surat['send_notif'] == 0) {
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => "Assalamu'alaikum Wr. Wb <br>
						Pengajuan surat anda telah disetujui dan telah dicetak, silakan mengambilnya di Kelurahan Gandrungmangu, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>" 
					)
				);
	
				// update send_notif
				$this->db->update('surat_sku',  ['send_notif' => 1], ['id' => $id_surat]);
			}
			
		}elseif ($jenis_surat == 'Surat_Kematian') {
			$template_surat = "print/surat_kematian.php";
			$data_surat =  $this->db->select('*')->from('surat_kematian')->join('penduduk', 'penduduk.id=surat_kematian.id_penduduk')->where(['surat_kematian.id' => $id_surat])->get()->row_array();
			if ($data_surat['proses_surat'] != $proses_surat){
				$this->db->update('surat_kematian',  ['proses_surat' => $proses_surat, 'jabatan_ttd' => $jabatan_ttd, 'nama_ttd' => $nama_ttd], ['id' => $id_surat]);
			}

			// send email
			if ($data_surat['send_notif'] == 0) {
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => "Assalamu'alaikum Wr. Wb <br>
						Pengajuan surat anda telah disetujui dan telah dicetak, silakan mengambilnya di Kelurahan Gandrungmangu, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>" 
					)
				);
	
				// update send_notif
				$this->db->update('surat_kematian',  ['send_notif' => 1], ['id' => $id_surat]);
			}
			
		}elseif ($jenis_surat == 'Surat_Nikah') {
			$template_surat = "print/surat_nikah.php";
			$data_surat =  $this->db->select('*')->from('surat_nikah')->join('penduduk', 'penduduk.id=surat_nikah.id_penduduk')->where(['surat_nikah.id' => $id_surat])->get()->row_array();
			if ($data_surat['proses_surat'] != $proses_surat){
				$this->db->update('surat_nikah',  ['proses_surat' => $proses_surat, 'jabatan_ttd' => $jabatan_ttd, 'nama_ttd' => $nama_ttd], ['id' => $id_surat]);
			}

			// send email
			if ($data_surat['send_notif'] == 0) {
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => "Assalamu'alaikum Wr. Wb <br>
						Pengajuan surat anda telah disetujui dan telah dicetak, silakan mengambilnya di Kelurahan Gandrungmangu, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>" 
					)
				);
	
				// update send_notif
				$this->db->update('surat_nikah',  ['send_notif' => 1], ['id' => $id_surat]);
			}
			
		}elseif ($jenis_surat == 'Surat_Pindah_Daerah') {
			$template_surat = "print/surat_pindah_daerah.php";
			$data_surat =  $this->db->select('*')->from('surat_pindah_domisili')->join('penduduk', 'penduduk.id=surat_pindah_domisili.id_penduduk')->where(['surat_pindah_domisili.id' => $id_surat])->get()->row_array();
			if ($data_surat['proses_surat'] != $proses_surat){
				$this->db->update('surat_pindah_domisili',  ['proses_surat' => $proses_surat, 'jabatan_ttd' => $jabatan_ttd, 'nama_ttd' => $nama_ttd], ['id' => $id_surat]);
			}

			// send email
			if ($data_surat['send_notif'] == 0) {
				$this->send_email( 
					array(
						'receiver' => $data_surat['email'],
						'subject' => 'Pengajuan Surat Kelurahan Gandrungmangu',
						'message' => "Assalamu'alaikum Wr. Wb <br>
						Pengajuan surat anda telah disetujui dan telah dicetak, silakan mengambilnya di Kelurahan Gandrungmangu, Terimakasih. <br>
						<br>
						Hormat kami, <br>
						Kaur Pelayanan<br>" 
					)
				);
	
				// update send_notif
				$this->db->update('surat_pindah_domisili',  ['send_notif' => 1], ['id' => $id_surat]);
			}

		}

		$month = explode("-",$data_surat['tanggal']);
		$dateObj   = DateTime::createFromFormat('!m', $month[1]);
		$monthName = $dateObj->format('F'); // March
		$str_month = $month[1] . ' ' . $monthName . ' ' . $month[0];
		$data_surat['tanggal'] = $str_month;

		$data = [
			"data_surat" =>$data_surat,
			"nama_ttd" => $ttd[0],
			"jabatan_ttd" => $ttd[1]
		];

		
		$this->load->view($template_surat, $data);
		
	
	
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