<?php
class Index extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
    }

    function index(){
        if (empty($_SESSION['masuk'])) {
            $this->load->view('login');
        } else {
            $header['class'] = $this->router->fetch_class();
            $header['method'] = $this->router->fetch_method();
            
            $data['temuan'] = $this->Dml_model->one('temuan','WHERE YEAR(tanggal) = '.date('Y').' AND MONTH(tanggal) = '.date('m'),'COUNT(id) id');
            $data['berita'] = $this->Dml_model->one('berita','WHERE YEAR(tgl) = '.date('Y').' AND MONTH(tgl) = '.date('m'),'COUNT(id) id');
            $data['skpd'] = $this->Dml_model->one('skpd','','COUNT(id) id');

            $data['abjad'] = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
            $data['sum'] = $this->Dml_model->one('polling','WHERE YEAR(tanggal) = '.date('Y').' AND MONTH(tanggal) = '.date('m'),'SUM(nilai) nilai');
            $data['polling'] = $this->Dml_model->read('polling','JOIN skpd ON id_skpd = skpd.id WHERE YEAR(tanggal) = '.date('Y').' AND MONTH(tanggal) = '.date('m').' GROUP BY id_skpd','SUM(nilai) nilai, skpd.nama skpd');


            $this->load->view('header',$header);
            $this->load->view('index',$data);
            $this->load->view('footer');
        }
    }

}
