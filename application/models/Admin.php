<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function login($email,$password){
		$this->db->where('email',$email)->where('password',$password)->get('users');
	}	
}
