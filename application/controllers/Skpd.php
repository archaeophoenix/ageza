<?php
class Skpd extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
        // $this->Dml_model->cancel();
        
        /*if ($_SESSION['cur'] == 1) {
            redirect('currency');
        }
        
        if (empty($_SESSION['param']) || is_null($_SESSION['param'])) {
            $_SESSION['param'] = ['bulan' => date('m') ,'tahun' => date('Y')];
        }

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
        date_default_timezone_set('Asia/'.$_SESSION['time']);
        */
    }

    function index(){
       /* if (empty($_SESSION['masuk'])) {
            redirect('');
        } else {
        }*/
        redirect('skpd/field/');
    }

    private function data($id = null){
        // SELECT * FROM `kodepos` ORDER BY `id` ASC LIMIT 10, 20 
        $limit = (empty($limit)) ? 0 : ($limit-1) * 12 ;
        // echo "$limit";die();

        $condition = (empty($id)) ? "" : "WHERE id = '$id'" ;
        $method = (empty($id)) ? 'read' : 'one' ;

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
