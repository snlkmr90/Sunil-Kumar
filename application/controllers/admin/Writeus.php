<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Writeus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library('template');
			$this->load->helper(['url','form']);
			$this->load->library(['form_validation','pagination']);
			$this->load->model(['admin/writeus_model']);
			if (!$this->session->userdata('admin_id') && $this->uri->segment(1) != 'adminaccess')
			{
				// redirect them to the login page
				redirect('adminaccess', 'refresh');
				exit();
			}

	}
	public function list_writeus()
	{
		$config = array();
		$searchdata = array();
		if($this->input->post('filterwriteus')!=null){
			$searchdata['writeus_name'] = trim($this->input->post('writeus_name',TRUE));
			$searchdata['writeus_email'] = trim($this->input->post('writeus_email',TRUE));
			$searchdata['writeus_phone'] = trim($this->input->post('writeus_phone',TRUE));
			$searchdata['writeus_created_to'] = trim($this->input->post('writeus_created_to',TRUE));
			$searchdata['writeus_created_from'] = trim($this->input->post('writeus_created_from',TRUE));
			$this->session->set_userdata('admin_writeus_filter',$searchdata);
			$data['admin_writeus_filter'] =  $this->session->userdata('admin_writeus_filter');
		}
		/*print_r($data['admin_writeus_filter']);
		die;*/
        $config["base_url"] = base_url() . "writeus/list-writeus";
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
        $config["total_rows"] = $this->writeus_model->count_writeus($config["per_page"], $page,$searchdata);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
		$data['writeus'] = $this->writeus_model->list_writeus($config["per_page"], $page,$searchdata,null);
		$this->template->load('admin/layout/common','admin/writeus/list-writeus',$data);
	}
	public function view_writeus($writeusid)
	{

		$data['writeus'] = $this->writeus_model->list_writeus(null, null,null,$writeusid);
		$this->template->load('admin/layout/common','admin/writeus/view-writeus',$data);
	}
	public function resetwriteusfilter(){
		$this->session->unset_userdata('admin_writeus_filter');
		redirect(base_url().'writeus/list-writeus','refresh');
	}
	public function delete_writeus($writeusid)
	{
		    $deletestatus = $this->writeus_model->delete_writeus($writeusid);
    if($deletestatus){
    	$this->session->set_flashdata('writeus_delete_success', 'writeus Removed Successfully');
    	redirect(base_url().'writeus/list-writeus');
    }
    }
}