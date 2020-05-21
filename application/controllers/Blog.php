<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library(['template']);
			$this->load->helper(['url','form']);
			$this->load->library(['form_validation','email','pagination']);
			$this->load->model(['blog_model']);
	}
	public function index($postslug)
	{
		$data['get_post_data']=$this->blog_model->get_post_data($postslug);
		$post_id = $data['get_post_data']->post_id;

		$viewdata['view_post_id'] = $post_id;
		$viewdata['view_ip_addr'] = $this->input->ip_address();
		$viewdata['view_date'] = date('Y-m-d H:i:s');
		$checkviewexist = $this->blog_model->checkviewexist($viewdata['view_ip_addr'],$post_id); 
		if($checkviewexist<1){
			$this->blog_model->save_view($viewdata);
		}
		$data['get_prev_post']=$this->blog_model->get_prev_post($post_id);
		$data['get_next_post']=$this->blog_model->get_next_post($post_id);
		$data['post_you_may_likes']=$this->blog_model->post_you_may_like($post_id);
		$data['comments']=$this->blog_model->get_comments($post_id);
		$data['comment_count']=$this->blog_model->get_comment_count($post_id);
		$data['view_count']=$this->blog_model->get_views_count($post_id);
		
		$this->template->load('front/layout/common','front/blog-single',$data);
	}
	public function category($cat_slug)
	{
		$this->template->load('front/layout/common','front/blog-category');	
	} 
}