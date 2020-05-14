<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->helper(['url','form']);
			$this->load->library(['form_validation','email']);
			$this->load->model(['admin/admin_model']);

			if (!$this->session->userdata('admin_id') && $this->uri->segment(1) != 'adminaccess')
			{
				// redirect them to the login page
				redirect('adminaccess', 'refresh');
				exit();
			}
	}
	public function dashboard()
	{
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
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('adminaccess','refresh');
	}
	public function forgotpassword()
	{
		$data = ['success'=>'false','messages'=>array()];
		$this->form_validation->set_rules('forgetpassemail', 'email', 'trim|required|min_length[3]|valid_email');
		$this->form_validation->set_error_delimiters('','');
		if ($this->form_validation->run() == FALSE) 
		{
			foreach($_POST as $key=>$val)
			{
				$data['messages'][$key] = form_error($key);
			}
			$data = ['success'=>'false','messages'=>$data['messages']];
		} 
		else 
		{
			$forgetpassemail = $this->input->post('forgetpassemail');
			$checkMailExist = $this->admin_model->checkMailExist($forgetpassemail);
			if($checkMailExist)
			{
				$pass = rand(1000,9999);
				$password = md5($pass);  
				$resetAdminPassword = $this->admin_model->resetAdminPassword($forgetpassemail,$password);
				if($resetAdminPassword)
				{
					$data = ['success'=>'true','response'=>"Your New Password is $pass"];
				}
				else
				{
					$data = ['success'=>'false','response'=>"Error in reseting Password"];
				}
			}
			else
			{
				$data = ['success'=>'false','response'=>'Email not found in DB'];
			}
			
		}
		echo json_encode($data);
	}
}