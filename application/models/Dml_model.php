<?php
class Dml_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function login(){
        return $this->one('user','LEFT JOIN skpd ON skpd.id = id_skpd WHERE status != 0 AND username = "'.$_POST['username'].'" AND password = "'.$this->dencrypt('encrypt',$_POST['password']).'"' ,'user.id, skpd.id id_skpd, user.nama, status, telpon, skpd.nama skpd, username');
    }

    function logon($id){
        return $this->one('user',"LEFT JOIN skpd ON skpd.id = id_skpd WHERE user.id = '$id'" ,'user.id, skpd.id id_skpd, user.nama, status, telpon, skpd.nama skpd, username');
    }

    function dencrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';
        // hash
        // aes-128-cbc | aes-128-ctr | aes-256-cbc | aes-256-ctr
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    function notifikasi(){
        // return $this->read('pesan',' WHERE terbayar IS NULL AND status = 0','pesan.id, total, DATE_FORMAT(tanggal,"%d-%m-%Y") tanggal, keterangan');
        return 0;
    }

    function cancel(){
        return 0;
        /*$data['status'] = 2;
        $tanggal = date('Y-m-d');

        $ids = $this->read('pesan','WHERE (status = 0 OR status IS NULL) AND batas < "'.$tanggal.'" AND terbayar IS NULL ','id, id_travel, CONCAT(keterangan," Dibatalkan (belum membayar hingga tempo)") keterangan');
        echo "<pre>"; print_r($ids);die();

        foreach ($ids as $key => $id) {
            $data['keterangan'] = $id['keterangan'];

            if (!empty($id['id_travel'])) {
                $harga = $this->one('keranjang','WHERE id_pesan = '.$id['id'].' ORDER BY tanggal ASC','harga');
                $ids[$key]['harga'] = $harga['harga'];

                $jurnal['tanggal'] = $tanggal;
                $jurnal['id_pesan'] = $id['id'];
                $jurnal['kredit'] = $harga['harga'];
                $jurnal['transaksi'] = $id['keterangan'];

                $this->create('jurnal',$jurnal);
            }

            $this->update('pesan' ,'id = '.$id['id'] ,$data);
        }*/
        // echo "<pre>"; print_r($ids);die();
    }

    function field($table){
    	return $this->db->query("DESCRIBE ".$table)->result_array();
    }

    function create($table, $data = array()){
    	if(empty($data)){
    		$Field = $this->field($table);
            foreach($Field as $Fields){
                if($Fields['Type'] != 'timestamp'){
                    $data[$Fields['Field']] = $_REQUEST[$Fields['Field']];
                }
            }
    	}
    	$this->db->insert($table, $data);
    	return $this->db->insert_id();
    }

    function read($table, $condition = null, $fields = "*"){
    	return $this->db->query("SELECT $fields FROM $table $condition")->result_array();
    }

    function update($table,$where,$data){
    	if(empty($data)){
    		$Field = $this->field($table);
            foreach($Field as $Fields){
                if($Fields['Type'] != 'timestamp'){
                    $data[$Fields['Field']] = $_POST[$Fields['Field']];
                }
            }
    	}
        $this->db->update($table, $data, $where);
    }

    function delete($table, $where){
        $this->db->delete($table, $where); 
    }

    function one($table, $condition = null, $fields = "*"){
        return $this->db->query("SELECT $fields FROM $table $condition")->row_array();
    }

    function dates($data){
        $date = date("Y-m-d",strtotime($data));
        return $date;
    }

    function upload($data, $url = null, $rename = null){
        $files = $_FILES[$data];
        $name = $files['name'];
        move_uploaded_file($files['tmp_name'], "$url/".$name);
        if (!is_null($rename)) {
            $tipe = explode(".", $name);
            $rename = $rename.".".end($tipe);
            rename("$url/".$name, "$url/".$rename);
            $files['name'] = $rename;
            $name = $rename;
        }
        chmod("$url/".$name, 0777);
        return $files;
    }

    function uploads($data, $url = null, $rename = null){
        $files = $data;
        $name = $files['name'];
        move_uploaded_file($files['tmp_name'], "$url/".$name);
        if (!is_null($rename)) {
            $tipe = explode(".", $name);
            $rename = $rename.".".end($tipe);
            rename("$url/".$name, "$url/".$rename);
            $files['name'] = $rename;
            $name = $rename;
        }
        chmod("$url/".$name, 0777);
        return $files;
    }

    /*function reading($table, $id = null){
        $where = (empty($id)) ? 'ORDER BY id DESC' : 'WHERE id = '.$id;
        $type = (empty($id)) ? 'read' : 'one';
        return $this->{$type}($table,$where);
    }*/

}