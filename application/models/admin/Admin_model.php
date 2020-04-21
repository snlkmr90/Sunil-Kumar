<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function adminLogin($email,$password){
		$query = $this->db->select('email as admin_email,id as admin_id,username as admin_username')
		->from('users')
		->where('email',$email)
		->where('password',$password)
		->where('id','1')
		->get();
		if($query->num_rows()>0){
			return $query->row();
		}
	}	
}
