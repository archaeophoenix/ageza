<?php
class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
	}

	function index(){
		if (isset($_POST)) {
			$result = $this->Dml_model->login();
			if(!empty($result)){
				$_SESSION['masuk'] = $result;
				$_SESSION['log'] = true;
			}
		}
		redirect('');
	}

}