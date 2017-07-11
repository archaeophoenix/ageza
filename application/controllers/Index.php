<?php
class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
        $this->Dml_model->cancel();
        if (empty($_SESSION['param']) || is_null($_SESSION['param'])) {
            $_SESSION['param'] = ['bulan' => date('m') ,'tahun' => date('Y')];
        }
        
        if (!empty($_SESSION['masuk'])) {
            if($_SESSION['masuk']['status'] == 5){
                redirect('menu');
            }
        }
    }

    function limit($id = null){
        unset($_SESSION['limit']);
        if(!empty($id)){
            $_SESSION['limit'] = $id;
        }
        redirect('');
    }

    function sortir($id = null){
        unset($_SESSION['sort_resto']);
        if(!empty($id)){
            $_SESSION['sort_resto'] = $id;
        }
        redirect('');
    }

    private function addon(){
        $lim = (isset($_SESSION['limit']) && $_SESSION['limit'] != 0) ? $_SESSION['limit'] : '36' ;
        $limit = (empty($limit)) ? 0 : ($limit-1) * $lim ;
        $condition = (empty($id)) ? "LIMIT $limit, $lim" : "WHERE paket.id = '$id'" ;

        return $this->Dml_model->read('addon',$condition,'id,nama,aktiv,harga,status,keterangan');
    }

    private function paket(){
        $lim = (isset($_SESSION['limit']) && $_SESSION['limit'] != 0) ? $_SESSION['limit'] : '36' ;
        $limit = (empty($limit)) ? 0 : ($limit-1) * $lim ;
        $where = (isset($_SESSION['sort_resto']) && $_SESSION['sort_resto'] != 0) ? 'AND id_resto = '.$_SESSION['sort_resto'] : '' ;

        $condition = (empty($id)) ? "LIMIT $limit, $lim" : "AND paket.id = '$id'" ;
        $method = (empty($id)) ? 'read' : 'one' ;

        return $this->Dml_model->{$method}('paket','JOIN resto ON id_resto = resto.id WHERE status = 1 '.$where.' '.$condition,'paket.id,paket.nama,jenis,foto,harga,detail,status,id_resto, resto.nama resto');
    }

    function index(){
        // echo "<pre>";print_r($_SESSION);die();
        if (empty($_SESSION['masuk'])) {
            $this->load->view('login');
        } else {
            // unset($_SESSION['pesan']);
            // print_r($_SESSION);die();
            /*$str = 'Hello to all of Ukraine';
            echo "$str<br>";
            echo strtok($str, ' ').' - '.strtok(' ').' - '.strtok(' ');die();*/
            $header['class'] = $this->router->fetch_class();
            $header['method'] = $this->router->fetch_method();
            
            $resto = ($_SESSION['masuk']['status'] == 1) ? '' : 'WHERE id_user = '.$_SESSION['masuk']['id'] ;

            $data['limit'] = [36,60,120] ;
            $data['paket'] = $this->paket();
            $data['addon'] = $this->addon();
            $data['jenis'] = ['Catring', 'Box'];
            $data['resto'] = $this->Dml_model->read('resto','','id, nama') ;
            $data['travel'] = $this->Dml_model->read('travel','JOIN member ON id_travel = travel.id '.$resto.' GROUP BY travel.id','travel.id, travel.nama') ;
            // echo '<pre>'; print_r($data); print_r($_SESSION); die();

            $count = $this->Dml_model->one('paket','','COUNT(id) count');

            $total = ceil($count['count']/10);
            $page = (!isset($_SESSION['page'])) ? 1 : $_SESSION['page'] ;
            $start = ($page < 5)? 1 : $page - 4;
            $end = 8 + $start;
            $end = ($total < $end) ? $total : $end;
            $diff = $start - $end + 8;
            $start -= ($start - $diff > 0) ? $diff : 0;

            $data['end'] = $end;
            $data['page'] = $page ;
            $data['start'] = $start;
            $data['total'] = $total;

            /*if (empty($_SESSION['masuk'])) {
                $this->load->view('login');
            } else {
                redirect('purchase/');
            }*/
            /*echo '<pre>';
            print_r($this->Dml_model->field('user'));*/

            
            $this->load->view('header',$header);
            $this->load->view('menu',$data);
            $this->load->view('footer');
        }
    }

    /*function oi (){
        echo'<pre>';
        print_r($_SERVER);
    }*/

}
