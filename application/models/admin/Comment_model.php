<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model
{
	public function add_comments($catData){
		$this->db->insert('comments',$catData);
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function update_comments($commentid,$status){
		$commentdata['comment_status'] = $status; 
		$this->db->where('comment_id',$commentid);
		$this->db->update('comments',$commentdata);
		if($this->db->affected_rows()>0){
			return true;
		}
	}
	public function list_comments($perpage, $page,$searchdata,$catid)
	{
		
		$this->db->select('bp.*,cm.*');
		$this->db->from('comments cm');
		$this->db->join('blog_post bp','cm.comment_post_id = bp.post_id','left');
		if($searchdata){
			if($searchdata['comment_text']!=''){
				$this->db->like('cm.comment_text',$searchdata['comment_text']);
			}
			if($searchdata['comment_email'] != ''){
				$this->db->where('cm.comment_email',$searchdata['comment_email']);
			}
			if($searchdata['comment_status'] != ''){
				$this->db->where('cm.comment_status',$searchdata['comment_status']);
			}
			if($searchdata['comment_created_from'] !='' && $searchdata['comment_created_to'] !=''){
				$this->db->where("date(cm.comment_posted_at) >=",$searchdata['comment_created_from']);
				$this->db->where("date(cm.comment_posted_at) <=",$searchdata['comment_created_to']);
			}
			elseif($searchdata['comment_created_from']!=''){
				$this->db->where('date(cm.comment_posted_at)',$searchdata['comment_created_from']);
			}elseif($searchdata['comment_created_to']!=''){
				$this->db->where('date(cm.comment_posted_at)',$searchdata['comment_created_to']);
			}
		}
		if($catid){
			$this->db->where('post_id',$catid);
		}
		if(!empty($perpage) || !empty($page)){
			$this->db->limit($perpage,$page);
		}
		$this->db->order_by('cm.comment_id','desc');
		$query=$this->db->get();
		/*echo $this->db->last_query();
		die;*/
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}	
	public function count_comments($perpage,$page,$searchdata)
	{
		$this->db->select('*');
		$this->db->from('comments');
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
