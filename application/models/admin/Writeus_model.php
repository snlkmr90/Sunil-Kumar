<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Writeus_model extends CI_Model
{
	public function add_writeus($catData){
		$this->db->insert('writeus',$catData);
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function delete_writeus($contactid){ 
		$this->db->where('writeus_id',$contactid);
		$this->db->delete('writeus');
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function list_writeus($perpage, $page,$searchdata,$contactid)
	{
		
		$this->db->select('*');
		$this->db->from('writeus');
		if($searchdata){
			if($searchdata['writeus_name']!=''){
				$this->db->like('writeus_name',$searchdata['writeus_name']);
			}
			if($searchdata['writeus_email'] != ''){
				$this->db->where('writeus_email',$searchdata['writeus_email']);
			}
			if($searchdata['writeus_phone'] != ''){
				$this->db->where('writeus_phone',$searchdata['writeus_phone']);
			}
			if($searchdata['writeus_created_from'] !='' && $searchdata['writeus_created_to'] !=''){
				$this->db->where("date(writeus_recieved_at) >=",$searchdata['writeus_created_from']);
				$this->db->where("date(writeus_recieved_at) <=",$searchdata['writeus_created_to']);
			}
			elseif($searchdata['writeus_created_from']!=''){
				$this->db->where('date(writeus_recieved_at)',$searchdata['writeus_created_from']);
			}elseif($searchdata['writeus_created_to']!=''){
				$this->db->where('date(writeus_recieved_at)',$searchdata['writeus_created_to']);
			}
		}
		if(!empty($perpage) || !empty($page)){
			$this->db->limit($perpage,$page);
		}
		if(!empty($contactid)){
			$this->db->where('writeus_id',$contactid);
		}
		$this->db->order_by('writeus_id','desc');
		$query=$this->db->get();
		/*echo $this->db->last_query();
		die;*/
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}	
	public function count_writeus($perpage,$page,$searchdata)
	{
		$this->db->select('*');
		$this->db->from('writeus');
		if($searchdata){
			if($searchdata['writeus_name']!=''){
				$this->db->like('writeus_name',$searchdata['writeus_name']);
			}
			if($searchdata['writeus_email'] != ''){
				$this->db->where('writeus_email',$searchdata['writeus_email']);
			}
			if($searchdata['writeus_phone'] != ''){
				$this->db->where('writeus_phone',$searchdata['writeus_phone']);
			}
			if($searchdata['writeus_created_from'] !='' && $searchdata['writeus_created_to'] !=''){
				$this->db->where("date(writeus_recieved_at) >=",$searchdata['writeus_created_from']);
				$this->db->where("date(writeus_recieved_at) <=",$searchdata['writeus_created_to']);
			}
			elseif($searchdata['writeus_created_from']!=''){
				$this->db->where('date(writeus_recieved_at)',$searchdata['writeus_created_from']);
			}elseif($searchdata['writeus_created_to']!=''){
				$this->db->where('date(writeus_recieved_at)',$searchdata['writeus_created_to']);
			}
		}

		$query=$this->db->get();
			return $query->num_rows();
	}
}
