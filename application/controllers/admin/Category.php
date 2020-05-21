<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library('template');
			$this->load->helper(['url','form']);
			$this->load->library(['form_validation','pagination']);
			$this->load->model(['admin/category_model']);
			if (!$this->session->userdata('admin_id') && $this->uri->segment(1) != 'adminaccess')
			{
				// redirect them to the login page
				redirect('adminaccess', 'refresh');
				exit();
			}

	}
	public function list_category()
	{
		$config = array();
		$searchdata = array();
		if($this->input->post('filtercat')!=null){
			$searchdata['cat_name'] = trim($this->input->post('cat_name',TRUE));
			$searchdata['cat_status'] = trim($this->input->post('cat_status',TRUE));
			$searchdata['cat_created_from'] = trim($this->input->post('cat_created_from',TRUE));
			$searchdata['cat_created_to'] = trim($this->input->post('cat_created_to',TRUE));
			$this->session->set_userdata('admin_cat_filter',$searchdata);
			$data['admin_cat_filter'] =  $this->session->userdata('admin_cat_filter');
		}
        $config["base_url"] = base_url() . "admin/category/list-category";
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
        $config["total_rows"] = $this->category_model->count_category($config["per_page"], $page,$searchdata);
        $this->pagination->initialize($config);
        /*var_dump($config);
        die;*/
        $data["links"] = $this->pagination->create_links();
		$data['categories'] = $this->category_model->list_category($config["per_page"], $page,$searchdata,null);
		$this->template->load('admin/layout/common','admin/category/list-category',$data);
	}
	public function resetCategoryFilter(){
		$this->session->unset_userdata('admin_cat_filter');
		redirect(base_url().'admin/category/list-category','refresh');
	}
	public function add_category()
	{
		$this->form_validation->set_rules('cat_name', 'category name', 'trim|required');
		if ($this->form_validation->run() === FALSE) {
			$this->template->load('admin/layout/common','admin/category/add-category');
		} else {
			
			    $catData['cat_name'] = $this->input->post('cat_name',TRUE);
			    $delimiter ='-';
			    $catData['cat_slug'] = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $catData['cat_name']))))), $delimiter));
			    $catData['cat_description'] = $this->input->post('cat_description',TRUE);
			    $catData['cat_meta_title'] = $this->input->post('cat_meta_title',TRUE);
			    $catData['cat_keyword'] = $this->input->post('cat_keyword',TRUE);
			    $catData['cat_meta_desc'] = $this->input->post('cat_meta_desc',TRUE);
			    $catData['cat_status'] = $this->input->post('cat_status',TRUE);
				$catData['cat_created_at'] = date('Y-m-d H:i:s');
			    $insertstatus = $this->category_model->add_category($catData);
			    if($insertstatus){
			    	$this->session->set_flashdata('cat_add_success', 'Category Added Successfully');
			    	redirect(base_url().'admin/category/list-category');
			    }

		}
		
	}
	public function edit_category($catid)
	{ 
		$data['categories'] = $this->category_model->list_category($config["per_page"]=null, $page=null,$searchdata=null,$catid);
		$data['cat_id'] = $catid;
		$this->form_validation->set_rules('cat_name', 'category name', 'trim|required');
		if ($this->form_validation->run() === FALSE) 
		{
			$this->template->load('admin/layout/common','admin/category/edit-category',$data);
		} 
		else 
		{
			    $catData['cat_name'] = $this->input->post('cat_name',TRUE);
			    $delimiter ='-';
			    $catData['cat_slug'] = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $catData['cat_name']))))), $delimiter));
			    $catData['cat_description'] = $this->input->post('cat_description',TRUE);
			    $catData['cat_meta_title'] = $this->input->post('cat_meta_title',TRUE);
			    $catData['cat_keyword'] = $this->input->post('cat_keyword',TRUE);
			    $catData['cat_meta_desc'] = $this->input->post('cat_meta_desc',TRUE);
			    $catData['cat_status'] = $this->input->post('cat_status',TRUE);
				$catData['cat_updated_at'] = date('Y-m-d H:i:s');
				$updatestatus = $this->category_model->edit_category($catData,$catid);
			    if($updatestatus){
			    	$this->session->set_flashdata('cat_update_success', 'Category Updated Successfully');
			    	redirect(base_url()."admin/category/edit-category/$catid");
			    }
		}
	}
}