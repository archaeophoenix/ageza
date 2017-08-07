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

    private function files($id){
        $dir = 'assets/'.$id;
        $fl = scandir($dir);
        unset($fl[0]);
        unset($fl[1]);
        $file = array_values($fl);
        return $file;
    }

    function file($id = null){
        $data['id'] = $id;
        $data['data'] = (empty($id)) ? null : $this->data($id) ;
        $data['files'] = $this->files($id);

        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();
        
        $this->load->view('header',$header);
        $this->load->view('skpd/file',$data);
        $this->load->view('footer');
    }

    function subfile($id){
        if (!empty($_FILES['file']['name'])) {
            $upload = null;
            $gambar = $_FILES['file'];
            foreach ($gambar['type'] as $key => $value) {
                if ($gambar['error'][$key] == 0) {
                    $upload['name'] = $gambar['name'][$key];
                    $upload['type'] = $gambar['type'][$key];
                    $upload['tmp_name'] = $gambar['tmp_name'][$key];
                    $upload['error'] = $gambar['error'][$key];
                    $upload['size'] = $gambar['size'][$key];
                    $file = $this->Dml_model->uploads($upload, 'assets/'.$id, date('d-m-y H:i:s'));
                }
            }
        }
    }

    function field($id = null){

        $data['id'] = $id;
        $data['list'] = $this->data() ;
        $data['data'] = (empty($id)) ? null : $this->data($id) ;

        $header['class'] = $this->router->fetch_class();
        $header['method'] = $this->router->fetch_method();
        
        $this->load->view('header',$header);
        $this->load->view('skpd/field',$data);
        $this->load->view('footer');
    }

    function submit($id = null){
        if($_SESSION['masuk']['status'] != 1){
            redirect('');
        } else{
            if(isset($_POST)){
                if (is_null($id)) {
                    $id = $this->Dml_model->create('skpd',$_POST);
                } else {
                    $this->Dml_model->update('skpd',"id = '$id'",$_POST);
                }

                if (!file_exists('assets/'.$id)) {
                    mkdir('assets/'.$id, 0777, true);
                    chmod('assets/'.$id, 0777);
                }
            }
        }
        redirect('');
    }
}