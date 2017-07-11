<?php
class Berita extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
        $this->Dml_model->cancel();
        /*
        http://remote.com/
        http://remoteok.io/
        if (empty($_SESSION['param']) || is_null($_SESSION['param'])) {
            $_SESSION['param'] = ['bulan' => date('m') ,'tahun' => date('Y')];
        }*/
    }

    function index(){
        /*if (empty($_SESSION['masuk'])) {
            $this->load->view('login');
        } else {
        }*/
        redirect('berita/datas/');
    }

    private function tindakan($id = null , $periode){
        $condition = (empty($id)) ? 'WHERE '.$periode : "WHERE temuan.id = '$id'" ;
        $method = (empty($id)) ? 'read' : 'one' ;

        $atad = array();
        $berita = $this->Dml_model->{$method}('berita','JOIN temuan ON temuan.id = id_temuan JOIN skpd ON skpd.id = id_skpd '.$condition, 'berita.id, id_temuan, skpd.nama skpd, tj, ketua, anggota, no, ts, berita.uu, DATE_FORMAT(berita.tanggal,"%d-%m-%Y") tanggal, saran, DATE_FORMAT(batas,"%d-%m-%Y") batas, status');

        $ids = array();
        foreach ($berita as $key => $value) {
            $ids[] = $value['id'];
            // $berita[$value['id']] = $value;
            // unset($berita[$key]);
        }

        $ids = implode(',', $ids);

        $data = $this->Dml_model->read('file','WHERE id_berita IN ('.$ids.') ORDER BY id_berita ASC');
        foreach ($data as $key => $value) {
            $atad['file'][$value['id_berita']][$key] = $value['file'];
        }

        foreach ($berita as $key => $value) {
            if(array_key_exists($value['id'],$atad['file'])){
                $berita[$key]['file'] = $atad['file'][$value['id']];
            }
        }

        return $berita;
    }

    private function data($id = null){

        $condition = (empty($id)) ? '' : "WHERE id = '$id'" ;
        $method = (empty($id)) ? 'read' : 'one' ;

        return $this->Dml_model->{$method}('berita',$condition);
    }

    function submit($id = null){
        $ids = explode('-', $id);
        if(isset($_POST)){

            // echo "<pre>";print_r($_POST);print_r($_FILES);

            if (!empty($_POST)) { echo "post";
                $_POST['id_temuan'] = (isset($_POST['id_temuan'])) ? $_POST['id_temuan'] : $ids[0] ;
                $_POST['batas'] = date('Y-m-d',strtotime($_POST['batas']));
                $_POST['tanggal'] = date('Y-m-d',strtotime($_POST['tanggal']));

                if($ids[1] == 'post'){
                    $id_berita = $this->Dml_model->create('berita',$_POST);
                } else {
                    $this->Dml_model->update('berita',"id = '".$ids[0]."'",$_POST);
                }
            }

            if ($ids[1] == 'edit') {
                if (!empty($_FILES['file']['name'])) { echo "file";
                    $gambar = $_FILES['file'];
                    $upload = null;
                    foreach ($gambar['type'] as $key => $value) {
                        if($value == 'image/gif' || $value == 'image/svg' || $value == 'image/jpeg' || $value == 'image/png'){
                            // $_POST['foto'] = $file['name'];
                            if ($gambar['error'][$key] == 0) {
                                $upload['name'] = $gambar['name'][$key];
                                $upload['type'] = $gambar['type'][$key];
                                $upload['tmp_name'] = $gambar['tmp_name'][$key];
                                $upload['error'] = $gambar['error'][$key];
                                $upload['size'] = $gambar['size'][$key];
                                $file = $this->Dml_model->uploads($upload, 'assets/images/berita', uniqid());
                                // print_r($file);
                                
                                $files['id_berita'] = $ids[0];
                                $files['file'] = 'assets/images/berita/'.$file['name'];
                                $this->Dml_model->create('file',$files);
                            }
                        }
                    }
                }
            }
        }

        die();
        redirect('berita/field/');
    }

    function form($type = 'berita', $id = null){
        $ids = explode('-', $id);


        if ($type != 'berita' && $ids[1] == 'post') {
            redirect('berita/form/berita/'.$id);
        }

        /*$header['class'] = $this->router->fetch_class();
        echo $function;die();
        this->router->fetch_method()*/

        // print_r($ids);die();
        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();
        
        $data['submit'] = $id;
        $data['type'] = $ids[1];
        $data['data'] = ($ids[1] == 'post') ? null : $this->data($ids[0]) ;
        $data['method'] = $type;
        $data['status'] = ['Belum Selesai', 'Proses', 'Selesai'];
        $data['skpd'] = $this->Dml_model->one('temuan', 'JOIN skpd ON skpd.id = id_skpd WHERE temuan.id = '.$ids[0], 'temuan.id, skpd.nama skpd');
        // echo "<pre>";print_r($data);die();
        
        $this->load->view('header',$header);
        $this->load->view('berita/form',$data);
        $this->load->view('footer');
    }

   function datas($bulan = null, $tahun = null){
        if(empty($bulan) || empty($tahun)){
            redirect('berita/datas/'.date('m').'/'.date('Y').'/');
        }

        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();

        $data['param'] = ['bulan' => $bulan, 'tahun' => $tahun];
        $data['status'] = ['Belum Selesai', 'Proses', 'Selesai'];
        $data['tahun'] = $this->Dml_model->read('berita','','DISTINCT(YEAR(tanggal)) tahun');
        $data['data'] = $this->tindakan(null,'MONTH(berita.tanggal) = '.$bulan.' AND YEAR(berita.tanggal) = '.$tahun);
        $data['bulan'] = ['01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'];

        $footer['link'] = 'berita/datas';

        // echo "<pre>";print_r($data);die();

        $this->load->view('header',$header);
        $this->load->view('berita/list',$data);
        $this->load->view('footer',$footer);
    }

}
