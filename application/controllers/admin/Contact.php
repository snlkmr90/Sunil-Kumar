<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library('template');
			$this->load->helper(['url','form']);
			$this->load->library(['form_validation','pagination']);
			$this->load->model(['admin/contact_model','admin/category_model']);
			if (!$this->session->userdata('admin_id') && $this->uri->segment(1) != 'adminaccess')
			{
				// redirect them to the login page
				redirect('adminaccess', 'refresh');
				exit();
			}

	}
	public function list_contact()
	{
		$config = array();
		$searchdata = array();
		if($this->input->post('filtercontact')!=null){
			$searchdata['contact_name'] = trim($this->input->post('contact_name',TRUE));
			$searchdata['contact_email'] = trim($this->input->post('contact_email',TRUE));
			$searchdata['contact_phone'] = trim($this->input->post('contact_phone',TRUE));
			$searchdata['contact_created_to'] = trim($this->input->post('contact_created_to',TRUE));
			$searchdata['contact_created_from'] = trim($this->input->post('contact_created_from',TRUE));
			$this->session->set_userdata('admin_contact_filter',$searchdata);
			$data['admin_contact_filter'] =  $this->session->userdata('admin_contact_filter');
		}
		/*print_r($data['admin_contact_filter']);
		die;*/
        $config["base_url"] = base_url() . "contact/list-contact";
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
        $config["total_rows"] = $this->contact_model->count_contact($config["per_page"], $page,$searchdata);
        $this->pagination->initialize($config);
        $data['categories'] = $this->category_model->list_category('','','','');
        $data["links"] = $this->pagination->create_links();
		$data['contact'] = $this->contact_model->list_contact($config["per_page"], $page,$searchdata,null);
		$this->template->load('admin/layout/common','admin/contact/list-contact',$data);
	}
	public function view_contact($contactid)
	{

		$data['contact'] = $this->contact_model->list_contact(null, null,null,$contactid);
		$this->template->load('admin/layout/common','admin/contact/view-contact',$data);
	}
	public function resetcontactfilter(){
		$this->session->unset_userdata('admin_contact_filter');
		redirect(base_url().'contact/list-contact','refresh');
	}
	public function delete_contact($contactid)
	{
		    $deletestatus = $this->contact_model->delete_contact($contactid);
    if($deletestatus){
    	$this->session->set_flashdata('contact_delete_success', 'Contact Removed Successfully');
    	redirect(base_url().'contact/list-contact');
    }
    }
}