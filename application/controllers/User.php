<?php
class User extends CI_Controller {

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
            redirect('user/field/');
        }
    }

    private function data($id = null){
        $method = (empty($id)) ? 'read' : 'one' ;
        $condition = (empty($id)) ? null : 'WHERE user.id = '.$id ;

        return $this->Dml_model->{$method}('user' ,'LEFT JOIN skpd ON skpd.id = id_skpd '.$condition,'user.id, user.nama, status, telpon, skpd.nama skpd, username');
    }

    function field($id = null){
        
        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();

        $data['list'] = $this->data() ;
        $data['skpd'] = $this->Dml_model->read('skpd') ;
        $id = ($_SESSION['masuk']['status'] == 1) ? $id : $_SESSION['masuk']['id'] ;
        $data['id'] = ($_SESSION['masuk']['status'] == 1) ? $id : $_SESSION['masuk']['id'] ;
        $data['data'] = (empty($id)) ? null : $this->data($id) ;
        $data['status'] = array('Inactive','Admin','Irjen/Auditor','Evaluator','K-SKPD','Inspektur/Sekretaris');


        // echo "<pre>"; print_r($data); die();
        /*extract($data);
        foreach ($travel as $key => $value) {
            if (!empty($id_travel)) {
                $keys = array_keys(array_column($id_travel, 'id'), $value['id']);
                echo (empty($keys)) ? '' : 'ok' ;
            }
        }*/
        
        // echo "<pre>";print_r($data);die();
        $this->load->view('header',$header);
        $this->load->view('user/field',$data);
        $this->load->view('footer');
    }

    function submit($id = null){
        if(isset($_POST)){
            extract($_POST);

            if (is_null($id)) {
                $user['password'] = $this->Dml_model->dencrypt('encrypt' ,$user['password']);
                $this->Dml_model->create('user',$user);

            } else {
                if(empty($user['password'])){
                    unset($user['password']);
                } else {
                    $user['password'] = $this->Dml_model->dencrypt('encrypt' ,$user['password']);
                }
                
                $this->Dml_model->update('user',"id = '$id'",$user);
            }
            // die();

        }
        redirect('user/field/');
    }

    function username(){
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
            redirect('user');
        }
        $where = (isset($_POST['id'])) ? 'AND id NOT IN ('.$_POST['id'].')' : '' ;
        $data = $this->Dml_model->read('user','WHERE username LIKE "'.$_POST['username'].'" '.$where,'id');
        echo (empty($data)) ? 'has-success' : 'has-error' ;
        // print_r($_POST);
        // print_r($_SERVER);
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