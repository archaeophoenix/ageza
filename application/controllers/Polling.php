<?php
class Polling extends CI_Controller {

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

    }

    function index(){
        if (empty($_SESSION['masuk'])) {
            redirect('');
        } else {
            redirect('polling/field/');
        }
    }

    private function data($id = null){
        $method = (empty($id)) ? 'read' : 'one' ;
        $condition = (empty($id)) ? null : 'WHERE user.id = '.$id ;

        return $this->Dml_model->{$method}('skpd' ,'LEFT JOIN skpd ON skpd.id = id_skpd '.$condition,'user.id, user.nama, status, telpon, skpd.nama skpd, username');
    }

    function field($id = null){
        
        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();

        $data['sum'] = $this->Dml_model->one('polling','WHERE MONTH(tanggal) = '.date('m'),'SUM(nilai) nilai');
        $data['skpd'] = $this->Dml_model->read('skpd') ;
        $data['abjad'] = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        $data['bulan'] = $this->Dml_model->read('polling','JOIN skpd ON id_skpd = skpd.id WHERE MONTH(tanggal) = '.date('m').' GROUP BY id_skpd','SUM(nilai) nilai, skpd.nama skpd');

        // echo "<pre>";print_r($data);die();
       
        $this->load->view('header',$header);
        $this->load->view('polling/field',$data);
        $this->load->view('footer');
    }

    function submit(){
        if(isset($_POST)){
            $_POST['tanggal '] = date('Y-m-d');
            $this->Dml_model->create('polling',$_POST);
        }
        redirect('polling/field/');
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