<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library(['template']);
			$this->load->helper(['url','form']);
			$this->load->library(['form_validation','email','pagination']);
			$this->load->model(['category_model','blog_model']);
	}
	public function index($cat_slug='')
	{
		if (!$cat_slug)
			{				// redirect them to the login page
				redirect(base_url(), 'refresh');
				exit();
			}
		$cat_obj=$this->category_model->get_cat_data($cat_slug); 
		$cat_id = $cat_obj->cat_id;
	    $config = array();
        $config["base_url"] = base_url().'category/'.$cat_slug;
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config["total_rows"] = $this->category_model->count_blog_posts($cat_id);
        $this->pagination->initialize($config);
        $data['cat_data'] = $cat_obj;
        $data["links"] = $this->pagination->create_links();
		$data['list_blog_posts'] = $this->category_model->list_blog_posts($config["per_page"], $page, $cat_id);
		$this->template->load('front/layout/common','front/blog-category',$data);
	}
}