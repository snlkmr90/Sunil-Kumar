<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library(array('template'));
	}
	public function index()
	{
		//$this->load->view('admin/index');
		$this->template->load('front/layout/common','front/home');
	}
}