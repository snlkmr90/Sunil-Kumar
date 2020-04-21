<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->helper(['url','form']);
			$this->load->library('form_validation');
			$this->load->model(['admin/admin_model']);


	}
	public function dashboard()
	{

		if (!$this->session->userdata('admin_id'))
		{
			// redirect them to the login page
			redirect('adminaccess', 'refresh');
		}
		$this->template->load('admin/layout/common','admin/dashboard');
	}
	public function adminaccess()
	{
		if ($this->session->userdata('admin_id'))
		{
			// redirect them to the login page
			redirect('admin/dashboard', 'refresh');
		}
		$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[3]|valid_email');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login');	
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$md5pass = md5($password); 
			$loginData = $this->admin_model->adminLogin($email,$md5pass);
			if($loginData){
				$loginSession = ['admin_email'=>$loginData->email,'admin_id'=>$loginData->id,'admin_username'=>$loginData->username];
				$this->session->set_userdata($loginSession);
				redirect('admin/dashboard','refresh');
			}else{
				$this->session->set_flashdata('userNotFound', 'User does not exists! Please check you credentials or contact admin');
				redirect('adminaccess','refresh');	
			}
		}
		
		
	}
}