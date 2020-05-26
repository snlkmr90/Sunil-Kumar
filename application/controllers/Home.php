<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->library(['template']);
			$this->load->helper(['url','form']);
			$this->load->library(['form_validation','pagination','parser']);
			$this->load->model(['home_model','blog_model']);
	}
	public function index()
	{
		$config = array();
        $config["base_url"] = base_url();
        $config["per_page"] = 10;
        $config["uri_segment"] = 1;
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
        $page = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
        $config["total_rows"] = $this->home_model->count_blog_posts($config["per_page"], $page);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
		$data['list_blog_posts'] = $this->home_model->list_blog_posts($config["per_page"], $page);
		$data['featured_posts']=$this->home_model->get_featured_posts();
		$this->template->load('front/layout/common','front/home',$data);
	}
	public function postcomment()
	{
			$commentpost['success'] = 'false';
			$commentdata['comment_post_id'] = $this->input->post('postid');
			$commentdata['comment_website'] = $this->input->post('commentwebsite');
			$commentdata['comment_name'] =  $this->input->post('commentname');
			$commentdata['comment_email']   =  $this->input->post('commentemail');
			$commentdata['comment_text']    = $this->input->post('commenttext');
			$commentdata['comment_posted_at']    = date('Y-m-d H:i:s');
			if($this->input->post){
				$postcomment = $this->home_model->postcomment($commentdata);
				if($postcomment)
				{
					$commentpost['success'] = 'true';
				}
			}
			echo json_encode($commentpost);
	}
	public function contact_us()
	{
			$this->template->load('front/layout/common','front/contact-us');
	}
	public function write_for_us()
	{
			$this->template->load('front/layout/common','front/write-for-us');
	}
	public function save_contact()
	{
			$contactpost['success'] = 'false';
            $contactdata['contact_subject'] = $this->input->post('contactsubject',TRUE);
            $contactdata['contact_name'] =  $this->input->post('contactname',TRUE);
            $contactdata['contact_email']   =  $this->input->post('contactemail',TRUE);
            $contactdata['contact_phone']    = $this->input->post('contactphone',TRUE);
            $contactdata['contact_message']    = $this->input->post('contactmessage',TRUE);
            $contactdata['contact_recieved_at']    = date('Y-m-d H:i:s');
                $postcontact = $this->home_model->postcontact($contactdata);
                if($postcontact)
                {
                	    $config = Array(
                	       'protocol' => 'smtp',
						  'smtp_host' => 'mail.guestblogss.com',
						  'smtp_port' => 587,
						  'smtp_user' => 'admin@guestblogss.com', // change it to yours
						  'smtp_pass' => 'Q6&.&SBcav,l', // change it to yours
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);

					      $message = $this->parser->parse('email/contact',$contactdata,TRUE);
					      $this->load->library('email', $config);
					      $this->email->set_newline("\r\n");
					      $this->email->from('admin@guestblogss.com'); // change it to yours
					      $this->email->to($contactdata['contact_email']);// change it to yours
					      $this->email->subject('Quick Contact- GuestBlogss');
					      $this->email->message($message);
					      $this->email->send();
                    $contactpost['success'] = 'true';
                }
            echo json_encode($contactpost);
	}
	public function save_writeus()
	{
			$writeuspost['success'] = 'false';
            $writeusdata['writeus_subject'] = $this->input->post('writeussubject',TRUE);
            $writeusdata['writeus_name'] =  $this->input->post('writeusname',TRUE);
            $writeusdata['writeus_email']   =  $this->input->post('writeusemail',TRUE);
            $writeusdata['writeus_message']    = $this->input->post('writeusmessage',TRUE);
            $writeusdata['writeus_recieved_at']    = date('Y-m-d H:i:s');
                $postwriteus = $this->home_model->postwriteus($writeusdata);
                if($postwriteus)
                {
                	    $config = Array(
                	       'protocol' => 'smtp',
						  'smtp_host' => 'mail.guestblogss.com',
						  'smtp_port' => 587,
						  'smtp_user' => 'admin@guestblogss.com', // change it to yours
						  'smtp_pass' => 'Q6&.&SBcav,l', // change it to yours
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);

					      $message = $this->parser->parse('email/writeus',$writeusdata,TRUE);
					      $this->load->library('email', $config);
					      $this->email->set_newline("\r\n");
					      $this->email->from('admin@guestblogss.com'); // change it to yours
					      $this->email->to($writeusdata['writeus_email']);// change it to yours
					      $this->email->subject('Write For Us- GuestBlogss');
					      $this->email->message($message);
					      $this->email->send();
                    $writeuspost['success'] = 'true';
                }
            echo json_encode($writeuspost);
	}
}
