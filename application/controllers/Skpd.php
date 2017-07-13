<?php
class Skpd extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');

        if (empty($_SESSION['masuk'])) {
            redirect('');
        } else {
            $result = $this->Dml_model->logon($_SESSION['masuk']['id']);
            
            if (empty($result)) {
                redirect('');
            } else {
                $_SESSION['masuk'] = $result;
            }
        }

        if($_SESSION['masuk']['status'] != 1){
            redirect('');
        }
    }

    function index(){
        if (empty($_SESSION['masuk'])) {
            redirect('');
        } else {
            redirect('skpd/field/');
        }
    }

    private function data($id = null){
        $method = (empty($id)) ? 'read' : 'one' ;
        $condition = (empty($id)) ? "" : "WHERE id = '$id'" ;

        return $this->Dml_model->{$method}('skpd',$condition);
    }

    function field($id = null){

        $data['id'] = $id;
        $data['list'] = $this->data() ;
        $data['data'] = (empty($id)) ? null : $this->data($id) ;

        // echo "<pre>"; print_r($data);die();
        
        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();
        
        $this->load->view('header',$header);
        $this->load->view('skpd/field',$data);
        $this->load->view('footer');
    }

    function submit($id = null){
        if(isset($_POST)){
            // echo "<pre>"; print_r($_FILES); print_r($_POST);die();

            if (is_null($id)) {
                $this->Dml_model->create('skpd',$_POST);
            } else {
                $this->Dml_model->update('skpd',"id = '$id'",$_POST);
            }

        }
        redirect('skpd/field/');
    }

    function oi (){
        $totalPage = 3;
        $curPage = 2;
        $start = ($curPage < 5)? 1 : $curPage - 4;
        $end = 8 + $start;
        $end = ($totalPage < $end) ? $totalPage : $end;
        $diff = $start - $end + 8;
        $start -= ($start - $diff > 0) ? $diff : 0;

        if ($start > 1) echo " First ... ";
        for($i=$start; $i<=$end; $i++) echo " {$i} ";
        if ($end < $totalPage) echo " ... Last ";


    	// echo'<pre>';
        // print_r($_SERVER);
    	// print_r($this->data());
    }

}
