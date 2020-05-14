<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function adminLogin($email,$password)
	{
		$query = $this->db->select('email,id,username')
		->from('users')
		->where('email',$email)
		->where('password',$password)
		->where('id','1')
		->get();
		if($query->num_rows()>0)
		{
			return $query->row();
		}
	}	
	public function checkMailExist($email)
	{
		$query = $this->db->select('*')
		->from('users')
		->where('email',$email)
		->where('id','1')
		->get();
		if($query->num_rows()>0){
			return true;
		}
	}
	public function resetAdminPassword($email,$pass){
		$emailArr = ['password'=>$pass];
		$this->db->update('users',$emailArr);
		if($this->db->affected_rows()>0)
		{
			return true;
		}
	}
}
