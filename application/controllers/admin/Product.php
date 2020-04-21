<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library('template');
			$this->load->helper('url');

	}
	public function list_products()
	{
		$this->template->load('admin/layout/common','admin/dashboard');
	}
	public function add_product()
	{
		$this->template->load('admin/layout/common','admin/dashboard');
	}
	public function edit_product()
	{
		$this->template->load('admin/layout/common','admin/dashboard');
	}
}