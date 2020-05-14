<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library('template');
			$this->load->helper('url');
			if (!$this->session->userdata('admin_id') && $this->uri->segment(1) != 'adminaccess')
			{
				// redirect them to the login page
				redirect('adminaccess', 'refresh');
				exit();
			}

	}
	public function list_products()
	{
		$this->template->load('admin/layout/common','admin/products/list-product');
	}
	public function add_product()
	{
		$this->template->load('admin/layout/common','admin/products/add-product');
	}
	public function edit_product()
	{
		$this->template->load('admin/layout/common','admin/products/edit-product');
	}
}