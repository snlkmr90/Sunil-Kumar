<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	public function get_post_data($postslug){
		$this->db->select('p.*,c.*');
		$this->db->from('blog_post p');
		$this->db->join('blog_category c','c.cat_id = p.post_cat');
		$this->db->order_by('p.post_id','desc');
		$this->db->where('p.post_slug',$postslug);
		$this->db->where('p.post_status',1);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->row();
		}
	}
	public function get_prev_post($postid){
		$prevpost =  $postid-1;
		$this->db->select('post_name,post_slug,post_feat_img');
		$this->db->from('blog_post');
		$this->db->where('post_id',$prevpost);
		$this->db->where('post_status',1);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->row();
		}else{
			$query=$this->db->query("SELECT post_name,post_slug,post_feat_img FROM  blog_post WHERE post_id =(select max(post_id) from blog_post) and post_status='1'");
			return $query->row();
		}	
	}
	public function get_next_post($postid){
		$nextpost =  $postid+1;
		$this->db->select('post_name,post_slug,post_feat_img');
		$this->db->from('blog_post');
		$this->db->where('post_id',$nextpost);
		$this->db->where('post_status',1);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->row();
		}else
		{
			$query=$this->db->query("SELECT post_name,post_slug,post_feat_img FROM  blog_post WHERE post_id =(select min(post_id) from blog_post) and post_status='1'");
			return $query->row();
		}	
	}
	public function post_you_may_like($post_id)
	{
		$this->db->select('p.post_name,p.post_slug,p.post_feat_img,p.post_created_at,c.cat_slug,c.cat_name');
		$this->db->from('blog_post p');
		$this->db->join('blog_category c','c.cat_id = p.post_cat');
		$this->db->where('p.post_id!=',$post_id);
		$this->db->where('p.post_status',1);
		$this->db->limit(2);
		$this->db->order_by('p.post_id','DESC');
		$query=$this->db->get();
		return $query->result();
	}
	public function get_comments($post_id){
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->order_by('comment_id','desc');
		$this->db->where('comment_status',1);
		$this->db->where('comment_post_id',$post_id);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	public function get_comment_count($post_id){
		$this->db->select('count(comment_id) as totalcomments');
		$this->db->from('comments');
		$this->db->where('comment_status',1);
		$this->db->where('comment_post_id',$post_id);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->row();
		}	
	}		
	public function checkviewexist($ip,$postid)
	{
		$this->db->select('view_ip_addr');
		$this->db->from('post_views');
		$this->db->where('view_ip_addr',$ip);
		$this->db->where('view_post_id',$postid);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function save_view($viewdata){
		$this->db->insert('post_views',$viewdata);
	}
	public function get_views_count($post_id){
		$this->db->select('count(view_post_id) as totalviews');
		$this->db->from('post_views');
		$this->db->where('view_post_id',$post_id);
		$query=$this->db->get();
		/*echo $this->db->last_query();
		die;*/
		return $query->num_rows();	
	}
}
