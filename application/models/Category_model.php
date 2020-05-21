<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{
	public function get_cat_data($cat_slug)
	{
		$this->db->select('*');
		$this->db->from('blog_category');
		$this->db->where('cat_slug',$cat_slug);
		$query = $this->db->get();
		return $query->row();
	}
	public function count_blog_posts($cat_id)
	{
		$this->db->select('*');
		$this->db->from('blog_post');
		$this->db->where('post_cat',$cat_id);
		$this->db->where('post_status',1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public  function list_blog_posts($perpage, $page, $cat_id)
	{
		$this->db->select('p.*,c.cat_name,c.cat_slug, pv.*,count(pv.view_post_id) as viewcount');
		$this->db->from('blog_post p');
		$this->db->join('blog_category c','c.cat_id = p.post_cat','left');
		$this->db->join('post_views pv','pv.view_post_id = p.post_id','left');
		if(!empty($perpage) || !empty($page)){
			$this->db->limit($perpage,$page);
		}
		$this->db->where('p.post_cat',$cat_id);
		$this->db->where('p.post_status',1);
		$this->db->order_by('post_id','desc');
		$this->db->group_by('p.post_id');
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}

	}
}
