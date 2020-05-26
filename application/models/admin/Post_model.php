<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model
{
	public function add_post($catData){
		$this->db->insert('blog_post',$catData);
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function edit_post($catData,$catid){
		$this->db->where('post_id',$catid);
		$this->db->update('blog_post',$catData);
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function list_post($perpage, $page,$searchdata,$catid)
	{
		
		$this->db->select('p.*,c.cat_name');
		$this->db->from('blog_post p');
		$this->db->join('blog_category c','c.cat_id = p.post_cat');
		if($searchdata){
			if($searchdata['post_name']!=''){
				$this->db->like('post_name',$searchdata['post_name']);
			}
			if($searchdata['post_cat'] != ''){
				$this->db->where('post_cat',$searchdata['post_cat']);
			}
			if($searchdata['post_featured'] != ''){
				$this->db->where('post_featured',$searchdata['post_featured']);
			}
			if($searchdata['post_status'] != ''){
				$this->db->where('post_status',$searchdata['post_status']);
			}
			if($searchdata['post_created_from'] !='' && $searchdata['post_created_to'] !=''){
				$this->db->where("post_created_at >=",$searchdata['post_created_from']);
				$this->db->where("post_created_at <=",$searchdata['post_created_to']);
			}
			elseif($searchdata['post_created_from']!=''){
				$this->db->where('post_created_at',$searchdata['post_created_from']);
			}elseif($searchdata['post_created_to']!=''){
				$this->db->where('post_created_at',$searchdata['post_created_to']);
			}
		}
		if($catid){
			$this->db->where('post_id',$catid);
		}
		if(!empty($perpage) || !empty($page)){
			$this->db->limit($perpage,$page);
		}
		$this->db->order_by('post_id','desc');
		$query=$this->db->get();
		/*echo $this->db->last_query();
		die;*/
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}	
	public function count_post($perpage,$page,$searchdata)
	{
		$this->db->select('*');
		$this->db->from('blog_post');
		if($searchdata){
			if(!empty($searchdata['post_name'])){
				$this->db->like('post_name',$searchdata['post_name']);
			}
			if(!empty($searchdata['post_status'])){
				$this->db->where('post_status',$searchdata['post_status']);
			}
			if(!empty($searchdata['post_created_from']) && !empty($searchdata['post_created_to'])){
				$this->db->where("post_created_at >=",$searchdata['post_created_from']);
				$this->db->where("post_created_at <=",$searchdata['post_created_to']);
			}
			elseif(!empty($searchdata['post_created_from'])){
				$this->db->where('post_created_at',$searchdata['post_created_from']);
			}elseif(!empty($searchdata['post_created_to'])){
				$this->db->where('post_created_at',$searchdata['post_created_to']);
			}
		}

		$query=$this->db->get();
			return $query->num_rows();
	}
}
