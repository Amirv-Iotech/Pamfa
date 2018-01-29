<?php 

class Home extends CI_Controller {
	
	public function  __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
	}
	
	public function index()
	{
		$this->load->view('admin/header');
		//$this->load->view('admin/menu');
		$this->load->view('admin/main');
		$this->load->view('admin/footer');
	}
	
	
	
	
}
