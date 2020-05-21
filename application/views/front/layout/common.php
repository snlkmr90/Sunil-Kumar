<?php 
$ci = & get_instance();
$ci->load->model("home_model");
$header['header_menu_categories'] = $ci->home_model->get_header_category();
$footer['footer_menu_categories'] = $ci->home_model->get_footer_category();
$this->load->view('front/layout/header',$header);
echo $contents;
$this->load->view('front/layout/footer',$footer);

 ?>