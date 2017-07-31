<?php
class Temuan extends CI_Controller {

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
            redirect('temuan/datas/');
        }
    }

    private function data($id = null , $periode = null){
        $condition = (empty($id)) ? 'WHERE '.$periode : "WHERE temuan.id = '$id'" ;
        $method = (empty($id)) ? 'read' : 'one' ;

        return $this->Dml_model->{$method}('temuan','JOIN skpd ON skpd.id = id_skpd '.$condition, 'temuan.id, id_skpd, skpd.nama skpd, uu, tanggal, pendapatan, btl_uraian, btl_anggaran, btl_realisasi, btl_spj, btl_sisa, bl_uraian, bl_anggaran, bl_realisasi, bl_spj, bl_sisa, jenis, temuan.nama, nilai, spp_tanggal, spp_up, spp_gu, spp_tu, spp_gaji, spp_barjas, spm_tanggal, spm_up, spm_gu, spm_tu, spm_gaji, spm_barjas, tj_tanggal, no_spj, jumlah');
    }

    function submit($id = null){
        if(isset($_POST)){
            $_POST['tanggal'] = date('Y-m-d',strtotime($_POST['tanggal']));
            $_POST['spp_tanggal'] = date('Y-m-d',strtotime($_POST['spp_tanggal']));
            $_POST['spm_tanggal'] = date('Y-m-d',strtotime($_POST['spm_tanggal']));
            $_POST['tj_tanggal'] = date('Y-m-d',strtotime($_POST['tj_tanggal']));
            if(empty($id)){
                $this->Dml_model->create('temuan', $_POST);
            } else {
                $this->Dml_model->update('temuan',"id = '$id'", $_POST);
            }
        }
    }

    function form($id = null){
        if($_SESSION['masuk']['status'] == 1 || $_SESSION['masuk']['status'] == 2){
            $header['class'] = $this->router->fetch_class();
            $header['method'] = $this->router->fetch_method();

            $data['skpd'] = $this->Dml_model->read('skpd') ;
            $data['data'] = (empty($id)) ? null : $this->data($id) ;

            $this->load->view('header',$header);
            $this->load->view('temuan/form',$data);
            $this->load->view('footer');
        } else {
            redirect('');
        }
    }

    function datas($bulan = null, $tahun = null){
        if(empty($bulan) || empty($tahun)){
            redirect('temuan/datas/'.date('m').'/'.date('Y').'/');
        }
        
        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();
        
        $data['param'] = array('bulan' => $bulan, 'tahun' => $tahun);
        $data['tahun'] = $this->Dml_model->read('temuan','','DISTINCT(YEAR(tanggal)) tahun');
        $data['data'] = $this->data(null,'MONTH(tanggal) = '.$bulan.' AND YEAR(tanggal) = '.$tahun);
        $data['bulan'] = array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');

        $footer['link'] = 'temuan/datas';

        $this->load->view('header', $header);
        $this->load->view('temuan/list', $data);
        $this->load->view('footer', $footer);
    }

}
// SELECT berita.ketua, (SELECT persen FROM protl WHERE id_berita = berita.id ORDER by tmstmp DESC LIMIT 1) persen FROM `berita` 