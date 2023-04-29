<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models extends CI_Model{	
    function Get_Page($limit, $start, $table){
        $query = $this->db->get($table, $limit, $start);
        return $query;
    }
    public function Get_Where($where, $table)
	{
		$query = $this->db->get_where($table, $where);
		return $query->result();
	}
	public function Get_All($table,$select)
	{
		$select;
		$query = $this->db->get($table);
		return $query->result();
	}
	function Save($data, $table){
		$result=$this->db->insert($table, $data);
		return $result;
	}
	function Update($where, $data, $table){
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}
	function Update_All($data, $table){
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	function Delete($where, $table){
		$result=$this->db->delete($table, $where);
		return $result;
	}
	function Delete_All($table){
		$result=$this->db->delete($table);
		return $result;
	}
	public function get_user($username){
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('biodata')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }
	public function View($table){
		return $this->db->get($table);
	}

	function register($username,$password,$nama)
	{
		$data_user = array(
			'username'=>$username,
			'password'=>password_hash($password,PASSWORD_DEFAULT),
			'nama'=>$nama
		);
		$this->db->insert('biodata',$data_user);
	}

}