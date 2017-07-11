<?php
class Logout extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
		
		if($_SESSION['log'] == false) {
			session_destroy();
			redirect('');
		}
	}

	function index(){
		session_destroy();
		redirect('');
	}
}