<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function get_featured_posts(){
		$this->db->select('p.*,c.cat_name,c.cat_slug');
		$this->db->from('blog_post p');
		$this->db->join('blog_category c','c.cat_id = p.post_cat');
		$this->db->order_by('p.post_id','desc');
		$this->db->where('p.post_featured',1);
		$this->db->where('p.post_status',1);
		$this->db->limit('4');
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	public function count_blog_posts()
	{
		$this->db->select('*');
		$this->db->from('blog_post');
		$this->db->where('post_status',1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public  function list_blog_posts($perpage, $page)
	{
		$this->db->select('p.*,c.cat_name,c.cat_slug, pv.*,count(pv.view_post_id) as viewcount');
		$this->db->from('blog_post p');
		$this->db->join('blog_category c','c.cat_id = p.post_cat','left');
		$this->db->join('post_views pv','pv.view_post_id = p.post_id','left');
		if(!empty($perpage) || !empty($page)){
			$this->db->limit($perpage,$page);
		}
		$this->db->where('p.post_status',1);
		$this->db->order_by('post_id','desc');
		$this->db->group_by('p.post_id');
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}

	}
	public function postcomment($commentdata)
	{
		$this->db->insert('comments',$commentdata);
		if($this->db->affected_rows()> 0){
			return true;
		}
	}
	public function get_header_category(){
		$this->db->select('bc.cat_slug,bc.cat_name,(bp.post_cat) as totalcatposts');
		$this->db->from('blog_category bc');
		$this->db->join('blog_post bp','bp.post_cat =bc.cat_id');
		$this->db->order_by('bc.cat_name','ASC');
		$this->db->group_by('bc.cat_id');
		$query= $this->db->get();
		if($query->num_rows()>0)
		{
		return $query->result();
		}
	}
	public function get_footer_category(){
		$this->db->select('bc.cat_slug,bc.cat_name,(bp.post_cat) as totalcatposts');
		$this->db->from('blog_category bc');
		$this->db->join('blog_post bp','bp.post_cat =bc.cat_id');
		$this->db->order_by('totalcatposts','DESC');
		$this->db->group_by('bc.cat_id');
		$this->db->limit(6);
		$query= $this->db->get();
		if($query->num_rows()>0)
		{
		return $query->result();
		}
	}
}
