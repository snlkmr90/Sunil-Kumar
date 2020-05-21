<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library(['template']);
			$this->load->helper(['url','form']);
			$this->load->library(['form_validation','email','pagination']);
			$this->load->model(['home_model']);
	}
	public function index()
	{
		$config = array();
        $config["base_url"] = base_url();
        $config["per_page"] = 10;
        $config["uri_segment"] = 1;
        $config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
        $page = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
        $config["total_rows"] = $this->home_model->count_blog_posts($config["per_page"], $page);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
		$data['list_blog_posts'] = $this->home_model->list_blog_posts($config["per_page"], $page);
		$data['featured_posts']=$this->home_model->get_featured_posts();
		$this->template->load('front/layout/common','front/home',$data);
	}
	public function postcomment()
	{
			$commentpost['success'] = 'false';
			$commentdata['comment_post_id'] = $this->input->post('postid');
			$commentdata['comment_website'] = $this->input->post('commentwebsite');
			$commentdata['comment_name'] =  $this->input->post('commentname');
			$commentdata['comment_email']   =  $this->input->post('commentemail');
			$commentdata['comment_text']    = $this->input->post('commenttext');
			$commentdata['comment_posted_at']    = date('Y-m-d H:i:s');
			$postcomment = $this->home_model->postcomment($commentdata);
			if($postcomment)
			{
				$commentpost['success'] = 'true';
			}
			echo json_encode($commentpost);
	}
}