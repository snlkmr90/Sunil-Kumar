<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model
{
	public function add_contact($catData){
		$this->db->insert('comments',$catData);
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function delete_contact($contactid){ 
		$this->db->where('contact_id',$contactid);
		$this->db->delete('contacts');
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function list_contact($perpage, $page,$searchdata,$contactid)
	{
		
		$this->db->select('*');
		$this->db->from('contacts');
		if($searchdata){
			if($searchdata['contact_name']!=''){
				$this->db->like('contact_name',$searchdata['contact_name']);
			}
			if($searchdata['contact_email'] != ''){
				$this->db->where('contact_email',$searchdata['contact_email']);
			}
			if($searchdata['contact_phone'] != ''){
				$this->db->where('contact_phone',$searchdata['contact_phone']);
			}
			if($searchdata['contact_created_from'] !='' && $searchdata['contact_created_to'] !=''){
				$this->db->where("date(contact_recieved_at) >=",$searchdata['contact_created_from']);
				$this->db->where("date(contact_recieved_at) <=",$searchdata['contact_created_to']);
			}
			elseif($searchdata['contact_created_from']!=''){
				$this->db->where('date(contact_recieved_at)',$searchdata['contact_created_from']);
			}elseif($searchdata['contact_created_to']!=''){
				$this->db->where('date(contact_recieved_at)',$searchdata['contact_created_to']);
			}
		}
		if(!empty($perpage) || !empty($page)){
			$this->db->limit($perpage,$page);
		}
		if(!empty($contactid)){
			$this->db->where('contact_id',$contactid);
		}
		$this->db->order_by('contact_id','desc');
		$query=$this->db->get();
		/*echo $this->db->last_query();
		die;*/
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}	
	public function count_contact($perpage,$page,$searchdata)
	{
		$this->db->select('*');
		$this->db->from('contacts');
		if($searchdata){
			if($searchdata['contact_name']!=''){
				$this->db->like('contact_name',$searchdata['contact_name']);
			}
			if($searchdata['contact_email'] != ''){
				$this->db->where('contact_email',$searchdata['contact_email']);
			}
			if($searchdata['contact_phone'] != ''){
				$this->db->where('contact_phone',$searchdata['contact_phone']);
			}
			if($searchdata['contact_created_from'] !='' && $searchdata['contact_created_to'] !=''){
				$this->db->where("date(contact_recieved_at) >=",$searchdata['contact_created_from']);
				$this->db->where("date(contact_recieved_at) <=",$searchdata['contact_created_to']);
			}
			elseif($searchdata['contact_created_from']!=''){
				$this->db->where('date(contact_recieved_at)',$searchdata['contact_created_from']);
			}elseif($searchdata['contact_created_to']!=''){
				$this->db->where('date(contact_recieved_at)',$searchdata['contact_created_to']);
			}
		}

		$query=$this->db->get();
			return $query->num_rows();
	}
}
