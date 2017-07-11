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
				// session_start();
				$_SESSION['masuk'] = $result;
				$_SESSION['log'] = true;
				/*$log['id_user'] = $_SESSION['id'];
				$log['aktivitas'] = 'Login';*/
				// $this->data->create('log',$log);
			}
			// echo "<pre>";print_r($_SESSION);die();
		}
		redirect('');
	}

}