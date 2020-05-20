<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{
	public function add_category($catData){
		$this->db->insert('blog_category',$catData);
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function edit_category($catData,$catid){
		$this->db->where('cat_id',$catid);
		$this->db->update('blog_category',$catData);
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function list_category($perpage, $page,$searchdata,$catid)
	{
		
		$this->db->select('*');
		$this->db->from('blog_category');
		if($searchdata){
			if($searchdata['cat_name']!=''){
				$this->db->like('cat_name',$searchdata['cat_name']);
			}
			if($searchdata['cat_status'] != ''){
				$this->db->where('cat_status',$searchdata['cat_status']);
			}
			if($searchdata['cat_created_from'] !='' && $searchdata['cat_created_to'] !=''){
				$this->db->where("cat_created_at >=",$searchdata['cat_created_from']);
				$this->db->where("cat_created_at <=",$searchdata['cat_created_to']);
			}
			elseif($searchdata['cat_created_from']!=''){
				$this->db->where('cat_created_at',$searchdata['cat_created_from']);
			}elseif($searchdata['cat_created_to']!=''){
				$this->db->where('cat_created_at',$searchdata['cat_created_to']);
			}
		}
		if($catid){
			$this->db->where('cat_id',$catid);
		}
		if(!empty($perpage) || !empty($page)){
			$this->db->limit($perpage,$page);
		}
		$this->db->order_by('cat_id','desc');
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}	
	public function count_category($perpage,$page,$searchdata)
	{
		$this->db->select('*');
		$this->db->from('blog_category');
		if($searchdata){
			if(!empty($searchdata['cat_name'])){
				$this->db->like('cat_name',$searchdata['cat_name']);
			}
			if(!empty($searchdata['cat_status'])){
				$this->db->where('cat_status',$searchdata['cat_status']);
			}
			if(!empty($searchdata['cat_created_from']) && !empty($searchdata['cat_created_to'])){
				$this->db->where("cat_created_at >=",$searchdata['cat_created_from']);
				$this->db->where("cat_created_at <=",$searchdata['cat_created_to']);
			}
			elseif(!empty($searchdata['cat_created_from'])){
				$this->db->where('cat_created_at',$searchdata['cat_created_from']);
			}elseif(!empty($searchdata['cat_created_to'])){
				$this->db->where('cat_created_at',$searchdata['cat_created_to']);
			}
		}

		$query=$this->db->get();
			return $query->num_rows();
	}
}
