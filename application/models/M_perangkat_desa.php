<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perangkat_desa extends CI_Model{

	public function login($user,$pw)
	{
		$this->db->where('username', $user);
		$this->db->where('password', $pw);
		$query = $this->db->get('users');
		return $query;
	}

	public function get($id = null){
		$this->db->from('perangkat_desa');
		if($id != null){

			$this->db->where('id', $id);

		}
		$query = $this->db->get();
		return $query;

	}
	public function add($post){

		$params['nama'] = $post['nama'];
		$params['nik'] = $post['nik'];
		$params['jabatan'] = $post['jabatan'];
		$params['divisi'] = $post['divisi'];
		$params['status'] = $post['status'];


		$this->db->insert('perangkat_desa', $params);
	}

	public function edit($post){

		$params['nama'] = $post['nama'];
		$params['nik'] = $post['nik'];
		$params['jabatan'] = $post['jabatan'];
		$params['divisi'] = $post['divisi'];
		$params['status'] = $post['status'];

		$this->db->where('id', $post['id']);
		$this->db->update('perangkat_desa', $params);
	}


	public function deleteData($table,$where){
		
        $this->db->delete($table,$where);
    }



}
?>