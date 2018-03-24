<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
	public function get($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function get_all()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}
}