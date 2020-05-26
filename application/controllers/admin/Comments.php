<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library('template');
			$this->load->helper(['url','form']);
			$this->load->library(['form_validation','pagination']);
			$this->load->model(['admin/comment_model','admin/category_model']);
			if (!$this->session->userdata('admin_id') && $this->uri->segment(1) != 'adminaccess')
			{
				// redirect them to the login page
				redirect('adminaccess', 'refresh');
				exit();
			}

	}
	public function list_comments()
	{
		$config = array();
		$searchdata = array();
		if($this->input->post('filtercat')!=null){
			$searchdata['comment_text'] = trim($this->input->post('comment_text',TRUE));
			$searchdata['comment_email'] = trim($this->input->post('comment_email',TRUE));
			$searchdata['comment_status'] = trim($this->input->post('comment_status',TRUE));
			$searchdata['comment_created_to'] = trim($this->input->post('comment_created_to',TRUE));
			$searchdata['comment_created_from'] = trim($this->input->post('comment_created_from',TRUE));
			$this->session->set_userdata('admin_comment_filter',$searchdata);
			$data['admin_comment_filter'] =  $this->session->userdata('admin_comment_filter');
		}

        $config["base_url"] = base_url() . "comments/list-comments";
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
        $config["total_rows"] = $this->comment_model->count_comments($config["per_page"], $page,$searchdata);
        $this->pagination->initialize($config);
        $data['categories'] = $this->category_model->list_category('','','','');
        $data["links"] = $this->pagination->create_links();
		$data['comments'] = $this->comment_model->list_comments($config["per_page"], $page,$searchdata,null);
		$this->template->load('admin/layout/common','admin/comments/list-comments',$data);
	}
	public function resetcommentfilter(){
		$this->session->unset_userdata('admin_comment_filter');
		redirect(base_url().'comments/list-comments','refresh');
	}
	public function update_comment($commentid,$status)
	{
		    $updatestatus = $this->comment_model->update_comments($commentid,$status);
    if($updatestatus){
    	$this->session->set_flashdata('comment_status_update_success', 'Comment Status Updated Successfully');
    	redirect(base_url().'comments/list-comments');
    }
    }
}