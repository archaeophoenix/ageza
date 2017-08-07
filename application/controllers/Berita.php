<?php
class Berita extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dml_model');
		$this->load->library('session');
		$this->load->helper('url_helper');
        $this->Dml_model->cancel();
        
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
            redirect('berita/datas/');
        }
    }

    function progres($id = null){
        
        $header['class'] = $this->router->fetch_class();

        $data['data'] = $this->tindakan($id);
        $data['protl'] = $this->Dml_model->read('protl','WHERE id_berita = '.$id.' ORDER BY tmstmp ASC','nilai, DATE_FORMAT(tmstmp, " %e/%m/%y %H:%i:%s") waktu');
        $data['probl'] = $this->Dml_model->read('probl','WHERE id_berita = '.$id.' ORDER BY tmstmp ASC','nilai, DATE_FORMAT(tmstmp, " %e/%m/%y %H:%i:%s") waktu');
        $data['status'] = array('Belum Selesai', 'Proses', 'Selesai');
        
        $this->load->view('header',$header);
        $this->load->view('berita/progres',$data);
        $this->load->view('footer');
    }

    function subpro($id = null){
        if (isset($_POST)) {
            // echo "<pre>"; print_r($_POST); die();

            $data['id_berita'] = $id;
            foreach ($_POST['nilai'] as $key => $value) {
                $data['nilai'] = $value;
                $this->Dml_model->create($key,$data);
            }

            $this->Dml_model->update('berita','id = '.$id,$_POST['berita']);
        }
        redirect('');
    }

    private function tindakan($id = null , $periode = null){
        $condition = (empty($id)) ? 'WHERE '.$periode : "WHERE berita.id = '$id'" ;
        $method = (empty($id)) ? 'read' : 'one' ;

        $atad = array();
        $berita = $this->Dml_model->{$method}('berita','JOIN temuan ON temuan.id = id_temuan JOIN skpd ON skpd.id = id_skpd '.$condition.' ORDER BY berita.tgl, berita.tanggal ASC', 'berita.id, id_temuan, skpd.nama skpd, tj, ketua, anggota, no, ts, berita.uu, berita.code, DATE_FORMAT(berita.tgl,"%d-%m-%Y") tgl, DATE_FORMAT(berita.tanggal,"%d-%m-%Y") tanggal, saran, DATE_FORMAT(batas,"%d-%m-%Y") batas, status, (SELECT SUM(nilai) FROM protl WHERE id_berita = berita.id) protl , (SELECT SUM(nilai) FROM probl WHERE id_berita = berita.id) probl ');

        $ids = null ;
        $data = null ;
        if ($method == 'read') {
            foreach ($berita as $key => $value) {
                $ids[] = $value['id'];
            }
        }

        if ($method == 'read') {
            $ids = (empty($ids)) ? '' : implode(',', $ids) ;
        } else {
            $ids = $berita['id'] ;
        }
        
        // echo "<pre>";print_r($berita);echo $ids.$method;die();

        if (!empty($ids)) {
            
            $data = (empty($ids)) ? null : $this->Dml_model->read('file','WHERE id_berita IN ('.$ids.') ORDER BY tmstmp ASC','id, id_berita, file, DATE_FORMAT(tmstmp, " %e/%m/%y %H:%i:%s") waktu');
        
            foreach ($data as $key => $value) {
                if ($method == 'read') {
                    $atad['file'][$value['id_berita']][$key] = $value['file'];
                    $atad['waktu'][$value['id_berita']][$key] = $value['waktu'];
                } else {
                    $atad['file'][$key] = $value['file'];
                    $atad['waktu'][$key] = $value['waktu'];
                }
            }
        
            if ($method == 'read') {
                if (!empty($data)) {

                    foreach ($berita as $key => $value) {
                        if(array_key_exists($value['id'],$atad['file'])){
                            $berita[$key]['file'] = $atad['file'][$value['id']];
                            $berita[$key]['waktu'] = $atad['waktu'][$value['id']];
                        }
                    }
                }
            } else {
                if (!empty($data)) {
                    $berita['file'] = $atad['file'];
                    $berita['waktu'] = $atad['waktu'];
                }
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
            // echo "<pre>";print_r($_POST);print_r($ids);die();

            if (!empty($_POST)) { //echo "post";
                $_POST['id_temuan'] = (isset($_POST['id_temuan'])) ? $_POST['id_temuan'] : $ids[0] ;
                
                if (isset($_POST['tgl'])) {
                    $_POST['tgl'] = date('Y-m-d',strtotime($_POST['tgl']));
                }
                
                if (isset($_POST['batas'])) {
                    $_POST['batas'] = date('Y-m-d',strtotime($_POST['batas']));
                }
                
                if (isset($_POST['tanggal'])) {
                    $_POST['tanggal'] = date('Y-m-d',strtotime($_POST['tanggal']));
                }

                if($ids[1] == 'post'){
                    $_POST['code'] = uniqid();
                    $id_berita = $this->Dml_model->create('berita',$_POST);
                } else {
                    $this->Dml_model->update('berita',"id = '".$ids[0]."'",$_POST);
                }
            }

            if ($ids[1] == 'edit') {
                if (!empty($_FILES['file']['name'])) { //echo "file";
                    $upload = null;
                    $gambar = $_FILES['file'];
                    foreach ($gambar['type'] as $key => $value) {
                        // if($value == 'image/gif' || $value == 'image/svg' || $value == 'image/jpeg' || $value == 'image/png'){
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
                        // }
                    }
                }
            }
        }

        // die();
        redirect('');
    }

    function form($type = 'berita', $id = null){
        $ids = explode('-', $id);


        if ($type != 'berita' && $ids[1] == 'post') {
            redirect('berita/form/berita/'.$id);
        }

        $header['class'] = $this->router->fetch_class();
        
        $data['submit'] = $id;
        $data['type'] = $ids[1];
        $data['data'] = ($ids[1] == 'post') ? null : $this->data($ids[0]) ;

        $data['method'] = $type;
        $data['status'] = array('Belum Selesai', 'Proses', 'Selesai');
        $idt = ($ids[1] == 'post') ? $ids[0] : $data['data']['id_temuan'] ;
        $data['skpd'] = $this->Dml_model->one('temuan', 'JOIN skpd ON skpd.id = id_skpd WHERE temuan.id = '.$idt, 'temuan.id, skpd.nama skpd');

        if ($type == 'file') {
            $data['files'] = $this->tindakan($ids[0]);
        }

        // echo "<pre>";print_r($data);die();
        
        $this->load->view('header',$header);
        $this->load->view('berita/form',$data);
        $this->load->view('footer');
    }

   function datas($bulan = null, $tahun = null, $id = null){
        if(empty($bulan) || empty($tahun)){
            $skpd = ($_SESSION['masuk']['status'] != 4) ? $this->Dml_model->one('skpd','ORDER BY id ASC LIMIT 1') : '' ;
            redirect('berita/datas/'.date('m').'/'.date('Y').'/'.$skpd['id']);
        }

        $status = ($_SESSION['masuk']['status'] == 4) ? $_SESSION['masuk']['id_skpd'] : $id ;

        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();

        $data['skpd'] = $this->Dml_model->read('skpd');
        $data['status'] = array('Belum Selesai', 'Proses', 'Selesai');
        $data['param'] = array('bulan' => $bulan, 'tahun' => $tahun, 'id' => $id);
        $data['tahun'] = $this->Dml_model->read('berita','','DISTINCT(YEAR(tgl)) tahun');
        $data['data'] = $this->tindakan(null,'id_skpd = '.$status.' AND MONTH(berita.tgl) = '.$bulan.' AND YEAR(berita.tgl) = '.$tahun);
        $data['bulan'] = array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');

        $footer['link'] = 'berita/datas';

        $this->load->view('header',$header);
        $this->load->view('berita/list',$data);
        $this->load->view('footer',$footer);
    }

}
