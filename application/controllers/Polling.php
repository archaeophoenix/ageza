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

    function field($bulan = null, $tahun = null){
        if(empty($bulan) || empty($tahun)){
            redirect('polling/field/'.date('m').'/'.date('Y').'/');
        }
        
        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();

        $data['param'] = array('bulan' => $bulan, 'tahun' => $tahun);
        $data['tahun'] = $this->Dml_model->read('polling','','DISTINCT(YEAR(tanggal)) tahun');
        $data['bulan'] = array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');

        $data['sum'] = $this->Dml_model->one('polling','WHERE MONTH(tanggal) = '.$bulan.' AND YEAR(tanggal) = '.$tahun,'SUM(nilai) nilai');
        $data['skpd'] = $this->Dml_model->read('skpd') ;
        $data['abjad'] = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
        $data['polling'] = $this->Dml_model->read('polling','JOIN skpd ON id_skpd = skpd.id WHERE MONTH(tanggal) = '.$bulan.' AND YEAR(tanggal) = '.$tahun.' GROUP BY id_skpd','SUM(nilai) nilai, skpd.nama skpd');

        $footer['link'] = 'polling/field';

        $this->load->view('header',$header);
        $this->load->view('polling/field',$data);
        $this->load->view('footer',$footer);
    }

    function submit(){
        if(isset($_POST)){
            $_POST['tanggal '] = date('Y-m-d');
            $this->Dml_model->create('polling',$_POST);
        }
        redirect('polling/field/');
    }

}