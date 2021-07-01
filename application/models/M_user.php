<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

	public function login($user,$pw)
	{
		$this->db->where('username', $user);
		$this->db->where('password', $pw);
		$query = $this->db->get('users');
		return $query;
	}

	public function get($id = null){
		$this->db->from('users');
		if($id != null){

			$this->db->where('id', $id);

		}
		$query = $this->db->get();
		return $query;

	}
	public function add($post){

		$params['name'] = $post['name'];
		$params['username'] = $post['username'];
		$params['password'] = sha1($post['password']);
		$params['address'] = $post['address'];
		$params['level'] = $post['level'];


		$this->db->insert('users', $params);
	}

	public function edit($post){

		$params['name'] = $post['name'];
		$params['username'] = $post['username'];
		if(!empty($post['password'])){
			$params['password'] = sha1($post['password']);
		}
		
		$params['address'] = $post['address'];
		$params['level'] = $post['level'];
		$this->db->where('id', $post['id']);
		$this->db->update('users', $params);
	}

	public function del($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}

	public function deleteData($table,$where){

        $this->db->delete($table,$where);
    }


}
?>