<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library('template');
			$this->load->helper(['url','form','ckeditor_helper']);
			$this->load->library(['form_validation','pagination','CKEditor','CKFinder']);
			$this->load->model(['admin/post_model']);
			if (!$this->session->userdata('admin_id') && $this->uri->segment(1) != 'adminaccess')
			{
				// redirect them to the login page
				redirect('adminaccess', 'refresh');
				exit();
			}

	}
	public function list_post()
	{
		$config = array();
		$searchdata = array();
		if($this->input->post('filtercat')!=null){
			$searchdata['post_name'] = trim($this->input->post('post_name',TRUE));
			$searchdata['post_status'] = trim($this->input->post('post_status',TRUE));
			$searchdata['post_created_from'] = trim($this->input->post('post_created_from',TRUE));
			$searchdata['post_created_to'] = trim($this->input->post('post_created_to',TRUE));
			$this->session->set_userdata('admin_post_filter',$searchdata);
			$data['admin_post_filter'] =  $this->session->userdata('admin_post_filter');
		}
        $config["base_url"] = base_url() . "post/list-post";
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
        $config["total_rows"] = $this->post_model->count_post($config["per_page"], $page,$searchdata);
        $this->pagination->initialize($config);
        /*var_dump($config);
        die;*/
        $data["links"] = $this->pagination->create_links();
		$data['posts'] = $this->post_model->list_post($config["per_page"], $page,$searchdata,null);
		$this->template->load('admin/layout/common','admin/post/list-post',$data);
	}
	public function resetpostFilter(){
		$this->session->unset_userdata('admin_post_filter');
		redirect(base_url().'post/list-post','refresh');
	}
	public function add_post()
	{
		$this->ckfinder->SetupCKEditor($this->ckeditor,'assets/ckfinder/');
		//Ckeditor's configuration
		$this->data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'postdesc',
			'path'	=>	'assets/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"100%",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
 
			)
			
		);

		$this->form_validation->set_rules('post_name', 'post name', 'trim|required');
		if ($this->form_validation->run() === FALSE) {
			$this->template->load('admin/layout/common','admin/post/add-post',$this->data);
		} else {
			
			    $catData['post_name'] = $this->input->post('post_name',TRUE);
			    $delimiter ='-';
			    $catData['post_slug'] = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $catData['post_name']))))), $delimiter));
			    $catData['post_description'] = $this->input->post('post_description',TRUE);
			    $catData['post_meta_title'] = $this->input->post('post_meta_title',TRUE);
			    $catData['post_keyword'] = $this->input->post('post_keyword',TRUE);
			    $catData['post_meta_desc'] = $this->input->post('post_meta_desc',TRUE);
			    $catData['post_status'] = $this->input->post('post_status',TRUE);
				$catData['post_created_at'] = date('Y-m-d H:i:s');
			    $insertstatus = $this->post_model->add_post($catData);
			    if($insertstatus){
			    	$this->session->set_flashdata('post_add_success', 'post Added Successfully');
			    	redirect(base_url().'post/list-post');
			    }

		}
		
	}
	public function edit_post($postid)
	{ 
		$this->ckfinder->SetupCKEditor($this->ckeditor,'/assets/ckfinder/');
		//Ckeditor's configuration
		$data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'editpostdesc',
			'path'	=>	'assets/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"100%",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
 
			)
			
		);
		$data['posts'] = $this->post_model->list_post($config["per_page"]=null, $page=null,$searchdata=null,$postid);
		$data['post_id'] = $postid;
		$this->form_validation->set_rules('post_name', 'post name', 'trim|required');
		if ($this->form_validation->run() === FALSE) 
		{
			$this->template->load('admin/layout/common','admin/post/edit-post',$data);
		} 
		else 
		{
			    $catData['post_name'] = $this->input->post('post_name',TRUE);
			    $delimiter ='-';
			    $catData['post_slug'] = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $catData['post_name']))))), $delimiter));
			    $catData['post_description'] = $this->input->post('post_description',TRUE);
			    $catData['post_meta_title'] = $this->input->post('post_meta_title',TRUE);
			    $catData['post_keyword'] = $this->input->post('post_keyword',TRUE);
			    $catData['post_meta_desc'] = $this->input->post('post_meta_desc',TRUE);
			    $catData['post_status'] = $this->input->post('post_status',TRUE);
				$catData['post_updated_at'] = date('Y-m-d H:i:s');
				$updatestatus = $this->post_model->edit_post($catData,$postid);
			    if($updatestatus){
			    	$this->session->set_flashdata('post_update_success', 'post Updated Successfully');
			    	redirect(base_url()."post/edit-post/$postid");
			    }
		}
	}
}